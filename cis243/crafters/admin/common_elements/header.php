<?php
/*This script is called upon in both controlCenter and modifyPage to populate the common header informaiton.
Includes the necessary call-ups for the CSS, JavaScript, jQuery, and CKEditor*/
print <<<here
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crafters Content Management</title>
<meta name="robots" content="none" />
<link rel="stylesheet" type="text/css" href="../style.css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/contentmanagement.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>


</head>

<body>

<div align="center">
	
	<br>

	<table border="2" cellpadding="1" width="900" cellspacing="3" bgcolor="#FFFFFF">
		<tr>
			<td colspan="3" bgcolor="#F6B2C0">
          <table width="100%"><tr><td class="navTop">
			<img border="0" src="../images/logo.jpg" width="266" height="58" align="left"></td>
			<td align="right"><b><i><font size="3" color="#5C4E23">
			Creativity is our passion; inspiration is our specialty!</font></i></b></td>
            </tr></table>

            </td>
		</tr>
		<tr>
			<td colspan="3">
			<div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="navigation" style="border-collapse: collapse">
        <tr>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../index.php"> home </a></td>            
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../membership-benefits-crafters-home.php">membership benefits</a></td>

            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../partner-vendors-crafters-home.php">partner vendors</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../store-locator-crafters-home.php">store locator</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../testimonials-crafters-home.php">testimonials</a></td>
           	<td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../about-crafters-home.php">about us</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="../contact-crafters-home.php">contact us</a></td>
            <td align="center"><a href="../login-crafters-home.php"><b>MEMBER LOGIN</b></a></td>

        </tr>
    </table>
</div>

			</td>
		</tr>
		<tr>
			<td>
here;
?>