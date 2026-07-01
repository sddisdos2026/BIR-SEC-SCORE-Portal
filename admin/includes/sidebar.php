<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href="index">
        <img src="../assets/img/bir-masthead-2024.png" height="200" width="500">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">

        <?php
        // 1. EXTRACT ROLE STRING DIRECTLY FROM YOUR ACTIVE SESSION
        $current_role_name = isset($_SESSION['loggedInUserRole']) ? $_SESSION['loggedInUserRole'] : '';
        
        $userPermissions = [];
        
        // 2. QUERY PERMISSIONS DIRECTLY USING THE SESSION ROLE NAME
        if (!empty($current_role_name)) {
            $role_name_escaped = mysqli_real_escape_string($conn, $current_role_name);
            
            // Look up permissions linked to this role name in your new role_permissions table
            $permQuery = "SELECT p.name FROM permissions p
                          JOIN role_permissions rp ON p.id = rp.permission_id
                          JOIN roles r ON rp.role_id = r.id
                          WHERE r.name = '$role_name_escaped'";
            
            $permResult = mysqli_query($conn, $permQuery);
            if ($permResult && mysqli_num_rows($permResult) > 0) {
                while ($rowPerm = mysqli_fetch_assoc($permResult)) {
                    $userPermissions[] = $rowPerm['name'];
                }
            }
        }
        
        // 3. HARDCODED SYSTEM FALLBACK (Only runs if you haven't assigned checkboxes for this role yet)
        if (empty($userPermissions) && !empty($current_role_name)) {
            if ($current_role_name == 'Point Person') {
                $userPermissions = ['nav:dashboard', 'nav:request_form', 'nav:docs_requested'];
            } elseif ($current_role_name == 'Approver') {
                $userPermissions = ['nav:dashboard', 'nav:file_upload', 'nav:docs_approval'];
            } elseif ($current_role_name == 'Approver (Head)') {
                $userPermissions = ['nav:dashboard', 'nav:file_upload', 'nav:docs_approval', 'nav:transmittal_edit'];
            } elseif ($current_role_name == 'Administrator') {
                $userPermissions = ['nav:dashboard', 'nav:manage_users', 'nav:manage_roles'];
            } elseif ($current_role_name == 'Security Analyst') {
                $userPermissions = ['nav:dashboard', 'nav:audit_trail', 'nav:manage_users'];
            }
        }

        ?>


      <ul class="navbar-nav">

        <!-- ================= SYSTEM SECTIONS ================= -->
        
        <!-- Dashboard Link -->
        <?php if (in_array('nav:dashboard', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="index">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Request Form Link -->
        <?php if (in_array('nav:request_form', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="request_form">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-address-book" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Request Form</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Documents Requested Link -->
        <?php if (in_array('nav:docs_requested', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="docs_requested?id=<?= $user_id; ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-file" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Documents Requested</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- File Upload Link -->
        <?php if (in_array('nav:file_upload', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="file_upload">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-upload" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">File Upload</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Documents for Approval Link -->
        <?php if (in_array('nav:docs_approval', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="approval">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Documents for Approval</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Edit Transmittal Slip Link -->
        <?php if (in_array('nav:transmittal_edit', $userPermissions)): ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="transmittal_slip_edit">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-clipboard" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Edit Transmittal Slip</span>
          </a>
        </li> -->
        <?php endif; ?>

        <!-- Audit Trail Link -->
        <?php if (in_array('nav:audit_trail', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="audit_trail">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-list" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Audit Trail</span>
          </a>
        </li>
        <?php endif; ?>

        <!-- Manage Users Link -->
        <!-- Shows up if the user has EITHER view or edit permissions enabled -->
        <?php if (in_array('users:view', $userPermissions) || in_array('users:edit', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="users">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Users</span>
          </a>
        </li>
        <?php endif; ?>


        <!-- Roles Management Link -->
        <?php if (in_array('nav:manage_roles', $userPermissions)): ?>
        <li class="nav-item">
          <a class="nav-link" href="roles">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Roles Management</span>
          </a>
        </li>
        <?php endif; ?>

      </ul>
    </div>
    
    <br/><br/><br/><br/><br/><br/>
    <div class="sidenav-footer mx-3 bottom">
      <a class="btn bg-primary text-white mt-3 w-100" href="logout">
        Logout
      </a>
    </div>
</aside>
