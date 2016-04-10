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
                          
			   $msg = "Your password was successfully changed.";
                           $emailmsg = "Dear $fname,\nPlease do not reply to this email.\nYour password was successfully changed at ASKGC.\nPlease contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582\nThanks,\nThe ASKGC TEAM.";
			   mail("$email", "YOUR ASKGC PASSWORD WAS CHANGED", $emailmsg);			           			                
			   header("Location:login.php?msg=".$msg);
              	           exit;
	
			}
			else
			{
		          $sendmsg = "Could not change your password. One or both security answers is invalid";
			  header("Location:forgot.php?sendmsg=".$sendmsg);
			  exit;
	
			}
		  }
		           	
		}
		else
		{
			$sendmsg = "The passwords entered don't match.";
			 echo $sendmsg;
			header("Location:forgot.php?sendmsg=".$sendmsg);
			exit;

		}
	

}

?>
