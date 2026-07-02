<?php 
// 1. USE INCLUDE_ONCE TO PREVENT REDEFINING CONSTANTS
include_once('../config/dbcon.php'); 

if (isset($_POST['saveRole'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    if (!empty($name)) {
        $checkRole = mysqli_query($conn, "SELECT id FROM roles WHERE name = '$name' LIMIT 1");
        if (mysqli_num_rows($checkRole) > 0) {
            if (session_status() === PHP_SESSION_NONE) { session_start(); }
            $_SESSION['status'] = "Role name already exists!";
            header("Location: roles.php");
            exit(0);
        } else {
            $query = "INSERT INTO roles (name, description) VALUES ('$name', '$description')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                $_SESSION['status'] = "Role created successfully!";
                header("Location: roles.php");
                exit(0);
            } else {
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                $_SESSION['status'] = "Something went wrong. Try again.";
                header("Location: roles_create.php");
                exit(0);
            }
        }
    } else {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        $_SESSION['status'] = "Please fill in the role name.";
        header("Location: roles_create.php");
        exit(0);
    }
}

// 2. NOW INCLUDE THE REST OF YOUR WEB TEMPLATE
$pageTitle = "Create Role";
include('includes/header.php'); 
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5 class="title">Add New Role</h5>
                </div>
                <div class="card-body">
                    <form action="roles_create.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-control-label">Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Content Editor" required />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Brief summary of duties..."></textarea>
                        </div>
                        <div class="form-group">
                            <a href="roles.php" class="btn btn-secondary btn-sm me-2">Cancel</a>
                            <button type="submit" name="saveRole" class="btn btn-primary btn-sm">Save Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
