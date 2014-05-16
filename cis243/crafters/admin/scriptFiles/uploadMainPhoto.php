<?php
//This script uploads a photo to be displayed on the main page's slideshow
session_start();

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

//This boolean is set to keep the script aware of any problems with the picture meeting the required paramaters
$blnOk = true;

//If the file exceeds 300kb, the upload is a no-go
if ($_FILES["uploadPic"]["size"] > 300000)
{
$_SESSION['PhotoMsg'] = "Your file exceeds the maximum upload size.<br>"; 
$blnOk = false;
}

//If the file isn't the required type, the upload is a no-go
$types = array('image/jpeg', 'image/gif', 'image/png', 'image/tif');
if (!in_array($_FILES["uploadPic"]["type"], $types))
{ 
$_SESSION['PhotoMsg'] = "Invalid file format.  Only jpg, gif, png, and tif are authorized.<br>"; 
$blnOk = false;
}

//Where the file directory is identified for the photo
$target = "../../mainPictures/";
$target = $target . basename( $_FILES['uploadPic']['name']); 

//If the boolean remained true the upload can happen.
//If not, than the user is simply sent back to the upload page with an error message
//(I wish there was an "or die" statement for this)
if ($blnOk == true)
{
	if(move_uploaded_file($_FILES['uploadPic']['tmp_name'], $target)) 
	{ 
	$_SESSION['PhotoMsg'] = "The file ". basename( $_FILES['uploadPic']['name']). " has been uploaded";
	}
	//Only if there is a problem with the file upload
	else
	{ 
	$_SESSION['PhotoMsg'] = "Sorry, there was a problem uploading your file."; 
	}
}
//Back to the upload page.
header("Location: ../modifyPage.php");
?>