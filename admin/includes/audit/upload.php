<?php
    $user_id = validate($_POST['user_id']);
    $user_office = validate($_POST['user_office']);
    $user_role = validate($_POST['user_role']);
    $ip = getClientIp();
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");
    $first_name = validate($_POST['user_first_name']);
    $last_name = validate($_POST['user_last_name']);
    $full_name = $first_name . ' ' . $last_name;
    // $file_name = $_FILES['pdf_file']['name'];

    $remarks = 'User ('. $email . ') has uploaded the file: ' . $name;

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
            VALUES ('$user_id', '$full_name', 'UPLOAD', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);
?>