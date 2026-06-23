<?php
    date_default_timezone_set("Asia/Manila");
    $user_id = $row['id'];
    $user_office = $row['office'];
    $user_role = $row['role'];
    $ip = getClientIp();
    $date = date("Y-m-d h:i:sa");
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $name = $first_name . ' ' . $last_name;
    $remarks = 'Logged in as: ' . $name . ' (' . $email . ')';
    $transaction_type = "LOGIN";

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
    VALUES ('$user_id', '$name', '$transaction_type', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);


?>