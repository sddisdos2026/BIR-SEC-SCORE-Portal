
<?php
extract($_REQUEST);
include('../config/dbcon.php');
include('../config/function.php');

$sql=mysqli_query($conn,"select * from upload where id='$del'");
$row=mysqli_fetch_array($sql);
        
$file_path = $row['file_path'];

unlink($file_path);

mysqli_query($conn,"delete from upload where id='$del'");

redirectfailed('file_upload.php', 'File has been deleted.');

?>