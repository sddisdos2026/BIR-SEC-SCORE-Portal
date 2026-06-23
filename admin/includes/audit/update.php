<?php
    $user_id = validate($_POST['user_id']);
    $user_office = validate($_POST['user_office']);
    $user_role = validate($_POST['user_role']);
    $ip = getClientIp();
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");

    $admin_first_name = validate($_POST['user_first_name']);
    $admin_last_name = validate($_POST['user_last_name']);
    $admin_name = $admin_first_name . ' ' . $admin_last_name;

    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $name = $first_name . ' ' . $last_name;
    $email = validate($_POST['email']);
    $office = validate($_POST['office']);
    $transaction_type = "UPDATE";

    $remarks = 'Administrator (' . $admin_name . ') has updated the details for: ' . $name . ' (' . $email . ')';

    if ($first_name != '' || $last_name != '' || $email != '' || $password != '' || $office != '') {   

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
            VALUES ('$user_id', '$name', '$transaction_type', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);

    }
?>