/**
AskGC
 
 Description: This php file provides the interface for the homepage, the screen after a user successfully logs in.
 
 Fields:
 */

<?php include('session.php');
include('nav_header.php');?>

<title> ASKGC Homepage </title>

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

<?php include('nav_footer.php');?>


