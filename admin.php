<?php

include("app/include/database.php");
include("app/include/functions.php");

$admin = '
	<div class="main-panel">
		<div class="header">
			<span>Панель администратора</span>
			<a href="admin.php?do=logout">стать человеком</a>
		</div>
		<div class="content">
			<div class="tools">
				<a href="admin.php?do=addTrack">
					<button>Добавить трек</button>
				</a>
				<a href="admin.php?do=addRemix">
					<button>Добавить ремикс</button>
				</a>
			</div>
		</div>
	</div>
';



$save_admin = $admin;
$help = null;

session_start();
 
if(!$_SESSION['admin']){
	 header("Location: login.php");
	 exit;
}

if($_GET['do'] == ''){
	 header("Location: admin.php?do=home");
}

if($_GET['do'] == 'logout'){
	 unset($_SESSION['admin']);
	 session_destroy();
	 header("Location: login.php");
}

include 'admin_need/add_track.php';

if($_GET['do'] == 'addTrack'){
	$save_admin = null;
	$help = $add_track;
}

if($_GET['do'] == 'addRemix'){
	$save_admin = null;
	$help = $add_track;
}

?>
<head>
	<title>Админка</title>
	<link rel="stylesheet" href="public/css/admin.css">
</head>

<?php

echo $save_admin;
echo $help;

?>