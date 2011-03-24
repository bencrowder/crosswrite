<?php


$filename = $_POST["filename"];
$transcript = "transcripts/" . pathinfo($filename, PATHINFO_FILENAME) . ".txt";

$text = $_POST["text"];

echo json_encode(array("statuscode" => $filename . "|" . $text));

$error = false;

// write the file to disk
if (!$f = fopen($transcript, "w")) { $error = true; }
if (!fwrite($f, $text)) { $error = true; }
fclose($f);

if ($error) {
	echo json_encode(array("statuscode" => "error"));
} else {
	echo json_encode(array("statuscode" => "success"));
}

?>
