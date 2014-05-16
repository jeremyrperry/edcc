<?php
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This PHP script populates the necessary HTML and data to allow the user to add, edit or delete an existing
testimonial, depending on the value of the $pageSelection variable*/
$content = "";
$customerName = "";
$customerCompany = "";
$customerLocation = "";
$submitButtonName = "Submit Entry";

/*If add new testimonial is chosen (identified by the value 1), only the $formSubmit value needs to change*/
if ($pageSection == 1)
	{
	$formSubmit = "scriptFiles/addTestimonial.php";
	}
else
{
	/*In either an edit or delete option, the data will be pulled from the database*/
	$resultEdit = mysql_query("SELECT TESTIMONIAL, CUSTOMER_NAME, CUSTOMER_COMPANY, CUSTOMER_LOCATION
	FROM CUSTOMER_TESTIMONIALS
	WHERE TESTIMONIAL_ID = $editTestimonial");
	$rowEdit = mysql_fetch_array($resultEdit);
	$content = $rowEdit['TESTIMONIAL'];
	$customerName = $rowEdit['CUSTOMER_NAME'];
	$customerCompany = $rowEdit['CUSTOMER_COMPANY'];
	$customerLocation = $rowEdit['CUSTOMER_LOCATION'];
	
	/*The form submit and the submit button values are controlled here as the values will need to be different
	for updating or deleting*/
	if ($pageSection == 2)
	{
		$submitButtonName = "Update Entry";
		$formSubmit = "scriptFiles/updateTestimonial.php";
	}
	else
	{
		$submitButtonName = "Delete Entry";
		$formSubmit = "scriptFiles/deleteTestimonial.php";
	}
	
}

/*The script will then print the following HTML as well as call the scripts for the CKEditor and the
meta elements.  The JavaScript function can only be fully utilized when the user wants to delete a testimonial.*/
print <<<here
<p>$pageDescription - Section $pageSection</p>
<form method="post" action="$formSubmit" onsubmit="return confirmDelete();">
here;

include "scriptFiles/includeEditor.php";

print <<<here
<p>Customer Name:<br />
<input type="text" name="txtCustomerName" id="customerName" value="$customerName" size="30" /></p>
<p>Customer Company:<br />
<input type="text" name="txtCustomerCompany" id="customerCompany" value="$customerCompany" size="30" /></p>
<p>Customer Location:<br />
<input type="text" name="txtCustomerLocation" id="customerLocation" value="$customerLocation" size="30" /></p>
<p><input type="hidden" name="txtPageSection" id="pageSection" value="$pageSection" size="30" />
here;

include "scriptFiles/includeMetaElements.php";

print <<<here
<p><input type="submit" value="$submitButtonName" /><br />
</form>
here;


?>