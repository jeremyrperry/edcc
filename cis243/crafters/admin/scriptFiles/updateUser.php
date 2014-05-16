<?php
//This script updates user information
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//This is a backup security measure to ensure that only administrators and super administrators can access the site
$types = array('Administrator', 'Super Administrator');
if (!in_array($_SESSION['userLevel'], $types))
	{
	header("Location: controlCenter.php");
	}

//This script can't work without a database connection
require "../../common_elements/dbconnection.php";

//The next several lines of code get the inputs from their respective inputs
$oldUsername = filter_input(INPUT_POST, "txtOldUserName");
$username = filter_input(INPUT_POST, "txtUsername");
$userPassword = filter_input(INPUT_POST, "txtUserPassword");
$userFirstName = filter_input(INPUT_POST, "txtUserFirstName");
$userLastName = filter_input(INPUT_POST, "txtUserLastName");
$userEmail = filter_input(INPUT_POST, "txtUserEmail");
$userQuestion = filter_input(INPUT_POST, "txtUserQuestion");
$userAnswer =  filter_input(INPUT_POST, "txtUserAnswer");
$userLevel = filter_input(INPUT_POST, "rdoAccess");

//This array is used to ensure there are no objectional characters in the variables.
$lineReturns = array ("\r\n", "\n", "\r", "    ");

/*The next several lines of code go through and make sure that any character that MySQL finds objectionable
are found and removed.*/

$oldUsername = mysql_real_escape_string($oldUsername);
$oldUsername = str_replace($lineReturns, "", $oldUsername);

$username = mysql_real_escape_string($username);
$username = str_replace($lineReturns, "", $username);

$userPassword = mysql_real_escape_string($userPassword);
$userPassword = str_replace($lineReturns, "", $userPassword);

$userFirstName = mysql_real_escape_string($userFirstName);
$userFirstName = str_replace($lineReturns, "", $userFirstName);

$userLastName = mysql_real_escape_string($userLastName);
$userLastName = str_replace($lineReturns, "", $userLastName);

$userEmail = mysql_real_escape_string($userEmail);
$userEmail = str_replace($lineReturns, "", $userEmail);

$userQuestion = mysql_real_escape_string($userQuestion);
$userQuestion = str_replace($lineReturns, "", $userQuestion);

$userAnswer = mysql_real_escape_string($userAnswer);
$userAnswer = str_replace($lineReturns, "", $userAnswer);

//The SQL script is populated with the variables for inserting into the database
$sql = "UPDATE USER_INFO
SET USERNAME = '$username', USER_PASSWORD = '$userPassword', USER_F_NAME = '$userFirstName', USER_L_NAME = '$userLastName', USER_EMAIL = '$userEmail', USER_QUESTION = '$userQuestion', USER_ANSWER = '$userAnswer', USER_LEVEL = '$userLevel'
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