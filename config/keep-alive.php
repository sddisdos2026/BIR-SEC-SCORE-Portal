<?php
session_start();
if(isset($_SESSION['auth'])) {
    $_SESSION['last_login_timestamp'] = time();
    echo "Session updated";
}
?>