<?php
    $user_id = $row['id'];
    $name = $row['first_name'] . ' ' . $row['last_name'];
    $transaction_type = "APPROVE";
    $user_office = $row['office'];
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");
    $user_role = $row['role'];
    $ip = getClientIp();

    $email = $row['email'];
    $reference_number = validate($_POST['reference_number']);
    $reason = validate($_POST['reason']);

    $name_pp = validate($_POST['requested_by']);
    $email_pp = validate($_POST['email']);

    $remarks = 'User (' . $email . ') has approved the Reference Number: ' . $reference_number . '  submitted by ' . $name_pp . ' (' . $email_pp . ')'; 

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
            VALUES ('$user_id', '$name', '$transaction_type', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);
?>