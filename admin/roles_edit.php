<?php 
// 1. CHOOSE THE RIGHT CONTEXT DIRECTORY FOR DATABASE CONNECTIONS
// Try local subdirectory first, fallback to structural root folder if necessary
if (file_exists('config/dbcon.php')) {
    include_once('config/dbcon.php');
} else {
    include_once('../config/dbcon.php');
}

// Ensure web tracking environment is active
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// 2. VALIDATE GET REQUEST DATA PARAMS
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['status'] = "Invalid or missing Role ID.";
    header("Location: roles.php");
    exit(0);
}
$role_id = mysqli_real_escape_string($conn, $_GET['id']);

// 3. PROCESS THE CHECKBOX CONTROLS UPON FORM SUBMISSION
if (isset($_POST['updateRolePermissions'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    $selected_permissions = isset($_POST['permissions']) ? $_POST['permissions'] : [];

    // Step A: Update basic textual role traits
    $updateRoleQuery = "UPDATE roles SET name='$name', description='$description' WHERE id='$role_id'";
    mysqli_query($conn, $updateRoleQuery);

    // Step B: Wipe the old permissions mapping so we don't create duplicates
    mysqli_query($conn, "DELETE FROM role_permissions WHERE role_id = '$role_id'");

    // Step C: Link each checked checkbox directly to the database mapping table
    if (!empty($selected_permissions)) {
        foreach ($selected_permissions as $perm_id) {
            $perm_id = mysqli_real_escape_string($conn, $perm_id);
            $insertQuery = "INSERT INTO role_permissions (role_id, permission_id) VALUES ('$role_id', '$perm_id')";
            mysqli_query($conn, $insertQuery);
        }
    }
    
    $_SESSION['status'] = "Role and Access Control Privileges updated successfully!";
    header("Location: roles.php");
    exit(0);
}

// 4. GATHER COMPONENT RENDER DETAILS
$roleQuery = mysqli_query($conn, "SELECT * FROM roles WHERE id = '$role_id' LIMIT 1");
if (mysqli_num_rows($roleQuery) == 0) {
    $_SESSION['status'] = "Role record not found.";
    header("Location: roles.php");
    exit(0);
}
$roleData = mysqli_fetch_assoc($roleQuery);

// Fetch currently saved permission links to pre-check the switches on page load
$activePerms = [];
$activePermsQuery = mysqli_query($conn, "SELECT permission_id FROM role_permissions WHERE role_id = '$role_id'");
if ($activePermsQuery) {
    while ($row = mysqli_fetch_assoc($activePermsQuery)) {
        $activePerms[] = $row['permission_id'];
    }
}

// Fetch all permissions to create the switch items visually
$allPermissions = mysqli_query($conn, "SELECT * FROM permissions ORDER BY name ASC");
if (!$allPermissions) {
    die("Database Query Failed: " . mysqli_error($conn));
}

// 5. RENDER THE INTERFACE
$pageTitle = "Edit Role & Permissions";
include('includes/header.php'); 
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modify Role Matrix: <?= htmlspecialchars($roleData['name']) ?></h5>
                </div>
                <div class="card-body">
                    <form action="roles_edit.php?id=<?= $role_id ?>" method="POST">

                        <div class="form-group mb-3">
                            <label class="form-control-label">Role Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($roleData['name']) ?>" class="form-control" placeholder="e.g. Content Editor" required />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Brief summary of duties..."><?= htmlspecialchars($roleData['description']) ?></textarea>
                        </div>

                        <hr class="horizontal dark">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Assign Access Control Privileges</h6>

                        <!-- Checkbox Matrix Element Row -->
                        <div class="row px-2">
                            <?php if (mysqli_num_rows($allPermissions) > 0): ?>
                                <?php while($permission = mysqli_fetch_assoc($allPermissions)): ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch d-flex align-items-center">
                                            <!-- array notation permissions[] captures multiple choices on form post -->
                                            <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                   value="<?= $permission['id'] ?>" 
                                                   id="perm_<?= $permission['id'] ?>"
                                                   <?= in_array($permission['id'], $activePerms) ? 'checked' : '' ?>>
                                            <label class="form-check-label mb-0 ms-3" for="perm_<?= $permission['id'] ?>">
                                                <strong class="text-sm d-block text-dark"><?= htmlspecialchars($permission['name']) ?></strong>
                                                <span class="text-xs text-secondary"><?= htmlspecialchars($permission['description']) ?></span>
                                            </label>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-warning text-white" role="alert">
                                        <strong>No data items detected.</strong> Please execute the SQL seed commands from Step 1 in phpMyAdmin to create the switch items.
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mt-4">
                            <a href="roles.php" class="btn btn-secondary btn-sm me-2">Back</a>
                            <button type="submit" name="updateRolePermissions" class="btn btn-success btn-sm">Save Structural Updates</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
