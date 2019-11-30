<?php 

include("app/include/database.php");
include("app/include/functions.php");

	
$authorization = "
	<div class='table'>
		<div class='table-wrapper'>
			<div class='table-title'>Админка</div>
			<div class='table-content'>
            	<form method='post' id='login-form' class='login-form'>

                  	<input type='text' placeholder='Логин' class='input' name='login' required>
                 	<input type='password' placeholder='Пароль' class='input' name='password' required>
                	<input type='submit' value='Войти' class='button-form-login'>
          		</form>
		 	</div>
		</div>
	</div>";

$admin = '
	<div class="main-panel">
		<div class="header">
			Панель администратора
		</div>
		<button id="button_addTrack">Добавить трек</button>
	</div>
';

$add_track = '
	<div id="addTrack-form" class="add_track">
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

        	<input type="submit" value="Добавить трек" class="button-form-addTrack">
		</form>
	</div>
';

$save_admin = $admin;

if(isset($_POST['login']) && isset($_POST['password'])) {

	$_SESSION['login'] = $_POST['login'];

	$_SESSION['password'] = $_POST['password'];

	if(login($link, $_SESSION['login'], $_SESSION['password'])) { // Попытка авторизации

	    // Тут будут проходить все операции
		echo '<div class="wrapper">';
		echo $save_admin;
		echo $add_track;
		echo '</div>';
		echo '<script src="public/js/admin.js"></script>';

	    $authorization = null;

	}
}

if(	   isset($_POST['name']) 
	&& isset($_POST['autor']) 
	&& isset($_POST['genre']) 
	&& isset($_POST['name_music_in_folder']) 
	&& isset($_POST['duration']) 
	&& isset($_POST['img_album'])){

	addTrack($link, $_POST['name'], $_POST['autor'], $_POST['genre'], $_POST['name_music_in_folder'], $_POST['duration'], $_POST['img_album']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mr. Admin</title>
	<link rel="stylesheet" href="public/css/admin.css">
</head>
<body>
	<div class='wrapper'>
		<main id="main" class="main">
      		<?php 
      			echo $authorization; 
      		?>
		</main>
	</div>
</body>
</html>