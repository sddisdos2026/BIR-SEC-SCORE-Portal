<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $row['role']; ?></a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Request Form</li>
            </ol>
            <h5 class="font-weight-bolder mb-0">Request Form</h5>
        </nav>
    </div>
</nav>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php alertMessagefailed(); ?>
                    <?php alertMessage(); ?>

                    <form action="code.php" method="post">
                        <!-- User Hidden Data -->
                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                        <input type="hidden" name="reference_number" value="<?= $reference_number ?>">

                        <div id="form-container">
                            <!-- Template for Repeatable Form -->
                            <div class="card border mb-4 form-instance">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2">
                                    <h6 class="mb-0">Request #<span class="form-counter">1</span></h6>
                                    <button type="button" class="btn btn-outline-danger btn-sm mb-0 remove-btn" style="display:none;">Remove</button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label>Name of Corporation*</label>
                                            <input type="text" name="nameOfCorp[]" placeholder="Enter Name of Corporation" class="form-control" required />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>TIN*</label>
                                            <input type="text" name="tin[]" placeholder="9 Digits" class="form-control" required maxlength="9" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>SEC Number*</label>
                                            <input type="text" name="secNum[]" placeholder="Enter SEC Number" class="form-control" required />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>LOA No.*</label>
                                            <input type="text" name="LOA[]" placeholder="Enter LOA No." class="form-control" required/>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Purpose of Request*</label>
                                            <select class="form-control purpose-select" name="purposeOfRequest[]" required onchange="togglePurposeFields(this)">
                                                <option value="">Select One</option> 
                                                <option value="A">A</option>
                                                <option value="B">B</option>            
                                            </select>
                                        </div>

                                        <!-- Dynamic Section A -->
                                        <div class="row porA-section" style="display: none">
                                            <div class="col-md-6 mb-3">
                                                <label>eLA No.*</label>
                                                <input type="text" name="elaNum[]" class="form-control" placeholder="Enter eLA No." />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Taxable Year*</label>
                                                <input type="text" name="taxYear[]" class="form-control" placeholder="YYYY" />
                                            </div>
                                        </div>

                                        <!-- Dynamic Section B -->
                                        <div class="row porB-section" style="display: none">
                                            <div class="col-md-6 mb-3">
                                                <label>FAN No.*</label>
                                                <input type="text" name="fanNum[]" class="form-control" placeholder="Enter FAN No."  />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Amount*</label>
                                                <input type="text" name="amount[]" class="form-control" placeholder="Enter Amount"  />
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="d-block">SEC Documents Requested*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="AOI[]" value="1">
                                                <label class="form-check-label">Articles of Incorporation</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="GIS[]" value="1">
                                                <label class="form-check-label">GIS</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="AFS[]" value="1">
                                                <label class="form-check-label">AFS</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-8">
                                <button type="button" id="addMore" class="btn btn-secondary btn-sm">Add Another Form</button>
                                <p class="text-sm mt-2"><strong>Note:</strong> Forms will be saved under Ref: <u><?= $reference_number; ?></u></p>
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="submit" name="submitForm" class="btn bg-primary text-white btn-sm px-5">Submit All Forms</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Function to handle Add More
document.getElementById('addMore').addEventListener('click', function() {
    const container = document.getElementById('form-container');
    const firstForm = container.querySelector('.form-instance');
    const clone = firstForm.cloneNode(true);

    // Clear all inputs/selects in the clone
    const inputs = clone.querySelectorAll('input, select');
    inputs.forEach(input => {
        if(input.type === 'checkbox') input.checked = false;
        else input.value = '';
    });

    // Reset visibility of conditional sections
    clone.querySelector('.porA-section').style.display = 'none';
    clone.querySelector('.porB-section').style.display = 'none';

    // Enable and show Remove button
    const removeBtn = clone.querySelector('.remove-btn');
    removeBtn.style.display = 'block';
    removeBtn.onclick = function() {
        clone.remove();
        updateCounters();
    };

    container.appendChild(clone);
    updateCounters();
});

// Function to update the # counter
function updateCounters() {
    const counters = document.querySelectorAll('.form-counter');
    counters.forEach((span, index) => {
        span.innerText = index + 1;
    });
}

// Function to handle Show/Hide within each specific form instance
function togglePurposeFields(selectElement) {
    const parent = selectElement.closest('.card-body');
    const sectionA = parent.querySelector('.porA-section');
    const sectionB = parent.querySelector('.porB-section');
    
    if (selectElement.value === "A") {
        sectionA.style.display = 'flex';
        sectionB.style.display = 'none';
    } else if (selectElement.value === "B") {
        sectionA.style.display = 'none';
        sectionB.style.display = 'flex';
    } else {
        sectionA.style.display = 'none';
        sectionB.style.display = 'none';
    }
}
</script>

<?php include('includes/footer.php'); ?>