<?php

// load files from audio/
$handle = opendir("audio/");

$files = array();
while (($file = readdir($handle)) !== false) {
	if ($file != "." && $file != "..") {
		array_push($files, $file);
	}
}

closedir($handle);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>Crosswrite</title>

		<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8" />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type="text/javascript"></script>
		<script src="jquery.hotkeys.js" type="text/javascript"></script>

		<script src="crosswrite.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<h1>Crosswrite</h1>

		<div id="page">
			<sidebar>
				<h2>Files</h2>
				<ul id="files">
				<?php foreach ($files as $file) { ?>
					<li><?php echo $file; ?></li>
				<?php } ?>
				</ul>

				<form enctype="multipart/form-data" action="upload.php" method="POST">
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
					<input name="audiofile" type="file" />
					<input type="submit" value="Upload File" class="button" />
				</form>
			</sidebar>
			<article>
				<section id="audio_container">
					<h2>No file loaded.</h2>
					<audio id="audio" src="your_audio.mp3" controls="true"></audio>
				</section>	
				<section>
					<textarea id="transcript" name="transcript"></textarea>
				</section>

				<small>
					<ul>
						<li><b>Play/pause:</b> ctrl+p</li>
						<li><b>Rewind 5 seconds:</b> ctrl+j</li>
						<li><b>Fast forward 5 seconds:</b> ctrl+k</li>
						<li><b>Rewind 30 seconds:</b> ctrl+h</li>
						<li><b>Fast forward 30 seconds:</b> ctrl+l</li>
						<li><b>Jump to beginning:</b> ctrl+0</li>
						<li><b>Jump to end:</b> ctrl+9</li>
						<li><b>Increase volume:</b> ctrl+1</li>
						<li><b>Decrease volume:</b> ctrl+2</li>
					</ul>
				</small>
			</article>
		</div>
	</body>
</html>
