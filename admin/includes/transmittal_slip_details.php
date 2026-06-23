<?php
    // $requestId = validate($_POST['requestId']);
    // $chief_name = "MONSERRAT VENUS A. AXALAN";
    // $name = validate($_POST['requested_by']);
    // $rdo_code = validate($_POST['rdo_code']);
    // $office = validate($_POST['office']);
    // $reference_number = validate($_POST['reference_number']);
    // date_default_timezone_set("Asia/Manila");
    // $date = date("F j, Y");
    // $created_date = date("Y-m-d h:i:sa");
    // $nameOfCorp = validate($_POST['nameOfCorp']);
    // $tin = validate($_POST['tin']);
    // $elaNum = validate($_POST['elaNum']) == 'N/A' ? '' : $_POST['elaNum'];
    // $fanNum = validate($_POST['fanNum']) == 'N/A' ? '' : $_POST['fanNum'];
    // $taxYear = validate($_POST['taxYear']);
    // $email = validate($_POST['email']);

    // $aoi_path = validate($_POST['aoi']);
    // $aoi = substr($aoi_path, 10, 28);

    // $bylaws_path = validate($_POST['bylaws']);
    // $bylaws = substr($bylaws_path, 10, 27);
    
    // $GIS_path = validate($_POST['GIS']);
    // $GIS = substr($GIS_path, 10, 28);
    
    // $AFS_path = validate($_POST['AFS']);
    // $AFS = substr($AFS_path, 10, 28);

    // if (isset($aoi) == $aoi || isset($bylaws) == $bylaws) {
    //     $docsRequested = '1';
    //     $na_docsRequested = '2,3';
    // }

    // if (isset($GIS) == $GIS) {
    //     $docsRequested = '2';
    //     $na_docsRequested = '1,3';

    //     if (isset($GIS) == $GIS && isset($aoi) == $aoi || isset($bylaws) == $bylaws) {
    //         $docsRequested = '1, 2';
    //         $na_docsRequested = '3';
    //     }
    // }

    // if (isset($AFS) == $AFS) {
    //     $docsRequested = '3';
    //     $na_docsRequested = '1,2';

    //     if (isset($AFS) == $AFS && isset($aoi) == $aoi || isset($bylaws) == $bylaws) {
    //         $docsRequested = '1, 3';
    //         $na_docsRequested = '2';
    //     }
    // }

    // if (isset($AFS) == $AFS && isset($GIS) == $GIS) {
    //     $docsRequested = '2, 3';
    //     $na_docsRequested = '1';
    // }

    // if (isset($aoi) == $aoi && isset($bylaws) == $bylaws && isset($GIS) == $GIS && isset($AFS) == $AFS) {
    //     $docsRequested = '1, 2, 3';
    //     $na_docsRequested = '';
    // }

    // $query = "INSERT INTO transmittal_slip (request_id, chief_name, pp_name, rdo_code, office, reference_number, date, nameOfCorp, tin, elaNum, fanNum, taxYear, docsRequested, na_docsRequested, created_date, email, AOI, bylaws, GIS, AFS, file_path) 
    // VALUES ('$requestId', '$chief_name', '$name', '$rdo_code', '$office', '$reference_number', '$date', '$nameOfCorp', '$tin', '$elaNum', '$fanNum', '$taxYear', '$docsRequested', '$na_docsRequested', '$created_date', '$email', '$aoi', '$bylaws', '$GIS', '$AFS', '$hashed_folder')";
    // $result = mysqli_query($conn, $query);

    // $query = "INSERT INTO transmittal_slip (request_id, chief_name, pp_name, rdo_code, office, reference_number, date, nameOfCorp, tin, elaNum, fanNum, taxYear, docsRequested, na_docsRequested, created_date, email, file_path) 
    // VALUES ('$requestId', '$chief_name', '$name', '$rdo_code', '$office', '$reference_number', '$date', '$nameOfCorp', '$tin', '$elaNum', '$fanNum', '$taxYear', '$docsRequested', '$na_docsRequested', '$created_date', '$email', '$hashed_folder')";
    // $result = mysqli_query($conn, $query);

$requestId = validate($_POST['requestId']);
$chief_name = "MONSERRAT VENUS A. AXALAN";
$name = validate($_POST['requested_by'] ?? '');
$rdo_code = validate($_POST['rdo_code'] ?? '');
$office = validate($_POST['office'] ?? '');
$reference_number = validate($_POST['reference_number'] ?? '');

date_default_timezone_set("Asia/Manila");
$date = date("F j, Y");
$created_date = date("Y-m-d H:i:s"); // Fixed time format to standard 24h for DB

$nameOfCorp = validate($_POST['nameOfCorp'] ?? '');
$tin = validate($_POST['tin'] ?? '');

// Handle N/A checks safely
$elaNum = (validate($_POST['elaNum'] ?? '') == 'N/A') ? '' : validate($_POST['elaNum'] ?? '');
$fanNum = (validate($_POST['fanNum'] ?? '') == 'N/A') ? '' : validate($_POST['fanNum'] ?? '');

$taxYear = validate($_POST['taxYear'] ?? '');
$email = validate($_POST['email'] ?? '');

// FIX: Define these missing variables so the database doesn't crash!
// You can change these empty strings to whatever data you actually need.
$docsRequested = ''; 
$na_docsRequested = ''; 

// Safe Prepared Statement
$query = "INSERT INTO transmittal_slip (request_id, chief_name, pp_name, rdo_code, office, reference_number, date, nameOfCorp, tin, elaNum, fanNum, taxYear, docsRequested, na_docsRequested, created_date, email, file_path) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssssssssssss", 
        $requestId, $chief_name, $name, $rdo_code, $office, $reference_number, 
        $date, $nameOfCorp, $tin, $elaNum, $fanNum, $taxYear, 
        $docsRequested, $na_docsRequested, $created_date, $email, $hashed_folder
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

?>