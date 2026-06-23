<?php 
$pageTitle = "Request Details";

include('includes/header.php'); 
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0">

                    <?php 
                    $id = checkParamId('id');
                    $request = getById('request', $id);
                    if ($request['status'] == 200): 
                        $data = $request['data'];
                        $getRDOCode = getRDOCode($id);
                    ?>
                
                <!-- Header: Minimalist & Clean -->
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Reference Number:</h6>
                        <h5 class="mb-0 font-weight-bolder text-primary"><?= $request['data']['reference_number'] ?? '---'; ?></h5>
                    </div>
                </div>

                <div class="card-body bg-light-gray">
                    <?php alertMessagefailed(); alertMessage(); ?>
                    
                    <form action="code.php" method="POST" id="approvalForm">
                        <div id="permanentlyStoredFilesContainer"></div>
                        <!-- Consolidated Hidden Inputs -->
                        <input type="hidden" name="requestId" value="<?= $id; ?>">
                        <input type="hidden" name="reference_number" value="<?= $request['data']['reference_number'] ?? '---';?>">
                        <input type="hidden" name="requested_by" value="<?= $request['data']['requested_by'] ?? '---';?>">
                        <input type="hidden" name="elaNum" value="<?= $request['data']['elaNum'];?>">
                        <input type="hidden" name="fanNum" value="<?= $request['data']['fanNum'];?>">

                        <?php 
                        $hiddenFields = [
                            'rdo_code' => $getRDOCode['data']['rdo_code'],
                            'office' => $getRDOCode['data']['description'],
                            'nameOfCorp' => $data['nameOfCorp'],
                            'tin' => $data['tin'],
                            'email' => $data['email'],
                            'taxYear' => $data['taxYear']
                        ];
                        foreach($hiddenFields as $name => $val) echo "<input type='hidden' name='$name' value='$val'>";
                        ?>

                        <div class="row g-4">
                            <!-- Left Pane: Data & Selectors -->
                            <div class="col-xl-4">
                                <!-- Entity Card -->
                                <div class="card border shadow-none mb-4">
                                    <div class="card-body p-3">
                                        <label class="text-uppercase text-xs text-muted fw-bold mb-3 d-block">Entity Details</label>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-sm text-secondary">Corporation:</span>
                                            <span class="text-sm fw-bold text-dark text-end"><?= $data['nameOfCorp'] ?></span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-sm text-secondary">TIN:</span>
                                            <span class="text-sm fw-bold text-dark"><?= $data['tin'] ?></span>
                                        </div>

                                        <!-- Start of Bulleted Requested Documents Section -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-sm text-secondary">Requested Documents:</span>
                                            <div class="text-sm fw-bold text-dark text-end">
                                                <?php
                                                $docs = [];
                                                if (isset($data['AOI']) && $data['AOI'] == 1) {
                                                    $docs[] = 'Articles of Incorporation/By-Laws';
                                                }
                                                if (isset($data['GIS']) && $data['GIS'] == 1) {
                                                    $docs[] = 'General Information Sheet';
                                                }
                                                if (isset($data['AFS']) && $data['AFS'] == 1) {
                                                    $docs[] = 'Audited Financial Statements';
                                                }

                                                if (!empty($docs)): ?>
                                                    <ul class="list-unstyled mb-0" style="list-style-type: disc; list-style-position: inside; padding-left: 0;">
                                                        <?php foreach ($docs as $doc): ?>
                                                            <li><?= $doc ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <span>None</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- End of Bulleted Requested Documents Section -->
                                                
                                        <div class="d-flex justify-content-between">
                                            <span class="text-sm text-secondary">Tax Year:</span>
                                            <span class="text-sm fw-bold text-dark"><?= $data['taxYear'] ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Document Selectors -->
                                <div class="card border shadow-none">
                                    <div class="card-body p-3">
                                        <label class="text-uppercase text-xs text-muted fw-bold mb-3 d-block">Select Documents</label>
                                        <?php 
                                        $fileTypes = [
                                            'aoi' => ['Articles of Incorporation', 'fa-file'],
                                            'bylaws' => ['By-Laws', 'fa-file'],
                                            'GIS' => ['General Information Sheet', 'fa-file'],
                                            'AFS' => ['Audited Financial Statements', 'fa-file']
                                        ];
                                        foreach ($fileTypes as $id => $info): ?>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-outline-primary btn-sm w-100 d-flex align-items-center justify-content-between" 
                                                        data-bs-toggle="modal" data-bs-target="#combinedModal" onclick="filterFiles('<?= $info[0] ?>')">
                                                    <span><i class="fa <?= $info[1] ?> me-2"></i> <?= $info[0] ?></span>
                                                </button>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        <!-- Right Side: Selected Files Summary -->
                        <div class="col-lg-8 bg-white border-start d-flex flex-column" style="min-height: 70vh;">
                            <div class="p-3 bg-light border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-sm">Selection Summary</h6>
                                <span class="badge bg-dark rounded-pill" id="selectedCount">0</span>
                            </div>
                                                                
                            <div class="flex-grow-1 overflow-auto">
                                <!-- Placeholder -->
                                <div id="selectionPlaceholder" class="h-100 d-flex flex-column align-items-center justify-content-center text-muted p-5">
                                    <i class="fa fa-folder d-block mb-2" style="font-size: 2.5rem;" aria-hidden="true"></i>
                                    <p class="text-xs">No files selected from this category.</p>
                                </div>
                                                                
                                <!-- This is where the categorized files will appear -->
                                <div class="list-group list-group-flush" id="selectedFilesList">
                                    <!-- Dynamic Categories and Files will be injected here -->
                                </div>
                            </div>
                        </div>


                        <!-- Sticky-style Action Bar -->
                        <div class="row mt-5">
                            <div class="col-12 border-top pt-4 d-flex justify-content-between align-items-center">
                                    <a href="approval" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center px-3">

                                        <span class="text-xs fw-bold text-uppercase">Return to Requests</span>
                                    </a>
                                <div>
                                    <button type="button" class="btn btn-outline-danger btn-sm px-4 me-2" data-bs-toggle="modal" data-bs-target="#reject<?= $data['id']; ?>">Reject</button>
                                    <button type="button" class="btn btn-success btn-sm px-5 shadow-sm" data-bs-toggle="modal" data-bs-target="#approve<?= $data['id']; ?>">Approve & Finalize</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php include('modal.php'); ?>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="ni ni-settings-gear-65 spin mb-3" style="font-size: 3rem;"></i>
                            <h5><?= $request['message'] ?? 'Request not found.'; ?></h5>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<!-- Large Combined Modal -->
<div class="modal fade" id="combinedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalTitle">Document Manager</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Side: Selection List -->
                    <div class="col-lg-4 border-end" style="max-height: 70vh; overflow-y: auto;">
                        
                        <!-- FILTERS CONTROLLER CONTAINER (STICKY TOP) -->
                        <div class="p-3 bg-light border-bottom sticky-top">
                            <!-- Year Dropdown -->
                            <div class="mb-2">
                                <label class="text-xxs font-weight-bold text-uppercase text-muted mb-1 d-block">Filter by Year</label>
                                <select id="fileYearPicker" class="form-select form-select-sm" onchange="applyFilters()">
                                    <option value="">All Years</option>
                                    <?php
                                    $yearSql = mysqli_query($conn, "SELECT filename FROM upload");
                                    $foundYears = [];
                                    
                                    while ($yearRow = mysqli_fetch_assoc($yearSql)) {
                                        if (preg_match('/(19|20)\d{2}/', $yearRow['filename'], $matches)) {
                                            $foundYears[] = $matches[0];
                                        }
                                    }
                                    
                                    $foundYears = array_unique($foundYears);
                                    rsort($foundYears);
                                    
                                    foreach ($foundYears as $year): ?>
                                        <option value="<?= $year ?>"><?= $year ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Search Bar -->
                            <div>
                                <label class="text-xxs font-weight-bold text-uppercase text-muted mb-1 d-block">Search Filename</label>
                                <div class="input-group input-group-merge shadow-none">
                                    <span class="input-group-text border-end-0 bg-white"><i class="fa fa-search text-xs"></i></span>
                                    <input type="text" id="fileSearchInput" class="form-control form-control-sm border-start-0" 
                                           placeholder="Search filename..." onkeyup="applyFilters()">
                                </div>
                            </div>
                        </div>
                        <!-- FILTERS CONTROLLER CONTAINER END -->
                        
                        <div class="list-group list-group-flush" id="fileList">
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM upload ORDER BY filename ASC");
                            while($row = mysqli_fetch_assoc($sql)): ?>
                                <div class="list-group-item file-row" data-category="<?= htmlspecialchars($row['file_type']) ?>">
                                    <div class="form-check d-flex align-items-center mb-0">
                                        <!-- Active Selected Files Checked Array Input Matrix -->
                                            <input class="form-check-input file-checkbox" 
                                            type="checkbox" 
                                            name="selected_files[<?= $row['id'] ?>][path]" 
                                            value="<?= htmlspecialchars($row['file_path']) ?>" 
                                            data-id="<?= $row['id'] ?>"
                                            data-filename="<?= htmlspecialchars($row['filename']) ?>"
                                            data-category="<?= htmlspecialchars($row['file_type']) ?>"
                                            id="check_<?= $row['id'] ?>">    

                                        <label class="form-check-label ms-3 flex-grow-1 cursor-pointer" onclick="updatePreview('<?= htmlspecialchars($row['file_path']) ?>')">
                                            <span class="d-block text-sm fw-bold text-dark filename-text"><?= htmlspecialchars($row['filename']) ?></span>
                                            <small class="text-xxs text-muted text-uppercase"><?= htmlspecialchars($row['file_type']) ?></small>
                                        </label>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- Right Side: Previewer -->
                    <div class="col-lg-8 bg-secondary position-relative d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                        <iframe id="modalPreviewFrame" src="about:blank" class="w-100 h-100 position-absolute" style="border: none; background: white; z-index: 1;"></iframe>

                        <div id="modalPlaceholder" class="text-center text-muted position-relative" style="z-index: 2; pointer-events: none;">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted p-5">
                                <i class="fa fa-search-plus d-block mb-2" style="font-size: 2.5rem;" aria-hidden="true"></i>
                                <p class="text-xs">Click a filename to preview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="saveSelection()">Confirm Selection</button>
            </div>
        </div>
    </div>
</div>


<link href="assets\css\select2.min.css" rel="stylesheet" />
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/view_details_script.js"></script>
