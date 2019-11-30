<?php 

function get_music_block($link){

	$sql = "SELECT * FROM music";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

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

?>