<?php

/*This script is capable of making the modifications to all of the page sections that utilize the CKEditor 
(except for the testimonials)*/
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*The script first uses the variables created in modifyPage.php to call upon the proper data to populate
the CKEditor.*/
$result = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = '$pageName'
AND CONTENT_SECTION = '$pageSection'");
$row = mysql_fetch_array($result);
$content = $row['CONTENT_HTML'];

print <<<here

<p>$pageDescription - Section $pageSection</p>
<form method="post" action="scriptFiles/makeChange.php">
here;

/*Calls up the CKEditor and Meta Elements scripts*/
include "scriptFiles/includeEditor.php";

include "scriptFiles/includeMetaElements.php";

print <<<here
<p><input type="submit" value="Submit Information" />
</form>
here;
?>