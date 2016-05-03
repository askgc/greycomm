/*
AskGC
 
 Description: This php script provides the interface for a user to change their password. Values entered in this form are sent to the changepassword.php file in order for interactino with the database to take place.

 */


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body>

    <div class="form">
      <ul class="tab-group">
        <li class="tab active" ><a href="#change">Change Password</a></li>
      </ul>
      
      <div class="tab active">
        
        <div id="change" ><span style=" text-align:center"><img src="../images/askgcpic.png" class="png" align="middle"></span> 
        <table>
        <tr>
          <td style=" text-align:center">&nbsp;</td>
        </tr>
        </table>
      
          <form action="changepassword.php" method="post" autocomplete="off">
           
           <div class="field-wrap">
            <label>
               Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email">
           </div>
	
	   <div class="field-wrap">
            <label>
              Current Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="current_password">
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
            
       <button class="button button-block" type="submit" name="Change_Password"/>Change Password</button>
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
