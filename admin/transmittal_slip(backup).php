<?php
require_once('../config/function.php');
require_once 'assets/fpdf/fpdf.php'; // Changed to require_once

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
    $elaNum = $request['data']['elaNum'];
    $office = $request['data']['office'];
    $reference_number = $request['data']['reference_number'];
    $pp_name = $request['data']['pp_name'];
    $elaNum = $request['data']['elaNum'] == 'N/A' ? NULL:$request['data']['elaNum'];
    $fanNum = $request['data']['fanNum'] == 'N/A' ? NULL:$request['data']['fanNum'];
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

    if ($docsRequested == '1, 2, 3') {
        $pdf = new PDF();
        $pdf->AddPage('P'); 
        $pdf->SetFont('Arial', '', 10);

        // --- HEADER WITH LOGOS ---
        $logo_y = 10; // Vertical position
        $logo_size = 20; // Width/Height

        // Left Logo
        // Replace 'logo_left.png' with your actual file path
        $pdf->Image('assets/img/bir.png', 10, $logo_y, $logo_size); 

        // Bureau of Internal Revenue (Smaller font)
        $pdf->SetFont('Arial', '', 10); // Adjust size '10' as needed
        $pdf->SetY($logo_y + 2); // Position it slightly higher than the title
        $pdf->Cell(0, 5, 'Bureau of Internal Revenue', 0, 1, 'C');

        // Title (Centered)
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetY($logo_y + 7); // Increased offset slightly to prevent overlapping
        $pdf->Cell(0, 10, 'TRANSMITTAL SLIP', 0, 1, 'C');

        // Right Logo
        // Replace 'logo_right.png' with your actual file path
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

        // --- TABLE 1 (WITH DYNAMIC WORD WRAP ALIGNMENT) ---
        $w = array(50, 15, 15, 20, 20, 15, 55);
        $header = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Date Received', 'Docs', 'Control Ref No.');

        $pdf->SetFont('Arial', 'B', 8);
        foreach($header as $i => $title) {
            $pdf->Cell($w[$i], 6, $title, 1, 0, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 7);

        // Prepare content for the last cell
        $refData = trim($request['data']['AOI'] . " " . $request['data']['bylaws'] . " " . $request['data']['GIS'] . " " . $request['data']['AFS']);

        // --- MANUAL LINE CALCULATION ---
        $cellWidth = $w[6]; // Width of the Control Ref No column
        $textWidth = $pdf->GetStringWidth($refData);

        // Estimate lines: Divide total width by cell width and round up
        // We add a slight margin (0.9 multiplier) to account for word breaks
        $nbLines = ceil($textWidth / ($cellWidth * 0.9));
        if ($nbLines < 1) $nbLines = 1;

        $lineHeight = 4; // Height per line of text
        $rowHeight = $nbLines * $lineHeight;

        // Ensure a minimum row height for short text
        if ($rowHeight < 7) $rowHeight = 7;

        // 1. Draw static-height cells using the calculated $rowHeight
        $pdf->Cell($w[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w[4], $rowHeight, $date_received, 1, 0, 'C');
        $pdf->Cell($w[5], $rowHeight, $docsRequested, 1, 0, 'C');

        // 2. Draw the wrapped cell using MultiCell
        $currX = $pdf->GetX();
        $currY = $pdf->GetY();

        $pdf->MultiCell($w[6], $lineHeight, $refData, 1, 'C');

        // 3. Force the cursor to move to the next section correctly
        $pdf->SetXY($pdf->GetPageWidth() - ($pdf->GetPageWidth() - 10), $currY + $rowHeight);

        // FIX: Set position based on the current Y coordinate instead of a fixed Ln
        $currentY = $pdf->GetY();
        $footerHeightNeeded = 60; // Estimated height for all footer notes and disclaimers

        // Check if we need a new page before starting the footer
        if (($currentY + $footerHeightNeeded) > 270) { // 270 is near the bottom of A4
            $pdf->AddPage();
        } else {
            $pdf->SetY($currentY + 10); 
        }

        // --- JUSTIFIED FOOTER NOTES & DISCLAIMER ---
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Write(4, "1 - Articles of Incorporation and/or By-Laws\n");
        $pdf->Write(4, "2 - General Information Sheet\n");
        $pdf->Write(4, "3 - Audited Financial Statements\n");

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 9);

        $disclaimer = "   All data obtained using the SEC SCORE Protocol shall be considered strictly confidential and shall be utilized exclusively for internal revenue tax purposes. The heads of the concerned offices shall be responsible for all the SEC data obtained and disseminated to their respective offices and the same shall not be divulged to any unauthorized personnel within and outside the Bureau.";
        $pdf->MultiCell(0, 5, $disclaimer, 0, 'J'); // 'J' for Justified

        $pdf->Ln(2);
        $disclaimer2 = "   Please be reminded of the Data Privacy Act (RA 10173) and Sec. 270 of the National Internal Revenue Code in handling/processing BIR data.";
        $pdf->MultiCell(0, 5, $disclaimer2, 0, 'J');

        $pdf->Ln(2);
        // Use iconv for special characters like 'ñ'
        $contact_text = "   You may call Mr. Vladimir Marquez or Ms. " . iconv('UTF-8', 'windows-1252', 'Melanie Recaña') . " at telephone numbers (02) 8981-7268 or (02) 8928-8117 or you may send an email to aiteid_mos@bir.gov.ph for password and instructions in the decryption of the files/folders attached.";
        $pdf->MultiCell(0, 5, $contact_text, 0, 'J');

        $pdf->Ln(5);
        $pdf->Write(5, "   For your information and guidance.");

        // --- DIRECTORY AND FILENAME SETUP ---
        // $file_path seems to contain your hashed folder path from the database
        $directory = $file_path . "Transmittal_Slip/"; 
        $filename = "Transmittal_Slip_" . $reference_number . ".pdf";
        $fullPath = $directory . $filename;

        // Create folder if it doesn't exist (0777 for permissions, true for recursive)
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // 1. Save the file to the server ('F')
        $pdf->Output('F', $fullPath);

        // // 2. Force download in the browser ('D')
        // // $pdf->Output('D', $filename);

    } else {

        $pdf = new PDF();
        $pdf->AddPage('P'); 
        $pdf->SetFont('Arial', '', 10);

        // --- HEADER WITH LOGOS ---
        $logo_y = 10; // Vertical position
        $logo_size = 20; // Width/Height

        // Left Logo
        // Replace 'logo_left.png' with your actual file path
        $pdf->Image('assets/img/bir.png', 10, $logo_y, $logo_size); 

        // Bureau of Internal Revenue (Smaller font)
        $pdf->SetFont('Arial', '', 10); // Adjust size '10' as needed
        $pdf->SetY($logo_y + 2); // Position it slightly higher than the title
        $pdf->Cell(0, 5, 'Bureau of Internal Revenue', 0, 1, 'C');

        // Title (Centered)
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetY($logo_y + 7); // Increased offset slightly to prevent overlapping
        $pdf->Cell(0, 10, 'TRANSMITTAL SLIP', 0, 1, 'C');

        // Right Logo
        // Replace 'logo_right.png' with your actual file path
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

        // --- TABLE 1 (WITH DYNAMIC WORD WRAP ALIGNMENT) ---
        $w = array(50, 15, 15, 20, 20, 15, 55);
        $header = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Date Received', 'Docs', 'Control Ref No.');

        $pdf->SetFont('Arial', 'B', 8);
        foreach($header as $i => $title) {
            $pdf->Cell($w[$i], 6, $title, 1, 0, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 7);

        // Prepare content for the last cell
        $refData = trim($request['data']['AOI'] . " " . $request['data']['bylaws'] . " " . $request['data']['GIS'] . " " . $request['data']['AFS']);

        // --- MANUAL LINE CALCULATION ---
        $cellWidth = $w[6]; // Width of the Control Ref No column
        $textWidth = $pdf->GetStringWidth($refData);

        // Estimate lines: Divide total width by cell width and round up
        // We add a slight margin (0.9 multiplier) to account for word breaks
        $nbLines = ceil($textWidth / ($cellWidth * 0.9));
        if ($nbLines < 1) $nbLines = 1;

        $lineHeight = 4; // Height per line of text
        $rowHeight = $nbLines * $lineHeight;

        // Ensure a minimum row height for short text
        if ($rowHeight < 7) $rowHeight = 7;

        // 1. Draw static-height cells using the calculated $rowHeight
        $pdf->Cell($w[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w[4], $rowHeight, $date_received, 1, 0, 'C');
        $pdf->Cell($w[5], $rowHeight, $docsRequested, 1, 0, 'C');

        // 2. Draw the wrapped cell using MultiCell
        $currX = $pdf->GetX();
        $currY = $pdf->GetY();

        $pdf->MultiCell($w[6], $lineHeight, $refData, 1, 'C');

        // 3. Force the cursor to move to the next section correctly
        $pdf->SetXY($pdf->GetPageWidth() - ($pdf->GetPageWidth() - 10), $currY + $rowHeight);
        $pdf->Ln(5);


        // --- SECOND TABLE (5 COLUMNS) ---
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 7, 'No files / SEC documents are available for the following taxpayers as of this date:', 0, 1, 'L');

        // Adjusted column widths to fit the standard 190mm usable width (A4)
        $w2 = array(50, 15, 15, 40, 15);
        $header2 = array('Name of Corporation', 'TIN', 'eLA/FAN', 'Year/s', 'Docs');

        $pdf->SetFont('Arial', 'B', 8);
        for($i=0; $i<count($header2); $i++) {
            $pdf->Cell($w2[$i], 7, $header2[$i], 1, 0, 'C');
        }

        $pdf->Ln();
        $pdf->SetFont('Arial', '', 7);

        // Row height logic
        $rowHeight = 7; 
        $pdf->Cell($w2[0], $rowHeight, $nameOfCorp, 1);
        $pdf->Cell($w2[1], $rowHeight, $tin, 1, 0, 'C');
        $pdf->Cell($w2[2], $rowHeight, $elaNum . $fanNum, 1, 0, 'C');
        $pdf->Cell($w2[3], $rowHeight, $taxYear, 1, 0, 'C');
        $pdf->Cell($w2[4], $rowHeight, $na_docsRequested, 1, 0, 'C');

        // FIX: Set position based on the current Y coordinate instead of a fixed Ln
        $currentY = $pdf->GetY();
        $footerHeightNeeded = 60; // Estimated height for all footer notes and disclaimers

        // Check if we need a new page before starting the footer
        if (($currentY + $footerHeightNeeded) > 270) { // 270 is near the bottom of A4
            $pdf->AddPage();
        } else {
            $pdf->SetY($currentY + 10); 
        }

        // --- JUSTIFIED FOOTER NOTES & DISCLAIMER ---
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Write(4, "1 - Articles of Incorporation and/or By-Laws\n");
        $pdf->Write(4, "2 - General Information Sheet\n");
        $pdf->Write(4, "3 - Audited Financial Statements\n");

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 9);

        $disclaimer = "   All data obtained using the SEC SCORE Protocol shall be considered strictly confidential and shall be utilized exclusively for internal revenue tax purposes. The heads of the concerned offices shall be responsible for all the SEC data obtained and disseminated to their respective offices and the same shall not be divulged to any unauthorized personnel within and outside the Bureau.";
        $pdf->MultiCell(0, 5, $disclaimer, 0, 'J'); // 'J' for Justified

        $pdf->Ln(2);
        $disclaimer2 = "   Please be reminded of the Data Privacy Act (RA 10173) and Sec. 270 of the National Internal Revenue Code in handling/processing BIR data.";
        $pdf->MultiCell(0, 5, $disclaimer2, 0, 'J');

        $pdf->Ln(2);
        // Use iconv for special characters like 'ñ'
        $contact_text = "   You may call Mr. Vladimir Marquez or Ms. " . iconv('UTF-8', 'windows-1252', 'Melanie Recaña') . " at telephone numbers (02) 8981-7268 or (02) 8928-8117 or you may send an email to aiteid_mos@bir.gov.ph for password and instructions in the decryption of the files/folders attached.";
        $pdf->MultiCell(0, 5, $contact_text, 0, 'J');

        $pdf->Ln(5);
        $pdf->Write(5, "   For your information and guidance.");
        // $pdf->Output();

        // --- DIRECTORY AND FILENAME SETUP ---
        // $file_path seems to contain your hashed folder path from the database
        $directory = $file_path . "Transmittal_Slip/"; 
        $filename = "Transmittal_Slip_" . $reference_number . ".pdf";
        $fullPath = $directory . $filename;

        // Create folder if it doesn't exist (0777 for permissions, true for recursive)
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // 1. Save the file to the server ('F')
        $pdf->Output('F', $fullPath);

        // // 2. Force download in the browser ('D')
        // // $pdf->Output('D', $filename);
    }
} 
?>

