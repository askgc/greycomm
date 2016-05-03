/**
AskGC
 
 Description: This php file provides a standard header showing items for navigating aroung the website
 
 Fields:
 */

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://www.dreamtemplate.com/dreamcodes/social_icons/tsc_social_icons.css" />

</head>
<body>
<table><tr><td style=" text-align:left"><img src="../images/askgcpic.png"  class="png"></td></tr></table>
<link rel="stylesheet" href="../css/nav.css">
<div style="position:absolute; top:1%; left:86.5%;"><?php if(!empty($_SESSION['first_name'])){echo "Hi " . $_SESSION['first_name'] . "!";} ?></div>  
<button class="logoutbutton" onclick="location.href='logoff.php';" style="cursor:pointer"><a><i class="fa fa-sign-out fa-lg">&nbsp;log out</a></i></button>
       
   
<br>
<ul id="menu_wrap" class="Green">
    <li class="button"><a href="homepage.php"><i class="fa fa-home">&nbsp;Home</a></i></li>
    <li class="button"><a href="forum.php"><i class="fa fa-forumbee">&nbsp;Forum</a></i></li>
    <li class="button"><a href="tutorials.php"><i class="fa fa-video-camera">&nbsp;Tutorials</a></i></li>
    <li class="button"><a href="faq.php"><i class="fa fa-question-circle">&nbsp;FAQ</a></i></li>
    <li class="search"><a href="#"></a><input type="text" placeHolder="Search"/></li>
</ul>

