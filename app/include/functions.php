<?php 

function get_music_block($link, $table){

	$sql = "SELECT * FROM $table ORDER BY id DESC";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	return $result;
}

function get_found_music($link, $table, $name, $autor){

	$query = "SELECT id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, DATE_FORMAT(data, '%e %M %Y'), vowels, num_plays, likes, comments FROM $table WHERE (name = '$name') and (autor = '$autor')";
	
	mysqli_query($link, "SET lc_time_names = 'ru_RU'");

	$request = mysqli_query($link, $query);
	
	$result = mysqli_fetch_array($request);

	return $result;
}

function login($link, $login, $password) {

	 // Запрос в базу данных

	$loginResult = mysqli_query($link, "SELECT * FROM userlist WHERE login = '$login' AND password = '$password' AND admin = '1'");

	if(mysqli_num_rows($loginResult) == 1) {

    	return true;

	} else {

 	unset($_SESSION['login'], $_SESSION['password']);

  	return false;

	}
}

function addTrack($link, $name, $autor, $genre, $name_music_in_folder, $duration, $img_album, $data, $vowels){
	
	// добавление нового трека в базу данных

	$newTrack = mysqli_query($link, "INSERT INTO track (id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, data, vowels, num_plays, likes, comments) VALUES (NULL, NULL, '$name', '$autor', '$genre', '$name_music_in_folder', '$duration', '$img_album', '$data', '$vowels', '0', '0', '0')");

}

function addRemix($link, $remix_on, $name, $autor, $genre, $name_music_in_folder, $duration, $img_album, $data, $vowels){
	
	// добавление нового ремикса в базу данных

	$newRemix = mysqli_query($link, "INSERT INTO remix (id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, data, vowels, num_plays, likes, comments) VALUES (NULL, '$remix_on', '$name', '$autor', '$genre', '$name_music_in_folder', '$duration', '$img_album', '$data', '$vowels', '0', '0', '0')");

}

?>