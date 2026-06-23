<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$zip_fname = "uploads/RR8B-RDO 53B-SEC2025-00003.zip";
	if(is_file($zip_fname))
	unlink($zip_fname);

	$zip = new ZipArchive();
	if ($zip->open($zip_fname, ZIPARCHIVE::CREATE )!==TRUE) {
		die("Can't open {$zip_fname} file.");
	}
	foreach($_POST['fileName'] as $file)
	{
		$zip->addFile("uploads/".$file, $file);
	}

    $zip->close();

    // DOWNLOAD ZIP FILE
	
    // header("Content-type: application/zip"); 
	// header("Content-Disposition: attachment; filename=$zip_fname"); 
	// header("Pragma: no-cache"); 
	// header("Expires: 0"); 
	// readfile("$zip_fname");

    //END
}
?>