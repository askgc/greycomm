/**
 Author:
 Author:
 
 Description: This php file allows a user to create a new post.
 
 */

<?php include("session.php"); include("nav_header.php");?>

<?php 
include("dataBaseConnect.php");
include("pageHeader.php"); 

        mysql_query("use askgc");
	$sql = "select * from askgcCategories";
	$result = mysql_query($sql);

        if(mysql_num_rows($result)>=1)
	{
		 echo '<form method="post" action="">
                    Question: <input type="text" name="question_topic" />
                   <br><br> Category: '; 
                 
                echo '<select name="question_cat">';
                    while($row = mysql_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                    }
                echo '</select>'; 
                     
                echo '<br> <br>Description: <br><textarea name="post_content" /></textarea><br><br>
                    <input type="submit" value="Post Question" name="submit_topic" />
                 </form>';
	}

        else
	{
		echo "Create a category there are none active";
	}

   if(isset($_POST['submit_topic']))
   {
	$question_topic = mysql_real_escape_string($_POST['question_topic']);
	$question_category = mysql_real_escape_string($_POST['question_cat']);
	$question_by = mysql_escape_string($_SESSION['user_id']);
	$question_description = mysql_escape_string($_POST['post_content']);
	 	

	$sql = "INSERT INTO askgcSubjects(subject_topic, subject_date, subject_cat, subject_by) 
		VALUES ('".$question_topic."', NOW(), '".$question_category."' , '".$question_by."')";
	


	if(!empty($question_topic) && !empty($question_category) && !empty($question_description)) 
	{
		$result = mysql_query($sql);
	               
		if($result)
		{
			echo "New question added"."<br>";
			$sql = "select * from askgcSubjects where subject_topic='".$question_topic."'";
			$result = mysql_query($sql); 
			
			
		  if(mysql_num_rows($result)>=1)
		  {
			while($row = mysql_fetch_assoc($result))
			{
				$subject_id = $row['subject_id'];
			}
			
			$sql = "INSERT INTO askgcPosts(posts_content, posts_date, posts_topic, posts_by)
				VALUES ('".$question_description."', NOW(), '".$subject_id."', '".$question_by."')";
			$result = mysql_query($sql);
			if($result)
			{
				echo "New post created"."<br>";
                                header("Location:post.php?id=".$subject_id);
			}
			else
			{
				echo "Could not create post"."<br>";
			}
		  }
		}
		else
		{
			echo "Could not add your question." ."<br>";;
		}
	}
	else
	{

		echo "Could not add your question a field was blank." ."<br>";;

	}
   }

include("pageFooter.php"); 
?>
