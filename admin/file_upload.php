<?php 
$pageTitle = "File Upload";

include('includes/header.php'); 
?>

<!-- Navbar -->
    <!-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl  position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $row['role']; ?></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">File Upload</li>
          </ol>
          <h5 class="font-weight-bolder mb-0">File Upload</h5>
        </nav>
      </div>
    </nav> -->
<!-- Navbar End -->

<div class="container-fluid py-4">
   <div class="row">
    <div class="col-md-12">
      <?php alertMessage(); ?>
                  <?php alertMessageFailed(); ?>

        <div class="card">
            <div class="card-body">
              

              <div class="row">
                <div class="col-md-6">
                  <div class="col-md-8 d-flex align-items-center">
                    <h5 class="mb-0">File Upload Policies</h5>
                  </div>
                  <p class="text-sm">
                    <b>File Format:</b>
                    <i>FILE TYPE-SEC DOC YEAR-SEC SCORE REQUEST CONTROL NO.-NUMBER SERIES.</i>
                  </p>
                  <p class="text-sm">
                    <i>The only acceptable document format is PDF.</i>
                  </p>

                  <hr class="horizontal gray-light my-2">
                  <p><h6 class="mb-0"><u>Example File Names</u></h6></p>
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Articles of Incorporation:</strong> AOI-SEC Registration No.-Year-RFN-N</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">By-Laws:</strong> BL-SEC Registration No.-Year-RFN-N</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">General Information Sheet:</strong> GIS-SEC Registration No.-Year-RFN-N</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Audited Financial Statements:</strong> AFS-SEC Registration No.-Year-RFN-N</li>
                  </ul>
                </div>

                <div class="col-md-6">

                  <form action="upload.php" method="POST" enctype="multipart/form-data">

                      <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
                      <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                      <input type="hidden" name="user_first_name" value="<?= $row['last_name']; ?>">
                      <input type="hidden" name="user_last_name" value="<?= $row['first_name']; ?>">
                      <input type="hidden" name="user_role" value="<?= $row['role']; ?>">
                      <input type="hidden" name="user_office" value="<?= $row['office']; ?>">

                      <input type="file" name="upload[]" class="form-control" accept=".pdf" required multiple/>
                      <br/>
                      <input type="submit" class="btn btn-success btn-sm" name="fileUpload" value="Upload">

                  </form>
                </div>
              </div>
            </div>
        </div>
    <br/>


    <?php
        if ($role == 'Approver') {
    ?>

        <div class="card">
            <div class="card-body">
                <div class="col-lg-3 col-md-3 col-3">
                    <label>File Type </label>
                      <select class="form-control" id="file_type" name="file-type" onchange="ShowHideDiv()" required>
                          <option value="view_uploads">View All</option>
                          <option value="AOI">Articles of Incorporation</option>
                          <option value="bylaws">By-Laws</option>            
                          <option value="GIS">General Information Sheet</option>            
                          <option value="AFS">Audited Financial Statements</option>            
                      </select>
                    <br/>
                </div>
                
                <div id="view_uploads" style="display: block">
                  <?php include('includes/upload_file_type/view_uploads.php'); ?>
                </div>
                <div id="AOI" style="display: none">
                  <?php include('includes/upload_file_type/AOI.php'); ?>
                </div>
                <div id="bylaws" style="display: none">
                  <?php include('includes/upload_file_type/bylaws.php'); ?>
                </div>
                <div id="GIS" style="display: none">
                  <?php include('includes/upload_file_type/GIS.php'); ?>
                </div>
                <div id="AFS" style="display: none">
                  <?php include('includes/upload_file_type/AFS.php'); ?>
                </div>

            </div>
        </div>

    <?php
        }
    ?>

    <?php
        if ($role == 'Approver (Head)') {
    ?>

        <div class="card">
            <div class="card-body">
                <div class="col-lg-3 col-md-3 col-3">
                    <label>File Type </label>
                      <select class="form-control" id="file_type" name="filetype" onchange="ShowHideDiv()" required>
                          <option value="view_uploads">View All</option>
                          <option value="AOI">Articles of Incorporation</option>
                          <option value="bylaws">By-Laws</option>            
                          <option value="GIS">General Information Sheet</option>            
                          <option value="AFS">Audited Financial Statements</option>
                      </select>
                    <br/>
                </div>

            <div id="view_uploads" style="display: block">
              <?php include('includes/upload_file_type/view_uploads.php'); ?>
            </div>
            <div id="AOI" style="display: none">
              <?php include('includes/upload_file_type/AOI.php'); ?>
            </div>
            <div id="bylaws" style="display: none">
              <?php include('includes/upload_file_type/bylaws.php'); ?>
            </div>
            <div id="GIS" style="display: none">
              <?php include('includes/upload_file_type/GIS.php'); ?>
            </div>
            <div id="AFS" style="display: none">
              <?php include('includes/upload_file_type/AFS.php'); ?>
            </div>
            

    <?php
        }
    ?>

    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>

<script>
function ShowHideDiv() {
    var file_type = document.getElementById("file_type");
    var view_uploads = document.getElementById("view_uploads");
    var aoi = document.getElementById("AOI");
    var bylaws = document.getElementById("bylaws");
    var gis = document.getElementById("GIS");
    var afs = document.getElementById("AFS");
    view_uploads.style.display = file_type.value == "view_uploads" ? "block" : "none";
    aoi.style.display = file_type.value == "AOI" ? "block" : "none";
    bylaws.style.display = file_type.value == "bylaws" ? "block" : "none";
    gis.style.display = file_type.value == "GIS" ? "block" : "none";
    afs.style.display = file_type.value == "AFS" ? "block" : "none";
}
</script>

