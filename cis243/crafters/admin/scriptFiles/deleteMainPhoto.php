<?php
session_start();
//This script deletes the selected photo that would display on the main page

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

$file = "../../mainPictures/" . filter_input(INPUT_POST, "deletePics");
unlink($file);
$_SESSION['PhotoMsg'] = "Photo Deleted<br />";
header("Location: ../modifyPage.php");
?>