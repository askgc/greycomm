<?php include('session.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ASKGC Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://www.dreamtemplate.com/dreamcodes/social_icons/tsc_social_icons.css" />
</head>
<body>
<table><tr><td style=" text-align:center"><img src="../images/askgcpic.png"  class="png"></td></tr></table>

<link rel="stylesheet" href="../css/nav.css">
<div style="position:relative; top:-75px; left:78%;"><?php echo "Hi "; echo $_SESSION['first_name']; echo ",";?></div>
<button class="logoutbutton" onclick="location.href='logoff.php';" style="cursor:pointer"><a><i class="fa fa-sign-out fa-lg">&nbsp;log out</a></i></button>
       
   
<br>
<ul id="menu_wrap" class="Green">
    <li class="button"><a href="homepage.php"><i class="fa fa-home">&nbsp;Home</a></i></li>
    <li class="button"><a href="forum.php"><i class="fa fa-forumbee">&nbsp;Forum</a></i></li>
    <li class="button"><a href="tutorials.php"><i class="fa fa-video-camera">&nbsp;Tutorials</a></i></li>
    <li class="button"><a href="faq.php"><i class="fa fa-question-circle">&nbsp;FAQ</a></i></li>
    <li class="search"><a href="#"></a><input type="text" placeHolder="Search"/></li>
</ul>
<hr style="height:30px;border:none;color:#333;background-color:#4e7d0e;" />
<link rel="stylesheet" href="../css/homepage.css">
<div class="picgallery" align="center">
	<div class="img">
	<a><img src="../images/loyola1.jpg"></a>
	</div>

	<div class="img">
	<a><img src="../images/banner-loyola.jpg"></a>
	</div>

	<div class="img">
	<a><img src="../images/loyola-university-campus.jpg"></a>
	</div>
  </div>
<hr style="height:30px;border:none;color:#333;background-color:#4e7d0e;"/>

<div class="pagelayout">
    <h1  style="color:#4e7d0e; font-family:Varela">Welcome &#8211; AskGC</h1>
    <p>This page is a hub for GreyComm FAQ, Video Tutorials, equipment checkout, and instructional guides. The information on this site is constantly changing to best fit the needs of GreyComm employees, volunteers, and Loyola Students.</p>
    <p>Use the top navigation to explore the FAQ page, PDF page, and video tutorials to find answers to your questions. This site will be regularly updated with new information about GreyComm’s equipment and policy.</p>
    <p>If you have questions of your own, feel free to contact us and we’ll do our best to provide a quick response.</p>
    <p>GreyComm Studios is located in the College Center on Loyola University&#8217;s Main Campus.<br />
    StudioPhone: (410) 617-5582</p>
</div>
<br><br>
<div align="center">
     <ul>
       <a class="twitter2_square32 tsc_social_square32" title="twitter" href="https://twitter.com/GreyCommStudios"></a>
       <a class="facebook_square32 tsc_social_square32"title="facebook" href="https://www.facebook.com/greycomm"></a>
       <a class="youtube_square32 tsc_social_square32" title="youtube" href="https://www.youtube.com/user/GreyCommTV"></a>
       <a class="instagram_square32 tsc_social_square32" title="instagram" href="https://www.instagram.com/greycommstudios/"></a>
    
       <br>
       <p style="font-size:12px">© 2016 AskGreycomm<p>
     </ul>
</div>
<div align="center" style="padding-bottom:50px;"><a href="#top">^</a></div>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
<script src="../js/navbar.js"></script>
<script src="../js/ism-2.1-min.js"></script> 
<script src="../js/ism-2.1.js"></script>    
  
</html>


