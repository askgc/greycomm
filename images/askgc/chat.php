<?php 
	include("dataBaseConnect.php");
	include("session.php");
	include("nav_header.php");
	

?>
<style>
body {
    font:12px arial;
    color: #222;
    text-align:center;
    padding:35px; }
  
form, p, span {
    margin:0;
    padding:0; }
  
input { font:12px arial; }
  
  
    a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#a6a6a6;
    width:504px;
    border:2px solid #000000; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:430px;
    border:2px solid #000000;
    overflow:auto; }
  
#usermsg {
    width:395px;
    border:1px solid #000000; }
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.mylogout { float:right; }
  
.msgln { margin:0 0 2px 0; }

</style>
 <br><br><br>
<h2>ASKGREYCOMM LIVE CHAT</h2>
<br>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <?php echo $_SESSION['first_name'];?> <b></b></p>
        <p class="mylogout"><a id="exit1" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" autocomplete="off"/>
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
 
});
</script>

<script>
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("chat.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
</script>

<?php include("nav_footer.php")?>


<?php
if(isset($_POST['submitmsg']))
{
$msg = $_POST['usermsg'];

$fp = fopen("log.html", 'a');

fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['first_name']."</b>: ".stripslashes(htmlspecialchars($msg))."<br></div>");
    
fclose($fp);
}
?>




