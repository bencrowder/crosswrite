<?php

$filename = $_POST["filename"];
$transcript = "transcripts/" . pathinfo($filename, PATHINFO_FILENAME) . ".txt";

if (file_exists($transcript)) {
	$text = file_get_contents($transcript);

	echo json_encode(array("statuscode" => "success", "text" => $text));
} else {
	// file doesn't exist, so just return an empty string

	echo json_encode(array("statuscode" => "success", "text" => ""));
}

?>
