<div class="table-responsive p-0">
                <table id="myTable6" class="table align-items-center mb-0">
                    <colgroup>
					            <col width="5%">
					            <col width="20%">
					            <col width="25%">
					            <col width="10%">
					            <col width="10%">
					            <col width="10%">
					            <col width="10%">
				            </colgroup>
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Reference Number</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Name of Corporation</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">TIN</th>
                      <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Date Requested</th>
                      <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                      $request = for_approval_pp('request', $email);

                        if (mysqli_num_rows($request) > 0) {
                            foreach($request as $requestItem){ 
                                // $name = $requestItem['first_name'] . ' ' . $requestItem['last_name'];
                    
                    ?>
                        
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-sm text-secondary mb-0"><?= $requestItem['id']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?= $requestItem['reference_number']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?= $requestItem['nameOfCorp']; ?></p>
                      </td>
                        <td>
                        <p class="text-sm font-weight-bold mb-0"><?= $requestItem['tin']; ?></p>
                      </td>
                      <td class="status align-middle text-center text-md">
                        <p class="text-sm font-weight-bold mb-0">

                          <?php 
                          // $date_format = $requestItem['created_date']; 
                          echo date("m/d/Y", strtotime($requestItem['created_date']));
                          ?>

                        </p>
                      </td>
                      <td class="align-middle text-center text-md">
                        
                        <?php 
                            if ($requestItem['status'] == "Rejected") { 
                        ?>
                            <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                            
                        <?php
                            } else if ($requestItem['status'] == "Approved"){ 

                        ?>
                            <span class="badge badge-sm bg-gradient-success">Approved</span>
                        <?php
                            } else {
                        ?>
                            <span class="badge badge-sm bg-gradient-secondary">For Approval</span>
                        <?php
                            }
                        ?>
                        
                        
                      </td>
                      <td class="align-middle text-center text-sm">
                        <button type="button" class="btn btn-secondary btn-sm view_data_approved" data-bs-toggle="modal" data-bs-target="#view_details_pp<?php echo $requestItem['id']; ?>">View Details</button>
                      </td>
                      
                    </tr>

<!-- View Details Modal (Point Person) - FOR APPROVAL -->
<div class="modal fade" id="view_details_pp<?= $requestItem['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content shadow-lg border-0">
            <!-- Header with Status Accent -->
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold">
                    <i class="fa-solid fa-file-lines me-2 text-primary"></i> Reference Number: <?= htmlspecialchars($requestItem['reference_number']); ?>
                </h6>
                <div class="ms-auto d-flex align-items-center">
                    <span class="badge rounded-pill bg-gradient-secondary me-3">
                        <i class="fa-solid fa-clock"></i> <?= htmlspecialchars($requestItem['status']); ?>
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body p-4">
                <!-- User Info Section -->
                <div class="row mb-4 bg-gray-100 p-3 border-radius-lg">
                    <div class="col-md-12">
                        <label class="text-uppercase text-xs font-weight-bolder opacity-7 mb-1">Requested By</label>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm bg-gradient-info me-2 text-center text-white rounded-circle" style="width:35px; height:35px; line-height:35px;">
                                <?= strtoupper(substr($requestItem['requested_by'], 0, 1)); ?>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm"><?= htmlspecialchars($requestItem['requested_by']); ?></h6>
                                <p class="text-xs text-secondary mb-0"><?= htmlspecialchars($requestItem['email']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $id = intval($requestItem['id']);
                $query = "SELECT * 
                          FROM request r
                          LEFT JOIN users u ON r.user_id = u.id
                          WHERE r.id = $id";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { 
                        ?>
                        <input type="hidden" name="requestId" value="<?= $id; ?>" required>
                        
                        <!-- Main Data Grid -->
                        <div class="row g-3">
                            <div class="col-md-10">
                                <label class="text-xs font-weight-bold text-muted">Corporation Name</label>
                                <div class="p-2 border border-radius-md bg-white">
                                    <span class="text-sm font-weight-bold text-dark"><?= htmlspecialchars($row['nameOfCorp']); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="text-xs font-weight-bold text-muted">TIN</label>
                                <div class="p-2 border border-radius-md bg-white">
                                    <span class="text-sm font-weight-bold text-dark"><?= htmlspecialchars($row['tin']); ?></span>
                                </div>
                            </div>

                            <div class="col-12"><hr class="horizontal dark my-2"></div>

                            <!-- Secondary Info -->
                            <div class="col-md-3">
                                <label class="text-xs font-weight-bold text-muted">eLA No./FAN</label>
                                <p class="text-sm text-dark font-weight-bold">
                                    <?php
                                    echo $row['elaNum'] !== 'N/A' ? htmlspecialchars($row['elaNum']) : ''; 
                                    echo $row['fanNum'] !== 'N/A' ? htmlspecialchars($row['fanNum']) : ''; 
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <label class="text-xs font-weight-bold text-muted">SEC Number</label>
                                <p class="text-sm text-dark font-weight-bold"><?= htmlspecialchars($row['secNum']); ?></p>
                            </div>
                            <div class="col-md-3">
                                <label class="text-xs font-weight-bold text-muted">LOA Number</label>
                                <p class="text-sm text-dark font-weight-bold"><?= htmlspecialchars(!empty($row['LOA']) ? $row['LOA'] : 'N/A'); ?></p>
                            </div>
                            <div class="col-md-3">
                                <label class="text-xs font-weight-bold text-muted">Taxable Year</label>
                                <p class="text-sm text-dark font-weight-bold"><?= htmlspecialchars($row['taxYear']); ?></p>
                            </div>

                            <!-- Additional Meta Fields from your first prompt -->
                            <div class="col-md-3">
                                <label class="text-xs font-weight-bold text-muted">Amount</label>
                                <p class="text-sm text-dark font-weight-bold"><?= htmlspecialchars($row['amount']); ?></p>
                            </div>

                            <div class="col-12"><hr class="horizontal dark my-2"></div>

                            <!-- Requested Checklist Block -->
                            <div class="col-12">
                                <label class="text-xs font-weight-bold text-muted"><i class="fa-solid fa-list-check text-primary me-1"></i> SEC Documents Requested</label>
                                <p class="text-sm text-dark font-weight-bold mt-1 mb-0 ps-2">
                                    <?php 
                                    echo $row['AOI'] == 1 ? '• Articles of Incorporation/By-Laws<br>':NULL; 
                                    echo $row['GIS'] == 1 ? '• General Information Sheet<br>':NULL; 
                                    echo $row['AFS'] == 1 ? '• Audited Financial Statement<br>':NULL; 
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php 
                        break;
                    }
                }
                ?>
            </div>
            
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                    <?php
                    
                        }
                    }
                    ?>

                  </tbody>
                </table>
                
              </div>

              