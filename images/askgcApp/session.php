<?php


session_start();
$user_check=$_SESSION['login_user'];


if(!isset($user_check))
{
	mysql_close($connection);

}

?>
