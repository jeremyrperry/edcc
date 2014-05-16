<?php
session_start();
/*This PHP script populates the vendorSelection div element on selectPartner.php with the available 
testimonials for editing and deleting if called upon.*/

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
	
//This script ain't got a prayer of working without the following:
require "../../common_elements/dbconnection.php";

//Pull the vendor information based on user authorization levels
if ($_SESSION['userLevel'] == "Administrator")
	{
	$result = mysql_query("SELECT USERNAME
	FROM USER_INFO
	WHERE USER_LEVEL = 'User'");
	}
else
	{
	$result = mysql_query("SELECT USERNAME
	FROM USER_INFO
	WHERE USER_LEVEL <> 'Super Administrator'");
	}
//Then use a while loop to populate the data into a select box
print '<p><select name="users">';
while($row = mysql_fetch_array($result))
{
print "<option value=";
print $row['USERNAME'];
print ">";
print $row['USERNAME'];
print "</option>";
}

print "</select></p>";
//Fin
mysql_close($con);
?>
