<?php

include("dataBaseConnect.php");

$dbname = "askgc";

mysql_select_db($dbname) or die ("could not connect");

        $required = array('first', 'last', 'username', 'confirmusername', 'password', 'confirmpassword', 'question1', 'answer1', 'question2', 'answer2');

        $error = false;

	foreach($required as $field)
	{
 		 if(empty($_POST[$field]))
  		 {
 		   
    		   $error = true;
  		 }
 	}

	if($error)
	{

           $msg= "All data is required";		
	   header("Location:signup.php?msg=".$msg);
           exit;
        }


$fname = $_POST['first'];
$lname = $_POST['last'];
$username = $_POST['username'];
$confirmusername=$_POST['confirmusername'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$securityquestion1 = $_POST['question1'];
$securityanswer1 = $_POST['answer1'];
$securityquestion2 = $_POST['question2'];
$securityanswer2 = $_POST['answer2'];

$username = stripslashes($username);

$confirmusername = stripslashes($confirmusername);

$password = stripslashes($password);

$confirmpassword = stripslashes($confirmpassword);

$password =  mysql_real_escape_string($password);

$username = mysql_real_escape_string($username);

$confirmpassword = mysql_real_escape_string($confirmpassword);

$confirmusername = mysql_real_escape_string($confirmusername);

$securityquestion1 = mysql_real_escape_string($securityquestion1);

$securityanswer1 = mysql_real_escape_string($securityanswer1);

$securityquestion2 = mysql_real_escape_string($securityquestion2);

$securityanswer2 = mysql_real_escape_string($securityanswer2);

  	
         if(($username != $confirmusername) || ($password != $confirmpassword))
         { 
		if($username != $confirmusername)
		{
                  $msg= "error ... emails don't match";		                  
          	}
		if($password != $confirmpassword)
		{ 
          	 $msg= "error ... passwords entered don't match";		
                 
		}
		if(($username!=$confirmusername)&& ($password!=$confirmpassword))
		{
          	 $msg= "error ... the emails and passwords entered don't match";		 
                  
		}
                header("Location:signup.php?msg=".$msg);
                exit;
        }


	if(!filter_var($_POST["username"], FILTER_VALIDATE_EMAIL))
	{
	     $msg = "ERROR NO SUCH EMAIL!";		
	     header("Location:signup.php?msg=".$msg);
             exit;
	}
	


 mysql_query("use askgc"); 

 $sql = mysql_query("select username from askgcUsers where username='".$username."'");
  

 if(mysql_num_rows($sql) >= 1)
 {
   $msg= "This email is already in use";		
   header("Location:signup.php?msg=".$msg);
   exit;
 }

 mysql_query("use askgc");

 $sql = "INSERT INTO askgcUsers (firstname, lastname, username, password, securityquestion1, securityquestion2, securityanswer1, securityanswer2, userType)
 VALUES ('$fname', '$lname', '$username', '$password', '$securityquestion1', '$securityquestion2', '$securityanswer1', '$securityanswer2', 'NORMAL')";

    
if(!mysql_query($sql))
{
    $msg= "Registration unsuccessful";		
    header("Location:signup.php?msg=".$msg);
    exit;	
}


else
{
  session_start();
  $_SESSION['login_user'] = $username;
  $_SESSION['first_name'] = $fname;
  header("Location:homepage.php");

  $msg = "Dear $fname,\nThank you for registering for ASKGC. We have a lot of resources available to you.\nPlease contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582";
   
  $msg = wordwrap($msg, 80);
  
  mail("$username","$fname Welcome to ASKGC! Please Do Not Reply to this Email", $msg);	
}


mysql_close($connection);

?>		
