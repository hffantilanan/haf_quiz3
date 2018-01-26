<?php

ob_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password

$db_name="haf_quiz3"; // Database name
$tbl_name="members"; // Table name
// Connect to server and select databse.

mysql_connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername = $_POST['haf_username'];
$mypassword = $_POST['haf_password'];

/*
if ( $myusername == "fcu" && $mypassword == "bsit" ) 
    echo "Horra";
else
    echo "ahay";
*/    

// To protect MySQL injection (more detail about MySQL injection)

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and
password='$mypassword'";

$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

if($count==1){
		session_start();
		$_SESSION['haf_username'] = $myusername;		
		$_SESSION['haf_password'] = $mypassword;	
		header("location:haf_index.php");
}
else
{
		echo "Wrong Username or Password";
}

ob_end_flush();




?>