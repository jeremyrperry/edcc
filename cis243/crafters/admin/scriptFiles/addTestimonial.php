<?php
//This script adds a testimonial to the database
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//This script can't work without a database connection
require "../../common_elements/dbconnection.php";

//The next several lines of code get the inputs from their respective inputs
$pageName = $_SESSION['pageName'];
$testimonial = filter_input(INPUT_POST, "editor1");
$customerName = filter_input(INPUT_POST, "txtCustomerName");
$customerCompany = filter_input(INPUT_POST, "txtCustomerCompany");
$customerLocation = filter_input(INPUT_POST, "txtCustomerLocation");
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");

//This array is used to ensure there are no objectional characters in the variables.
$lineReturns = array ("\r\n", "\n", "\r", "    ");

/*The next several lines of code go through and make sure that any character that MySQL finds objectionable
are found and removed.*/
$testimonial = mysql_real_escape_string($testimonial);
$testimonial = str_replace($lineReturns, "", $testimonial);

$customerName = mysql_real_escape_string($customerName);
$customerName = str_replace($lineReturns, "", $customerName);

$customerCompany = mysql_real_escape_string($customerCompany);
$customerCompany = str_replace($lineReturns, "", $customerCompany);

$customerLocation = mysql_real_escape_string($customerLocation);
$customerLocation = str_replace($lineReturns, "", $customerLocation);

$metaTitle = mysql_real_escape_string($metaTitle);
$metaTitle = str_replace($lineReturns, "", $metaTitle);

$metaKeywords = mysql_real_escape_string($metaKeywords);
$metaKeywords = str_replace($lineReturns, "", $metaKeywords);

$metaDescription = mysql_real_escape_string($metaDescription);
$metaDescription = str_replace($lineReturns, "", $metaDescription);

//The SQL script is populated with the variables for inserting into the database
$sql = "INSERT INTO CUSTOMER_TESTIMONIALS (TESTIMONIAL, CUSTOMER_NAME, CUSTOMER_COMPANY, CUSTOMER_LOCATION)
VALUES ('$testimonial','$customerName','$customerCompany','$customerLocation');";

//The script executes successfully, or it dies
mysql_query($sql) OR die(mysql_error());

//The script for changing the Meta data is called here
include "changeMetaData.php";

mysql_close($con);

/*The sessions are unset to ensure there is no possibility of errors if another edit to the website is
made, and then the user is directed to the control center.*/
unset($_SESSION['pageName']);
unset($_SESSION['pageSection']);
unset($_SESSION['pageDescription']);

$_SESSION['modificationMsg'] = "<p>Modification was successful.</p>";
header("Location: ../controlCenter.php");

?>