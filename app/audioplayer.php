<audio id="music" preload="true">
	<source src="public/music/music1.mp3">
</audio>
<div id="audioplayer" class="container-audioplayer">
	<div class="audioplayer">
		<a href="#">
			<div class="audioplayer-album-img"></div>
		</a>
		<button id="nextButton" class="previous"></button>
		<button id="pButton" class="play"></button>
		<button id="preButton" class="next"></button>

		<div class="main-time-line">
			<div class="info-music">
				<div class="left-content">
					<a href="#">Footer Lorem</a>
					<span>от:</span>
					<a href="#">Mr.Shepelev</a>
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
					<span>02:25</span>
			</div>
		</div>
	</div>
</div>
<button id="closeButton" onclick="visibleAP()" class="close visible-audioplayer"></button>

<script src="public/js/audioplayer.js"></script>