<?php
//This script deletes the selected vendor from the database
session_start();

//Can this script fuction without a database connection?  I think not!!
require "../../common_elements/dbconnection.php";

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//The next several lines get all of the necessary information for the subsequent SQL statements
$delete = $_SESSION['editVendor'];
$pageName = "partner-vendors-crafters-home.php";
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");

//Ensuring the meta elements are going to play nice with MySQL and not have any objectionable characters
$lineReturns = array ("\r\n", "\n", "\r", "    ");

$metaTitle = mysql_real_escape_string($metaTitle);
$metaTitle = str_replace($lineReturns, "", $metaTitle);

$metaKeywords = mysql_real_escape_string($metaKeywords);
$metaKeywords = str_replace($lineReturns, "", $metaKeywords);

$metaDescription = mysql_real_escape_string($metaDescription);
$metaDescription = str_replace($lineReturns, "", $metaDescription);

//The delete statement
$sql = ("DELETE FROM VENDORS
WHERE VENDOR_ID = '$delete'");

mysql_query($sql) OR die(mysql_error());

//This ensures the meta data gets changed
include "changeMetaData.php";

//This is where the vendor logo gets deleted from the directory
$file = "../../VendorLogos/" . filter_input(INPUT_POST, "txtVendorGraphicInfo");
unlink($file);
mysql_close($con);
//Then back to the control center we go!!
$_SESSION['modificationMsg'] = "Vendor Deleted<br />";
header("Location: ../controlCenter.php");

?>