<?php
	session_start();
   $host="localhost"; // Host name 
   $username="root"; // Mysql username 
   $password=""; // Mysql password 
   $db_name="company"; // Database name 

// Connect to mysql server and select databse.
   mysql_connect("$host", "$username", "$password")or die("cannot connect") or die(mysql_error()); 
   mysql_select_db("$db_name")or die("cannot select DB") or die(mysql_error());
?>
