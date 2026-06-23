<?php 
$pageTitle = "Change Password";

include('includes/header.php'); 
?>

<style>
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
}

#message p {
  padding: 10px 35px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                <?php
                    // $paramResult = checkParamId('id');
                    $user_id = $row['user_id'];

                    // if (!is_numeric($paramResult)) {
                    //     echo "<h5>".$paramResult."</h5>";
                    //     return false;
                    // }

                    // $user = getById('users', checkParamId('id'));
                    $user = getByUserId('users', $user_id);

                    if ($user['status'] == 200) {
                        ?>

                <?php alertMessagefailed(); ?>

                <form action="code.php" method="POST">

                    <input type="hidden" name="userId" value="<?= $user['data']['id']; ?>" required>
                    <input type="hidden" name="user_id" value="<?= $user['data']['user_id']; ?>" required>

                    <input type="hidden" name="user_last_name" value="<?= $row['first_name']; ?>" required>
                    <input type="hidden" name="user_first_name" value="<?= $row['last_name']; ?>" required>
                    <input type="hidden" name="user_office" value="<?= $row['office']; ?>" required>
                    <input type="hidden" name="user_role" value="<?= $row['role']; ?>" required>
                    
                    <div class="row mb-3">
                        <div class="col-md-6"> 
                            <label for ="password">Password</label>
                            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" required class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" name="passwordRepeat" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <a href="index" class="btn btn-danger btn-sm"> Back </a>
                        <button type="submit" name="changePassword" class="btn bg-primary text-white btn-sm" title="Must contain at least one number and one uppercase and lowercase letter, and at least 12 or more characters">Update</button>
                    </div>
                        <?php 
                    } else {
                        echo "<h5>".$user['message']."</h5>";
                    }
                ?>
                </form>

                    <div class="row mb-3">
                        <div id="message">
                            <h5>Password must contain the following:</h5>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>12 characters</b></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </div>

<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © Copyright 
                <script>
              document.write(new Date().getFullYear())
            </script> 
            <b>Systems Development Division<b>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/change_password.js"></script>

    <!-- Font Awesome Icons -->
  <script src="assets/js/plugins/all.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

</body>
</html>
