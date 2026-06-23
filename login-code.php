<?php

// require 'config/function.php';

if (isset($_POST["loginBtn"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $_SESSION['last_login_timestamp'] = time();
    
    require_once "config/dbcon.php";
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if (password_verify($password, $row["password"])){  
                if ($row['role'] == 'Administrator') {
                    if ($row['is_ban'] == 1) {
                        echo "<div class='alert alert-danger'>Your account has been deactivated. Contact the System Administrator for assistance.</div>";
                    } else {

                        $_SESSION['auth'] = true;
                        $_SESSION["loggedInUserRole"] = $row['role'];
                        $_SESSION["loggedInUser"] = [
                            'first_name' => $row['first_name'],
                            'last_name' => $row['last_name'],
                            'email' => $row['email']
                        ];

                        include('admin/includes/audit/login.php');
                        header("Location: admin/index");
                    }
                } 
                
                if ($row['role'] == 'Approver' || $row['role'] == 'Approver (Head)') {
                    if ($row['is_ban'] == 1) {
                        echo "<div class='alert alert-danger'>Your account has been deactivated. Contact the System Administrator for assistance.</div>";
                    } else {

                        $_SESSION['auth'] = true;
                        $_SESSION["loggedInUserRole"] = $row['role'];
                        $_SESSION["loggedInUser"] = [
                            'first_name' => $row['first_name'],
                            'last_name' => $row['last_name'],
                            'email' => $row['email']
                        ];
                        
                        include('admin/includes/audit/login.php');
                        header("Location: admin/index");
                    }
                } 

                if ($row['role'] == 'Point Person') {
                    if ($row['is_ban'] == 1) {
                        echo "<div class='alert alert-danger'>Your account has been deactivated. Contact the System Administrator for assistance.</div>";
                    } else {

                        $_SESSION['auth'] = true;
                        $_SESSION["loggedInUserRole"] = $row['role'];
                        $_SESSION["loggedInUser"] = [
                            'first_name' => $row['first_name'],
                            'last_name' => $row['last_name'],
                            'email' => $row['email']
                        ];
                        
                        include('admin/includes/audit/login.php');
                        header("Location: admin/index");
                    }
                }

                if ($row['role'] == 'Security Analyst') {
                    if ($row['is_ban'] == 1) {
                        echo "<div class='alert alert-danger'>Your account has been deactivated. Contact the System Administrator for assistance.</div>";
                    } else {

                        $_SESSION['auth'] = true;
                        $_SESSION["loggedInUserRole"] = $row['role'];
                        $_SESSION["loggedInUser"] = [
                            'first_name' => $row['first_name'],
                            'last_name' => $row['last_name'],
                            'email' => $row['email']
                        ];
                        
                        include('admin/includes/audit/login.php');
                        header("Location: admin/index");
                    }
                }
            } else {
                echo "<div class='alert alert-danger'>Invalid email or password</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid email or password</div>";
        }  
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }
}

if(isset($_POST["recover"])){
    // include('config/dbcon.php');
    require_once "config/dbcon.php";
    $email = $_POST["email"];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
  	$fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){
        echo "<div class='alert alert-danger'>Email does not exist.</div>";
    }

    else{
        $token = bin2hex(random_bytes(50));

    //session_start ();
    $_SESSION['token'] = $token;
    $_SESSION['email'] = $email;

    require "Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host='mailsvr.bir.gov.ph';
    $mail->Port=25;
    $mail->SMTPAuth=false;
    $mail->Debugoutput='html';
    $mail->SMTPDebug = 0;

    $mail->setFrom('aiteid_secscore@bir.gov.ph', 'BIR-SEC SCORE Portal');
    $mail->addAddress($_POST["email"]);
    $mail->addReplyTo('aiteid_secscore@bir.gov.ph', 'Reply to');

    $mail->isHTML(true);
    $mail->Subject="Password Reset Notification";
    $mail->Body="<b>Dear User,</b>
    <p>We received a request to reset your password.</p> 
    <p>Kindly click the below link to reset your password:</p>
    http://172.16.15.180/admin/reset_password.php?token=$token
    <br/>
    <p>***</p>
    <p>Please be reminded of the Data Privacy Act of 2012 (R.A. 10173), if applicable, and Section 270 of National Internal
    Revenue Code (NIRC) in handling/processing of BIR Data/Information.</p>
    <p>***</p>";

        if(!$mail->send()){
            echo "<div class='alert alert-danger'>Invalid email</div>";
        }else{
            header("Location: recover_password_sent");
        }
    }
}

if(isset($_POST["reset"])){
    require_once "config/dbcon.php";
    $psw = $_POST["password"];

   $token = $_SESSION['token'];
   $Email = $_SESSION['email'];

    $hash = password_hash( $psw , PASSWORD_DEFAULT );

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$Email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if($Email){
        $new_pass = $hash;
        mysqli_query($conn, "UPDATE users SET password='$new_pass' WHERE email='$Email'");
        header("Location: reset_password_success");
    }else{
        echo "<div class='alert alert-danger'>Please try again</div>";
    }
}

?>
