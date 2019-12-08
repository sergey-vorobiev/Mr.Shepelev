<?php 

	require_once 'app/header.php';

?>
<head>
	<title>Музыка</title>
</head>

<div class="main">
	<div class="fount-block-plus">
		<div class="found-block">
			<h1>Музыка</h1>
			<p>Будет красиво, живописно,<br> и очень круто.</p>
		</div>
		<div class="found-bottom">
			<ul id="menu">
				<li class="active"><a>Треки</a></li>
				<li><a>Ремиксы</a></li>
			</ul>
		</div>
	</div>
	<div class="music">
		<div class="music-container">
			<div class="music-visibility track-container">
				<?php include 'app/music-block_track.php'; ?>
			</div>
			<div class="music-visibility remix-container">
				<?php include 'app/music-block_remix.php'; ?>
			</div>
		</div>
	</div>
</div>
<audio id="music"></audio>

<script src="public/js/music.js"></script>

<?php 

	require_once 'app/audioplayer.php';
	require_once 'app/footer.php';

?>