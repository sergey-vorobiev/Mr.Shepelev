var wavesurfer = WaveSurfer.create({
    container: document.querySelector('#waveform'),
    barWidth: 0.8,
    barHeight: 0.6,
    barGap: null,
    height: 100,
});

// $playAndPause = document.getByElementId('playAndPause');
var duration_track = document.getElementById('duration_track');
var now_time_timeline = document.getElementById('now_time_timeline');
var playAndPause_p = document.getElementById('playAndPause_p');

var now_playing = wavesurfer.isPlaying();
var now_seconds = wavesurfer.getCurrentTime();

var now_seconds_value;
var now_minutes_value;

function time(duration){

	now_seconds = Math.round(duration);

    if(now_seconds % 60 < 10)
        now_seconds_value = '0' + now_seconds % 60;
    else if(now_seconds > 60){
        now_seconds_value = now_seconds % 60;
    }
    else
        now_seconds_value = now_seconds;

    if(Math.floor(now_seconds / 60) < 10)
        now_minutes_value = '0' + Math.floor(now_seconds / 60);
    else
        now_minutes_value = now_minutes;

    return now_minutes_value + ':' + now_seconds_value;
}

function playAndPause(){
	if(now_playing){
    	wavesurfer.pause();
    	playAndPause_p.style.backgroundImage = "url('../public/img/play-in-block.png')";
    	now_playing = false;
	}
	else{
    	wavesurfer.play();
    	playAndPause_p.style.backgroundImage = "url('../public/img/pause-in-block.png')";
    	now_playing = true;
	}
}

wavesurfer.on('ready', function () {

	duration_track.textContent = time(wavesurfer.getDuration());

});

wavesurfer.on('audioprocess', function () {

	now_time_timeline.textContent = time(wavesurfer.getCurrentTime());

});