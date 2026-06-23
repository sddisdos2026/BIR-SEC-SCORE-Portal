<?php

define('db_server', "localhost");
define('db_username', "root");
define('db_password', "");
define('db_database', "test");

$conn = mysqli_connect(db_server, db_username, db_password, db_database, 3307);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>