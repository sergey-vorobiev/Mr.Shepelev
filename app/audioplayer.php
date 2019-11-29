<div id="audioplayer" class="container-audioplayer">
	<div class="audioplayer">
		<a href="#">
			<div class="audioplayer_album_img"></div>
		</a>
		<div class="control-button">
			<button onclick="NextTrack()" class="previous"></button>
			<button id="pButton" class="play"></button>
			<button onclick="PreviousTrack()" class="next"></button>
		</div>
		<div class="main-time-line">
			<div class="info-music">
				<div class="left-content">
					<a id="audioplayer_title" href="#">Footer Lorem</a>
					<a id="audioplayer_autor" href="#">Mr.Shepelev</a>
				</div>
				<div class="right-content">
					<!-- <i>Ссылка на альбом</i> -->
				</div>
			</div>
			<div class="audio-line-info">
				<span>00:00</span>
				<div id="timeline" class="timeline">
					<div id="playhead" class="playhead"></div>
				</div>
				<span id="audioplayer_durations">00:00</span>
			</div>
		</div>
	</div>
</div>
<button id="closeButton" onclick="visibleAP()" class="close visible-audioplayer"></button>

<script src="public/js/audioplayer.js"></script>