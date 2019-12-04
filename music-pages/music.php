<?php
	include "insert/header.php";

	$result = get_found_music($link, "So Long 04.12.2019", "Mr. Shepelev");

?>

<div class="container-music">
	<div class="img-music">
		<img class="img-musics" src="../public/img/<?php echo $result[6] ?>" alt="">
	</div>
	<div class="music-info">
		<div class="music-info-top">
			<div onclick="playAndPause()" id="playAndPause_p" class="img-play"></div>
			<div class="misic-info-container">
				<div class="misic-info-container-top">
					<div class="misic-info-autor">
						<a href="#" class="main-autor"><?php echo $result[2]; ?></a>
					</div>
					<div class="misic-info-container-top-right">
						<div class="info-block">
							<i class="material-icons">access_time</i>
							<span class="data">30.11.2019</span>
						</div>
						<div class="info-block">
							<i class="material-icons" style="font-size: 20px !important; margin-right: 1px">play_arrow</i>
							<span class="play_arrow"><?php echo $result[7]; ?></span>
						</div>
						<div class="info-block">
							<i class="material-icons">favorite</i>
							<span class="favorite"><?php echo $result[8]; ?></span>
						</div>
						<div class="info-block">
							<i class="material-icons">mode_comment</i>
							<span class="mode_comment"><?php echo $result[9]; ?></span>
						</div>
					</div>
				</div>
				<div class="misic-info-container-bottom">
					<span class="main-name"><?php echo $result[1]; ?></span>
					<div><span id="now_time_timeline">00:00</span><span> : </span><span id="duration_track">00:00</span></div>
				</div>
			</div>
		</div>
		<div id="waveform"></div>
		<div class="music-info-bottom">
			<div class="turned_in"><img src="../public/img/turned_in.png" alt=""></div>
			<span><?php echo $result[3]; ?></span>
		</div>
	</div>
</div>

<script src="https://unpkg.com/wavesurfer.js"></script>
<script src="../public/js/music-page.js"></script>

<script>
	wavesurfer.load("../public/music/<?php echo $result[4] ?>");
</script>

<?php
	include "insert/footer.php";
?>
"