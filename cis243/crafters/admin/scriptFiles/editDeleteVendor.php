<?php

/*This PHP script works for editing and deleting the vendor, with specific functions controlled by 
the $pageSection variable, which determines if this will be an edit or delete page*/
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This query pulls the identified vendor information for updating, or to display to the user for
deleting*/
$result = mysql_query("SELECT VENDOR_NAME, VENDOR_WEBSITE, VENDOR_GRAPHIC_INFO
FROM VENDORS
WHERE VENDOR_ID = '$editVendor'");
$row = mysql_fetch_array($result);
$vendorName = $row['VENDOR_NAME'];
$vendorWebsite = $row['VENDOR_WEBSITE'];
$vendorGraphicInfo = $row['VENDOR_GRAPHIC_INFO'];

/*$pageSection equaling two signifies an edit, a three signifies a delete.  This if statement populates
certain elements based on that choice.  The radio buttons for the edit version will include a JavaScript
function to obtain the logo uploader.*/
if ($pageSection == 2)
	{
	print "<p>Edit Vendor $vendorName</p>";
	print '<form enctype="multipart/form-data" action="scriptFiles/updateVendor.php" method="post" onsubmit="return checkVendorValues();">';
	print '<input type="radio" name="rdoSelect" id="rdoKeep" value="1" checked="checked" onclick="return openLogoUploader();" />Keep Existing Picture<br />';
	print '<input type="radio" name="rdoSelect" id="rdoNew" value="2" onclick="return openLogoUploader();" />Replace with new Picture<br />';
	$buttonName = "Edit Vendor";
	}
else
	{
	print "<p>Delete Vendor $vendorName</p>";
	print '<form enctype="multipart/form-data" action="scriptFiles/deleteVendor.php" method="post" onsubmit="return checkVendorValues();">';
	$buttonName = "Delete Vendor";
	}

/*The PHP script then prints the HTML as well as stores the graphic name for the vendor logo in a hidden field
so it can be used when the vendor info is updated.  There is also a div element for inserting an extra script for selecting a new 
vendor logo, which is called by a JavaScript function*/
print <<<here
<img src="../VendorLogos/$vendorGraphicInfo" height="100  width="150" />
<div id="pictureSelector">

</div>
	
<p>Vendor Name:<br />
<input type="text" name="txtVendorName" id="vendorName" value="$vendorName" size="40" /></p>
	
<p>Vendor Website:<br />
<input type="text" name="txtVendorWebsite" id="vendorWebsite" value="$vendorWebsite" size="40" /></p>
<p><input type="hidden" name="txtVendorGraphicInfo" id="graphicInfo" value="$vendorGraphicInfo" /></p>
here;
//The meta elements are called from ehre
include "includeMetaElements.php";

print <<<here
<p><input type="submit" value="$buttonName" /></p>
</form>
<p><a href="controlCenter.php">Back to Control Center</a></p></div>
here;
?>