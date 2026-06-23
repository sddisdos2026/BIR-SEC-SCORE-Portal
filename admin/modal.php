

<!-- View Details Modal (Point Person) - REJECTED -->
<div class="modal fade" id="view_details_pp_rejected<?= $request['data']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-m" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="badge badge-sm bg-gradient-danger"><i class="fa-solid fa-x"></i><?php echo ' ' . $requestItem['status']; ?></span>
        <!-- <h5 class="modal-title">Request Details</h5> -->

        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>

      <div class="modal-body">
        
      
        <div class="view_user_data"></div>

      </div>
    </div>
  </div>
</div>
<!-- End View Details Modal -->

<!-- View Details Modal (Point Person) -->
<div class="modal fade" id="view_details_pp<?= $request['data']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Details</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>

      <div class="modal-body">
        
        <div class="view_user_data"></div>

      </div>
    </div>
  </div>
</div>
<!-- End View Details Modal -->

<!-- View Details Modal (Approver) -->
<div class="modal fade" id="view_details<?= $request['data']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="min-width:80%"> 
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Details</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="view_user_data"></div>

      </div>
    </div>
  </div>
</div>
<!-- End View Details Modal -->

<!-- Approve Modal -->
<div class="modal fade" id="approve<?= $request['data']['id']; ?>" tabindex="0" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Added helper tracking classes to make extraction simple via JS -->
                <!-- <input type="hidden" class="modal-sync-data" name="password" id="modal_sec_num" value="<?= $request['data']['secNum']; ?>" /> -->

                <p>If you want to approve, please provide the password of the attached files.</p>
                <input type="text" id="modalPasswordInput" name="modalPasswordInput" class="form-control" placeholder="Enter file password...">

                <!-- <p>Are you sure you want to proceed?</p> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-secondary text-white btn-sm" data-bs-dismiss="modal">Cancel</button>
                <!-- Change type to button and bind the submission execution interceptor -->
                <button type="button" 
                        class="btn btn-success btn-sm px-4" 
                        onclick="submitApprovalWithModalData()">
                    Yes, Approve & Finalize
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Approve Modal -->


<!-- Reject Modal -->
<div class="modal fade" id="reject<?= $request['data']['id']; ?>" tabindex="0" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="code.php" method="POST">
      
        <div class="modal-header">
          <h5 class="modal-title">Why do you want to reject this request?</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              
              <input type="hidden" name="requestId" id="requestId" value="<?= $request['data']['id']; ?>" />
              <input type="hidden" name="email" id="email" value="<?= $request['data']['email']; ?>" />
              <input type="hidden" name="nameOfCorp" id="nameOfCorp" value="<?= $request['data']['nameOfCorp']; ?>" />
              <input type="hidden" name="requested_by" id="requested_by" value="<?= $request['data']['requested_by']; ?>" />
              
              <label>Select a reason: </label>
              <select class="form-control" id="reason" name="reason" onchange="ShowHideDiv()" required>
                  <option>Requested document/s did not match</option>
                  <option>Document is not available yet</option>
                  <option>Wrong document</option>            
                  <option>Insufficient details</option>            
                  <option>Others</option>            
              </select>
            </div>

            <div id="richtext" style="display: none">
              <div class="form-group">
                <label>Others: </label>
                <textarea class="form-control" id="message-text" name="message-text"></textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-secondary text-white btn-sm" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          <button type="submit" class="btn bg-primary text-white text-white btn-sm" name="Reject">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Reject Modal -->
 
<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document"> <!-- Changed to xl for size -->
    <div class="modal-content border-radius-xl">
      
      <!-- Modal Header: Removed mt-n4 to prevent overlapping issues -->
      <div class="modal-header p-0 position-relative">
        <div class="bg-gradient-primary shadow-primary border-radius-top-xl py-4 pe-1 w-100">
          <div class="d-flex align-items-center px-4">
            <div class="avatar avatar-md bg-white border-radius-lg shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="fas fa-user text-primary"></i>
            </div>
            <div class="ms-3">
              <h5 class="modal-title text-white mb-0" id="profileModalLabel">My Account Details</h5>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>

      <div class="modal-body p-5"> <!-- Increased padding for better feel on XL size -->
        <?php
            $user_id = $row['user_id'];
            $user = getByUserId('users', $user_id);

            if ($user['status'] == 200) {
                $userData = $user['data'];
        ?>
        <form>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label font-weight-bold text-xs text-uppercase">First Name</label>
                    <div class="input-group input-group-static">
                        <input type="text" value="<?= $userData['first_name']; ?>" readonly class="form-control bg-light px-3 py-2 border-radius-md border border-light">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label font-weight-bold text-xs text-uppercase">Last Name</label>
                    <div class="input-group input-group-static">
                        <input type="text" value="<?= $userData['last_name']; ?>" readonly class="form-control bg-light px-3 py-2 border-radius-md border border-light">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label font-weight-bold text-xs text-uppercase">Email Address</label>
                    <div class="input-group input-group-static">
                        <input type="email" value="<?= $userData['email']; ?>" readonly class="form-control bg-light px-3 py-2 border-radius-md border border-light">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label font-weight-bold text-xs text-uppercase">Office / RDO Code</label>
                    <div class="input-group input-group-static">
                        <input type="text" value="<?= $userData['office']; ?>" readonly class="form-control bg-light px-3 py-2 border-radius-md border border-light">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label font-weight-bold text-xs text-uppercase">Role</label>
                    <div class="input-group input-group-static">
                        <input type="text" value="<?= $userData['role']; ?>" readonly class="form-control bg-light px-3 py-2 border-radius-md border border-light">
                    </div>
                </div>
            </div>
        </form>
        <?php 
            } else {
                echo '<div class="alert alert-danger text-white text-sm">'.$user['message'].'</div>';
            }
        ?>
      </div>

      <div class="modal-footer justify-content-between p-4 bg-gray-100 border-radius-bottom-xl">
        <a href="change_password.php?id=<?= $row['user_id']; ?>" class="btn btn-outline-primary btn-sm mb-0">
            <i class="fas fa-key me-2"></i>Change Password
        </a>
        <button type="button" class="btn bg-gradient-dark btn-sm mb-0 px-4" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
    /* Styling for a clean, non-overlapping look */
    .border-radius-top-xl {
        border-radius: 0.75rem 0.75rem 0 0;
    }
    .border-radius-bottom-xl {
        border-radius: 0 0 0.75rem 0.75rem;
    }
    .modal-content {
        border: none;
        box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.15);
    }
    .form-control[readonly] {
        color: #344767 !important;
        opacity: 1;
        font-weight: 500;
    }
</style>
<!-- End Profile Modal -->
 
