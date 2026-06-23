<?php 
$pageTitle = "Audit Trail";
include('includes/header.php'); 
?>

<!-- DataTables CSS (Ensure these paths match your project structure) -->
<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-radius-xl">
                <!-- Header Section -->
                <div class="card-header pb-0 p-3">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        
                        <!-- Date Filter Form -->
                        <div class="mt-3 mt-lg-0">
                            <form action="" method="GET" class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <input type="date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-auto">
                                    <span class="text-xs text-secondary">to</span>
                                </div>
                                <div class="col-auto">
                                    <input type="date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-sm btn-primary mb-0">Filter</button>
                                    <a href="audit_trail.php" class="btn btn-sm btn-secondary mb-0">Clear</a>
                                </div>
                            </form>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-3 mt-lg-0 d-flex gap-2">
                            <?php 
                                $date_params = "";
                                if(!empty($_GET['start_date']) && !empty($_GET['end_date'])){
                                    $date_params = "?start_date=".$_GET['start_date']."&end_date=".$_GET['end_date'];
                                }
                            ?>
                            <a class="btn btn-sm btn-outline-primary mb-0 px-3" href="audit_trail_print.php<?= $date_params; ?>">
                                <i class="fa fa-print me-1"></i> Print
                            </a>
                            <a class="btn btn-sm btn-success mb-0 px-3" href="export.php<?= $date_params; ?>">
                                <i class="fa fa-file-excel me-1"></i> Save as Excel
                            </a>
                        </div>
                    </div>
                </div>

                <hr class="horizontal dark my-3">

                <!-- Table Content -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table id="myTable12" class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User / Office</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Transaction</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Query logic with optional date filter
                                if(!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
                                    $start = mysqli_real_escape_string($conn, $_GET['start_date']);
                                    $end = mysqli_real_escape_string($conn, $_GET['end_date']);
                                    $query = "SELECT * FROM logs WHERE date_created BETWEEN '$start 00:00:00' AND '$end 23:59:59' ORDER BY id DESC";
                                } else {
                                    $query = "SELECT * FROM logs ORDER BY id DESC";
                                }
                                
                                $logs = mysqli_query($conn, $query);
                                $id_count = 0;
                                
                                if (mysqli_num_rows($logs) > 0):
                                    foreach($logs as $logItem): 
                                        $id_count++;
                                ?>
                                <tr>
                                    <td class="ps-4 text-xs font-weight-bold"><?= $id_count; ?></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0 text-sm"><?= $logItem['name']; ?></h6>
                                            <p class="text-xs text-secondary mb-0"><?= $logItem['office']; ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-sm bg-gradient-light text-dark border"><?= $logItem['transaction_type']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?= date('M d, Y', strtotime($logItem['date_created'])); ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-link text-info text-gradient px-3 mb-0 viewLogBtn" value="<?= $logItem['id']; ?>">
                                            <i class="fa fa-search me-1"></i> Details
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SINGLE SHARED MODAL -->
<div class="modal fade" id="logDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title font-weight-bolder">Log Details</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gray-100" id="log_detail_content">
                <!-- AJAX content loads here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<!-- DataTables & Custom Scripts -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#myTable9').DataTable({
        "paging": true,
        "ordering": true,
        "responsive": true,
        "language": {
            "search": "_INPUT_",
            "searchPlaceholder": "Search logs..."
        }
    });

    // FIXED Details Button: Use Event Delegation
    $(document).on('click', '.viewLogBtn', function() {
        const logId = $(this).val();
        
        $('#logDetailsModal').modal('show');
        $('#log_detail_content').html(`
            <div class="text-center p-5">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-2 text-sm">Fetching details...</p>
            </div>
        `);
        
        $.ajax({
            type: "GET",
            url: "code.php?log_id=" + logId,
            success: function(response) {
                $('#log_detail_content').html(response);
            },
            error: function() {
                $('#log_detail_content').html('<div class="alert alert-danger text-white m-3">System error: Could not retrieve data.</div>');
            }
        });
    });
});
</script>
