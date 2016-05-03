/**
 AskGC
 
 Description: This php file provides the back-end component to the Password Reset page. It checks if a user's email address exists in the data base, if not the appropriate messge is sent. If it does
 
 */

<?php
 
include("dataBaseConnect.php");
	
	if(empty($_POST["email"]))
	{
		echo "Data is required";
		exit;
	}

	
	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		$email = $_POST["email"];
	}
	else
	{
	      $sendmsg = "ERROR NO SUCH EMAIL!";		
	      echo $sendmsg;
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
		
		echo "validate info";
		exit;

        }
         else{
	      	$sendmsg = "That email does not exist in our system.";		
	      	echo $sendmsg;
	       	exit;
	     }




?>
