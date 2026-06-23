<?php

require 'config/function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?php if(isset($pageTitle)) { echo $pageTitle; } else { echo "Home"; }?>
  </title>
  <link href="assets/css/font.css" rel="stylesheet" />
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon"/>
</head>

<body class="">