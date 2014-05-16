<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">

<head>
<title>Assignment 2 - Form Submission in PHP</title>
   <!-- author: Jeremy Perry
   CIS 243, Spring 2011 -->
   <meta name="author" content="your name" />
   <meta name="keywords" content="Assignment 2, access form field values, using form information" />
   <meta name="description" content="Creating a page based upon your user's specified preferences is important." />
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name="robots" content="none" />
   
<?php
 
 $firstName = filter_input(INPUT_POST, "txtFName");
 $lastName = filter_input(INPUT_POST, "txtLName");
 $content = filter_input(INPUT_POST, "txtContent");
 $txtAlign = filter_input(INPUT_POST, "sltAlign");
 $bodyColor = filter_input(INPUT_POST, "rdoBody");
 $txtColor = filter_input(INPUT_POST, "rdoText");
 
?>
 
</head>
 
<body style="background-color:<?php print $bodyColor; ?>;">
 
<?php

$txtStyle = <<<Here
"color:$txtColor;
text-align:$txtAlign;"
Here;

print <<<Here

<div style = $txtStyle>
<p>$firstName $lastName</p>

<p>$content</p>

<p><a href="../cis243.php">Back to my PHP class page</a></p>
</div>

Here;

?>
 
 
</body>
</html>