/**
AskGC
 
 Description: This php file provides the back-end component to the Register page. A user will input the specified values. The database compares those values to data in the database and creates an account, if one with that information does not exist. A newly registered user will recieve an activation email with a cliackable link to activate their account.
 
*/

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
 $dt = new DateTime();
 $date = $dt->format('m-d-y h:ia'); 
 $validateEmail = "inactive";
 $activation = md5(uniqid(rand(), true));
 $link = "www.cs.loyola.edu/~sjean/askgc/activation.php?activation=$activation";

 $sql = "INSERT INTO askgcUsers (firstname, lastname, username, password, securityquestion1, securityquestion2, securityanswer1, securityanswer2, userType, userDate, validateEmail, activation)
 VALUES ('$fname', '$lname', '$username', '$password', '$securityquestion1', '$securityquestion2', '$securityanswer1', '$securityanswer2', 'NORMAL', '$date','$validateEmail', '$activation')";

    
if(!mysql_query($sql))
{
    $msg= "Registration unsuccessful";		
    header("Location:signup.php?msg=".$msg);
    exit;	
}


else
{   

  $msg = "Dear $fname,\nThank you for registering for ASKGC. Please click the following link to activate your account.\n If not active link, copy and paste the link into your browser. \n $link \n Please contact us if you have any questions.\nEmail: gctv@loyola.edu\nStudioPhone: (410) 617-5582";

  
  mail("$username","$fname Welcome to ASKGC! Please Do Not Reply to this Email", $msg);
  $msg = "Registration Successful please check your email to activate your account.";	
  header("Location:login.php?msg=".$msg);

  
}


mysql_close($connection);

?>		
