<?php 
$pageTitle = "Edit User";

include('includes/header.php'); 
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">

                <?php alertMessagefailed(); ?>
                <?php alertMessage(); ?>

                <form action="code.php" method="POST">

                    <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                    <input type="hidden" name="user_first_name" value="<?= $row['first_name']; ?>">
                    <input type="hidden" name="user_last_name" value="<?= $row['last_name']; ?>">
                    <input type="hidden" name="user_role" value="<?= $row['role']; ?>">
                    <input type="hidden" name="user_office" value="<?= $row['office']; ?>">

                <?php
                    $paramResult = checkParamId('id');

                    if (!is_numeric($paramResult)) {
                        echo "<h5>".$paramResult."</h5>";
                        return false;
                    }

                    $user = getById('users', checkParamId('id'));

                    if ($user['status'] == 200) {
                        ?>

                    <input type="hidden" name="userId" value="<?= $user['data']['id']; ?>" required>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?= $user['data']['first_name']; ?>" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?= $user['data']['last_name']; ?>" required class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"> 
                            <label>Email Address</label>
                            <input type="email" name="email" value="<?= $user['data']['email']; ?>" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Office / RDO Code</label>

                            <!-- DROPDOWN VALUES -->
                            <select class="form-control" name="office" id="office" required>
                                <option disabled selected>Select RDO / Office</option>
                                <?php
                                
                                $sql = mysqli_query($conn, "SELECT * FROM rdo");
                                $data = $sql->fetch_all(MYSQLI_ASSOC);

                                foreach ($data as $row): ?>
                                <option value="<?= htmlspecialchars($row['description']) ?>" data-second="<?= htmlspecialchars($row['rdo_code']) ?>">
                                <?= htmlspecialchars($row['description']) ?>
                                </option>
                                <?php endforeach ?>

                                

                            </select>
                            <input type="hidden" name="rdo_code" id="rdo_code">
                            <!-- DROPDOWN VALUES END -->
                            
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Role</label>
                            <select name="role" required class="form-select">
                                <!-- <option value="" disabled>Select Role</option> -->
                                <option value="Point Person" <?= $user['data']['role'] == 'Point Person' ? 'selected':'' ; ?>>Point Person</option>
                                <option value="Approver" <?= $user['data']['role'] == 'Approver' ? 'selected':'' ; ?>>Approver</option>
                                <option value="Approver (Head)" <?= $user['data']['role'] == 'Approver (Head)' ? 'selected':'' ; ?>>Approver (Head)</option>
                                <option value="Administrator" <?= $user['data']['role'] == 'Administrator' ? 'selected':'' ; ?>>Administrator</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Deactivate Account</label>
                            <br/>
                            <input type="checkbox" name="is_ban" value="is_ban" <?= $user['data']['is_ban'] == true ? 'checked':''; ?> style="width:30px;height:30px">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="users.php" class="btn btn-danger btn-sm"> Back </a>
                        <button type="submit" name="updateUser" class="btn bg-primary text-white btn-sm">Update</button>
                        <a href="change_password_admin?id=<?= $user['data']['id']; ?>" class="btn bg-primary text-white float-end btn-sm">Change Password </a>
                    </div>
                        <?php 
                    } else {
                        echo "<h5>".$user['message']."</h5>";
                    }
                ?>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<link href="assets\css\select2.min.css" rel="stylesheet" />
<script src="assets/js/plugins/select2.min.js"></script>
<script>
    $('.select2').select2();
</script>

<script>
    var office = document.getElementById('office');
    var rdo_code = document.getElementById('rdo_code');
    office.onchange = function() {
    rdo_code.value = $(this).find(':selected').data('second');
    }
</script>
