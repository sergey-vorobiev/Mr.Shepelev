<?php

	require 'app/include/database.php';

	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('userlist', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( $data['password'] == $user->password )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user->login;
	 			header("Location: admin.php");
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}

		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

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

              	<input type='text' placeholder='Логин' class='input' name='login' value="<?php echo @$data['login']; ?>" required>
             	<input type='password' placeholder='Пароль' class='input' name='password' value="<?php echo @$data['password']; ?>" required>
            	<input type='submit' value='Войти' class='button-form-login' name="do_login">

      		</form>
	 	</div>
	</div>
</div>