<div class="table-responsive p-0">
                <table id="myTable8" class="table align-items-center mb-0">
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
                      $request = rejected_pp('request');

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
                        <button type="button" class="btn btn-secondary btn-sm view_data_rejected" data-bs-toggle="modal" data-bs-target="#view_details_pp_rejected<?php echo $requestItem['id']; ?>">View Details</button>
                      </td>
                      
                    </tr>


                  <!-- View Details Modal (Point Person) - REJECTED -->
                  <div class="modal fade" id="view_details_pp_rejected<?php echo $requestItem['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="badge badge-sm bg-gradient-danger"><i class="fa-solid fa-x"></i><?php echo ' ' . $requestItem['status']; ?></span>
                          <!-- <h5 class="modal-title">Request Details</h5> -->

                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                        </div>

                        <div class="modal-body">


                          <?php
                        $id = $requestItem['id'];
                        $query = "SELECT * 
                                  FROM request r
                                  LEFT JOIN users u ON r.user_id = u.id
                                  WHERE r.id = $id";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_array($result)) { ?>
                                                          
                                <input type="hidden" name="requestId" id="requestId" value="'. $requestId .'" />
                                <center><h5 class='text-center'><u><?= $requestItem['reference_number']; ?></u></h5></center>
                                <div class="modal-header">
                                    <div class="col-md-6">
                                        <label><i class="fa fa-user" aria-hidden="true"></i>   Requested by: 
                                        <h6 class="mb-0 text-sm"><?php echo $row['requested_by']?></h6>
                                        <p class="text-xs text-secondary mb-0"><?php echo $row['email']; ?></p></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><i class="fa-solid fa-x"></i>   Rejected by: 
                                        <h6 class="mb-0 text-sm"><?php echo $row['rejected_by']; ?></h6></p></label>
                                    </div>
                                </div>
                          
                                <hr>
                                <div class="row">
                                  <!-- <h5 class='text-center'><u>Request Details</u></h5> -->
                          </br>
                          </br>
                                    <div class="col-md-6">
                                        <label>Name of Corporation <h6> <?php echo $row['nameOfCorp']; ?> </h6>
                                        TIN <h6><?php echo $row['tin']; ?></h6>
                                        SEC Number <h6><?php echo $row['secNum']; ?></h6>
                                        eLA No. <h6><?php echo $row['elaNum']; ?></h6>
                                        Taxable Year <h6><?php echo $row['taxYear']; ?></h6>
                                        FAN No. <h6><?php echo $row['fanNum']; ?></h6>
                                        Amount <h6><?php echo $row['amount']; ?></h6>
                                        SEC Documents Requested <h6><?php echo $row['docsRequested']; ?></h6></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Remarks: <h6><textarea rows="4" cols="35" disabled><?php echo $row['Remarks']; ?></textarea></h6></label>
                                    </div>
                                </div>
                          
                                <?php
                                    break;
                                  }
                                }
                                ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End View Details Modal -->

                    <?php
                        }
                    } 
                    ?>

                  </tbody>
                </table>
              </div>
