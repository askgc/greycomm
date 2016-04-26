<?php

include("dataBaseConnect.php");

   $dbname = "askgc";
   mysql_select_db($dbname) or die ("could not connect");

if(isset($_POST['submit']))
{
	$activation = $_POST['activation'];
   
        $now_active = "active";
	
	mysql_query("use askgc"); 

  	$sql = "select * from askgcUsers where activation='".$activation."'"; 

        $result = mysql_query($sql);
	
	if(mysql_num_rows($result) >=1)
	{
		$sql = "update askgcUsers set validateEmail='".$now_active."' where activation='".$activation."'";
	  	mysql_query($sql);
	   
          	$sql = "select * from askgcUsers where validateEmail='".$now_active."' and activation='".$activation."'";
	
	  	$result = mysql_query($sql);
	 
	  	if($result)
	  	{
                	 while ($row = mysql_fetch_array($result))
                 	{
				$fname = $row["firstname"] . "";
				$email = $row["username"] . "";
        	        }
	
	  		$msg = "Your account has been successfully activated.";
			$emailmsg = "Dear $fname,\nPlease do not reply to this email.\nYour account was successfully activated at ASKGC.\nPlease contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582\nThanks,\nThe ASKGC TEAM.";
               
	      		 mail("$email", "NO REPLY YOUR ASKGC ACCOUNT IS NOW ACTIVE", $emailmsg);			           			 
	    		 header("Location:login.php?msg=".$msg);
           
	
	  	}
	  	else
	 	 {
	     		$msg = "Could not active account"; 
	     		header("Location:login.php?msg=".$msg);
	
	  	}
 	
	}	
	else
	{ 
             $msg = "Your activation code was invalid"; 
	     header("Location:login.php?msg=".$msg);
               
	}
}

?>

