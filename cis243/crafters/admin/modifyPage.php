<?php

session_start();
require "../common_elements/checkstatus2.php";


//This page will not function properly without the database connection
require "../common_elements/dbconnection.php";

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}
//The following variables are declared for later use and verification of certain conditions.
$pageName = "";
$editTestimonial = "";

//Collects the inputs from the radio buttons of the PHP script that is called upon from the control center.
$_SESSION['pageSection'] = filter_input(INPUT_POST, "rdoSelect");
$pageSection = $_SESSION['pageSection'];

/*Updating the vendors webpage will generate the VendorMsg session variable.  This will direct navigation back towards the vendor upload/modification script
since the user may wish to upload multiple vendors at once*/
if (isset($_SESSION['VendorMsg']))
	{
	$pageName = "partner-vendors-crafters-home.php";
	$_SESSION['pageName'] = $pageName;
	}
else
	{
	$_SESSION['pageName'] = filter_input(INPUT_POST, "pageName");
	$pageName = $_SESSION['pageName'];
	}

//Collects the input for the page description that is used in most of the editing scripts	
$_SESSION['pageDescription'] = filter_input(INPUT_POST, "pageDescription");
$pageDescription = $_SESSION['pageDescription'];

//The testimonials page has a special section that this if statement is designed to catch in order to populate the right information
if ($pageName == "testimonials-crafters-home.php")
	{
	$editTestimonial = filter_input(INPUT_POST, "testimonials");
	$_SESSION['editTestimonial'] = $editTestimonial;
	}
//The vendors page has a special section that this if statement is designed to catch in order to populate the right information	
if ($pageName == "partner-vendors-crafters-home.php")
	{
	$editVendor = filter_input(INPUT_POST, "vendors");
	$_SESSION['editVendor'] = $editVendor;
	}

//The meta information for each page is able to be edited in most every PHP editing script.  This part pulls the necessary information.
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = '$pageName'");
$rowMeta = mysql_fetch_array($resultMeta);
$metaTitle = $rowMeta['META_TITLE'];
$metaKeywords = $rowMeta['META_KEYWORDS'];
$metaDescription = $rowMeta['META_DESCRIPTION'];

include "common_elements/header.php";

/*This part of the if statement was created because the process for uploading the photos for the main page was designed to go back to the page to allow
the user to upload another if they so desire.  It isn't practical to send them back to the page with the other session information.
Don't ask me why, but PHP won't let it work that way.  I tried*/
if (isset($_SESSION['PhotoMsg']))
	{
	include "scriptFiles/modifyMainPictures.php";
	}
/*This part of the if statement was created because the process for uploading the vendor iformation was designed to go back to the page to allow
the user to upload another if they so desire.  It isn't practical to send them back to the page with the other session information.
Don't ask me why, but PHP won't let it work that way.  I tried*/
elseif (isset($_SESSION['VendorMsg']))
	{
	include "scriptFiles/addVendor.php";
	}
/*The remaining sections of the if statement will evaluate the page the user has targeted for editing and pulls up the appropriate php scripts associated with
that act. */
else
{
	if ($pageName == "modifyUsers")
		{
		$editUser = filter_input(INPUT_POST, "users");
		include "scriptFiles/modifyUsers.php";
		}
	elseif ($pageName == "index.php")
		{
		//This part checks to see which part of the main page needs editing, since there is a seperate PHP script for the photo section.
		if ($pageSection != 1)
			{
			include "scriptFiles/modifyContent.php";
			}
		else
			{
			include "scriptFiles/modifyMainPictures.php";
			}
		}
	elseif ($pageName == "partner-vendors-crafters-home.php")
		{
		//The adding and editing/deleting of the vendor information are two seperate scripts, and this is the process that determines which one needs to be pulled.
		if ($pageSection == 1)
			{	
			include "scriptFiles/addVendor.php";
			}
		else
			{
			include "scriptFiles/editDeleteVendor.php";
			}
		}
	elseif ($pageName == "testimonials-crafters-home.php")
		{
		include "scriptFiles/modifyTestimonials.php";
		}
	//The remaining pages all use one common content modification script
	else
		{
		include "scriptFiles/modifyContent.php";
		}
}

//Closes the database connection
mysql_close($con);

include "common_elements/footer.php";
?>