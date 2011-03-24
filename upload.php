<?php

$uploaddir = getcwd() . '/audio/';
$uploadfile = $uploaddir . basename($_FILES['audiofile']['name']);

if (move_uploaded_file($_FILES['audiofile']['tmp_name'], $uploadfile)) {
	header("Location: index.php");
} else {
	$errorcode = $_FILES['audiofile']['error'];
	switch ($errorcode) {
		case 1: echo "File too big. Fix upload_max_filesize in your php.ini file."; break;
		case 2: echo "File too big. Fix MAX_FILE_SIZE."; break;
		case 3: echo "The file only uploaded partially. Maybe there's network trouble?"; break;
		case 7: echo "Can't write file to disk. Check permissions."; break;
		default: echo "Something went wrong with uploading the file (error code $errorcode). Sorry!"; break;
	}
}

?>
