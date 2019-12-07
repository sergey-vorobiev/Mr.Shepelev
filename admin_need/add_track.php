<?php

$add_track = '
	<div class="main-panel">
		<div class="header">
			<span>Панель администратора</span>
			<a href="admin.php?do=logout">стать человеком</a>
		</div>
		<div id="addTrack-form" class="main-func">
			<form method="post" class="addTrack-form">

				<label for="name">Название трека: </label>
				<input type="text" placeholder="So Long" name="name" required>

				<label for="name">Автор: </label>
				<input type="text" placeholder="Mr. Shepelev" value="Mr. Shepelev" name="autor" required>

				<label for="name">Жанр трека: </label>
				<input type="text" placeholder="Italo Disco" name="genre" required>

				<label for="name">Название трека в папке: </label>
				<input type="text" placeholder="music7.mp3" name="name_music_in_folder" required>

				<label for="name">Продолжительность трека: </label>
				<input type="text" placeholder="00:00" value="00:00" name="duration" required>
				
				<label for="name">Изображение альбома: </label>
				<input type="text" placeholder="img_albume6.jpg" value="img_albume.jpg" name="img_album" required>

				<label for="name">Дата появления на свет: </label>
				<input type="text" placeholder="00:00:0000" value="05.24.2020" name="data" required>

	        	<input type="submit" name="addTrack" value="Добавить трек" class="button-form-addTrack">
			</form>	
		</div>
	</div>
';

if(isset($_POST['addTrack'])){
	
	$name = $_POST['name'];
	$autor = $_POST['autor'];
	$genre = $_POST['genre'];
	$name_music_in_folder = $_POST['name_music_in_folder'];
	$duration = $_POST['duration'];
	$img_album = $_POST['img_album'];
	$data = $_POST['data'];

	$vowels = preg_replace("/[^a-zA-ZА-Яа-я0-9\s]/", "", $name);
	$vowels = preg_replace("/\s+/", "", $vowels);

	$file = "music-pages/tracks/".$vowels.".php";

	addTrack($link, $name, $autor, $genre, $name_music_in_folder, $duration, $img_album, $data, $file);
	
	include("app/include/add_new_page_tracks.php");

	//если файла нету... тогда
	if (!file_exists($file)) {
	    $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту), мы создаем файл
	    fwrite($fp, $new_music_page);
	    fclose($fp);
	}

	$help = null;
	$save_admin = $admin;
 	header("Location: admin.php?do=home");
}

?>