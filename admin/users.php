<?php 
$pageTitle = "Users";

include('includes/header.php'); 
?>

      <?php
        if ($role == 'Administrator') {
      ?>

      <?php
        }
      ?> 

            <?php
        if ($role == 'Security Analyst') {
      ?>

      <?php
        }
      ?> 


<div class="container-fluid py-4">
    <div class="row">
    <?php alertMessage(); ?>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body">


      <?php

        if ($role == 'Administrator') {
      ?>
            <a href="users_create" class="btn btn-outline-primary btn-sm mb-0">Create User</a>
            <br/><br/>

            <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Office</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                      $users = getAll('users');

                        if (mysqli_num_rows($users) > 0) {
                            foreach($users as $userItem){ 
                                $name = $userItem['first_name'] . ' ' . $userItem['last_name'];

                    ?>
                        
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['id']; ?></p>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $name ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $userItem['email']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['office']; ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['role']; ?></p>
                      </td>
                      <td class="align-middle text-center text-md">
                        
                        <?php 
                            if ($userItem['is_ban'] == 1) { 
                        ?>
                            <span class="badge badge-sm bg-gradient-danger">Deactivated</span>
                            
                        <?php
                            } else { 

                        ?>
                            <span class="badge badge-sm bg-gradient-success">Active</span>
                        <?php
                            }
                        ?>
                        

                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="users_edit?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                      </td>

                      
                    </tr>

                    <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No Record Found</td>
                        </tr>
                    
                    <?php
                        }
                    ?>

                  </tbody>
                </table>
              </div>
      <?php
        }
      ?> 

<?php

        if ($role == 'Security Analyst') {
      ?>
              <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Office</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                      $users = getAll('users');

                        if (mysqli_num_rows($users) > 0) {
                            foreach($users as $userItem){ 
                                $name = $userItem['first_name'] . ' ' . $userItem['last_name'];

                    ?>
                        
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['id']; ?></p>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $name ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $userItem['email']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['office']; ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $userItem['role']; ?></p>
                      </td>
                      <td class="align-middle text-center text-md">
                        
                        <?php 
                            if ($userItem['is_ban'] == 1) { 
                        ?>
                            <span class="badge badge-sm bg-gradient-danger">Deactivated</span>
                            
                        <?php
                            } else { 

                        ?>
                            <span class="badge badge-sm bg-gradient-success">Active</span>
                        <?php
                            }
                        ?>
                        

                      </td>
                    </tr>

                    <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No Record Found</td>
                        </tr>
                    
                    <?php
                        }
                    ?>

                  </tbody>
                </table>
              </div>
      <?php
        }
      ?> 
            
              
            </div>
          </div>
        </div>
      </div> 
    </div>
<?php include('includes/footer.php'); ?>