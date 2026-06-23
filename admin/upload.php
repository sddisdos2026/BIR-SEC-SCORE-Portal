<?php
require '../config/function.php';

include('authentication.php');

$id = $row['id'];
$full_name = $row['first_name'] . ' ' . $row['last_name'];
$email =  $row['email'];    
$ip = getClientIp();   
$user_id = validate($_POST["user_id"]);

date_default_timezone_set("Asia/Manila");
$date = date("Y-m-d h:i:sa");

foreach ($_FILES['upload']['name'] as $key => $name){

    $file_path = "./uploads/" . $name;

    $sql = mysqli_query($conn, "SELECT * FROM upload WHERE filename='$name'");
    $query = mysqli_num_rows($sql);

    if($query){
        redirectfailed('file_upload.php', 'File is already uploaded.');
    } 

     $file_type_substr = substr($name, 0, 3);

        switch($file_type_substr) {
            case "AOI":
                $file_type = "Articles of Incorporation";

        	    move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'uploads/' . $name);
	            $file_path = './uploads/' . $name;

                $query2 = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                VALUES('$full_name', '$email', '$name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
	            mysqli_query($conn,$query2);
                include('includes/audit/upload.php');

                break;
            case "BL-":
                $file_type = "By-Laws";

        	    move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'uploads/' . $name);
	            $file_path = './uploads/' . $name;

                $query2 = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                VALUES('$full_name', '$email', '$name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
	            mysqli_query($conn,$query2);
                include('includes/audit/upload.php');

                break;
            case "GIS":
                $file_type = "General Information Sheet";

        	    move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'uploads/' . $name);
	            $file_path = './uploads/' . $name;

                $query2 = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                VALUES('$full_name', '$email', '$name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
	            mysqli_query($conn,$query2);
                include('includes/audit/upload.php');                

                break;
            case "AFS":
                $file_type = "Audited Financial Statements";

        	    move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'uploads/' . $name);
	            $file_path = './uploads/' . $name;

                $query2 = "INSERT INTO upload(name, email, filename, ip_address, file_path, user_id, file_type, upload_date) 
                VALUES('$full_name', '$email', '$name', '$ip', '$file_path', '$user_id', '$file_type', '$date')";
	            mysqli_query($conn,$query2);
                include('includes/audit/upload.php');

                break;
            default:
                redirectfailed('file_upload.php', 'One of the submitted files has an unsupported file name/type. Please re-upload using a valid file name format.');
        }
}

redirect('file_upload.php', 'File has been uploaded.');

?>