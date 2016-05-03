/**
 AskGC
 
 Description: This php file provides the back-end component to the Password Reset page. It checks if information entered by a user matches with that user's info in the data base, if not the appropriate messge is sent. If it does, the appropriate values are changed and an email is sent confirming the change.
 
 */

<?php

include("dataBaseConnect.php");

$dbname = "askgc";

mysql_select_db($dbname) or die ("could not connect");

if(isset($_POST["Reset_Password"]))
{
	$email = $_POST["email"];
	$password = $_POST["new_password"];
	$confirmpassword = $_POST["confirm_new_password"];
        $secanswer1 = $_POST["answer1"];
        $secanswer2 = $_POST["answer2"];
        
             
    		if($password == $confirmpassword)
		{
		  mysql_query("use askgc");
		  $sql = "select * from askgcUsers where username='".$email."'";
		  if(mysql_num_rows(mysql_query($sql)) >= 1)
		  {
		  	$sql = "update askgcUsers set password='".$password."' where username='".$email."' and securityanswer1='".$secanswer1."' and securityanswer2='".$secanswer2."'"; 

                        mysql_query($sql);

                       	$sql="select * from askgcUsers where username='".$email."' and password='".$password."'";
                         
                        $result = mysql_query($sql);

			if(mysql_num_rows($result) >= 1)
			{  
                           while($row = mysql_fetch_array($result))
               		   {
		  		$fname = $row["firstname"] . "";

                	   }
                          
			   $msg = "Your password was successfully reset.";
                           $emailmsg = "Dear $fname,\nPlease do not reply to this email.\nYour password was successfully reset at ASKGC.\nPlease contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582\nThanks,\nThe ASKGC TEAM.";
			   mail("$email", "YOUR ASKGC PASSWORD WAS RESET", $emailmsg);			           			                
			   echo $msg;
              	           exit;
	
			}
			else
			{
		          $sendmsg = "Could not reset your password. One or both security answers are invalid";
			  echo $sendmsg;
			  exit;
	
			}
		  }
		           	
		}
		else
		{
			$sendmsg = "The passwords entered don't match.";
		        echo $sendmsg;
			exit;

		}
	

}

?>
