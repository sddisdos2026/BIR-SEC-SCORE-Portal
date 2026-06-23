<?php 
$pageTitle = "Request Form";

include('includes/header.php'); 
?>

<?php 
    $now  = new DateTime("now", new DateTimeZone("Asia/Manila"));
    $year = (int)$now->format('Y');
    $rev_region = $row['revenue_region'];
    $rdo_code = $row['rdo_code'];

    $query = "SELECT last_value FROM ref_sequences WHERE seq_year = '$year' AND prefix = '$rev_region'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if(mysqli_num_rows($result) == 0){
            $reference_number = $rev_region . '-RDO' . $rdo_code . '-SEC' . $year . '-' . str_pad("1", 5, "0", STR_PAD_LEFT);
        } else {
            $row2 = mysqli_fetch_assoc($result);
            $last_value = (int)$row2['last_value'] + 1;
            $reference_number = $rev_region . '-RDO' . $rdo_code . '-SEC' . $year . '-' . str_pad((string)$last_value, 5, "0", STR_PAD_LEFT);
        }
    }
    
?>

<!-- Navbar -->
    <!-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl  position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $row['role']; ?></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Request Form</li>
          </ol>
          <h5 class="font-weight-bolder mb-0">Request Form</h5>
        </nav>
      </div>
    </nav> -->
<!-- Navbar End -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">

                    <?php alertMessagefailed(); ?>
                    <?php alertMessage(); ?>
            <div class="card shadow-sm">
                <!-- Page Indicator Header -->
                <div class="card-header bg-light pb-0 border-bottom-0">
                    <div id="form-steps-header" class="d-flex flex-wrap">
                        <span class="badge bg-primary p-2 me-1" id="step-badge-1" onclick="showPage('page-1', 'step-badge-1')" style="cursor: pointer; border-radius: 4px 4px 0 0;">Form 1</span>
                    </div>
                </div>

                <div class="card-body">

                    <!-- <?php echo $reference_number;?> -->
                    <form action="code.php" method="post" id="multiStepForm">
                        <!-- User Meta Data (Hidden) -->
                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                        <input type="hidden" name="user_first_name" value="<?= $row['last_name']; ?>">
                        <input type="hidden" name="user_last_name" value="<?= $row['first_name']; ?>">
                        <input type="hidden" name="user_role" value="<?= $row['role']; ?>">
                        <input type="hidden" name="user_office" value="<?= $row['office']; ?>">
                        <input type="hidden" name="reference_number" value="<?= $reference_number ?>">
                        <input type="hidden" name="revenue_region" value="<?= $row['revenue_region']; ?>">

                        <div id="form-pages-container">
                            <!-- PAGE 1 (The Template) -->
                            <div class="form-page" id="page-1">
                                <h5 class="font-weight-bolder mb-3">Form #1</h5>
                                
                                <div class="form-group mb-3">
                                    <label>Name of Corporation*</label>
                                    <input type="text" name="nameOfCorp[]" placeholder="Enter Name of Corporation" class="form-control" required />
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label>TIN*</label>
                                        <input type="text" name="tin[]" placeholder="Enter TIN (9 Digits Only)" class="form-control" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="9"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>SEC Number</label>
                                        <input type="text" name="secNum[]" placeholder="Enter SEC Number" class="form-control"/>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <label>LOA No.*</label>
                                        <input type="text" name="LOA[]" placeholder="Enter LOA No." class="form-control" required/>
                                    </div> -->
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label>Purpose of Request*</label>
                                        <select class="form-control" name="purposeOfRequest[]" onchange="togglePurpose(this)" required>
                                            <option value="">Select One</option> 
                                            <option value="A">A</option>
                                            <option value="B">B</option>            
                                        </select>
                                    </div>
                                </div>
                                <!-- Conditional Fields (Using Classes) -->
                                <div class="row mb-3 porA" style="display: none">
                                    <div class="col-md-6">
                                        <label>eLA / LOA No.*</label>
                                        <input type="text" name="elaNum[]" class="form-control" placeholder="Enter eLA No." />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Taxable Year*</label>
                                        <input type="text" name="taxYear[]" class="yearpicker form-control" placeholder="Enter Taxable Year" />
                                    </div>
                                </div>

                                <div class="row mb-3 porB" style="display: none">
                                    <div class="col-md-6">
                                        <label>FAN No.*</label>
                                        <input type="text" name="fanNum[]" class="form-control" placeholder="Enter FAN No."  />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Amount*</label>
                                        <input type="text" name="amount[]" class="form-control" placeholder="Enter Amount"  />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="d-block">SEC Documents Requested*</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="AOI[]" value="1">
                                            <label class="form-check-label">Articles of Incorporation / By-Laws</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="GIS[]" value="1">
                                            <label class="form-check-label">General Information Sheet</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="AFS[]" value="1">
                                            <label class="form-check-label">Audited Financial Statement</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Footer Controls -->
                <div class="card-footer bg-white d-flex justify-content-between">
                    <button type="button" id="addMore" class="btn btn-secondary btn-sm">Add Another Form</button>
                    <button type="submit" form="multiStepForm" name="submitForm" class="btn bg-primary text-white btn-sm">Submit All Forms</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
let currentCount = 1;

function showPage(pageId, badgeId) {
    document.querySelectorAll('.form-page').forEach(p => p.style.display = 'none');
    document.querySelectorAll('#form-steps-header .badge').forEach(b => {
        b.classList.replace('bg-primary', 'bg-secondary');
    });
    
    document.getElementById(pageId).style.display = 'block';
    const activeBadge = document.getElementById(badgeId);
    if(activeBadge) activeBadge.classList.replace('bg-secondary', 'bg-primary');
}

function togglePurpose(select) {
    const parent = select.closest('.form-page');
    const porA = parent.querySelector('.porA');
    const porB = parent.querySelector('.porB');
    porA.style.display = select.value === 'A' ? 'flex' : 'none';
    porB.style.display = select.value === 'B' ? 'flex' : 'none';
}

document.getElementById('addMore').addEventListener('click', function() {
    const container = document.getElementById('form-pages-container');
    const header = document.getElementById('form-steps-header');
    
    currentCount++; // Increment for the new form (Form 2, 3, etc.)
    const index = currentCount - 1; // 0-based index for arrays

    const firstPage = document.getElementById('page-1');
    const newPage = firstPage.cloneNode(true);
    
    const newPageId = 'page-' + currentCount;
    const newBadgeId = 'step-badge-' + currentCount;
    
    newPage.id = newPageId;
    newPage.querySelector('h5').innerText = "Form #" + currentCount;
    
    // Reset values and update names with explicit indexes
    newPage.querySelectorAll('input, select').forEach(input => {
        // Reset Value
        if(input.type === 'checkbox' || input.type === 'radio') {
            input.checked = false;
        } else {
            input.value = '';
        }

        // Update name from "field[]" to "field[1]", "field[2]", etc.
        let baseName = input.name.replace('[]', '');
        if (baseName.includes('[')) {
            baseName = baseName.substring(0, baseName.indexOf('['));
        }
        input.name = baseName + '[' + index + ']';
    });

    // Hide conditional rows in the clone
    if(newPage.querySelector('.porA')) newPage.querySelector('.porA').style.display = 'none';
    if(newPage.querySelector('.porB')) newPage.querySelector('.porB').style.display = 'none';

    // Create Navigation Badge
    const newBadge = document.createElement('span');
    newBadge.className = 'badge bg-secondary p-2 me-1';
    newBadge.id = newBadgeId;
    newBadge.style.cursor = 'pointer';
    newBadge.style.borderRadius = "4px 4px 0 0";
    newBadge.innerText = 'Form ' + currentCount;
    newBadge.onclick = function() { showPage(newPageId, newBadgeId); };

    header.appendChild(newBadge);
    container.appendChild(newPage);
    showPage(newPageId, newBadgeId);
});
</script>

<?php include('includes/footer.php'); ?>

<!-- <script>
function ShowHideDiv() {
    var purposeOfRequest = document.getElementById("purposeOfRequest");
    var porA = document.getElementById("porA");
    var porB = document.getElementById("porB");
    porA.style.display = purposeOfRequest.value == "A" ? "block" : "none";
    porB.style.display = purposeOfRequest.value == "B" ? "block" : "none";
}
</script> -->


