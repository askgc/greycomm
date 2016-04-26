<?php include("session.php"); include('nav_header.php'); ?>

<title> Forum Category </title> 
<?php
include("pageHeader.php");?>
<form method="post" action="">
    Category name: <input type="text" name="cat_name"/>
   <br><br> Category description: <br><textarea name="cat_description" maxlength="255"/></textarea>
    <br><br><input type="submit" value="Add category" name="cat"/>
 </form>

<?php 

include("dataBaseConnect.php");

if(isset($_POST['cat']))
{
        $category_name = mysql_real_escape_string($_POST['cat_name']);
	$category_description = mysql_real_escape_string($_POST['cat_description']); 
       
	$sql = "INSERT INTO askgcCategories (category_name, category_description) VALUES ('".$category_name."', '".$category_description."')";
        
        mysql_query("use askgc"); 

    if(!empty($category_name) && !empty($category_description))
	$result = mysql_query($sql);

	if($result)
	{
		header("Location:forum.php");
		echo "new category added";

	}
	else
	{
		
		echo "could not create category";
	
	}		
}

?>


<?php include("pageFooter.php");?>

