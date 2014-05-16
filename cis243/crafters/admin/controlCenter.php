<?php
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}
require "../common_elements/checkstatus2.php";

//Unsets the photo status message upon return to the control center (otherwise would cause an issue once modifyPage.php is accessed)
if (isset($_SESSION['PhotoMsg']))
	{
	unset($_SESSION['pageName']);
	unset($_SESSION['pageSection']);
	unset($_SESSION['pageDescription']);
	unset($_SESSION['PhotoMsg']);
	}

//Sets the user's first name for a personalized greeting message
$userFName = $_SESSION['userFName'];

//Retreives the modification status message after the user is finished editing a section of website
$modificationMsg = "";
if (isset($_SESSION['modificationMsg']))
	{
	$modificationMsg = $_SESSION['modificationMsg'];
	unset($_SESSION['modificationMsg']);
	}
	
//Unsets the vendor status message upon return to the control center (otherwise would cause an issue once modifyPage.php is accessed)
if (isset($_SESSION['VendorMsg']))
	{
	unset($_SESSION['pageName']);
	unset($_SESSION['pageSection']);
	unset($_SESSION['pageDescription']);
	unset($_SESSION['VendorMsg']);
	}
?>

<?php
//The header was sectioned off to allow for easier coding of this apge
include "common_elements/header.php";
?>

<?php

//This prints out the personalized message for the user, and permits them to select the section they wish to edit via the links to the JavaScript functions 
print <<<here

<table width="100%">
<tr>
<td align="center">
<p align="center">Welcome to the Control Center, $userFName.  You may modify the contents of any of the below pages</p>
</td>
</tr>
</table>

<table width="100%">
<colgroup width="33%" />
<colgroup width="67%" />
<tr>
<td valign="top">
<p></p>
<p><a href="javascript:showModifyMain();">Modify Main Page</a></p>
<p></p>
<p><a href="javascript:showModifyMemberBenefits();">Modify Member Benefits Page</a></p>
<p></p>
<p><a href="javascript:showModifyPartnerVendors();">Modify Partner Vendors Page</a></p>
<p></p>
<p><a href="javascript:showModifyTestimonials();">Modify Testimonials Page</a></p>
<p></p>
<p><a href="javascript:showModifyAbout();">Modify About Us Page</a></p>
<p></p>
here;

$types = array('Administrator', 'Super Administrator');
if (in_array($_SESSION['userLevel'], $types))
	{
	print'<p><a href="javascript:showModifyUsers();">Modify Users</a></p>
	<p></p>';
	}
	
print <<<here
<form method="post" action="logout.php" onsubmit="return logout();">
<p><input type="submit" value="Logout"></p>
</form>

</td>
<td valign="top">



here;

//Any modification message will print here
if ($modificationMsg !="")
	{
	print "<p>$modificationMsg</p>";
	}

//The JavaScript functions called upon earlier will print the related PHP function into the div element below
print <<<here

<div id="contentSection">
</div>

</td>
</tr>
</table>

here;

//The footer was sectioned off to allow for easier coding of this apge
include "common_elements/footer.php";
?>