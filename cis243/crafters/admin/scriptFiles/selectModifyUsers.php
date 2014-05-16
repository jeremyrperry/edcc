<?php

session_start();
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}
//This is a backup security measure to ensure that only administrators and super administrators can access the site
$types = array('Administrator', 'Super Administrator');
if (!in_array($_SESSION['userLevel'], $types))
	{
	header("Location: controlCenter.php");
	}
	
$userLevel = $_SESSION['userLevel'];
print <<<here
<p>Please make your choice for adding, editing, or deleting users.</p>
here;

/*For integrity of the back end, super administrators can only be added or deleted by directly accessing the 
database.*/
if ($userLevel == "Super Administrator")
	{
	print "<p><b>Note:</b>  Super Administrators cannot be added or deleted from this admin page (this includes changing user status to and from Super Administrator).  Please 
	directly access the database for this purpose.</p>";
	}

/*This script is populated into the contentSection div element on controlCenter.php when the user with administrative priveleges wants
to modify the system users.  The administrator must first choose the section they wish to edit.  The radio buttons are used
to define the specific section the user wishes to edit, and the hidden forms contain the other page information
that modifyPage.php will need in order to call the appropriate scripts and populate the necessary information.  
If editing or deleting a user is desired, a JavaScript function is called every time the radio button is changed
and will populate the userSection div element with the selectUsers.php script if edit or delete is chosen.
*/

print <<<here

<form method="post" action="modifyPage.php">
<p><input type="radio" name="rdoSelect" id="rdoNew" value="1" checked="checked" onclick="return openUserSelection();" />New user<br />
<input type="radio" name="rdoSelect" id="rdoEdit" value="2" onclick="return openUserSelection();" />Edit user<br />
<input type="radio" name="rdoSelect" id="rdoDelete" value="3" onclick="return openUserSelection();" />Delete user<br />
<input type="hidden" id="pageName" name="pageName" value="modifyUsers" /><br />
<input type="hidden" id="pageDescription" name="pageDescription" value="Modify Users" /></p>
<div id="userSelection">
	
</div>
<input type="submit" value="Pull Information"></p>
</form>
here;


?>