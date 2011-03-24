function play_toggle() {
	audio = $("audio#audio")[0];
	if (audio.paused) {
		audio.play(); 
	} else {
		audio.pause();
	}
	return false;
}

function rewind() {
	audio = $("audio#audio")[0];
	console.log("here");
	audio.currentTime = audio.currentTime - 5;
	return false;
}

function rewind_30() {
	audio = $("audio#audio")[0];
	audio.currentTime = audio.currentTime - 30;
	return false;
}

function fast_forward() {
	audio = $("audio#audio")[0];
	audio.currentTime = audio.currentTime + 5;
	return false;
}

function fast_forward_30() {
	audio = $("audio#audio")[0];
	audio.currentTime = audio.currentTime + 30; 
	return false;
}

function jump_to_beginning() {
	audio = $("audio#audio")[0];
	audio.currentTime = 0; 
	return false;
}

function jump_to_end() {
	audio = $("audio#audio")[0];
	audio.currentTime = audio.duration; 
	return false;
}

function inc_volume() {
	audio = $("audio#audio")[0];
	if (audio.volume < 1) audio.volume += 0.2;
	return false;
}

function dec_volume() {
	audio = $("audio#audio")[0];
	if (audio.volume > 0) audio.volume -= 0.2;
	return false;
}

function load_file(filename) {
	audio = $("audio#audio")[0];
	audio.src = "audio/" + filename;
	$("#audio_container h2").html(filename + " (loading...)");

	$(audio).bind('progress', function() {
	    var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
		$("#audio_container h2").html(filename + " (loading, " + loaded + "%)");
		if (loaded == 100) {
			var minutes = audio.duration / 60;
			var seconds = audio.duration % 60;
			$("#audio_container h2").html(filename + " (" + minutes + ":" + seconds + ")");
		}
	});

	$("#transcript").focus();
}

// MAIN

$(document).ready(function() {
	$("#transcript").focus();

	// Play/pause toggle
	$("#transcript").bind("keydown", "ctrl+p", play_toggle);

	// Rewind and fast forward
	$("#transcript").bind("keydown", "ctrl+h", rewind_30);	
	$("#transcript").bind("keydown", "ctrl+j", rewind);	
	$("#transcript").bind("keydown", "ctrl+k", fast_forward);
	$("#transcript").bind("keydown", "ctrl+l", fast_forward_30);

	// Jump to beginning/end
	$("#transcript").bind("keydown", "ctrl+0", jump_to_beginning);
	$("#transcript").bind("keydown", "ctrl+9", jump_to_end);

	// Volume controls
	$("#transcript").bind("keydown", "ctrl+1", inc_volume);
	$("#transcript").bind("keydown", "ctrl+2", dec_volume);

	$("ul#files li").click(function() {
		load_file($(this).html());
	});
});
