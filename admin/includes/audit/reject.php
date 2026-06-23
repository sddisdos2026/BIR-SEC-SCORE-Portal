<?php


    $user_id = validate($_POST['user_id']);
    $user_office = validate($_POST['user_office']);
    $user_role = validate($_POST['user_role']);
    $ip = getClientIp();
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");
    $first_name = validate($_POST['user_first_name']);
    $last_name = validate($_POST['user_last_name']);
    $name = $first_name . ' ' . $last_name;

    $nameOfCorp = validate($_POST["nameOfCorp"]);
    $tin = validate($_POST["tin"]);
    $secNum = validate($_POST["secNum"]);
    $elaNum = validate($_POST["elaNum"]);
    $taxYear = validate($_POST["taxYear"]);
    $fanNum = validate($_POST["fanNum"]);
    $amount = validate($_POST["amount"]);
    $docsRequested = validate($_POST["docsRequested"]);
    $transaction_type = "SUBMIT";

    $remarks = 'User (' . $email . ') has submitted a request with ff: Name of Corporation: ' . $nameOfCorp . ' TIN: ' . $tin . ' SEC Number: ' . $secNum . ' eLA No.: ' . $elaNum . ' Tax Year: ' . $taxYear . ' FAN No.: ' . $fanNum . ' Amount: ' . $amount . ' Documents Requested: ' . $docsRequested; 

    $audit = "INSERT INTO logs (user_id, name, transaction_type, office, date_created, role, ip_address, remarks)
            VALUES ('$user_id', '$name', '$transaction_type', '$user_office', '$date', '$user_role', '$ip', '$remarks')";
    $audit_result = mysqli_query($conn, $audit);
?>