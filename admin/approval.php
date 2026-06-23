<?php 
$pageTitle = "Document Management";

include('includes/header.php'); 
?>

<!-- Navbar -->
<!-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $row['role']; ?></a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Document Management</li>
            </ol>
            <h5 class="font-weight-bolder mb-0">Document Management</h5>
        </nav>
    </div>
</nav> -->
<!-- Navbar End -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <?php alertMessage(); ?>
            <?php alertMessageFailed(); ?>
            
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header pb-0">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Filter by Status</h6>
                        </div>
                    </div>
                </div>
                
                <div class="card-body pt-2">
                    <!-- Nav Tabs (Better than Dropdown for 3 options) -->
                    <ul class="nav nav-pills nav-fill p-1 bg-gray-100 border-radius-lg mb-4" id="approvalTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2 active" data-bs-toggle="tab" href="#for-approval-tab" role="tab" aria-selected="true">
                                <i class="fas fa-clock text-sm me-2"></i> For Approval
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2" data-bs-toggle="tab" href="#approved-tab" role="tab" aria-selected="false">
                                <i class="fas fa-check-circle text-sm me-2 text-success"></i> Approved
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-2" data-bs-toggle="tab" href="#rejected-tab" role="tab" aria-selected="false">
                                <i class="fas fa-times-circle text-sm me-2 text-danger"></i> Rejected
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="approvalTabsContent">
                        <div class="tab-pane fade show active" id="for-approval-tab" role="tabpanel">
                            <?php include('includes/request_status/for_approval.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="approved-tab" role="tabpanel">
                            <?php include('includes/request_status/approved.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="rejected-tab" role="tabpanel">
                            <?php include('includes/request_status/rejected.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<style>
    /* Styling for the nav-pills to look like the Soft UI dashboard style */
    .nav-pills .nav-link.active {
        background-color: #fff !important;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        color: #344767 !important;
        font-weight: 600;
    }
    .bg-gray-100 {
        background-color: #f8f9fa !important;
    }
    .border-radius-lg {
        border-radius: 0.75rem;
    }
</style>