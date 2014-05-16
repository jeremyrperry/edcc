<?php
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This script is populated into the contentSection div element on controlCenter.php when the user wants
to modify the Member Benefits page.  The user must first choose the section they wish to edit.  The radio buttons are used
to define the specific section the user wishes to edit, and the hidden forms contain the other page information
that modifyPage.php will need in order to call the appropriate scripts and populate the necessary information.
A visual graphic of the page is included to help the user make their selection.  The user can also choose 
to go to the testimonial section from here to add a new testimonial.*/

print <<<here
<p>Please select the section you wish to modify</p>

<p><b>Note:</b>  The meta elements for the Member Benefits page can only be modified by selecting the In The News Option.  
The testimonial represents the most recent one added.</p>

<form method="post" action="modifyPage.php" onsubmit="return checkForTestimonials();">
<p><input type="radio" name="rdoSelect" id="rdoNews" value="1" checked="checked" />In the News<br />
<input type="radio" name="rdoSelect" id="rdoLatest" value="2" />Go to Testimonials Page Editing<br />
<input type="hidden" id="pageName" name="pageName" value="membership-benefits-crafters-home.php" /><br />
<input type="hidden" id="pageDescription" name="pageDescription" value="Modify Member Benefit Page" /></p>

<p><img src="pictures/memberBenefitPage.gif" alt="Member Benefit Page picture" height="300" width="450" /></p>

<input type="submit" value="Pull Information">
</form>

here;

?>
