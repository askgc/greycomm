<?php

include("dataBaseConnect.php");

$dbname = "askgc";

mysql_select_db($dbname) or die ("could not connect");

if(isset($_POST['submit'])){
session_start();

	if(empty($_POST['username']) || empty($_POST['password'])) 
	{
		$msg= "could not login, email or password was invalid";
	        header("Location:login.php?msg=".$msg);
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
			header("Location:login.php?msg=".$msg);
			exit;

		}
		else
		{
	 		echo "login successful";
	  		$count=mysql_num_rows($result);
  			if($count==1)
			{       $result = mysql_query("select firstname from askgcUsers where username='".$username."'");
                                while ($row = mysql_fetch_array($result))
                                 {
				   $fname = $row["firstname"] . "";
                                 }
    			       	$_SESSION['login_user'] = $username;
                                $_SESSION['first_name'] = $fname;			        
				header("Location:homepage.php");	
  			}
                        
		}	
	
	}
}
?>
