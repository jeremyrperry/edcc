<?php

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

/*This section predefines a bunch of variables for the page, and changes up the pageAction and
formAction variables as necessary to conform to the type of edit being made*/
$username = "";
$userPassword = "";
$userFirstName = "";
$userLastName = "";
$userEmail = "";
$userQuestion = "";
$userAnswer = "";
$pageAction = "Add User";
$formAction = "scriptFiles/addUser.php";
$readOnly = "";
if ($pageSection == 2)
	{
	$pageAction = "Update User";
	$formAction = "scriptFiles/updateUser.php";
	}
if ($pageSection == 3)
	{
	$pageAction = "Delete User";
	$formAction = "scriptFiles/deleteUser.php";
	$readOnly = 'style="background-color: #FCFFF0;" readonly="readonly"';
	}

/*If a user is being edited or deleted ($pageSection not set to 1), the following MySQL
statement variations will pull the information*/
if ($pageSection != 1)
	{
	$result = mysql_query("SELECT *
	FROM USER_INFO
	WHERE USERNAME = '$editUser'");
	$row = mysql_fetch_array($result);
	$username = $row['USERNAME'];
	$userPassword = $row['USER_PASSWORD'];
	$userFirstName = $row['USER_F_NAME'];
	$userLastName = $row['USER_L_NAME'];
	$userEmail = $row['USER_EMAIL'];
	$userQuestion = $row['USER_QUESTION'];
	$userAnswer = $row['USER_ANSWER'];
	$userLevel = $row['USER_LEVEL'];
	}

//Where everything is populated	

print "<h3>$pageAction</h3>";
if ($pageSection == 3)
	{
	print "<p><b>Note:</b>  All fields are read only</p>";
	}
print <<<here
<form method="post" action="$formAction" onsubmit="return checkForUserValues();">	

<p>Username:<br />
<input type="text" $readOnly name="txtUsername" id="userName" value="$username" size="40" /></p>
	
<p>User Password:<br />
<input type="text" $readOnly name="txtUserPassword" id="userPassword" value="$userPassword" size="40" /></p>

<p>User First Name:<br />
<input type="text" $readOnly name="txtUserFirstName" id="userFirstName" value="$userFirstName" size="40" /></p>
	
<p>User Last Name:<br />
<input type="text" $readOnly name="txtUserLastName" id="userLastName" value="$userLastName" size="40" /></p>

<p>User Email:<br />
<input type="text" $readOnly name="txtUserEmail" id="userEmail" value="$userEmail" size="40" /></p>
	
<p>User Question:<br />
<input type="text" $readOnly name="txtUserQuestion" id="userQuestion" value="$userQuestion" size="40" /></p>

<p>User Answer:<br />
<input type="text" $readOnly name="txtUserAnswer" id="userAnswer" value="$userAnswer" size="40" /></p>
here;
if ($pageSection != 3)
	{
	print "<p>User Access Level:<br />";
	print '<input type="radio" name="rdoAccess" id="rdoUser" value="User" checked="checked" />User<br />';
	//Super administrators have the ability to grant administrator priveleges to users
	if ($_SESSION['userLevel'] == "Super Administrator")
		{
		print '<input type="radio" name="rdoAccess" id="rdoAdmin" value="Administrator" />Administrator<br />';
		if ($pageSection != 1)
			{
			print '<b>Note:</b>  Current access level is ' . $userLevel . '<br />';
			}
		}
	}
print <<<here
</p>
<p><input type="hidden" name="txtOldUserName" id="oldUserName" value="$username" size="40" /></p>
<p><input type="hidden" name="txtPageSection" id="pageSection" value="$pageSection" size="40" /></p>
<p><input type="submit" value="$pageAction" /></p>
</form>
here;

?>