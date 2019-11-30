<?php
	include 'insert/header.php';
?>

<div class="container-music">
	<div class="img-music">
		<img class="img-musics" src="../public/img/img_albume3.jpg" alt="">
	</div>
	<div class="music-info">
		<div class="music-info-top">
			<div onclick="ready()" class="img-play"></div>
			<div class="misic-info-container">
				<div class="misic-info-container-top">
					<div class="misic-info-autor">
						<a href="#" class="main-autor">Mr. Shepelev</a>
					</div>
					<div class="misic-info-container-top-right">
						<div class="info-block">
							<i class="material-icons">access_time</i>
							<span class="data">30.11.2019</span>
						</div>
						<div class="info-block">
							<i class="material-icons" style="font-size: 20px !important; margin-right: 1px">play_arrow</i>
							<span class="play_arrow">1122</span>
						</div>
						<div class="info-block">
							<i class="material-icons">favorite</i>
							<span class="favorite">56</span>
						</div>
						<div class="info-block">
							<i class="material-icons">mode_comment</i>
							<span class="mode_comment">32</span>
						</div>
					</div>
				</div>
				<div class="misic-info-container-bottom">
					<span class="main-name">Modern Talking - Geronimo's cadillac</span>
					<div><span>00:00</span></div>
				</div>
			</div>
		</div>
		<div id="waveform"></div>
		<div class="music-info-bottom">
			<div class="turned_in"><img src="../public/img/turned_in.png" alt=""></div>
			<span>Italo Disco, Metal</span>
		</div>
	</div>
</div>
<br><br><br><br>

<?php
	include 'insert/footer.php';
?>