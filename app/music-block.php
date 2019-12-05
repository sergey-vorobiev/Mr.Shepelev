<?php 

$result = get_music_block($link);
$rows = mysqli_num_rows($result);

for($i = 0; $i < $rows; $i++){

    $row = mysqli_fetch_row($result);

	$id = $row[0];
	$name = $row[1];
	$autor = $row[2];
	$genre = $row[3];
	$name_music_in_folder = $row[4];
	$duration = $row[5];
	$img_album = $row[6];
	$vowels = $row[8];
	$num_plays = $row[9];
	$likes = $row[10];
	$comments = $row[11];

	echo '<div class="music-block">';
		echo '<a href="#"><span>'.$genre.'</span></a>';
		echo '<div class="music-block-img" onClick="clickImg(this.id)" id="'.$name_music_in_folder.'">';
			echo '<img class="img_album" id="'.$img_album.'" src="public/img/'.$img_album.'" alt="">';
			echo '<div class="shadow-for-img"></div>';
			echo '<div class="nav-music-block-img play-in-block"></div>';
		echo '</div>';
		echo '<footer>';
			echo '<div class="canvas"></div>';
				echo '<div class="name">';
					echo '<a class="title" href='.$vowels.'>'.$name.'</a>';
				echo '</div>';
				echo '<div class="autor">';
					echo '<a class="audioplayer_autor" href="#">'.$autor.'</a>';
				echo '</div>';
				echo '<div class="info">';
					echo '<div class="info-block">';
						echo '<i class="material-icons" style="font-size: 19px !important;">play_arrow</i>';
						echo '<span>'.$num_plays.'</span>';
					echo '</div>';
					echo '<div class="info-block">';
						echo '<i class="material-icons">favorite</i>';
						echo '<span>'.$likes.'</span>';
					echo '</div>';
					echo '<div class="info-block">';
						echo '<i class="material-icons">mode_comment</i>';
						echo '<span>'.$comments.'</span>';
				echo '</div>';
				echo '<div id="'.$duration.'" class="duration invisible"></div>';
			echo '</div>';
		echo '</footer>';
	echo '</div>';
}

?>