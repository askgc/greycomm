

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body>

    <div class="form">
      <ul class="tab-group">
        <li class="tab active" ><a href="#forgot">Forgot Password </a></li>
      </ul>
      
      <div class="tab active">
        
        <div id="forgot" ><span style=" text-align:center"><img src="../images/askgcpic.png" class="png" align="middle"></span> 
        <table>
        <tr>
          <td style=" text-align:center">&nbsp;</td>
        </tr>
        </table>
      
          <form action="passwordreset.php" method="post">
           
           <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email">
           </div>
          
          <button class="button button-block" type="submit" name="Forgot_Password"/>Password Reset</button>
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
