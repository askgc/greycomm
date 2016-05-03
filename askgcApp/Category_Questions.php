/**
 AskGC
 
 Description: Each Category has a corresponding identification number. This php file is responsible for querying for the correct Category based on that identification number. Each Category also has a number of subjects, which include a date, and id number, and a topic, that are retrieved.
 
 */

<?php include("session.php");
include('nav_header.php');
include("dataBaseConnect.php"); ?> 

<title> ASKGC Questions </title> 

<?php include("pageHeader.php");


mysql_select_db("askgc") or die("could not connect");

mysql_query("use askgc");


$cat_id = $_GET['category_id'];

if(empty($cat_id))
{
	header("Location:forum.php");
}

$sql = "select category_name from askgcCategories WHERE category_id = $cat_id";
$result = mysql_query($sql);

if(mysql_num_rows($result)>=1)
{


	$row = mysql_fetch_assoc($result);
	$cat_name = mysql_escape_string($row['category_name']);
	echo '<h1><center> Questions in '. $cat_name .' Category </center></h1>';
	$sql = "select * from askgcSubjects where subject_cat='".$cat_id."'";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)>=1)
	{
		 echo '<table border="1" align="center">
                      <tr>
                        <th><center>Questions</center></th>
                        <th>Created on</th>
                      </tr>'; 
                     
                while($row = mysql_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="post.php?id=' . $row['subject_id'] . '">' . $row['subject_topic'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['subject_date']));
                        echo '</td>';
                    echo '</tr>';
                }
	}

}

include("pageFooter.php")
?>



