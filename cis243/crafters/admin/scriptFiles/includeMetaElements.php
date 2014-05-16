<?php

/*The meta elements are called when jsut about every page edit is made, so it made sense to have it's
own script.*/

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

print <<<here
<p><b>Meta Title</b><br />
<input type="text" name="txtMetaTitle" id="metaTitle" size="75" value="$metaTitle" /></p>
<p><b>Meta Keywords</b><br />
<input type="text" name="txtMetaKeywords" id="metaKeywords" size="75" value="$metaKeywords"/></p>
<p><b>Meta Description</b><br />
<input type="text" name="txtMetaDescription" id="metaDescription" size="75" value="$metaDescription"/></p>
here;

?>