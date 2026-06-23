<?php

require '../config/function.php';

include('authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon"/>
  <title>
    BIR-SEC Swift Corporate and Other Records Exchange (SCORE) Portal
  </title>
  <!--     Fonts and icons     -->
  <link href="assets/css/fonts-googleapis.css" rel="stylesheet" />
  
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-icons.min.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  
  <!-- Font Awesome Icons -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link id="pagestyle" href="assets/css/dataTables.bootstrap5.css" rel="stylesheet" />
  <!-- <link id="pagestyle" href="assets/css/bootstrap.min.css" rel="stylesheet" /> -->
  <link href="assets/css/styles.css" rel="stylesheet" />

  <!-- DataTables -->
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css" />

  <!-- SELECT 2 -->
  <link href="assets\css\select2.min.css" rel="stylesheet" />

  <!-- Year Picker -->
  <link href="assets\css\yearpicker.css" rel="stylesheet" />
  <script>
    $('.yearpicker').yearpicker()
  </script>

  <?php if (!isset($is_pdf_page)): ?>

<script>
let timeoutDuration = 300; // 5 minutes in seconds
let timeRemaining = timeoutDuration;
let lastPing = 0;

// Function to update the session on the server
function pingServer() {
    let now = Date.now();
    if (now - lastPing > 60000) { // Throttle: only ping once per minute
        fetch('keep-alive.php')
            .then(() => console.log("%c Session refreshed on server ", "background: #28a745; color: #fff"))
            .catch(err => console.error("Refresh failed", err));
        lastPing = now;
    }
}

// Reset the countdown and ping the server
function resetTimer() {
    timeRemaining = timeoutDuration;
    pingServer();
}

// Listen for activity
document.addEventListener('mousemove', resetTimer);
document.addEventListener('keypress', resetTimer);
document.addEventListener('scroll', resetTimer);

// The Console Timer Logic
setInterval(function() {
    timeRemaining--;

    // Format seconds into MM:SS
    let minutes = Math.floor(timeRemaining / 60);
    let seconds = timeRemaining % 60;
    let displaySeconds = seconds < 10 ? '0' + seconds : seconds;

    // Clear console and show timer (Optional: remove console.clear() if you want history)
    console.clear();
    console.log(`%c Session Timeout in: ${minutes}:${displaySeconds} `, "color: #ff0000; font-weight: bold; font-size: 14px;");
    console.log("Status: Monitoring activity (Hover, Scroll, or Type to reset)");

    if (timeRemaining <= 0) {
        console.log("Session Expired. Redirecting...");
        window.location.href = "logout.php";
    }
}, 1000); // Update every 1 second
</script>

<?php endif; ?>

</head>

<body class="g-sidenav-show  bg-gray-100 ">

    <?php include('sidebar.php') ?> 
    
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

          <?php include('navbar.php') ?> 

                <div class="container-fluid py-4">
