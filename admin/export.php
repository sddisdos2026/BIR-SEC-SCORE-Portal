<?php

include('../config/dbcon.php');
require './includes/SimpleXLSXGen.php';

use Shuchkin\SimpleXLSXGen;

$users = [
    ['id', 'name', 'office', 'transaction_type', 'date_created', 'role', 'ip_address', 'remarks']
];

$id = 0;

$query = "SELECT * FROM logs";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    foreach($result as $row) {
        $id++;
        $users = array_merge($users, array(array($id, $row['name'], $row['office'], $row['transaction_type'], $row['date_created'], $row['role'], $row['ip_address'], $row['remarks'])));
    }
}

$xlsx = SimpleXLSXGen::fromArray($users);
$xlsx->downloadAs("Audit_Trail.xlsx");

?>