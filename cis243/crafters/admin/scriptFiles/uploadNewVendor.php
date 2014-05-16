<?php

//This script uploads information about a new vendor to the database and the vendor logo to the specified directory
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//No need to say why
require "../../common_elements/dbconnection.php";
//The boolean is needed to determine of the logo upload meets sepcifications
$blnOk = true;

//And then getting the necessary information populated for the database
$pageName = "partner-vendors-crafters-home.php";
$vendorName = filter_input(INPUT_POST, "txtVendorName");
$vendorWebsite = filter_input(INPUT_POST, "txtVendorWebsite");
$vendorGraphicInfo = basename( $_FILES['uploadVendorPic']['name']);
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");


//Gosh, MySQL is so picky about those pesky characters, isn't it?
$lineReturns = array ("\r\n", "\n", "\r", "    ");

$vendorName = mysql_real_escape_string($vendorName);
$vendorName = str_replace($lineReturns, "", $vendorName);

$vendorWebsite = mysql_real_escape_string($vendorWebsite);
$vendorWebsite = str_replace($lineReturns, "", $vendorWebsite);

$vendorGraphicInfo = mysql_real_escape_string($vendorGraphicInfo);
$vendorGraphicInfo = str_replace($lineReturns, "", $vendorGraphicInfo);

$metaTitle = mysql_real_escape_string($metaTitle);
$metaTitle = str_replace($lineReturns, "", $metaTitle);

$metaKeywords = mysql_real_escape_string($metaKeywords);
$metaKeywords = str_replace($lineReturns, "", $metaKeywords);

$metaDescription = mysql_real_escape_string($metaDescription);
$metaDescription = str_replace($lineReturns, "", $metaDescription);

//Here is everything once it's all said and done
$sql = "INSERT INTO VENDORS (VENDOR_NAME, VENDOR_WEBSITE, VENDOR_GRAPHIC_INFO)
VALUES ('$vendorName','$vendorWebsite','$vendorGraphicInfo');";

//And now we go on to check to make sure the logo is the right size and type
if ($_FILES["uploadVendorPic"]["size"] > 150000)
{
$_SESSION['VendorMsg'] = "Your file exceeds the maximum upload size.<br>"; 
$blnOk = false;
}

$types = array('image/jpeg', 'image/gif', 'image/png', 'image/tif');
if (!in_array($_FILES["uploadVendorPic"]["type"], $types))
{ 
$_SESSION['VendorMsg'] = "Invalid file format.  Only jpg, gif, png, and tif are authorized.<br>"; 
$blnOk = false;
}
 
 //Here we prepare the logo to be uploaded to the proper directory
$target = "../../VendorLogos/";
$target = $target . basename( $_FILES['uploadVendorPic']['name']); 

//The logo will upload and the MySQL queries will execute only if there was no problems with the logo
if ($blnOk == true)
{
	if(move_uploaded_file($_FILES['uploadVendorPic']['tmp_name'], $target)) 
	{ 
	$_SESSION['VendorMsg'] = "The file ". basename( $_FILES['uploadVendorPic']['name']). " has been uploaded";
	mysql_query($sql) OR die(mysql_error());
	include ("changeMetaData.php");
	} 
	else
	{ 
	$_SESSION['VendorMsg'] = "Sorry, there was a problem uploading your file."; 
	}
}
//And back to the upload page
mysql_close($con);
header("Location: ../modifyPage.php");

?>