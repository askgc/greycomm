/**
AskGC
 
 Description: This php file allows for a certain information to be preserved throughout a user's interactions with the askgc interface
 

<?php


session_start();
$user_check=$_SESSION['login_user'];


if(!isset($user_check))
{
	mysql_close($connection);
	header('Location: login.php');
}

?>
