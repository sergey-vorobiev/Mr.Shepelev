var wavesurfer = WaveSurfer.create({
    container: document.querySelector('#waveform'),
    waveColor: '#D9DCFF',
    progressColor: '#4353FF',
    cursorColor: '#4353FF',
    barWidth: 0.7,
    height: 100
});

wavesurfer.load('../public/music/music4.mp3');

wavesurfer.on('ready', function () {
    wavesurfer.play();
});
