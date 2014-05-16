<?php
session_start();
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This script is populated into the contentSection div element on controlCenter.php when the user wants
to modify the Partner Vendors page.  The user must first choose the section they wish to edit.  The radio buttons are used
to define the specific section the user wishes to edit, and the hidden forms contain the other page information
that modifyPage.php will need in order to call the appropriate scripts and populate the necessary information.  
If editing or deleting a vendor is desired, a JavaScript function is called every time the radio button is changed
and will populate the vendorSection div element with the selectVendorNames.php script if edit or delete is chosen.
*/

print <<<here

<p>Please make your choice for modifying the Partner Vendors page.</p>

<p><b>Note:</b>  The page meta elements can be modified with any selection.</p>

<p><b>Caution:</b>  Adding, modifying, or deleting vendor information using any other method than through this control center 
may cause the Vendor Logo page to display incorrectly.</p>

<form method="post" action="modifyPage.php">
<p><input type="radio" name="rdoSelect" id="rdoNew" value="1" checked="checked" onclick="return openVendorSelection();" />Add New Vendor<br />
<input type="radio" name="rdoSelect" id="rdoEdit" value="2" onclick="return openVendorSelection();" />Edit Existing Vendor<br />
<input type="radio" name="rdoSelect" id="rdoEdit" value="3" onclick="return openVendorSelection();" />Delete Vendor<br />
<input type="hidden" id="pageName" name="pageName" value="partner-vendors-crafters-home.php" /><br />
<input type="hidden" id="pageDescription" name="pageDescription" value="Modify Partner Vendors Page" /></p>
<div id="vendorSelection">

</div>
<p><input type="submit" value="Pull Information"></p>
</form>

here;


?>
