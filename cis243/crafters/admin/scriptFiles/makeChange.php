<?php
/*This script is capable of making the changes to all of the page sections that utilize the CKEditor 
(except for the testimonials)*/
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//The dbconnection. Wouldn't get far without it
require "../../common_elements/dbconnection.php";


//The next several lines gathers all of the input needed for the SQL statements
$contentChanged = filter_input(INPUT_POST, "editor1");
$pageSection = $_SESSION['pageSection'];
$pageName = $_SESSION['pageName'];
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");

//Because we know how much MySQL throws a fit about prohibited characters
$lineReturns = array ("\r\n", "\n", "\r", "    ");

$contentChanged = mysql_real_escape_string($contentChanged);
$contentChanged = str_replace($lineReturns, "", $contentChanged);

$metaTitle = mysql_real_escape_string($metaTitle);
$metaTitle = str_replace($lineReturns, "", $metaTitle);

$metaKeywords = mysql_real_escape_string($metaKeywords);
$metaKeywords = str_replace($lineReturns, "", $metaKeywords);

$metaDescription = mysql_real_escape_string($metaDescription);
$metaDescription = str_replace($lineReturns, "", $metaDescription);

/*This SQL statement uses several variables because multiple parts on different pages are edited from
here*/
$sql = ("UPDATE CONTENT_STORAGE
SET CONTENT_HTML = '$contentChanged'
WHERE CONTENT_PAGE = '$pageName'
AND CONTENT_SECTION = '$pageSection'");

mysql_query($sql) OR die(mysql_error());

//The ever-important part to call up the script to change the meta data
include "changeMetaData.php";

mysql_close($con);

//And then the session variables are unset
unset($_SESSION['pageName']);
unset($_SESSION['pageSection']);
unset($_SESSION['pageDescription']);

//And back to the control center
$_SESSION['modificationMsg'] = "<p>Modification was successful.</p>";
header("Location: ../controlCenter.php");

?>