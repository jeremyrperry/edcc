<?php
session_start();
/*This script is called upon from editDeleteVendor.php script when the user decides to replace the 
existing vendor photo*/
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

print <<<here
<p><i>Note:  Picture must be in jpg, gif, png, or tif format.  Maximum 150kb</i></p>

<p>Please choose a logo to upload:<br />
<input name="uploadVendorPic" type="file" /></p>
here;

?>