<?php
/*This script is used in conjunction with most every other script that updates the meta data.  It was
created for the ability to not have to repeat a bunch of code all over the place*/

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

$sqlMeta = ("UPDATE META_DATA
SET META_TITLE = '$metaTitle', META_KEYWORDS = '$metaKeywords', META_DESCRIPTION = '$metaDescription'
WHERE PAGE_ID = '$pageName'");

mysql_query($sqlMeta) OR die(mysql_error());

?>