<?php $pageTitle = "Dashboard"; ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid py-4">
  
  <!-- MAIN CHART ROW -->
  <!-- <div class="row">
    <div class="col-lg-12 col-12 mb-4">
      <div class="card z-index-2">
        <div class="card-header pb-0 bg-transparent">
          <h6>Processed Documents</h6>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div> -->
        <!-- Soft UI Work in Progress Footer -->
        <!-- <div class="card-footer bg-gradient-dark border-radius-lg mx-3 mb-3 p-3">
          <div class="d-flex align-items-center">
            <i class="fa fa-cogs text-danger me-2"></i>
            <span class="text-white text-sm font-weight-bold">
              Feature in progress
            </span>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  
  <!-- STATS AND LISTS SECTION -->
  <div class="row">
    
    <!-- LEFT SIDE: STAT CARDS -->
    <div class="col-lg-8 col-12">
      <div class="row">
        
        
        <!-- CARD 1: PENDING DOCUMENTS -->
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Docs</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php
                        $dash_category_query = "SELECT * FROM request WHERE status='For Approval'";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        echo ($category_total = mysqli_num_rows($dash_category_query_run)) ? $category_total : "0";
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-file text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         
        <!-- CARD 2: APPROVED DOCUMENTS -->
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Approved Docs</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php
                        $dash_category_query = "SELECT * FROM request WHERE status='Approved'";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        echo ($category_total = mysqli_num_rows($dash_category_query_run)) ? $category_total : "0";
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-check text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CARD 2: APPROVED DOCUMENTS -->
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Rejected Docs</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php
                        $dash_category_query = "SELECT * FROM request WHERE status='Rejected'";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        echo ($category_total = mysqli_num_rows($dash_category_query_run)) ? $category_total : "0";
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                  <div class="icon icon-shape bg-gradient-danger shadow-success text-center rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-x text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- RIGHT SIDE: APPROVAL LIST -->
    <div class="col-lg-4 col-12 mb-4">
      <div class="card h-100">
        <div class="card-header pb-0 p-3 bg-transparent">
          <div class="row">
            <div class="col-7 d-flex align-items-center">
              <h6 class="mb-0">Needs Approval</h6>
            </div>
            <div class="col-5 text-end">
              <a href="approval" class="btn btn-link text-primary btn-sm mb-0 p-0">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <?php 
            $request = getPending('request');
            if (mysqli_num_rows($request) > 0) {
              echo '<ul class="list-group">';
              foreach($request as $requestItem){
          ?>
              <li class="list-group-item border-0 d-flex justify-content-between align-items-center px-3 py-2 mb-2 border-radius-lg bg-gray-100 list-hover">
                <div class="d-flex flex-column">
                  <h6 class="mb-0 text-sm font-weight-bold">
                    <?= htmlspecialchars($requestItem['requested_by']); ?>
                  </h6>
                  <span class="text-xs text-secondary">
                    <?= htmlspecialchars($requestItem['email']); ?>
                  </span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-secondary">
                    <?= htmlspecialchars($requestItem['status']); ?>
                  </span>
                </div>
              </li>
          <?php
              }
              echo '</ul>';
            } else {
          ?>
              <div class="text-center py-5">
                <p class="text-sm text-secondary font-weight-bold mb-0">No records found</p>
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
