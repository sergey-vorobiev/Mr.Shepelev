<head>
	<title>Mr. Shepelev</title>
	<link rel="stylesheet" href="public/css/mr_shepelev.css">
</head>
<body>

	<?php 
	require_once 'app/header.php';
	?>

	<div class="container-autor">
		<div class="container-group container-group-one">
			<div class="img-autor" id="img_autor"></div>
			<div class="main-info">
				<div class="name">
					<span class="nickname">Mr. Shepelev</span>
					<span class="name-autor">Алексей Шепелев</span>
				</div>
				<div class="tags">
					<div class="turned_in"><img src="public/img/turned_in.png" alt=""></div>
					<span>Eurodance</span>
					<span>Italo Disco</span>
					<span>Dance Pop</span>
					<span>Synth-Pop</span>
				</div>
			</div>
		</div>
		<div class="container-group container-group-two">
			<div class="curious-info">
				<div class="curious-main-info">
					<div class="curious-block-info">
						<span class="number">534</span>
						<span>Читают</span>
					</div>
					<div class="curious-block-info">
						<span class="number">15 августа 2017</span>
						<span>Первая публикация</span>
					</div>
				</div>
				<div class="curious-link">
					
				</div>
			</div>
			<div class="follow">
				<button id="follow">Подписаться</button>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="music">
			<div class="music-container">
				<div class="track-container">
					<?php include 'app/music-block_for_mr_shepelev.php'; ?>
				</div>
			</div>
		</div>
	</div>
	<audio id="music"></audio>

	<script src="public/js/mr-shepelev.js"></script>

	<?php
	require_once 'app/audioplayer.php';
	require_once 'app/footer.php';
	?>
	
</body>


