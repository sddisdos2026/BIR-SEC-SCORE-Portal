<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    
    <!-- Left Side: Dynamic Breadcrumbs -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $row['role']; ?></a></li>
        <!-- Dynamic Page Title in Breadcrumb -->
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></li>
      </ol>
      <!-- Dynamic Main Title -->
      <h6 class="font-weight-bolder mb-0"><?= isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></h6>
    </nav>

    <!-- Right Side: Profile Dropdown -->
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <ul class="navbar-nav ms-auto justify-content-end align-items-center">
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex align-items-center cursor-pointer">
              <div class="avatar avatar-xs bg-gradient-primary border-radius-sm me-2 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                <i class="fa fa-user text-white" style="font-size: 0.7rem;"></i>
              </div>
              <span class="d-sm-inline d-none text-xs font-weight-bold"><?= $row['first_name'] . ' ' . $row['last_name']; ?></span>
              <i class="fa fa-chevron-down text-xxs ms-1 opacity-6"></i>
            </div>
          </a>
          
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 mt-3 me-sm-n1 shadow-lg border-radius-md" aria-labelledby="profileDropdown">
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="profile?id=<?= $row['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#profileModal">
                <div class="d-flex py-1">
                  <i class="fa fa-user-circle text-primary me-3 text-sm my-auto"></i>
                  <h6 class="text-sm font-weight-normal mb-0">My Profile</h6>
                  
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item border-radius-md" href="logout">
                <div class="d-flex py-1">
                  <i class="fa fa-sign-out-alt text-danger me-3 text-sm my-auto"></i>
                  <h6 class="text-sm font-weight-normal mb-0 text-danger">Logout</h6>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php include('modal.php'); ?>