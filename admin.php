<?php 

include("app/include/database.php");
include("app/include/functions.php");

	
$authorization = "
	<div class='table'>
		<div class='table-wrapper'>
			<div class='table-title'>Админка</div>
			<div class='table-content'>
            	<form method='post' id='login-form' class='login-form'>
                  	<input type='text' placeholder='Логин' class='input' name='login'><br>
                 	<input type='password' placeholder='Пароль' class='input' name='password'><br>
                	<input type='submit' value='Войти' class='button'>
          		</form>
		 	</div>
		</div>
	</div>";



if(isset($_POST['login']) && isset($_POST['password'])) {

	$_SESSION['login'] = $_POST['login'];

	$_SESSION['password'] = $_POST['password'];

	if(login($link, $_SESSION['login'], $_SESSION['password'])) { // Попытка авторизации

	    // Тут будут проходить все операции

	    $authorization = null;

	}
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
      		<?php echo $authorization; ?>
		</main>
	</div>
</body>
</html>