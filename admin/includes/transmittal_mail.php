<?php

    require './src/PHPMailer.php';
    require './src/SMTP.php';
    require './src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    // 1. Get the Request ID from the URL instead of $_POST
    $requestId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $password = isset($_GET['pwd']) ? validate($_GET['pwd']) : '';

    if ($requestId === 0) {
        redirectfailed('approval.php', 'Invalid request ID for email processing.');
        exit;
    }

    // 2. Fetch all the missing info directly from your transmittal_slip table
    $email = '';
    $reference_number = '';
    $hashed_folder = '';

    $dbQuery = "SELECT email, reference_number, file_path FROM transmittal_slip WHERE request_id = ? LIMIT 1";
    $dbStmt = mysqli_prepare($conn, $dbQuery);

    if ($dbStmt) {
        mysqli_stmt_bind_param($dbStmt, "i", $requestId);
        mysqli_stmt_execute($dbStmt);
        $dbResult = mysqli_stmt_get_result($dbStmt);
        
        if ($dbRow = mysqli_fetch_assoc($dbResult)) {
            $email = $dbRow['email'];
            $reference_number = $dbRow['reference_number'];
            $hashed_folder = $dbRow['file_path']; // This is your $hashed_folder location
        }
        mysqli_stmt_close($dbStmt);
    }

    // Double check that we actually found an email address
    if (empty($email)) {
        redirectfailed('approval.php', 'Could not find a valid recipient email address in the database.');
        exit;
    }

    // 3. Since $_POST['password'] is gone, let's auto-generate a secure random 8-character password
    // (Or replace this line if you saved the password to a database column instead!)
    // $password = bin2hex(random_bytes(4));
    // $password = validate($_POST['modalPasswordInput']);

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d H:i:s");

    $file_name = "Transmittal_Slip_" . $reference_number . ".pdf";
    $transmittal_slip_path = $hashed_folder . 'Transmittal_Slip/' . $file_name;

    $subject = $reference_number;
    $body = 'Good day!
        
    Please find the attached Transmittal Slip and SEC documents you requested, pursuant to Revenue Memorandum Order No. 1-2025, with Reference No. <b><u>' . $reference_number . '</u></b>. These documents are encrypted with a password to ensure their security.
        
    Please acknowledge the receipt of this mail and its attached document/s. The password will be sent after confirming the receipt of this mail.
        
    In handling and processing the attached documents, please be reminded to adhere to the requirements stipulated under Republic Act No. 10173 (Data Privacy Act of 2012) and SEC. 270 of the National Internal Revenue Code (NIRC). Your strict compliance with these regulations is crucial to safeguard the integrity and confidentiality of the data being transmitted.
        
    Should there be any questions or concerns, please do not hesitate to reach out for assistance.
        
    Thank you for your attention to this matter.';

        try {
            //Server settings
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();
            $mail->Debugoutput = 'html';
            $mail->Host       = 'mailsvr.bir.gov.ph'; 
            $mail->SMTPAuth   = false; 
            $mail->Port       = 25; 

            //Recipients
            $mail->setFrom('aiteid_secscore@bir.gov.ph', 'BIR-SEC SCORE Portal');
            $mail->addAddress($email);     // Add the pulled database email here
            $mail->addReplyTo('aiteid_secscore@bir.gov.ph', 'Reply to');

            //Attachments
            if (file_exists($transmittal_slip_path)) {
                $mail->addAttachment($transmittal_slip_path); 
            } else {
                // If it crashes here, the PDF path or folder name doesn't match where it was saved
                redirectfailed('approval.php', 'Email aborted. Generated PDF was not found at: ' . $transmittal_slip_path);
                exit;
            }

            //Content
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body = nl2br($body);

            $mail->send();

        } catch (Exception $e) {
            redirectfailed('approval.php', 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
            exit;
        }

    
    $subject2 = 'Password for SEC Documents for Ref No. ' . $reference_number;
    $body2 = 'Good day!

    With regard to the SEC documents you requested, pursuant to Revenue Memorandum Order No. 1-2025, with reference no. <b><u>' . $reference_number . '</u></b>, please use the following password to access the said documents:
    
    <b>' . $password . '</b>

    Please handle the password with care and ensure that it is shared only with authorized personnel in accordance with the Republic Act No. 10173 (Data Privacy Act of 2012) and Sec. 270 of the National Internal Revenue Code (NIRC).

    Thank you for your attention and compliance.';
        
        try {
            // Setup a fresh mail object instance for the second message
            $mail2 = new PHPMailer(true);
            $mail2->SMTPDebug = 0; 
            $mail2->isSMTP(); 
            $mail2->Debugoutput = 'html';
            $mail2->Host       = 'mailsvr.bir.gov.ph'; 
            $mail2->SMTPAuth   = false; 
            $mail2->Port       = 25; 

            //Recipients
            $mail2->setFrom('aiteid_secscore@bir.gov.ph', 'BIR-SEC SCORE Portal');
            $mail2->addAddress($email);   
            $mail2->addReplyTo('aiteid_secscore@bir.gov.ph', 'Reply to');

            //Content
            $mail2->isHTML(true); 
            $mail2->Subject = $subject2;
            $mail2->Body = nl2br($body2);

            $mail2->send();

        } catch (Exception $e) {
            redirectfailed('approval.php', 'Message 2 could not be sent. Mailer Error: '.$mail2->ErrorInfo);
            exit;
        }

?>
