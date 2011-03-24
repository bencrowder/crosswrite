<?php

$filename = $_POST["filename"];
$transcript = "transcripts/" . pathinfo($filename, PATHINFO_FILENAME) . ".txt";

$text = $_POST["text"];

$f = fopen($transcript, "w");
fwrite($f, $text);
fclose($f);

echo json_encode(array("statuscode" => "success"));

?>
