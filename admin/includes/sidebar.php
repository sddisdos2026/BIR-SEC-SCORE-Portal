<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href="index">
        <img src="../assets/img/bir-masthead-2024.png" height="200" width="500">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

      <?php

        if ($role == 'Point Person') {
      ?>

      <ul class="navbar-nav">

      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Point Person</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="request_form">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-address-book" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Request Form</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="docs_requested?id=<?= $row['id']; ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-file" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Documents Requested</span>
          </a>
        </li>



      </ul>

      <?php
        }
      ?>

      <?php

        if ($role == 'Approver' || $role == 'Approver (Head)') {
      ?>
        <ul class="navbar-nav">
          <li class="nav-item mt-3">

            <?php 
            if ($role == 'Approver') {
            ?>
              <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"> Approver </h6>
            <?php
            }
            ?>

            <?php 
            if ($role == 'Approver (Head)') {
            ?>
              <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"> Approver (Head)</h6>
            <?php
            }
            ?>
          </li>

        <li class="nav-item">
          <a class="nav-link " href="index">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="file_upload">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-upload" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">File Upload</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="approval">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Documents for Approval</span>
          </a>
        </li>

        <?php 
            if ($role == 'Approver (Head)') {
            ?>
              <!-- <li class="nav-item">
          <a class="nav-link  " href="transmittal_slip_edit">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-clipboard" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Edit Transmittal Slip</span>
          </a>
        </li> -->
            <?php
            }
            ?>

      </ul>

      <?php
        }
      ?>

      <?php

        if ($role == 'Administrator') {
      ?>

      <ul class="navbar-nav">

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administrator</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link  " href="audit_trail">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-list" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Audit Trail</span>
          </a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link  " href="users">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Users</span>
          </a>
        </li>


      </ul>

      <?php
        }
      ?> 

      <?php

        if ($role == 'Security Analyst') {
      ?>

      <ul class="navbar-nav">

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administrator</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="audit_trail">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-list" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Audit Trail</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="users">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>



      </ul>

      <?php
        }
      ?> 

    </div>
    <br/><br/><br/><br/><br/><br/>
    <div class="sidenav-footer mx-3 bottom">
      <a class="btn bg-primary text-white mt-3 w-100 " href="logout">
        Logout
        </a>
    </div>
  </aside>