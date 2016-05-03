/*
 AskGC
 
 Description: This php file allows for conection to the database that hold all the information needed to interact with this interface. Most php files, if not every php file, associated with this interface must include this file in order to function properly.
 
 */

<?php

$host="cs-database.cs.loyola.edu";
$DBusername="askgc";
$DBpassword="2uC5yf3KSPAMVbFJ";
$database_name= "askgc";

define($connection, mysql_connect("$host", "$DBusername", "$DBpassword") or die("unable to connect"));


?>
