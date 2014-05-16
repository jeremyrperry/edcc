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

//This script ain't got a prayer of working without the following:
require "../../common_elements/dbconnection.php";

//Pull the vendor information
$result = mysql_query("SELECT VENDOR_ID, VENDOR_NAME
FROM VENDORS");

//Then use a while loop to populate the data into a select box
print '<p><select name="vendors">';
while($row = mysql_fetch_array($result))
{
print "<option value=";
print $row['VENDOR_ID'];
print ">";
print $row['VENDOR_NAME'];
print "</option>";
}

print "</select></p>";
//Fin
mysql_close($con);
?>
