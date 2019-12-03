var wavesurfer = WaveSurfer.create({
    container: document.querySelector('#waveform'),
    barWidth: 0.8,
    barHeight: 0.7,
    barGap: null,
    height: 100
});

wavesurfer.on('ready', function () {
    wavesurfer.play();
});
