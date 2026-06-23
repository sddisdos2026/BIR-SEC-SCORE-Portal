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
    $transaction_type = "CREATE USER";

    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $office = validate($_POST['office']);

    $remarks = 'Administrator (' . $admin_name . ') has created a user with the ff credentials: First Name: ' . $first_name . ' Last Name: '  . $last_name . ' Email: ' . $email . ' Office: ' . $office;

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
            VALUES ('$user_id', '$admin_name', '$transaction_type', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);
?>