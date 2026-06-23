<?php 
$pageTitle = "Create User";

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

                <?php alertMessagefailed(); ?>

                <form action="code.php" method="POST">

                    <input type="hidden" name="user_id" value="<?= $row['id']; ?>" required>
                    <input type="hidden" name="user_first_name" value="<?= $row['first_name']; ?>" required>
                    <input type="hidden" name="user_last_name" value="<?= $row['last_name']; ?>" required>
                    <input type="hidden" name="user_office" value="<?= $row['office']; ?>" required>
                    <input type="hidden" name="user_role" value="<?= $row['role']; ?>" required>

                    <input type="hidden" name="is_ban" value="" required>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required/>
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required/>
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
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" class="form-control"/>
                            <label>Confirm Password</label>
                            <input type="password" name="passwordRepeat" class="form-control" required/>
                            
                        <div class="row mb-3">
                          
                        <div class="col-md-6">
                            <label>Select Role</label>
                            <select name="role" class="form-select" required>
                                <option value="">Select Role</option>
                                <option value="Point Person">Point Person</option>
                                <option value="Approver">Approver</option>
                                <option value="Approver (Head)">Approver (Head)</option>
                                <option value="Administrator">Systems Administrator</option>
                                <option value="Security Analyst">Security Analyst</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Deactivate Account</label>
                            <br/>
                            <input type="checkbox" name="is_ban" style="width:30px;height:35px" />
                        </div>

                      </div>
                                </br>
                                </br>
                          <div class="row mb-3">
                            <div class="col-md-12">
                            <a href="users.php" class="btn btn-danger btn-sm"> Back </a>
                            <button type="submit" name="saveUser" class="btn btn-primary btn-sm">Submit</button>
                          </div>
                    </div>
                            

                      </div>
                        <div class="col-md-6">
                          <div id="message">
                                <h5>Password must contain the following:</h5>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="length" class="invalid">Minimum <b>12 characters</b></p>
                          </div>
                        </div>
                    </div>
                </form>
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

<script>
    var office = document.getElementById('office');
    var rdo_code = document.getElementById('rdo_code');
    office.onchange = function() {
    rdo_code.value = $(this).find(':selected').data('second');
    }
</script>