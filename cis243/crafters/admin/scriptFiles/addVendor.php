<?php
/*This script is included as part of modifyPage.php when the user wants to add vendor information
*/
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*If the user previously uploaded vendor information, this section will print out a status message*/
if (isset($_SESSION['VendorMsg']))
	{
	print($_SESSION['VendorMsg']);
	unset($_SESSION['VendorMsg']);
	}

/*The HTML to be printed out*/	
print <<<here
<p>Add a New Vendor</p>
<p><i>Note:  Picture must be in jpg, gif, png, or tif format.  Maximum 150kb</i></p>
<form enctype="multipart/form-data" action="scriptFiles/uploadNewVendor.php" method="post" onsubmit="return checkVendorValues();">
<p>Please choose a logo to upload:<br />
<input name="uploadVendorPic" type="file" /></p>
	
<p>Vendor Name:<br />
<input type="text" name="txtVendorName" id="vendorName" size="40" /></p>
	
<p>Vendor Website:<br />
<input type="text" name="txtVendorWebsite" id="vendorWebsite" size="40" /></p>
here;
/*This script is called to add in the meta elements*/
include "includeMetaElements.php";
print <<<here
<p><input type="submit" value="Submit New Vendor" /></p>
</form>
<p><a href="controlCenter.php">Back to Control Center</a></p></div>
here;
?>