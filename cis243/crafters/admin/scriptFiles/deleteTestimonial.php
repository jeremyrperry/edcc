<?php
//This script deletes a selected testimonial from the database
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//For obvious reasons
require "../../common_elements/dbconnection.php";
 //The next several lines populate the variables for the subsequent SQL scripts
$pageName = "testimonials-crafters-home.php";
$testimonialId = $_SESSION['editTestimonial'];
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");

/*The next several lines helps ensure the variables won't have any characters that MySQL would object
to*/
$lineReturns = array ("\r\n", "\n", "\r", "    ");

$metaTitle = mysql_real_escape_string($metaTitle);
$metaTitle = str_replace($lineReturns, "", $metaTitle);

$metaKeywords = mysql_real_escape_string($metaKeywords);
$metaKeywords = str_replace($lineReturns, "", $metaKeywords);

$metaDescription = mysql_real_escape_string($metaDescription);
$metaDescription = str_replace($lineReturns, "", $metaDescription);

/*The SQL statement for deleting the testimonial info*/
$sql = ("DELETE FROM CUSTOMER_TESTIMONIALS
WHERE TESTIMONIAL_ID = '$testimonialId'");

/*Give me my query or give me death!!!*/
mysql_query($sql) OR die(mysql_error());

//The script calls up the changeMetaData script for updating
include "changeMetaData.php";


mysql_close($con);

//Some session variables are unset to reduce the chance of errors
unset($_SESSION['pageName']);
unset($_SESSION['pageSection']);
unset($_SESSION['pageDescription']);
unset($_SESSION['editTestominial']);

//And back to the control center
$_SESSION['modificationMsg'] = "<p>Modification was successful.</p>";
header("Location: ../controlCenter.php");

?>