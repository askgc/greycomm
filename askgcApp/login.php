/**
 AskGC
 
 Description: This php script links to the database. Values entered in login.php are wrapped and sent to this script. The script also checks whether or not a registered user has activated their account. If there are any errors, the appropriate message is displayed. For example, if the user has not activated their account, a message stating that is displayed. The user is brought to homepage.php if their credentials are correct and their account is activated
 */

<?php

include("dataBaseConnect.php");

$dbname = "askgc";

mysql_select_db($dbname) or die ("could not connect");


session_start();

	if(empty($_POST['username']) || empty($_POST['password'])) 
	{
		$msg= "All data is required";
	        echo $msg;
		exit;

	}
	else
	{

		$username=$_POST['username'];
		$password=$_POST['password'];

		$connection= mysql_connect("$host", "$DBusername", "$DBpassword","$database_name") or die("unable to connect");
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		mysql_query("use askgc");
		$sql="select * from askgcUsers where username='$username' and password='$password'";
		$result=mysql_query($sql);


		if(!mysql_num_rows($result))
		{
 	       		$msg= "could not login, email or password was invalid";
			echo $msg;
			exit;

		}
		else
		{
                        $active = "active";
	  		$count=mysql_num_rows($result);
  			if($count==1)
			{       $result = mysql_query("select * from askgcUsers where username='".$username."'");
                                while ($row = mysql_fetch_array($result))
                                 {
					$email = $row["username"] . "";
				 	$fname = $row["firstname"] . "";
					$lname = $row["lastname"] . "";
                                   	$check_active = $row["validateEmail"] . "";
					$activation_code = $row["activation"] . "";
					$user_id = $row["id"] . "";
                                 }

				 $link = "www.cs.loyola.edu/~sjean/cool/activation.php?activation=$activation_code";
                          

                              	if($active == $check_active)
                              	{
    			      		$_SESSION['login_user'] = $username;
                              		$_SESSION['first_name'] = $fname;
					$_SESSION['last_name'] = $lname;
					$_SESSION['user_id'] = $user_id;			        
					$login_successful = "Login successful";
					echo $login_successful;
			      	}
				else
				{
					$msg = "Dear $fname,\nYour account has not yet been activated at ASKGC. Please click the following link to activate your account.\n If not active link, copy and paste the link into your browser. \n $link \n Please contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582";

  
  					mail("$username","$fname ACTIVATE YOUR ACCOUNT! Please Do Not Reply to this Email", $msg);
                                        $msg = "Your account has not yet been activated. Please check your email for more information.";
				        echo $msg;
	
	
					
				}	
  			}
                        
		}	
	
	}

?>
