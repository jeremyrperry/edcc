<?php
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This script is populated into the contentSection div element on controlCenter.php when the user wants
to modify the main page.  The user must first choose the section they wish to edit.  The radio buttons are used
to define the specific section the user wishes to edit, and the hidden forms contain the other page information
that modifyPage.php will need in order to call the appropriate scripts and populate the necessary information.
A visual graphic of the page is included to help the user make their selection.*/

print <<<here
<p>Please select the section you wish to modify</p>

<p><b>Note:</b>  The page meta elements can not be modified from the image section.</p>

<form method="post" action="modifyPage.php">
<p><input type="radio" name="rdoSelect" id="rdoImage" checked="checked" value="1" />Image (section 1)<br />
<input type="radio" name="rdoSelect" id="rdoWelcomeMsg" value="2" />Welcome Message (section 2)<br />
<input type="radio" name="rdoSelect" id="rdoNews" value="3" />In the News (section 3)<br />
<input type="radio" name="rdoSelect" id="rdoBenefits" value="4" />Member Benefits (section 4)<br />
<input type="hidden" id="pageName" name="pageName" value="index.php" /><br />
<input type="hidden" id="pageDescription" name="pageDescription" value="Modify Main Page" /></p>

<p><img src="pictures/homePage.gif" alt="Home Page picture" height="300" width="450" /></p>

<input type="submit" value="Pull Information">
</form>

here;

?>
