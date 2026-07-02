<?php 
$pageTitle = "Roles Management";

// Make sure to include your database connection if it isn't inside header.php
include('includes/header.php'); 
?>

<div class="container-fluid py-4">
    <div class="row">
    <?php alertMessage(); ?>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body">

      <!-- ================= ADMINISTRATOR VIEW ================= -->
      <?php if ($role == 'Administrator') { ?>
            <a href="roles_create.php" class="btn btn-outline-primary btn-sm mb-0">Add Role</a>
            <br/><br/>

            <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                      // Pulling from the new 'roles' table instead of 'users'
                      $roles_result = getAll('roles');

                      if (mysqli_num_rows($roles_result) > 0) {
                          foreach($roles_result as $roleItem){ 
                    ?>
                        
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $roleItem['id']; ?></p>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm px-2"><?= htmlspecialchars($roleItem['name']); ?></h6>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= htmlspecialchars($roleItem['description']); ?></p>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0"><?= $roleItem['created_at']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="roles_edit.php?id=<?= $roleItem['id']; ?>" class="btn btn-success btn-sm">Edit Permissions</a>
                      </td>
                    </tr>

                    <?php
                          }
                      } else {
                    ?>
                        <tr>
                            <td colspan="5" class="text-center py-3">No Roles Found</td>
                        </tr>
                    <?php
                      }
                    ?>

                  </tbody>
                </table>
              </div>
      <?php } ?> 


      <!-- ================= SECURITY ANALYST VIEW (READ-ONLY) ================= -->
      <?php if ($role == 'Security Analyst') { ?>
              <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                      $roles_result = getAll('roles');

                      if (mysqli_num_rows($roles_result) > 0) {
                          foreach($roles_result as $roleItem){ 
                    ?>
                        
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $roleItem['id']; ?></p>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm px-2"><?= htmlspecialchars($roleItem['name']); ?></h6>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= htmlspecialchars($roleItem['description']); ?></p>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0"><?= $roleItem['created_at']; ?></p>
                      </td>
                    </tr>

                    <?php
                          }
                      } else {
                    ?>
                        <tr>
                            <td colspan="4" class="text-center py-3">No Roles Found</td>
                        </tr>
                    <?php
                      }
                    ?>

                  </tbody>
                </table>
              </div>
      <?php } ?> 
            
            </div>
          </div>
        </div>
      </div> 
    </div>
<?php include('includes/footer.php'); ?>
