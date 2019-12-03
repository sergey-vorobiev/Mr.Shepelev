<?php

session_start();
 
$admin = 'LittleToss';
$pass = md5('1');

if(isset($_POST['submit'])){
	 if($admin == isset($_POST['login']) AND $pass == md5(isset($_POST['password']))){
		  $_SESSION['admin'] = $admin;
		  header("Location: admin.php?do=home");
		  exit;
	 }else echo '<p>Логин или пароль неверны!</p>';
}

?>

<head>
	<link rel="stylesheet" href="public/css/admin.css">
</head>

<div class='table'>
	<div class='table-wrapper'>
		<div class='table-title'>Админка</div>
		<div class='table-content'>
        	<form method='post' id='login-form' class='login-form'>

              	<input type='text' placeholder='Логин' class='input' name='login' required>
             	<input type='password' placeholder='Пароль' class='input' name='password' required>
            	<input type='submit' value='Войти' class='button-form-login' name="submit">
      		</form>
	 	</div>
	</div>
</div>