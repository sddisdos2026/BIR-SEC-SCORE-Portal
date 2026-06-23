<?php
ob_start();

require_once('../config/function.php');

include('authentication.php');


if (isset($_POST['saveUser'])) {

    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);// "}"
            return $uuid;
        }
    }   

    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);
    $office = validate($_POST['office']);
    $rdo_code = validate($_POST['rdo_code']);
    
    $passwordRepeat = validate($_POST['passwordRepeat']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    include('includes/revenue_region.php');

    $GUID = getGUID();

    $msg1 = '• Your password must be 12 characters long';
    $msg2 = '• Password must contain at least one digit';
    $msg3 = '• Password must contain at least one Capital Letter';
    $msg4 = '• Password must contain at least one small Letter';
    $msg5 = '• Password must contain at least one special character';
    $msg6 = '• Password must not contain any white space';

    if ($password != $passwordRepeat) {
        redirectfailed('users_create', 'Password and Repeat Password does not match');
    }

    if (strlen($password)<12) {
        redirectfailed('users_create', $msg1);
    }
    if (!preg_match("/\d/", $password)) {
        redirectfailed('users_create', $msg2);
    }
    if (!preg_match("/[A-Z]/", $password)) {
        redirectfailed('users_create', $msg3);
    }
    if (!preg_match("/[a-z]/", $password)) {
        redirectfailed('users_create', $msg4);
    }
    if (!preg_match("/\W/", $password)) {
        redirectfailed('users_create', $msg5); 
    }
    if (preg_match("/\s/", $password)) {
        redirectfailed('users_create', $msg6); 
    }

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $query = mysqli_num_rows($sql);

    if($query){
        redirectfailed('users_create', 'User (' . $email . ') is already registered.');
    }


    if ($first_name != '' || $last_name != '' || $email != '' || $office != '' || $password != '') {

        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d h:i:sa");
     
        $query = "INSERT INTO users (first_name, last_name, email, password, is_ban, role, office, rdo_code, created_date, user_id, revenue_region) 
                VALUES ('$first_name', '$last_name', '$email', '$password_hash', '$is_ban', '$role', '$office', '$rdo_code', '$date', '$GUID', '$revenue_region')";
        $result = mysqli_query($conn, $query);

        if ($result) {

            include('includes/audit/create.php');
            redirect('users.php', 'Account added successfully');

        } else {
            redirectfailed('users_create', 'Something went wrong');
        }

    } else {
        redirectfailed('users_create', 'All fields are required');
    }
}

if (isset($_POST['updateUser'])) {
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);
    $office = validate($_POST['office']);
    $rdo_code = validate($_POST['rdo_code']);
    
    $userId = validate($_POST['userId']);
    $user = getById('users', $userId);

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");

    include('includes/revenue_region.php');

    if ($first_name != '' || $last_name != '' || $email != '' || $password != '' || $office != '') {   
        $query = "UPDATE users 
                SET first_name='$first_name',   
                last_name='$last_name',
                email='$email',
                is_ban='$is_ban',
                role='$role',
                office='$office',
                rdo_code='$rdo_code',
                edited_date='$date',
                revenue_region='$revenue_region'
                WHERE id='$userId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            
            include('includes/audit/update.php');
            redirect('users.php', 'Account has been updated successfully');

        } else {
            redirectfailed('users_create', 'Something went wrong');
        }

    } else {
        redirectfailed('users_create', 'All fields are required');
    }
}


if (isset($_POST['changePassword'])) {
    $password = validate($_POST['password']);
    $passwordRepeat = validate($_POST['passwordRepeat']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $userId = validate($_POST['userId']);
    // $user = getById('users', $userId);
    $user_id = validate($_POST['user_id']);
    $user = getById('users', $user_id);
    
    $msg1 = 'Your password must be 12 characters long';
    $msg2 = 'Password must contain at least one digit';
    $msg3 = 'Password must contain at least one Capital Letter';
    $msg4 = 'Password must contain at least one small Letter';
    $msg5 = 'Password must contain at least one special character';
    $msg6 = 'Password must not contain any white space';

    if ($password != $passwordRepeat) {
        redirectfailed('change_password?id='.$user_id, 'Password and Repeat Password does not match');
    }

    if (strlen($password)<12) {
        redirectfailed('change_password?id='.$user_id, $msg1);
    }
    if (!preg_match("/\d/", $password)) {
        redirectfailed('change_password?id='.$user_id, $msg2);
    }
    if (!preg_match("/[A-Z]/", $password)) {
        redirectfailed('change_password?id='.$user_id, $msg3);
    }
    if (!preg_match("/[a-z]/", $password)) {
        redirectfailed('change_password?id='.$user_id, $msg4);
    }
    if (!preg_match("/\W/", $password)) {
        redirectfailed('change_password?id='.$user_id, $msg5); 
    }
    if (preg_match("/\s/", $password)) {
        redirectfailed('change_password?id='.$user_id, $msg6); 
    }

    // if ($user['status'] !== 200) {
    //     redirectfailed('change_password.php?id='.$user_id, 'No ID Found');
    // }

    if ($password != '' || $passwordRepeat != '') {
        $query = "UPDATE users 
                SET password='$password_hash'
                WHERE user_id = '$user_id'";

        $result = mysqli_query($conn, $query);

        if ($result) {

            include('includes/audit/update.php');
            redirect('profile.php?id='.$user_id, 'Account has been updated successfully');

        } else {
            redirectfailed('change_password?id='.$user_id, 'Something went wrong');
        }
    } else {
        redirectfailed('change_password?id='.$user_id, 'All fields are required');
    }
}

if (isset($_POST['changePasswordAdmin'])) {
    $password = validate($_POST['password']);
    $passwordRepeat = validate($_POST['passwordRepeat']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $userId = validate($_POST['userId']);
    $user = getById('users', $userId);

    echo $userId;
    
    $msg1 = 'Your password must be 12 characters long';
    $msg2 = 'Password must contain at least one digit';
    $msg3 = 'Password must contain at least one Capital Letter';
    $msg4 = 'Password must contain at least one small Letter';
    $msg5 = 'Password must contain at least one special character';
    $msg6 = 'Password must not contain any white space';


    if ($password != $passwordRepeat) {
        redirectfailed('change_password_admin.php?id='.$userId, 'Password and Repeat Password does not match');
    }

    if (strlen($password)<12) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg1);
    }
    if (!preg_match("/\d/", $password)) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg2);
    }
    if (!preg_match("/[A-Z]/", $password)) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg3);
    }
    if (!preg_match("/[a-z]/", $password)) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg4);
    }
    if (!preg_match("/\W/", $password)) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg5); 
    }
    if (preg_match("/\s/", $password)) {
        redirectfailed('change_password_admin.php?id='.$userId, $msg6); 
    }

    if ($user['status'] !== 200) {
        redirectfailed('change_password_admin.php?id='.$userId, 'No ID Found');
    }

    if ($password != '' || $passwordRepeat != '') {
        $query = "UPDATE users 
                SET password='$password_hash'
                WHERE id='$userId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            
            include('includes/audit/update.php');
            redirect('users.php', 'Account has been updated successfully');

        } else {
            redirectfailed('change_password_admin?id='.$userId, 'Something went wrong');
        }

    } else {
        redirectfailed('change_password_admin?id='.$userId, 'All fields are required');
    }

}

if (isset($_POST["submitForm"])) {
    
    // DB Connection for Reference Number Generation
    $dsn = "mysql:host=localhost;dbname=test;charset=utf8mb4;port=3307";
    try {
        $pdo = new PDO($dsn, "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) { die("DB Error: " . $e->getMessage()); }

    // Static User Data
    $user_id = validate($_POST["user_id"]);
    $revenue_region = validate($_POST['revenue_region']);
    $status = 'For Approval';
    $ip = getClientIp();
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");

    // Fetch User Details for the log
    $userQuery = mysqli_query($conn, "SELECT first_name, last_name, email FROM users WHERE id='$user_id' LIMIT 1");
    $user = mysqli_fetch_assoc($userQuery);
    $requested_by = $user['first_name'] . ' ' . $user['last_name'];
    $email = $user['email'];

    $corps = $_POST['nameOfCorp']; // Main array to loop through
    $success_count = 0;

    foreach ($corps as $index => $val) {
        
        // 1. Validate mandatory fields for this index
        $currentCorp = validate($corps[$index]);
        $currentTin  = validate($_POST['tin'][$index] ?? '');
        $currentSec  = validate($_POST['secNum'][$index] ?? '');
        $currentLoa  = validate($_POST['LOA'][$index] ?? '');
        $currentPurp = validate($_POST['purposeOfRequest'][$index] ?? '');

        // Skip empty forms
        if (empty($currentCorp)) continue;

        // 2. Checkboxes (using explicit index from JS)
        $AOI = isset($_POST['AOI'][$index]) ? 1 : 0;
        $GIS = isset($_POST['GIS'][$index]) ? 1 : 0;
        $AFS = isset($_POST['AFS'][$index]) ? 1 : 0;

        // Validation: At least one doc must be checked
        if ($AOI == 0 && $GIS == 0 && $AFS == 0) continue;

        // 3. Duplication Check
        $check = mysqli_query($conn, "SELECT id FROM request WHERE nameOfCorp='$currentCorp' AND tin='$currentTin' AND status='$status'");
        if (mysqli_num_rows($check) > 0) continue;

        // 4. Generate Unique Reference Number
        $reference_number = generateReferenceNumber($pdo, $revenue_region, $row);
        // $reference_number = validate($_POST['reference_number']);

        // // 5. Purpose Logic
        if ($currentPurp == "A") {
            $eLA = validate($_POST['elaNum'][$index] ?? 'N/A');
            $tYear = validate($_POST['taxYear'][$index] ?? 'N/A');
            $fNum = "N/A"; $amt = "N/A";
        } else {
            $eLA = "N/A"; $tYear = "N/A";
            $fNum = validate($_POST['fanNum'][$index] ?? 'N/A');
            $amt = validate($_POST['amount'][$index] ?? 'N/A');
        }

        // // 6. Insert into Database
        $sql = "INSERT INTO request (nameOfCorp, requested_by, tin, secNum, elaNum, taxYear, fanNum, amount, created_date, ip_address, status, email, user_id, AOI, GIS, AFS, reference_number, LOA) 
                VALUES ('$currentCorp', '$requested_by', '$currentTin', '$currentSec', '$eLA', '$tYear', '$fNum', '$amt', '$date', '$ip', '$status', '$email', '$user_id', '$AOI', '$GIS', '$AFS', '$reference_number', '$currentLoa')";
        
        if (mysqli_query($conn, $sql)) {
            $success_count++;
        }
    }

    if ($success_count > 0) {
        // Log to Audit Trail (passing string representation)
        $_POST['nameOfCorp_Log'] = implode(", ", $corps);
        include('includes/audit/submit.php');
        redirect('request_form.php', $success_count . ' requests submitted successfully.');
    } else {
        redirectfailed('request_form.php', 'No requests processed. Check if SEC documents were selected.');
    }
}

if (isset($_POST['Approve'])) {

    $requestId = validate($_POST['requestId']);
    $pp_email = validate($_POST['email']);
    $reference_number = validate($_POST['reference_number']);
    $password = validate($_POST['modalPasswordInput']);

    date_default_timezone_set("Asia/Manila");
    $edited_date = date("Y-m-d H:i:s");

    $approver_name = $row['first_name'] . ' ' . $row['last_name'];
    $approver_user_id = $row['id'];

    // Capture our clean multidimensional selection array structure
    $selected_items = isset($_POST['selected_items']) ? $_POST['selected_items'] : [];

    if (empty($selected_items)) {
        redirectfailed('view_details.php?id=' . $requestId, 'Choose at least one file to proceed.');
        exit;
    } 

    // Setup Hashed Target System Storage Folders
    $profileFolder = hash('sha256', $pp_email);
    $hashed_folder = "./uploads/{$profileFolder}/";
    if (!is_dir($hashed_folder)) {  
        mkdir($hashed_folder, 0755, true);
    }

    // Build transmittal listing array elements
    $compiled_filenames = [];
    foreach ($selected_items as $item) {
        $compiled_filenames[] = basename(validate($item['name']));
    }

    $_SESSION['transmittal_payload'] = [
        'requestId'        => $requestId,
        'reference_number' => $reference_number,
        'corp_name'        => validate($_POST['nameOfCorp'] ?? ''),
        'tin'              => validate($_POST['tin'] ?? ''),
        'taxYear'          => validate($_POST['taxYear'] ?? ''),
        'rdo_code'         => validate($_POST['rdo_code'] ?? ''),
        'office'           => validate($_POST['office'] ?? ''),
        'files'            => $compiled_filenames
    ];

    include('includes/transmittal_slip_details.php');

    // Archive Builder Process Loop Engine
    $zip = new ZipArchive;
    $zip_file_path = $hashed_folder . $reference_number . '.zip';

    if ($zip->open($zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        foreach ($selected_items as $item) {
            $filename = basename(validate($item['path']));
            $root_storage_check = 'uploads/' . $filename;
            if (!empty($filename) && file_exists($root_storage_check)) {
                $zip->addFile($root_storage_check, $filename);
            }
        }
        $zip->close();
    } else {
        redirectfailed('view_details.php?id=' . $requestId, 'Failed to create archive zip payload container.');
        exit;
    }


    // 1. Mutate Main Request Core State Status Row
    $query = "UPDATE request SET status = 'Approved', edited_date = ?, remarks = NULL, approved_by = ?, approver_user_id = ?, file_path = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $edited_date, $approver_name, $approver_user_id, $zip_file_path, $requestId);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            // 2. INJECT SELECTED FILES DIRECTLY INTO SEPARATE TABLE
            // Clear prior selected item duplicates if re-approved to keep records clean
            mysqli_query($conn, "DELETE FROM request_selected_files WHERE request_id = '$requestId'");

            // Prepare mass insert script via robust parameter validation matrix parameters
            $logQuery = "INSERT INTO request_selected_files (request_id, file_id, filename, file_path, file_type, compiled_at) VALUES (?, ?, ?, ?, ?, ?)";
            $logStmt = mysqli_prepare($conn, $logQuery);

            if ($logStmt) {
                foreach ($selected_items as $item) {
                    $v_id   = intval($item['id']);
                    $v_name = validate($item['name']);
                    $v_path = validate($item['path']);
                    $v_type = validate($item['type']);

                    mysqli_stmt_bind_param($logStmt, "iissss", $requestId, $v_id, $v_name, $v_path, $v_type, $edited_date);
                    mysqli_stmt_execute($logStmt);
                }
                mysqli_stmt_close($logStmt);
            }

            $requestId = validate($_POST['requestId']);
            $password = validate($_POST['modalPasswordInput'] ?? '');

            include('includes/audit/approve.php');
            header("Location: transmittal_slip.php?id=" . $requestId . "&pwd=" . urlencode($password));
            exit;
        }
    }
    
    redirectfailed('approval.php', 'Something went wrong while executing database state persistence.');
    exit;
}


if (isset($_POST['Reject'])) {
    
    include('includes/reject_mail.php');

    $approver_user_id = $row['id'];
    $name = $row['first_name'] . ' ' . $row['last_name'];
    $remarks = validate($_POST['reason']);
    $others = validate($_POST['message-text']);

    if ($remarks == 'Others') {
        $query = "UPDATE request 
                    SET status = 'Rejected', 
                    Remarks = '$others', 
                    rejected_by = '$name',
                    approver_user_id = '$approver_user_id' 
                    WHERE id = '$requestId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('approval.php?id='.$requestId, 'Document has been Rejected.');
        } else {
            redirectfailed('approval.php', 'Something went wrong');
        }
    } else {
        $query = "UPDATE request 
                    SET status = 'Rejected', 
                    Remarks = '$remarks', 
                    rejected_by = '$name',
                    approver_user_id = '$approver_user_id' 
                    WHERE id = '$requestId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('approval.php?id='.$requestId, 'Document has been Rejected.');
        } else {
            redirectfailed('approval.php', 'Something went wrong');
        }
    }
}

if(isset($_POST['viewDetails'])) {
    $requestId = validate($_POST['requestId']);

    $query = "SELECT * FROM request WHERE id = $requestId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            echo '<form action="code.php" method="POST">
                    <input type="hidden" name="requestId" id="requestId" value="'. $requestId .'" />
                    <div class="modal-header">
                    <div class="col-md-6">
                        <label>Requested By: ' . $row['requested_by'] . '</label>
                    </div>
                    <div class="col-md-6">
                        <label>Email: ' . $row['email'] . '</label>
                    </div>
                    </div>

                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Name of Corporation</label>
                            <input type="text" value="'. $row['nameOfCorp'] .'" name="nameOfCorp" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>TIN</label>
                            <input type="text" value="'. $row['tin'] .'" name="tin" class="form-control" disabled/>
                        </div>
                        <div class="col-md-6">
                            <label>SEC Number</label>
                            <input type="text" value="'. $row['secNum'] .'" name="secNum" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>eLA No.</label>
                            <input type="text" value="'. $row['elaNum'] .'" name="elaNum" class="form-control" disabled />
                        </div>
                        <div class="col-md-6">
                            <label>Taxable Year</label>
                            <input type="text" value="'. $row['taxYear'] .'" name="taxYear" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>FAN No.</label>
                            <input type="text" value="'. $row['fanNum'] .'" name="fanNum" class="form-control" disabled />
                        </div>
                        <div class="col-md-6">
                            <label>Amount</label>
                            <input type="text" value="'. $row['amount'] .'" name="amount" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>SEC Documents Requested</label>
                            <input type="text" value="'. $row['docsRequested'] .'" name="docsRequested" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reject'.$requestId.'">Reject</button>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approve'.$requestId.'">Approve</button>
                    </div>
                    </form>
                        ';
        }

    } else {
        echo '<h4> No Record Found </h4>';
    }
}

if(isset($_POST['fileUpload'])) {
    $id = $row['id'];
    $name = $row['first_name'] . ' ' . $row['last_name'];
    $email =  $row['email'];    
    $ip = getClientIp();   

    // $profileFolder = "./uploads/$email/";
    // $exist = is_dir($profileFolder);

    $user_id = validate($_POST["user_id"]);

    if(isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];

        $file_path = "./uploads/" . $file_name;

        // $filePath = realpath($_FILES["pdf_file"]["tmp_name"]);
        
        $sql = mysqli_query($conn, "SELECT * FROM upload WHERE filename='$file_name'");
        $query = mysqli_num_rows($sql);

        if($query){
            redirectfailed('file_upload.php', 'File is already uploaded.');
        }

        // if($_FILES['pdf_file']['size'] > 3000000) {
        //     redirectfailed('file_upload.php', 'Upload File Size Limit: 3MB');
        // }

        // move_uploaded_file($file_tmp,"./uploads/".$file_name);

        $file_type_substr = substr($file_name, 0, 3);

        switch($file_type_substr) {
            case "AOI":
                
                date_default_timezone_set("Asia/Manila");
                $date = date("Y-m-d h:i:sa");
                $file_type = 'Articles of Incorporation';

                $file_substr_type = substr($file_name, 0, 3);
                $file_substr_RFN = substr($file_name, 9, 3);
                $file_substr_S = substr($file_name, 20, 1);
                $file_substr_1 = substr($file_name, 27, 1);

                if ($file_substr_type == "AOI" && $file_substr_RFN == "RFN" && $file_substr_S == "S" && $file_substr_1 == "1") {

                    $query = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                        VALUES('$name', '$email', '$file_name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
                    $result = mysqli_query($conn, $query);
                    
                    if($result){
                        move_uploaded_file($file_tmp,"./uploads/".$file_name);
                        include('includes/audit/upload.php');
                        redirect('file_upload.php', 'File has been uploaded.');
                    } else {
                        redirectfailed('file_upload.php', 'File must be uploaded in PDF format.');
                    }
                } else {
                    redirectFailed('file_upload', 'Invalid File Name Format');
                }
                break;
            case "BL-":
                date_default_timezone_set("Asia/Manila");
                $date = date("Y-m-d h:i:sa");
                $file_type = 'By-Laws';
            
                $file_substr_type = substr($file_name, 0, 2);
                $file_substr_RFN = substr($file_name, 8, 3);
                $file_substr_S = substr($file_name, 19, 1);
                $file_substr_2 = substr($file_name, 26, 1);
            

                if ($file_substr_type == "BL" && $file_substr_RFN == "RFN" && $file_substr_S == "S" && $file_substr_2 == "2") {

                    $query = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                        VALUES('$name', '$email', '$file_name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
                    $result = mysqli_query($conn, $query);
                    
                    if($result){
                        move_uploaded_file($file_tmp,"./uploads/".$file_name);
                        include('includes/audit/upload.php');
                        redirect('file_upload.php', 'File has been uploaded.');
                    } else {
                        redirectfailed('file_upload.php', 'File must be uploaded in PDF format.');
                    }
                } else {
                    redirectFailed('file_upload', 'Invalid File Name Format');
                }
                break;
            case "GIS":
                date_default_timezone_set("Asia/Manila");
                $date = date("Y-m-d h:i:sa");
                $file_type = 'General Information Sheet';
            
                $file_substr_type = substr($file_name, 0, 3);
                $file_substr_RFN = substr($file_name, 9, 3);
                $file_substr_S = substr($file_name, 20, 1);
                $file_substr_1 = substr($file_name, 27, 1);

                if ($file_substr_type == "GIS" && $file_substr_RFN == "RFN" && $file_substr_S == "S" && $file_substr_1 == "3") {

                    $query = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                        VALUES('$name', '$email', '$file_name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
                    $result = mysqli_query($conn, $query);
                    
                    if($result){
                        move_uploaded_file($file_tmp,"./uploads/".$file_name);
                        include('includes/audit/upload.php');
                        redirect('file_upload.php', 'File has been uploaded.');
                    } else {
                        redirectfailed('file_upload.php', 'File must be uploaded in PDF format.');
                    }
                } else {
                    redirectFailed('file_upload', 'Invalid File Name Format');
                }
                break;
            case "AFS":
                date_default_timezone_set("Asia/Manila");
                $date = date("Y-m-d h:i:sa");
                $file_type = 'Audited Financial Statements';
            
                $file_substr_type = substr($file_name, 0, 3);
                $file_substr_RFN = substr($file_name, 9, 3);
                $file_substr_S = substr($file_name, 20, 1);
                $file_substr_1 = substr($file_name, 27, 1);

                if ($file_substr_type == "AFS" && $file_substr_RFN == "RFN" && $file_substr_S == "S" && $file_substr_1 == "4") {

                    $query = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                        VALUES('$name', '$email', '$file_name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
                    $result = mysqli_query($conn, $query);
                    
                    if($result){
                        move_uploaded_file($file_tmp,"./uploads/".$file_name);
                        include('includes/audit/upload.php');
                        redirect('file_upload.php', 'File has been uploaded.');
                    } else {
                        redirectfailed('file_upload.php', 'File must be uploaded in PDF format.');
                    }
                } else {
                    redirectFailed('file_upload', 'Invalid File Name Format');
                }
                break;
            default:
                redirectfailed('file_upload.php', 'Invalid File Type. Please try to re-upload again');
        }
        
    } else {
        redirectfailed('file_upload.php', 'Invalid File Type. Please try to re-upload again');
    }
}

if(isset($_GET['log_id'])) {
    $log_id = mysqli_real_escape_string($conn, $_GET['log_id']);
    $query = "SELECT l.*, u.email FROM logs l LEFT JOIN users u ON l.user_id = u.id WHERE l.id = '$log_id'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="text-xs text-uppercase opacity-7">Date & Time</label>
                <h6 class="text-sm"><?= $row['date_created']; ?></h6>
            </div>
            <div class="col-md-4">
                <label class="text-xs text-uppercase opacity-7">IP Address</label>
                <h6 class="text-sm"><?= $row['ip_address']; ?></h6>
            </div>
            <div class="col-md-4">
                <label class="text-xs text-uppercase opacity-7">User Email</label>
                <h6 class="text-sm"><?= $row['email'] ?? 'N/A'; ?></h6>
            </div>
            <hr class="horizontal dark">
            <div class="col-md-12">
                <label class="text-xs text-uppercase opacity-7">Remarks</label>
                <div class="bg-gray-100 p-3 border-radius-lg">
                    <p class="text-sm mb-0"><?= nl2br($row['remarks']); ?></p>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "No record found.";
    }
}

?>
