<?php
require '../config/function.php';
include('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Print Audit Trail - SCORE Portal</title>
    
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />

    <style>
        /* Table Styling for Print */
        .print-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .print-table th, .print-table td {
            border: 1px solid #dee2e6;
            padding: 8px 12px;
            text-align: left;
            font-size: 12px;
        }
        .print-table th {
            background-color: #f8f9fa !important;
            color: #344767 !important;
            text-transform: uppercase;
        }
        
        /* Header for the Printed Document */
        .report-header {
            display: none; /* Hidden on screen, shown on print */
            text-align: center;
            margin-bottom: 30px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            .report-header {
                display: block;
            }
            body {
                background-color: white !important;
                margin: 0;
                padding: 0;
            }
            .card {
                box-shadow: none !important;
                border: none !important;
            }
            @page {
                size: landscape; /* Better for audit trails with many columns */
                margin: 1cm;
            }
        }
    </style>
</head>

<body class="bg-white">

<div class="container-fluid py-4">
    <!-- Action Buttons (Hidden on Print) -->
    <div class="row no-print mb-4">
        <div class="col-12 d-flex justify-content-between">
            <h4 class="mb-0">Print Preview</h4>
            <div>
                <a class="btn btn-secondary btn-sm mb-0" href="audit_trail.php">Back</a>
                <button class="btn btn-primary btn-sm mb-0" onClick="window.print();">
                    <i class="fa fa-print me-1"></i> Print Report
                </button>
            </div>
        </div>
        <hr class="horizontal dark mt-3">
    </div>

    <!-- Report Header (Visible only on Print) -->
    <div class="report-header">
        <h3 class="font-weight-bolder">BIR-SEC SCORE Portal</h3>
        <h5>System Audit Trail Report</h5>
        <p class="text-sm">Generated on: <?php echo date('F d, Y h:i A'); ?></p>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="print-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Office / RDO</th>
                        <th>Transaction</th>
                        <th>Date & Time</th>
                        <th>Role</th>
                        <th>IP Address</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = 0;
                        $sql = "SELECT * FROM logs ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id++;
                        ?>
                    <tr>
                        <td><strong><?php echo $id;?></strong></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['office']; ?></td>
                        <td><span class="badge badge-sm border text-dark"><?php echo $row['transaction_type']; ?></span></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($row['date_created'])); ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><small><?php echo $row['ip_address']; ?></small></td>
                        <td style="max-width: 200px; word-wrap: break-word;"><?php echo $row['remarks']; ?></td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
            
            <!-- Footer for Print -->
            <div class="report-header mt-5">
                <div class="row mt-5">
                    <div class="col-4 text-center">
                        <hr class="horizontal dark">
                        <p class="text-xs">Prepared By</p>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4 text-center">
                        <hr class="horizontal dark">
                        <p class="text-xs">Noted By</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>