<?php 

$link = mysqli_connect('localhost', 'root', '', 'mr-shepelev') 
	or die("Ошибка " . mysqli_error($link));

require 'rb.php';

R::setup( 'mysql:host=localhost;dbname=mr-shepelev', 'root', '' );

if( !R::testConnection() ){
	exit('Нет подключения к базе данных!');
}

session_start();

?>