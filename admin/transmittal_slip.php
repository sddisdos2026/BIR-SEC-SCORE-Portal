<?php
require_once('../config/function.php');
require_once 'assets/fpdf/fpdf.php'; 

// Ensure session state is active to read the pipeline payload data
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Prevent PHP from crashing if this file is included multiple times
if (!class_exists('PDF')) {
    class PDF extends FPDF {
        function ThickLine($x1, $y1, $x2, $y2, $thickness = 0.8) {
            $this->SetLineWidth($thickness);
            $this->Line($x1, $y1, $x2, $y2);
            $this->SetLineWidth(0.2); 
        }
    }
}

$paramResult = checkParamId('id');

if (!is_numeric($paramResult)) {
    echo "<h5>".$paramResult."</h5>";
    return false;
}

$request = transmittal_slip(checkParamId('id'));

if ($request['status'] == 200) {
    
    $nameOfCorp = $request['data']['nameOfCorp'];
    $tin = $request['data']['tin'];
    $office = $request['data']['office'];
    $reference_number = $request['data']['reference_number'];
    $pp_name = $request['data']['pp_name'];
    $elaNum = $request['data']['elaNum'] == 'N/A' ? NULL : $request['data']['elaNum'];
    $fanNum = $request['data']['fanNum'] == 'N/A' ? NULL : $request['data']['fanNum'];
    $taxYear = $request['data']['taxYear'];
    $created_date = $request['data']['created_date'];
    $file_path = $request['data']['file_path'];
    
    $getDate = $request['data']['created_date'];
    $date = date("F j, Y", strtotime($getDate));
    
    $date_received = date("m/d/Y", strtotime($getDate));
    $docsRequested = $request['data']['docsRequested'];
    $na_docsRequested = $request['data']['na_docsRequested'];
    
    $AOI = $request['data']['AOI'];
    $bylaws = $request['data']['bylaws'];
    $GIS = $request['data']['GIS'];
    $AFS = $request['data']['AFS'];

    // --- DATABASE FETCH FROM request_selected_files ---
    $attached_files = [];
    $requestId = checkParamId('id');
    
    // Selecting the filename column directly using your system's global connection token ($conn)
    $query = "SELECT filename FROM request_selected_files WHERE request_id = '$requestId'"; 
    $query_run = mysqli_query($conn, $query);

    if ($query_run && mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $attached_files[] = $row['filename'];
        }
    }
    // --------------------------------------------------
    if ($docsRequested == '1, 2, 3') {
        $pdf = new PDF();
        $pdf->AddPage('P'); 
        $pdf->SetFont('Arial', '', 10);

        // --- HEADER WITH LOGOS ---
        $logo_y = 10;
        $logo_size = 20;

        $pdf->Image('assets/img/bir.png', 10, $logo_y, $logo_size); 
        $pdf->SetFont('Arial', '', 10); 
        $pdf->SetY($logo_y + 2); 
        $pdf->Cell(0, 5, 'Bureau of Internal Revenue', 0, 1, 'C');

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetY($logo_y + 7); 
        $pdf->Cell(0, 10, 'TRANSMITTAL SLIP', 0, 1, 'C');

        $pdf->Image('assets/img/bagong_pilipinas.png', 210 - 10 - $logo_size, $logo_y, $logo_size); 
        $pdf->Ln(10); 

        // --- TO / ATTN / FROM SECTION ---
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'TO              :   ');
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "THE CHIEF\n"));
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "$office\n\n"));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'ATTN         :   ');
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "THE POINT PERSON\n"));
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "$office\n\n"));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'FROM        :   ');
        $pdf->Write(5, "MONSERRAT VENUS A. AXALAN\n");
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, "Chief, Audit Information Tax Exemption and Incentives Division\n\n");

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'SUBJECT  :   ');
        $pdf->Write(5, "Securities and Exchange Commission (SEC) Documents\n");
        $pdf->Cell(23);
        $pdf->Write(5, "Reference No.: ");
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Write(5, "$reference_number\n\n");

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'DATE         :   ');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Write(5, date("F d, Y") . "\n");

        $pdf->Ln(2);
        $pdf->ThickLine(10, $pdf->GetY(), 200, $pdf->GetY()); 
        $pdf->Ln(5);

        // --- BODY TEXT ---
        $pdf->SetFont('Arial', '', 10);
        $body_text = "   In response to your request for SEC documents, enclosed please find the summary of documents received from SEC Swift Corporate and Other Records Exchange (SCORE) Protocol, pursuant to Revenue Memorandum Order (RMO) No. 1-2025, to wit:";
        $pdf->MultiCell(0, 5, $body_text, 0, 'J');
        $pdf->Ln(5);
        // --- TABLE 1 ---
        $w = array(50, 15, 15, 20, 20, 15, 55);
        $header = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Date Received', 'Docs', 'Control Ref No.');

        $pdf->SetFont('Arial', 'B', 8);
        foreach($header as $i => $title) {
            $pdf->Cell($w[$i], 6, $title, 1, 0, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 7);
        
        // 1. Build the base reference text safely
        $refData = trim($request['data']['AOI'] . " " . $request['data']['bylaws'] . " " . $request['data']['GIS'] . " " . $request['data']['AFS']);
        
        // 2. Append dynamic files directly without header and remove .pdf extensions
        if (!empty($attached_files)) {
            foreach ($attached_files as $index => $fileName) {
                $cleanName = str_ireplace('.pdf', '', $fileName);
                $convertedName = iconv('UTF-8', 'windows-1252', $cleanName);
                
                if (!empty($refData) || $index > 0) {
                    $refData .= "\n";
                }
                $refData .= ($index + 1) . ". " . $convertedName;
            }
        }

        // 3. Calculate dynamic height based on the text string lines safely
        $cellWidth = $w[6]; 
        $lines = explode("\n", $refData);
        $nbLines = 0;
        foreach ($lines as $line) {
            $textWidth = $pdf->GetStringWidth($line);
            $nbLines += max(1, ceil($textWidth / ($cellWidth * 0.95)));
        }

        $lineHeight = 3.5; 
        $rowHeight = $nbLines * $lineHeight;
        if ($rowHeight < 7) $rowHeight = 7; 

        // 4. Save current position coordinate anchors
        $startX = $pdf->GetX();
        $startY = $pdf->GetY();

        // 5. Draw row cells
        $pdf->Cell($w[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w[4], $rowHeight, $date_received, 1, 0, 'C');
        $pdf->Cell($w[5], $rowHeight, $docsRequested, 1, 0, 'C');

        // 6. Draw MultiCell for control ref numbers
        $pdf->MultiCell($w[6], $lineHeight, $refData, 1, 'L');
        $pdf->SetXY($startX, $startY + $rowHeight);
        $pdf->Ln(5);

        // --- FOOTER SECTION (IF BLOCK) ---
        $currentY = $pdf->GetY();
        $footerHeightNeeded = 60; 
        if (($currentY + $footerHeightNeeded) > 270) { $pdf->AddPage(); } else { $pdf->SetY($currentY + 10); }

        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Write(4, "1 - Articles of Incorporation and/or By-Laws\n");
        $pdf->Write(4, "2 - General Information Sheet\n");
        $pdf->Write(4, "3 - Audited Financial Statements\n");

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 9);
        $disclaimer = "   All data obtained using the SEC SCORE Protocol shall be considered strictly confidential and shall be utilized exclusively for internal revenue tax purposes. The heads of the concerned offices shall be responsible for all the SEC data obtained and disseminated to their respective offices and the same shall not be divulged to any unauthorized personnel within and outside the Bureau.";
        $pdf->MultiCell(0, 5, $disclaimer, 0, 'J'); 

        $pdf->Ln(2);
        $disclaimer2 = "   Please be reminded of the Data Privacy Act (RA 10173) and Sec. 270 of the National Internal Revenue Code in handling/processing BIR data.";
        $pdf->MultiCell(0, 5, $disclaimer2, 0, 'J');

        $pdf->Ln(2);
        $contact_text = "   You may call Mr. Vladimir Marquez or Ms. " . iconv('UTF-8', 'windows-1252', 'Melanie Recaña') . " at telephone numbers (02) 8981-7268 or (02) 8928-8117 or you may send an email to aiteid_mos@bir.gov.ph for password and instructions in the decryption of the files/folders attached.";
        $pdf->MultiCell(0, 5, $contact_text, 0, 'J');

        $pdf->Ln(5);
        $pdf->Write(5, "   For your information and guidance.");

        // $pdf->Output();
        $directory = $file_path . "Transmittal_Slip/"; 
        $filename = "Transmittal_Slip_" . $reference_number . ".pdf";
        $fullPath = $directory . $filename;

        if (!is_dir($directory)) { mkdir($directory, 0777, true); }
        $pdf->Output('F', $fullPath);

        include('includes/transmittal_mail.php');
        redirect('approval.php', 'Document records saved and request finalisation completed.');
        exit;
    } else {
        // --- ELSE BLOCK ---
        $pdf = new PDF();
        $pdf->AddPage('P'); 
        $pdf->SetFont('Arial', '', 10);

        // --- HEADER WITH LOGOS ---
        $logo_y = 10;
        $logo_size = 20;

        $pdf->Image('assets/img/bir.png', 10, $logo_y, $logo_size); 
        $pdf->SetFont('Arial', '', 10); 
        $pdf->SetY($logo_y + 2); 
        $pdf->Cell(0, 5, 'Bureau of Internal Revenue', 0, 1, 'C');

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetY($logo_y + 7); 
        $pdf->Cell(0, 10, 'TRANSMITTAL SLIP', 0, 1, 'C');

        $pdf->Image('assets/img/bagong_pilipinas.png', 210 - 10 - $logo_size, $logo_y, $logo_size); 
        $pdf->Ln(10); 

        // --- TO / ATTN / FROM SECTION ---
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'TO              :   ');
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "THE CHIEF\n"));
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "$office\n\n"));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'ATTN         :   ');
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "THE POINT PERSON\n"));
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', "$office\n\n"));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'FROM        :   ');
        $pdf->Write(5, "MONSERRAT VENUS A. AXALAN\n");
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(23);
        $pdf->Write(5, "Chief, Audit Information Tax Exemption and Incentives Division\n\n");

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'SUBJECT  :   ');
        $pdf->Write(5, "Securities and Exchange Commission (SEC) Documents\n");
        $pdf->Cell(23);
        $pdf->Write(5, "Reference No.: ");
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Write(5, "$reference_number\n\n");

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Write(5, 'DATE         :   ');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Write(5, date("F d, Y") . "\n");

        $pdf->Ln(2);
        $pdf->ThickLine(10, $pdf->GetY(), 200, $pdf->GetY()); 
        $pdf->Ln(5);

        // --- BODY TEXT ---
        $pdf->SetFont('Arial', '', 10);
        $body_text = "   In response to your request for SEC documents, enclosed please find the summary of documents received from SEC Swift Corporate and Other Records Exchange (SCORE) Protocol, pursuant to Revenue Memorandum Order (RMO) No. 1-2025, to wit:";
        $pdf->MultiCell(0, 5, $body_text, 0, 'J');
        $pdf->Ln(5);

        // --- TABLE 1 ---
        $w = array(50, 15, 15, 20, 20, 15, 55);
        $header = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Date Received', 'Docs', 'Control Ref No.');

        $pdf->SetFont('Arial', 'B', 8);
        foreach($header as $i => $title) {
            $pdf->Cell($w[$i], 6, $title, 1, 0, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 7);
        
        $refData = trim($request['data']['AOI'] . " " . $request['data']['bylaws'] . " " . $request['data']['GIS'] . " " . $request['data']['AFS']);
        
        if (!empty($attached_files)) {
            foreach ($attached_files as $index => $fileName) {
                $cleanName = str_ireplace('.pdf', '', $fileName);
                $convertedName = iconv('UTF-8', 'windows-1252', $cleanName);
                
                if (!empty($refData) || $index > 0) {
                    $refData .= "\n";
                }
                $refData .= ($index + 1) . ". " . $convertedName;
            }
        }

        $cellWidth = $w[6]; 
        $lines = explode("\n", $refData);
        $nbLines = 0;
        foreach ($lines as $line) {
            $textWidth = $pdf->GetStringWidth($line);
            $nbLines += max(1, ceil($textWidth / ($cellWidth * 0.95)));
        }

        $lineHeight = 3.5; 
        $rowHeight = $nbLines * $lineHeight;
        if ($rowHeight < 7) $rowHeight = 7; 

        $startX = $pdf->GetX();
        $startY = $pdf->GetY();

        $pdf->Cell($w[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w[4], $rowHeight, $date_received, 1, 0, 'C');
        $pdf->Cell($w[5], $rowHeight, $docsRequested, 1, 0, 'C');

        $pdf->MultiCell($w[6], $lineHeight, $refData, 1, 'L');
        $pdf->SetXY($startX, $startY + $rowHeight);
        $pdf->Ln(5);

        // --- SECOND TABLE ---
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 7, 'No files / SEC documents are available for the following taxpayers as of this date:', 0, 1, 'L');

        $w2 = array(50, 15, 15, 40, 15);
        $header2 = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Docs');

        $pdf->SetFont('Arial', 'B', 8);
        for($i=0; $i<count($header2); $i++) {
            $pdf->Cell($w2[$i], 7, $header2[$i], 1, 0, 'C');
        }
        $pdf->Ln();
        
        $pdf->SetFont('Arial', '', 7);
        $rowHeight = 7; 
        $pdf->Cell($w2[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w2[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w2[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w2[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w2[4], $rowHeight, $na_docsRequested, 1, 0, 'C');
        $pdf->Ln(2);

        // --- FOOTER SECTION (ELSE BLOCK) ---
        $currentY = $pdf->GetY();
        $footerHeightNeeded = 60; 
        if (($currentY + $footerHeightNeeded) > 270) { $pdf->AddPage(); } else { $pdf->SetY($currentY + 10); }

        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Write(4, "1 - Articles of Incorporation and/or By-Laws\n");
        $pdf->Write(4, "2 - General Information Sheet\n");
        $pdf->Write(4, "3 - Audited Financial Statements\n");

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 9);
        $disclaimer = "   All data obtained using the SEC SCORE Protocol shall be considered strictly confidential and shall be utilized exclusively for internal revenue tax purposes. The heads of the concerned offices shall be responsible for all the SEC data obtained and disseminated to their respective offices and the same shall not be divulged to any unauthorized personnel within and outside the Bureau.";
        $pdf->MultiCell(0, 5, $disclaimer, 0, 'J'); 

        $pdf->Ln(2);
        $disclaimer2 = "   Please be reminded of the Data Privacy Act (RA 10173) and Sec. 270 of the National Internal Revenue Code in handling/processing BIR data.";
        $pdf->MultiCell(0, 5, $disclaimer2, 0, 'J');

        $pdf->Ln(2);
        $contact_text = "   You may call Mr. Vladimir Marquez or Ms. " . iconv('UTF-8', 'windows-1252', 'Melanie Recaña') . " at telephone numbers (02) 8981-7268 or (02) 8928-8117 or you may send an email to aiteid_mos@bir.gov.ph for password and instructions in the decryption of the files/folders attached.";
        $pdf->MultiCell(0, 5, $contact_text, 0, 'J');

        $pdf->Ln(5);
        $pdf->Write(5, "   For your information and guidance.");

        // $pdf->Output();

        $directory = $file_path . "Transmittal_Slip/"; 
        $filename = "Transmittal_Slip_" . $reference_number . ".pdf";
        $fullPath = $directory . $filename;

        if (!is_dir($directory)) { mkdir($directory, 0777, true); }
        $pdf->Output('F', $fullPath);

        include('includes/transmittal_mail.php');
        redirect('approval.php', 'Document records saved and request finalisation completed.');
        exit;
    }
} 
?>
