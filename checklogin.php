// login verification + will direct to main menu if succeeded.

<?php

// setting variables for db mysql connection
   session_start();
   $host="localhost"; // Host name 
   $username="root"; // Mysql username 
   $password=""; // Mysql password 
   $db_name="mcdcoop"; // Database name 
   $tbl_name="users"; // Table name

// Connect to mysql server and select databse.
   mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
   mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
   $myusername=$_POST['myusername']; 
   $mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
   $myusername = stripslashes($myusername);
   $mypassword = stripslashes($mypassword);
   $myusername = mysql_real_escape_string($myusername);
   $mypassword = mysql_real_escape_string($mypassword);

   $sql="SELECT * FROM $tbl_name WHERE uname='$myusername' and pword='$mypassword'";
   $result=mysql_query($sql);

// Mysql_num_row is counting table row
   $count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
   if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
      $_SESSION['myusername'] = $myusername;
      $_SESSION['mypassword'] = $mypassword; 
      header("location:login_success.php");
   }
   else {
      header("location:login_failure.php");
   }
?>