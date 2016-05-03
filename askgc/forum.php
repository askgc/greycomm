/**
AskGC
 
 Description: This php file provides the interface for the forum page. Categories selected from the database populate the page.
 
 */

<?php include('session.php');
include ("dataBaseConnect.php"); 
include ("nav_header.php"); ?>

<title> ASKGC Forum </title> 

<?php include("pageHeader.php");


mysql_select_db("askgc") or die("could not connect");

mysql_query("use askgc");

$sql = "select * from askgcCategories";

$result = mysql_query($sql);

	if(mysql_num_rows($result)) 
	{
	  	echo '<table border="1" align="center">
              		<tr>
                		<th>Category</th>
                            	</tr>'; 
             
       		 while($row = mysql_fetch_assoc($result))
        	 {      
			$cat_id = mysql_real_escape_string($row['category_id']);
                                  
            		echo "<tr>";
                		echo "<td class='leftpart'>";
                    			echo "<h3><a href='Category_Questions.php?category_id=$cat_id'>" . $row['category_name'] . "</a></h3>" . $row['category_description'];
                		echo "</td>";
     
            		echo "</tr>";
       		 }	

	}

include("pageFooter.php");
?>


 
