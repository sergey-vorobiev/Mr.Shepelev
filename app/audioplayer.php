<div id="audioplayer" class="container-audioplayer">
	<div class="audioplayer">
		<a href="#">
			<div class="audioplayer_album_img"></div>
		</a>
		<div class="control-button">
			<button onclick="PreviousTrack()" class="previous"></button>
			<button id="pButton" class="play"></button>
			<button onclick="NextTrack()" class="next"></button>
		</div>
		<div class="main-time-line">
			<div class="info-music">
				<div class="left-content">
					<a id="audioplayer_title" href="#" target="_blank">0x</a>
					<a id="audioplayer_autor" href="MrShepelev.php" target="_blank">Mr.Shepelev</a>
				</div>
			</div>
			<div class="audio-line-info">
				<span id="audioplayer_current">00:00</span>
				<div id="timeline" class="timeline">
					<div id="playhead" class="playhead"></div>
				</div>
				<span id="audioplayer_durations">00:00</span>
			</div>
		</div>
	</div>
</div>
<button id="closeButton" onclick="visibleAP()" class="open visible-audioplayer"></button>

<script src="public/js/audioplayer.js"></script>