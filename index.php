<?php 
$pageTitle = "BIR-SEC Swift Corporate and Other Records Exchange (SCORE) Portal";
include('includes/header.php'); 

if (isset($_SESSION['auth'])) {
  // $_SESSION['last_login_timestamp'] = time();
  header("Location: admin/index.php");
}

// if (isset($_SESSION['authApprover'])) {
//   // $_SESSION['last_login_timestamp'] = time();
//   header("Location: approver/index.php");
// }

?>

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
                    <h5 class="font-weight-bolder text-info text-gradient">BIR-SEC Swift Corporate and Other Records Exchange (SCORE) Portal</h5>
                    <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">

                <?php require('login-code.php'); ?>

                  <form action="index" method="POST"> 

                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <p class="mb-4 text-sm mx-auto">
                    Forgot Password?
                    <a href="recover_password" class="text-info text-gradient font-weight-bold">Click here</a>
                    </p>
                    <div class="text-center">
                      <button type="submit" name="loginBtn" class="btn bg-primary text-white w-100 mt-4 mb-0">Sign in</button>
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

<?php include('includes/footer.php'); ?>