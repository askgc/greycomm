<?php

include('session.php'); 
session_start();

if(session_destroy())
	echo "log off successful";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>log off</title>
<meta http-equiv="refresh" content="3; login.php"/>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
</body> 
</html>


