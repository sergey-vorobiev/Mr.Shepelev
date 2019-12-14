<?php 

function get_music_block($table){

	$result = R::getAll("SELECT * FROM $table ORDER BY id DESC");

	return $result;
}

function get_music_block_for_sorting(){

	$sql = "((SELECT * FROM track ORDER BY data DESC LIMIT 5) UNION (SELECT * FROM remix ORDER BY data DESC LIMIT 5)) ORDER BY data DESC";

	$result = R::getAll($sql);

	return $result;
}

function get_found_music($link, $table, $name, $autor){

	$query = "SELECT id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, DATE_FORMAT(data, '%e %M %Y'), vowels, num_plays, likes, comments FROM $table WHERE (name = '$name') and (autor = '$autor')";
	
	mysqli_query($link, "SET lc_time_names = 'ru_RU'");

	$request = mysqli_query($link, $query);
	
	$result = mysqli_fetch_array($request);

	return $result;
}

function addTrack($link, $name, $autor, $genre, $name_music_in_folder, $duration, $img_album, $data, $vowels){
	
	// добавление нового трека в базу данных

	$newTrack = mysqli_query($link, "INSERT INTO track (id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, data, vowels, num_plays, likes, comments) VALUES (NULL, NULL, '$name', '$autor', '$genre', '$name_music_in_folder', '$duration', '$img_album', '$data', '$vowels', '0', '0', '0')");

}

function addRemix($link, $remix_on, $name, $autor, $genre, $name_music_in_folder, $duration, $img_album, $data, $vowels){
	
	// добавление нового ремикса в базу данных

	$newRemix = mysqli_query($link, "INSERT INTO remix (id, remix_on, name, autor, genre, name_music_in_folder, duration, img_album, data, vowels, num_plays, likes, comments) VALUES (NULL, '$remix_on', '$name', '$autor', '$genre', '$name_music_in_folder', '$duration', '$img_album', '$data', '$vowels', '0', '0', '0')");

}

// function listening($table, $id){

// 	// засчитывание прослушивания

// 	R::exec( "UPDATE $table SET num_plays = num_plays + 1 WHERE id = $id;" );

// }

?>