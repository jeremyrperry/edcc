<?php
//This script deletes a user
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (($_SESSION['authorized'] != true) || (!isset($_SESSION['authorized'])))
	{
	$_SESSION['errorMsg'] = "<p color='red'>Your are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//This is a backup security measure to ensure that only administrators and super administrators can access the site
$types = array('Administrator', 'Super Administrator');
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//This script can't work without a database connection
require "../../common_elements/dbconnection.php";

//This variable gets the username to delete
$oldUsername = filter_input(INPUT_POST, "txtOldUserName");

//The SQL script is populated with the variable to identify the user to delete
$sql = "DELETE FROM USER_INFO
WHERE USERNAME = '$oldUsername'";

//The script executes successfully, or it dies
mysql_query($sql) OR die(mysql_error());

mysql_close($con);

/*The sessions are unset to ensure there is no possibility of errors if another edit to the website is
made, and then the user is directed to the control center.*/
unset($_SESSION['pageName']);
unset($_SESSION['pageSection']);
unset($_SESSION['pageDescription']);

$_SESSION['modificationMsg'] = "<p>Modification was successful.</p>";
header("Location: ../controlCenter.php");

?>