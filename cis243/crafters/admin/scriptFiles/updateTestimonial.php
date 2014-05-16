<?php
//This script saves the changes the user has made to an existing testimonial to the database.
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//Think about what would happen if this wasn't here
require "../../common_elements/dbconnection.php";

//Here we get the information to be submitted to the database
$pageName = $_SESSION['pageName'];
$testimonialId = $_SESSION['editTestimonial'];
$testimonial = filter_input(INPUT_POST, "editor1");
$customerName = filter_input(INPUT_POST, "txtCustomerName");
$customerCompany = filter_input(INPUT_POST, "txtCustomerCompany");
$customerLocation = filter_input(INPUT_POST, "txtCustomerLocation");
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");

//And of course the next several lines deal with making the variables all pretty for MySQL
$lineReturns = array ("\r\n", "\n", "\r", "    ");

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

//And then the SQL statement for the customer testimonial to be updated
$sql = ("UPDATE CUSTOMER_TESTIMONIALS
SET TESTIMONIAL = '$testimonial', CUSTOMER_NAME = '$customerName', CUSTOMER_COMPANY = '$customerCompany', CUSTOMER_LOCATION = '$customerLocation'
WHERE TESTIMONIAL_ID = '$testimonialId'");

mysql_query($sql) OR die(mysql_error());

//Where the meta data changes will be handled
include "changeMetaData.php";

mysql_close($con);

//This is simply good practice to do, helps prevent errors down the editing road
unset($_SESSION['pageName']);
unset($_SESSION['pageSection']);
unset($_SESSION['pageDescription']);
unset($_SESSION['editTestominial']);

//A little note for the user on the other side, and off to controlCenter.php
$_SESSION['modificationMsg'] = "<p>Modification was successful.</p>";
header("Location: ../controlCenter.php");

?>