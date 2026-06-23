<?php

    require './src/PHPMailer.php';
    require './src/SMTP.php';
    require './src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $requestId = validate($_POST['requestId']);
    $remarks = validate($_POST['reason']);
    $others = validate($_POST['message-text']);
    $email = validate($_POST['email']);
    $nameOfCorp = validate($_POST['nameOfCorp']);
    $requested_by = validate($_POST['requested_by']);
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");

    if ($remarks == 'Others') {
        $subject = 'BIR-SEC SCORE Portal Notification Update';
        $body = '<b>Dear ' . $requested_by .',</b>
        <p>Your request for <b>' . $nameOfCorp . '</b> has been rejected.</p> 
        <p>Reason for rejecting request:</p>
        <p>' . $others . '.</p>
        <br/>
        <p>***</p>
        <p>Please be reminded of the Data Privacy Act of 2012 (R.A. 10173), if applicable, and Section 270 of National Internal
        Revenue Code (NIRC) in handling/processing of BIR Data/Information.</p>
        <p>***</p>';

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output (for debugging, set to 2)
            $mail->isSMTP(); //Send using SMTP
            $mail->Debugoutput = 'html';
            $mail->Host       = 'mailsvr.bir.gov.ph'; //Set the SMTP server to send through
            $mail->SMTPAuth   = false; //Enable SMTP authentication
            // $mail->Username   = 'mac2manaois1998@gmail.com'; //SMTP username
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 25; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('aiteid_secscore@bir.gov.ph', 'BIR-SEC SCORE Portal');
            $mail->addAddress($email);     //Add a recipient
            $mail->addReplyTo('aiteid_secscore@bir.gov.ph', 'Reply to');
            // $mail->addCC($cc);
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // if ($fileTmpPath) {
            //     $mail->addAttachment($fileTmpPath, $fileName);
            // }
            // $mail->addAttachment('sample.pdf');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            redirectfailed('approval.php', 'Message could not be sent. Mailer Error:'.$mail->ErrorInfo);
        }
    } else {
        $subject = 'BIR-SEC SCORE Portal Notification Update';
        $body = '<b>Dear ' . $requested_by .',</b>
        <p>Your request for <b>' . $nameOfCorp . '</b> has been rejected.</p> 
        <p>Reason for rejecting request:</p>
        <p>' . $remarks . '.</p>
        <br/>
        <p>***</p>
        <p>Please be reminded of the Data Privacy Act of 2012 (R.A. 10173), if applicable, and Section 270 of National Internal
        Revenue Code (NIRC) in handling/processing of BIR Data/Information.</p>
        <p>***</p>';

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output (for debugging, set to 2)
            $mail->isSMTP(); //Send using SMTP
            $mail->Debugoutput = 'html';
            $mail->Host       = 'mailsvr.bir.gov.ph'; //Set the SMTP server to send through
            $mail->SMTPAuth   = false; //Enable SMTP authentication
            // $mail->Username   = 'mac2manaois1998@gmail.com'; //SMTP username
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 25; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('aiteid_secscore@bir.gov.ph', 'BIR-SEC SCORE Portal');
            $mail->addAddress($email);     //Add a recipient
            $mail->addReplyTo('aiteid_secscore@bir.gov.ph', 'Reply to');
            // $mail->addCC($cc);
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // if ($fileTmpPath) {
            //     $mail->addAttachment($fileTmpPath, $fileName);
            // }
            // $mail->addAttachment('.sample.pdf');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

        } catch (Exception $e) {
            redirectfailed('approval.php', 'Message could not be sent. Mailer Error:'.$mail->ErrorInfo);
        }
    }

?>