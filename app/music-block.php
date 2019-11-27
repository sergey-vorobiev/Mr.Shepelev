<?php 

$result = get_music_block($link);

$rows = mysqli_num_rows($result);

for($i = 0; $i < $rows; $i++){

    $row = mysqli_fetch_row($result);

	$id = $row[0];
	$name = $row[1];
	$autor = $row[2];
	$genre = $row[3];
	$duration = $row[4];
	$img_album = $row[5];
	$num_plays = $row[6];
	$likes = $row[7];
	$comments = $row[8];

	echo '<div class="music-block">';
	echo '<a href="#"><span>'.$genre.'</span></a>';
	echo '<div class="music-block-img">';
	echo '<a href="#">';
	echo '<img src="public/img/'.$img_album.'" alt="">';
	echo '<div class="shadow-for-img"></div>';
	echo '<div class="nav-music-block-img play-in-block"></div>';
	echo '</a>';
	echo '</div>';
	echo '<footer>';
	echo '<div class="canvas"></div>';
	echo '<div class="name">';
	echo '<a href="#">'.$name.'</a>';
	echo '</div>';
	echo '<div class="autor">';
	echo '<a href="#">'.$autor.'</a>';
	echo '</div>';
	echo '<div class="info">';
	echo '<div class="info-block">';
	echo '<i class="fas fa-play"></i>';
	echo '<span>'.$num_plays.'</span>';
	echo '</div>';
	echo '<div class="info-block">';
	echo '<i class="fas fa-heart"></i>';
	echo '<span>'.$likes.'</span>';
	echo '</div>';
	echo '<div class="info-block">';
	echo '<i class="fas fa-comment-alt"></i>';
	echo '<span>'.$comments.'</span>';
	echo '</div>';
	echo '</div>';
	echo '</footer>';
	echo '</div>';

}

?>