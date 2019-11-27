<?php 

function get_music_block($link){

	$sql = "SELECT * FROM music";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	return $result;
}

?>