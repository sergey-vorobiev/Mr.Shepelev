<?php 

function get_music_block($link){

	$sql = "SELECT * FROM music";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	return $result;
}

function get_found_music($link, $name, $autor){

	$query = "SELECT * FROM music WHERE (name = '$name') and (autor = '$autor')";
	
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

	$newTrack = mysqli_query($link, "INSERT INTO music (id, name, autor, genre, name_music_in_folder, duration, img_album, data, vowels, num_plays, likes, comments) VALUES (NULL, '$name', '$autor', '$genre', '$name_music_in_folder', '$duration', '$img_album', '$data', '$vowels', '0', '0', '0')");

}

?>