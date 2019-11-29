<?php 

	require_once 'app/header.php';

?>

<div class="main">
	<div class="fount-block-plus">
		<div class="found-block">
			<h1>Музыка</h1>
			<p>Будет красиво, живописно,<br> и очень круто.</p>
		</div>
		<div class="found-bottom">
			<ul>
				<li class="active"><a href="#">Треки</a></li>
				<li><a href="#">Альбомы</a></li>
			</ul>
		</div>
	</div>
	<div class="music">
		<div class="music-container">
			<?php include 'app/music-block.php'; ?>
			<audio id="music"></audio>
		</div>
	</div>
</div>

<?php 

	require_once 'app/audioplayer.php';
	require_once 'app/footer.php';

?>