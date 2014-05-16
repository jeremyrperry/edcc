<?php
//This script populates the HTML necessary to add and delete photos for section 1 on the main page

//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*Because the user automatically returns to this page after uploading or deleting a picture, this message 
will notify user about the status of their last action*/
if (isset($_SESSION['PhotoMsg']))
{
print $_SESSION['PhotoMsg'];
unset($_SESSION['PhotoMsg']);
}

/*The next serveral lines of code read the directory that the photos for the main page are in*/
$pictureDirectory = opendir("../mainPictures/");
while($pictureName = readdir($pictureDirectory))
{
	$pictureArray[] = $pictureName;
}
closedir($pictureDirectory);
$picCount = count($pictureArray);

/*Two forms are printed.  One for uploading, one for deleting.  Because the user comes back to this page
after every update and delete, there is a link back to controlCenter.php at the bottom.  The select box for
choosing the photo to delete is autmatically populated using the array completed above.  A JavaScript function that displays
the picture to be deleted is used on every change to the selected option.  If deleting, a JavaScript function confirming 
the delete is called.*/
 print <<<here
 
<h2>Upload and Delete Photos for Home Page</h2>
<p><i>Note:  This photo uploader will not modify the meta tags for the main page.</i></p>
<h3>Upload a Photo</h3>
<form enctype="multipart/form-data" action="scriptFiles/uploadMainPhoto.php" method="post">
<p>Please choose a file: <input name="uploadPic" type="file" />
<input type="submit" value="Upload" />
</form></p>

 
<h3>Delete a Photo</h3>
<form action="scriptFiles/deleteMainPhoto.php" method="post" onsubmit="return deletePicture();">
<p><select name="deletePics" onchange="javascript:showPictureToDelete();">
<option value=""></option>
here;

for($i=3; $i<$picCount; $i++)
{
print "<option value=";
print $pictureArray[$i];
print ">";
print $pictureArray[$i];
print "</option>";
}
print <<<here
</select><input type="submit" value="Delete Picture" />
</p>

<div id="showPicture">
</div>
</form>

<div style="text-align:center">
<p><a href="controlCenter.php">Back to Control Center</a></p></div>

here;

 
?>