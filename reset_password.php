<?php 
$pageTitle = "BIR-SEC Swift Corporate and Other Records Exchange (SCORE) Portal";
include('includes/header.php'); 

if (isset($_SESSION['auth'])) {
  // $_SESSION['last_login_timestamp'] = time();
  header("Location: admin/index");
}

// if (isset($_SESSION['authApprover'])) {
//   // $_SESSION['last_login_timestamp'] = time();
//   header("Location: approver/index.php");
// }

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

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                    <div class="row">
                      <div class="mb-3">
                        <img src="assets/img/bir-masthead-2024.png" height="70" width="350">
                        <br/>
                      </div>
                    </div>
                    <h5 class="font-weight-bolder text-info text-gradient">Reset your Password</h5>
                    <!-- <p class="mb-0">Enter your new Password.</p> -->
                    
                </div>
                <div class="card-body">

                <?php require('login-code.php'); ?>

                <div class="row mb-3">
                        <div id="message">
                            <h5>Password must contain the following:</h5>
                            <p id="letter" class="invalid">A <b>Lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>Capital (Uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>Number</b></p>
                            <p id="length" class="invalid">Minimum of <b>12 characters</b></p>
                        </div>
                    </div>

                  <form action="reset_password" method="POST"> 

                    <label>New Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" class="form-control" placeholder="Password" required>
                    </div>
                    
                    
                    <div class="text-center col-md-12 col-12">
                      <a href="index.php" class="btn bg-danger text-white btn-sm"> Back </a>
                      <button type="submit" name="reset" class="btn bg-primary text-white btn-sm">Reset</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8 opacity">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/bir-bldg.jpeg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © 
              <script>
                document.write(new Date().getFullYear())
              </script> 
              Bureau of Internal Revenue. All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</main>

  <!--   Core JS Files   -->
  <script src="admin/assets/js/core/popper.min.js"></script>
  <script src="admin/assets/js/core/bootstrap.min.js"></script>
  <script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/jquery-3.7.1.min.js"></script>
  <script src="admin/assets/js/script.js"></script>
  <script src="admin/assets/js/change_password.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

</body>
</html>



