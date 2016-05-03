/*
AskGC
 
 Description: This php script provides the interface for the initial interactions with the website. It links to the loginrun.php, change.php, forgot.php, and the signup.php scripts. Information entered in, is sent to the loginrun.php script to insert those values into the back end database. When then forgot password, sign nup, and change password button are pressed, the correspondig php script is executed.
 
 Fields:
 */

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ASKGC Login Form</title>
    
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body>
    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a onclick="location.href='login.php'">Log In</a></li>
        <li class="tab"><a onclick="location.href='signup.php'">Sign Up</a></li>
      </ul>
      
      
      <div class="tab-content">
        <div id="signup">   
         <td style="text-align:center" >
          <img src="../images/askgcpic.png" alt="askgc pic"> 
		  </td>
          
          <form method="post"  action="register.php">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="first">
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="last">
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="username">
          </div>
          
          <div class="field-wrap">
            <label>
              Confirm Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="confirmusername">
          </div>
          
          <div class="field-wrap">
            <label>
              Enter Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password">
          </div>
          
           <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="confirmpassword"/>
          </div>
          
          <div class="dropdown">
          	<select name="question1"> 
            <option value = "What is your mother's maiden name?" > What is your mothers maiden name? </option>
            <option value = "What was your first concert?" > What was your first concert? </option>
            <option value = "What was the name of your first school?" > What was the name of your first school? </option>
            </select>
           </div>
           
            <div class="field-wrap">
            <label>
              Security Question 1 Answer:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="answer1">
          </div>
           
           <div class="dropdown2">
          	<select name="question2"> 
            <option value = "What was the name of your first pet?" > What was the name of your first pet? </option>
            <option value = "What was the name of the first street you lived on?" > What was the name of the first street you lived on? </option>
            <option value = "Where was the first place you worked?"> Where was the first place you worked? </option>
            </select>
           </div>
            
          <div class="field-wrap">
            <label>
              Security Question 2 Answer:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="answer2">
          </div>
       
          <button type="submit" class="button button-block">Get Started</button>
         
          
          </form>
<br>
<div align="center"><?php if(isset($_GET['msg'])){ echo "<font color='red'>".$_GET['msg']."</font>" . " \n";}?></div>

        </div>
        
        <div id="login"> 
        <table>
        <tr>
          <td style=" text-align:center">
            <img src="../images/askgcpic.png" class="png" alt="askgc pic" > 
          </td>
        </tr>
        </table>
       
          <form action="loginrun.php" method="post">
          
           <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="username">
           </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password">
          </div>  
    
	<style>
		p {font-size:0;}
		span { width:50%; display:inline-block; }
		span.align-right { text-align:right; }
		span a { font-size:16px; }
	</style>

   <p>
 	<span>
		<a href="change.php">Change Password?</a>
	</span>
        <span class="align-right">
	        <a href="forgot.php">Forgot Password?</a>
        </span>
   </p>
          <button type="submit" class="button button-block" name="submit">Log In</button>
         </form>
<br>
<div align="center"><?php if(isset($_GET['msg'])){ echo "<font color='red'>".$_GET['msg']."</font>" . " \n";}?></div>

        </div>
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="../js/form.js"></script>    
</body>
</html>

