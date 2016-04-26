<? include("dataBaseConnect.php");
include("session.php");
include("nav_header.php");
?>


<? include("pageHeader.php"); 

mysql_query("use askgc");

$post_id = $_GET['id'];

if(empty($post_id))
{
	header("Location:forum.php");	
}

$sql = "select * from askgcSubjects WHERE subject_id = $post_id";
$result = mysql_query($sql);


if($result)
{
	$row = mysql_fetch_assoc($result);
	
	$subject_topic = mysql_escape_string($row['subject_topic']);
	echo '<h2><center>Posts related to "'. $subject_topic .'"</center></h2>';
		
	$sql = "select * from askgcPosts WHERE posts_topic = $post_id";
	$result = mysql_query($sql);
	if($result)
	{
		echo '<table border="2" align="center">
                      <tr>
                        <th><center>Post</center></th>
                        <th>Created By</th>
                      </tr>'; 
		
				      
		
		while($row = mysql_fetch_assoc($result))
                {  
				   $user_id = $row['posts_by'];
				   $sql = "select * from askgcUsers where id=$user_id";
				   	$result_user = mysql_query($sql);
					if($result_user)
					{
						while($find_user = mysql_fetch_assoc($result_user))
						{
							$user_fname = $find_user['firstname'];
							$user_lname = $find_user['lastname'];	
						}
					}
					echo '<tr>';
							echo '<td class="leftpart">';
								echo '<p>  '.wordwrap($row['posts_content'],20).' <p>';
							echo '</td>';
							echo '<td class="rightpart">';
					echo $user_fname ." " .$user_lname ." on: " ."<br>";
								echo $row['posts_date'];
							echo '</td>';
						echo '</tr>';
    				 
				  
		}

                echo '<table border ="2" align="center">
		      <tfoot>
                         <br><br><br>
		        <td>
			<br> <br> 
                         <h3>Post a reply</h3>
                         <br>
		 	<form method="post" action="" style="float:bottom">
    			  <textarea name="reply-content"></textarea> <br> <br> 
   			  <input type="submit" value="Submit reply" name="submit" />
        		</form>
		        </td>
		      </tfoot>';
		


                
			
	}
}

if(isset($_POST['submit']))
{
	
	$reply_id = $_GET['id']; 
	$reply_content = mysql_real_escape_string($_POST['reply-content']);

	if(!empty($_POST['reply-content']) && !empty($reply_id) && !empty($_SESSION['user_id']))
	{
       	 	//a real user posted a real reply
        	$sql = "INSERT INTO askgcPosts(posts_content, posts_date, posts_topic, posts_by)
		VALUES ('".$reply_content."', NOW(), '".$reply_id."', '".$_SESSION['user_id']."')";
                                                                                
        	$result = mysql_query($sql);
                         
        	if(!$result)
       		 {
		  
	     		 header("Location:post.php?id=".$reply_id);
		 	 echo "could not reply to post";

        	}
       		else
       		{  
		  	header("Location:post.php?id=".$reply_id);

       	 	}
	}


 

}

include("pageFooter.php"); ?>



