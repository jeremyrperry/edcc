<?php
session_start();
$loginError = "";
if (isset($_SESSION['loginError']))
	{
	$loginError = $_SESSION['loginError'];
	unset($_SESSION['loginError']);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JRP Web Solutions - My CMS Project Login</title>
       <meta name="author" content="Jeremy Perry" />
       <meta name="keywords" content="jrp web solutions, cms project" />
       <meta name="description" content="My CMS project requires a username and password to login.  Please contact me for more details." />
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
       <meta name="robots" content="none" />
<link rel="stylesheet" href="css/jws_style.css" type="text/css" />
<script type ="text/javascript" src="javascript/jrpwebsolutions.js"></script>
</head>

<body>
<h2>My CMS Project - Access required</h2>

<?php
if ($loginError != "")
	{
	print "$loginError";
	}	
?>
<form method="post" action="crafters/validateUser.php">
<p>Username:<br />
<input type="text" name="username" id="username" value="" /></p>

<p>Password:<br />
<input type="password" name="password" id="password" value="" /></p>

<p><input type="submit" value="Login" />

<h3>Why The Security?</h3>

<p>This CMS project is based off an actual website and company, <a href="http://www.craftershome.com">Crafters Home</a>.  Even though this is a perfectly acceptable practice for 
an educational project under the Fair Use Doctorine and I made sure there is no way this part of my site can get indexed by the search engines, 
I felt this extra security measure was necessary to ensure there is absolutely no confusion between my project and Crafters Home.  If you wish to have access and/or have me give you a demonstration, 
please <a href="../../contact.php">contact</a> me.</p>

<p><a href="../cis243.php">Back to my PHP class page</a></p>
</body>
</html>