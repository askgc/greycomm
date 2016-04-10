<?php 
 
include("dataBaseConnect.php");

if(isset($_POST["Forgot_Password"]))
{
	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		$email = $_POST["email"];
	}
	else
	{
	      $sendmsg = "ERROR NO SUCH EMAIL!";		
	      header("Location:forgot.php?sendmsg=".$sendmsg);
              exit;
	}

 	mysql_query("use askgc"); 

  	$sql = "select * from askgcUsers where username='".$email."'"; 	
    
        $result = mysql_query($sql);

	if(mysql_num_rows(mysql_query($sql)) >= 1)
  	{
             
                while($row = mysql_fetch_array($result))
                {
		  $sec1 = $row["securityquestion1"] . "";
                  $sec2 = $row["securityquestion2"] . "";

                }

        }
         else{
	      $sendmsg = "That email does not exist in our system.";		
	      header("Location:forgot.php?sendmsg=".$sendmsg);
	     }

}


?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body>

    <div class="form">
      <ul class="tab-group">
        <li class="tab active" ><a href="#passwordreset">Password Reset</a></li>
      </ul>
      
      <div class="tab active">
        
        <div id="passwordreset" ><span style=" text-align:center"><img src="../images/askgcpic.png" class="png" align="middle"></span> 
        <table>
        <tr>
          <td style=" text-align:center">&nbsp;</td>
        </tr>
        </table>
      
          <form action="resetpassword.php" method="post" autocomplete="off">
           
           <div class="field-wrap">
            <label>
               <span class="req">*</span>
            </label>
            <input type="hidden" required autocomplete="off" name="email" value=<?php echo $email?>>
           </div>

           <div class="field-wrap">
            <label>
               New Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="new_password">
           </div>

          <div class="field-wrap">
            <label>
               Confirm New Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="confirm_new_password">
           </div>
             <?php echo $sec1;?>   <br>      
            <div class="field-wrap">
            <label>
              Security Question 1 Answer:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="answer1">
          </div>
           <?php echo $sec2;?>    <br>            
          <div class="field-wrap">
            <label>
              Security Question 2 Answer:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="answer2">
          </div>

       <button class="button button-block" type="submit" name="Reset_Password"/>Reset Password</button>
<br>
<div align="center"><?php if(isset($_GET['sendmsg'])){ echo "<font color='red'>".$_GET['sendmsg']."</font>" . " \n";}?></div> 
          </form>

        </div>
       
      
      </div><!-- tab-active -->
      
</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/form.js"></script>
    
 </body>
</html>
