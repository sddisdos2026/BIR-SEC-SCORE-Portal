<div class="table-responsive p-0">
                <table id="myTable10" class="table align-items-center mb-0">
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
                      $request = approved('request');

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
                        <p class="text-sm font-weight-bold mb-0"><?= $requestItem['requested_by']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?= $requestItem['email']; ?></p>
                      </td>
                      <td class="status align-middle text-center text-md">
                        <p class="text-sm font-weight-bold mb-0">

                          <?php 
                          // $date_format = $requestItem['created_date']; 
                          echo date("m/d/Y", strtotime($requestItem['created_date']));
                          ?>

                        </p>
                      </td>
                      <td class="status align-middle text-center text-md">
                        <span class="badge badge-sm bg-gradient-success"><?= $requestItem['status']; ?></span>
                      </td>

                      <td class="align-middle text-center text-sm">
                        <button type="button" class="btn btn-secondary btn-sm view_data_approved" data-bs-toggle="modal" data-bs-target="#view_details_pp_approved<?php echo $requestItem['id']; ?>">View Details</button>
                      </td>
                      
                    </tr>

<!-- View Details Modal (Point Person) - APPROVED -->
<div class="modal fade" id="view_details_pp_approved<?= $requestItem['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content shadow-lg border-0">
            <!-- Header with Success Status Accent -->
            <div class="modal-header bg-light">
                <h6 class="modal-title font-weight-bold">
                    <i class="fa-solid fa-file-circle-check me-2 text-success"></i> Reference Number: <?= $requestItem['reference_number']; ?>
                </h6>
                <div class="ms-auto d-flex align-items-center">
                    <span class="badge rounded-pill bg-gradient-success me-3">
                        <i class="fa-solid fa-check"></i> <?= $requestItem['status']; ?>
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body p-4">
                <!-- User/Approval Info Section -->
                <div class="row mb-4 bg-gray-100 p-3 border-radius-lg">
                    <div class="col-md-6 border-end">
                        <label class="text-uppercase text-xs font-weight-bolder opacity-7 mb-1">Requested By</label>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm bg-gradient-info me-2 text-center text-white rounded-circle" style="width:35px; height:35px; line-height:35px;">
                                <?= strtoupper(substr($requestItem['requested_by'], 0, 1)); ?>
                            </div>
                            <div>
                                <h6 class="mb-0 text-sm"><?= $requestItem['requested_by']; ?></h6>
                                <p class="text-xs text-secondary mb-0"><?= $requestItem['email']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ps-md-4">
                        <label class="text-uppercase text-xs font-weight-bolder opacity-7 mb-1">Approved By</label>
                        <h6 class="text-sm mb-0"><i class="fa-solid fa-user-check text-success me-1"></i><?= $requestItem['approved_by'] ?? $requestItem['edited_by']; ?></h6>
                        <p class="text-xs text-secondary mb-0">Date: <?= date("M d, Y", strtotime($requestItem['edited_date'])); ?></p>
                    </div>
                </div>

                <?php
                $id = $requestItem['id'];
                $query = "SELECT * FROM request r LEFT JOIN users u ON r.user_id = u.id WHERE r.id = $id";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { 
                ?>
                <!-- Main Data Grid -->
                <div class="row g-3">
                    <div class="col-md-10">
                        <label class="text-xs font-weight-bold text-muted">Corporation Name</label>
                        <div class="p-2 border border-radius-md bg-white">
                            <span class="text-sm font-weight-bold text-dark"><?= $row['nameOfCorp']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="text-xs font-weight-bold text-muted">TIN</label>
                        <div class="p-2 border border-radius-md bg-white">
                            <span class="text-sm font-weight-bold text-dark"><?= $row['tin']; ?></span>
                        </div>
                    </div>

                    <div class="col-12"><hr class="horizontal dark my-2"></div>

                    <!-- Secondary Info -->
                    <div class="col-md-3">
                        <label class="text-xs font-weight-bold text-muted">eLA No./FAN</label>
                        <p class="text-sm text-dark font-weight-bold">
                            <?= $row['elaNum'] !== 'N/A' ? $row['elaNum'] : ''; ?>
                            <?= $row['fanNum'] !== 'N/A' ? $row['fanNum'] : ''; ?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-xs font-weight-bold text-muted">SEC Number</label>
                        <p class="text-sm text-dark font-weight-bold"><?= $row['secNum']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-xs font-weight-bold text-muted">LOA Number</label>
                        <p class="text-sm text-dark font-weight-bold"><?= $row['LOA']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-xs font-weight-bold text-muted">Taxable Year</label>
                        <p class="text-sm text-dark font-weight-bold"><?= $row['taxYear']; ?></p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-xs font-weight-bold text-muted">SEC Documents Requested</label>
                        <p class="text-sm text-dark font-weight-bold">
                          <?php 
                          echo $row['AOI'] == 1 ? '• Articles of Incorporation/By-Laws<br>':NULL; 
                          echo $row['GIS'] == 1 ? '• General Information Sheet<br>':NULL; 
                          echo $row['AFS'] == 1 ? '• Audited Financial Statement<br>':NULL; 
                          ?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-xs font-weight-bold text-muted">Transmittal Slip</label>
                    </div>

                    <!-- Attached Documents Section -->
                    <div class="col-12 mt-3">
                        <label class="text-xs font-weight-bold text-success">
                            <i class="fa-solid fa-paperclip me-1"></i> Attached Documents
                        </label>
                        <div class="p-3 border border-radius-md bg-gray-100">
                            <?php 
                            // Get the path directly from your database column
                            $filePath = $row['file_path']; 

                            // Extract just the filename for display purposes
                            $displayFileName = basename($filePath);

                            if (!empty($filePath) && file_exists($filePath)): ?>
                                <div class="d-flex align-items-center justify-content-between bg-white p-2 border-radius-lg shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-file-zipper text-white opacity-10"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-weight-bold mb-0 text-dark"><?= $displayFileName; ?></p>
                                            <p class="text-xs text-secondary mb-0">
                                                <?= round(filesize($filePath) / 1024 / 1024, 2); ?> MB
                                            </p>
                                        </div>
                                    </div>
                                    <a href="<?= $filePath; ?>" class="btn btn-link text-success text-gradient px-3 mb-0" download>
                                        <i class="fa-solid fa-download me-1"></i> Download
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-2">
                                    <i class="fa-solid fa-circle-exclamation text-warning mb-1"></i>
                                    <p class="text-xs text-secondary mb-0">
                                        <?= empty($filePath) ? 'No documents attached.' : 'File not found on server.'; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
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

