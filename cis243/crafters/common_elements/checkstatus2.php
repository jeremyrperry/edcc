<?php

if (!isset($_SESSION['access']))
	{
	$_SESSION['loginError'] = "<p>You are not logged into the system.  Please log in.</p>";
	header("Location: ../../crafterslogin.php");
	}

$currentTime = time();	
$checkForTimeout = $currentTime - $_SESSION['timeout'];
if ($checkForTimeout > 600)
	{
	unset($_SESSION['access']);
	unset($_SESSION['timeout']);
	$_SESSION['loginError'] = "<p>You were logged out due to inactivity.</p>";
	header("Location: ../../crafterslogin.php");
	}
else
	{
	$_SESSION['timeout'] = time();
	}

?>