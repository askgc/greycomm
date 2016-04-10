<?php include("session.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ASKGC FAQs</title>
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

<div class="pagelayout">
<div class="textContainer"> 
	<h1 align="left" style="color:green;"> Obtaining Swipe Access - FAQ </h1> 
	<h2 align="left" style="color:green;"> How do I obtain swipe access? </h2> 

        <p> Swipe access is granted on a case by case basis. If you are an active member of GreyComm 
            or current student in an digital media communication class, you are eligible to request access.  
            Most requests are granted with a 24-48 hour period (except weekends). Send email with your name 
            and student id to greycomm@loyola.edu </p> </div>
        
<div class="textContainer"> 
	<h1 align="left" style="color:green;"> Making Equipment Reservations - FAQ </h1> 
	<h2 align="left" style="color:green;"> How do I make an equipment reservation? </h2>
		
        <p> Head over to https://loyola.webcheckout.net/webcheckout/pir/login to reserve cameras,  
            microphones, tripods, and so much more! <br>
        <br> 
        <b> Please Note: </b> Using web browser such as Mozilla Firefox, or Google Chrome are strongly 
               recommended. The checkout site has been tested against these browsers and confirmed  
               to work well. </p> </div>
        
<div class="textContainer">
	<h1 align="left" style="color:green;"> Reserving Studio Time - FAQ </h1> 
	<h2 align="left" style="color:green;"> How do I reserve studio time? </h2> 
	
    	<p>  GreyComm is always happy to share our great studio with Loyola students. If you would 
            like to reserve time in the studio, email gctv@loyola.edu at least 3-5 days prior to when you 
            want to reserve the space. <br> 
        
        <br> 
        
         <b> Please keep a few things in mind: </b> <br>
            <br>
            1. GreyComm Studios reserves the right to reject requests for studio space and <br>
            change reservations at anytime. <br> 
            <br>
            2. If your request is granted and you/your group is late <i> without properly notifying <br>
            GreyComm Management </i> your reservation will be lost. <br>
            <br> 
            3. if you do not clean up the studio after you are finished with your shoot you may <br>
            lose the ability to make reservations for the rest of the semester. <br>
            <br> 
            4. GreyComm Studios is not responsible for lost footage or technical difficulties. <br>
            We will assist you in anyway possible.  Although rare, technology can fail, therefore <br>
            you are working at your own risk. </p> </div>
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
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
<script src="../js/navbar.js"></script>   
</html>
