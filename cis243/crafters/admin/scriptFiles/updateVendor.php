<?php
/*This script saves the changes the user has made to an existing vendor to the database, and uploads 
a new vendor logo if required.*/
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//Not even going to say why anymore
require "../../common_elements/dbconnection.php";

//This boolean is necessary in order to catch any problems with a file upload
$blnOk = true;

//The next several variables get their information from the form on the editDeleteVendor.php script
$pageName = "partner-vendors-crafters-home.php";
$vendorName = filter_input(INPUT_POST, "txtVendorName");
$vendorWebsite = filter_input(INPUT_POST, "txtVendorWebsite");
$editVendor = $_SESSION['editVendor'];
$metaTitle = filter_input(INPUT_POST, "txtMetaTitle");
$metaKeywords = filter_input(INPUT_POST, "txtMetaKeywords");
$metaDescription = filter_input(INPUT_POST, "txtMetaDescription");
$newPicture = filter_input(INPUT_POST, "rdoSelect");
$vendorGraphicInfo = filter_input(INPUT_POST, "txtVendorGraphicInfo");
/*This if statement will check to see if the user wants the existing logo replaced, and will delete the
current logo and populate the variable with the new logo if this is the case*/
if ($newPicture == 2)
	{
	$file = "../../VendorLogos/" . $vendorGraphicInfo;
	unlink($file);
	$vendorGraphicInfo = basename( $_FILES['uploadVendorPic']['name']);
	}

//Prettying up for the big date with the MySQL database
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

//The MySQL script will be set first
$sql = ("UPDATE VENDORS
SET VENDOR_NAME = '$vendorName', VENDOR_WEBSITE = '$vendorWebsite', VENDOR_GRAPHIC_INFO = '$vendorGraphicInfo'
WHERE VENDOR_ID = '$editVendor'");

/*If a new logo has been added, the script will go through and check to see if the logo meets all of the 
paramaters*/
if ($newPicture == 2)
	{
	if ($_FILES["uploadVendorPic"]["size"] > 150000)
		{
		$_SESSION['modificationMsg'] = "Your file exceeds the maximum upload size.<br>"; 
		$blnOk = false;
		}

	$types = array('image/jpeg', 'image/gif', 'image/png', 'image/tif');
	if (!in_array($_FILES["uploadVendorPic"]["type"], $types))
		{ 
		$_SESSION['modificationMsg'] = "Invalid file format.  Only jpg, gif, png, and tif are authorized.<br>"; 
		$blnOk = false;
		}
 
	$target = "../../VendorLogos/";
	$target = $target . basename( $_FILES['uploadVendorPic']['name']); 

	/*If the new logo checks out, the MySQL script is executed first, the picture is uploaded second, and
	the meta data third*/
	if ($blnOk == true)
		{
		if(move_uploaded_file($_FILES['uploadVendorPic']['tmp_name'], $target)) 
			{ 
			$_SESSION['modificationMsg'] = "The file ". basename( $_FILES['uploadVendorPic']['name']). " has been uploaded";
			mysql_query($sql) OR die(mysql_error());
			include ("changeMetaData.php");
			} 
		else
			{ 
			$_SESSION['modificationMsg'] = "Sorry, there was a problem uploading your file."; 
			}
		}
	/*Going back to the control center, with a status message of what happened with the upload*/
	header("Location: ../controlCenter.php");
	}
/*If no logo change occured, this script executes*/
else
	{
	mysql_query($sql) OR die(mysql_error());
	include ("changeMetaData.php");
	$_SESSION['modificationMsg'] = "Update was successful<br />";
	header("Location: ../controlCenter.php");
	}
//Last but not least
mysql_close($con);
?>