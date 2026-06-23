<?php 
$pageTitle = "Documents Requested";

include('includes/header.php'); 

$email = $row['email'];
?>

<div class="container-fluid py-4">
    <div class="row">
        <?php alertMessage(); ?>
        <?php alertMessageFailed(); ?>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body pt-4">
                    <!-- Nav Tabs (Modern Navigation) -->
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
                            <?php include('includes/request_status_pp/for_approval.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="approved-tab" role="tabpanel">
                            <?php include('includes/request_status_pp/approved.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="rejected-tab" role="tabpanel">
                            <?php include('includes/request_status_pp/rejected.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
function ShowHideDiv() {
    var status = document.getElementById("status");
    var for_approval = document.getElementById("For Approval");
    var Approved = document.getElementById("Approved");
    var Rejected = document.getElementById("Rejected");
    for_approval.style.display = status.value == "For Approval" ? "block" : "none";
    Approved.style.display = status.value == "Approved" ? "block" : "none";
    Rejected.style.display = status.value == "Rejected" ? "block" : "none";
}
</script>


<!-- OPEN MODAL FOR APPROVED -->
<script>
$(document).ready(function () {
    // $('.view_data').click(function (e) { 
        $("body").on("click", ".view_data_approved", function(e){ 
        e.preventDefault();
        
        var requestId = $(this).closest('tr').find('.requestId').text();
        console.log(requestId);
        
        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'viewDetails_pointperson' : true,
                'requestId':requestId,
            },
            success: function (response) {
                //  console.log(response);
            
                $('.view_user_data').html(response);
            
                $('view_details').modal('show');
            }
        });
    });
});
</script>
<!-- OPEN MODAL END -->

<!-- OPEN MODAL FOR REJECTED -->
<script>
$(document).ready(function () {
    // $('.view_data').click(function (e) { 
        $("body").on("click", ".view_data_rejected", function(e){ 
        e.preventDefault();
        
        var requestId = $(this).closest('tr').find('.requestId').text();
        console.log(requestId);
        
        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'viewDetails_pointperson_rejected' : true,
                'requestId':requestId,
            },
            success: function (response) {
                //  console.log(response);
            
                $('.view_user_data').html(response);
            
                $('view_details').modal('show');
            }
        });
    });
});
</script>
<!-- OPEN MODAL END -->