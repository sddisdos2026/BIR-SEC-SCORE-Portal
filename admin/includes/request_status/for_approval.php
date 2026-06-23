<div class="table-responsive p-0">
                <table id="myTable9" class="table align-items-center mb-0">
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
                      $request = for_approval('request');

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
                            <span class="badge badge-sm bg-secondary">For Approval</span>
                        <?php
                            }
                        ?>
                        
                        
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="view_details?id=<?= $requestItem['id']; ?>" class="btn btn-secondary btn-sm">View Details</a>
                      </td>
                      
                    </tr>

                    <?php
                        }
                    } 
                    ?>

                  </tbody>
                </table>
              </div>