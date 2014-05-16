<?php
print <<<here
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$metaTitle</title>
       <meta name="author" content="Jeremy Perry" />
       <meta name="keywords" content="$metaKeywords" />
       <meta name="description" content="$metaDescription" />
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
       <meta name="robots" content="…, …" />
<link rel="stylesheet" href="css/portfolio.css" type="text/css" />
<script type ="text/javascript" src="javascript/portfolio.js"></script>
<script type ="text/javascript" src="javascript/jquery.min.js"></script>

</head>

<body>

<div id="main">
<noscript>
	<h2>You have JavaScript disabled.  Some features on my EdCC portfolio will not work properly as a result.</h2>
</noscript>
<table width=100%>
<tr>
<td>
	<img src="pictures/webdev.jpg" width="300" height="300" /></td>
<td style="text-align:center">
	<h1>Jeremy R Perry's Web Application Development ATA Portfolio</h1>
    <img src="pictures/edcc.gif" height="50" width="150" /><br />
<div style="clear:both"></div>
</td>
</tr>
</table>

<div style="font: 24px fantasy; text-align:center">
<p>$heading</p></div>
<p> <ul id="navigate">
	<li><a href="index.php" onmouseover="menuOpen('m1')" onmouseout="menuClose()">EdCC Portfolio Home</a>
	<div id="m1" onmouseover="menuOpen('m1')" onmouseout="menuClose()">
		<a href="documentation.php">Documentation</a>
	</div>
    </li>
	<li><a href="resume.php" onmouseover="menuOpen('m2')" onmouseout="menuClose()">Resume</a>
    </li>
	<li><a href="art225.php" onmouseover="menuOpen('m4')" onmouseout="menuClose()">Courses</a>
    <div id="m4" onmouseover="menuOpen('m4')" onmouseout="menuClose()">
        <a href="art225.php">Art 225 - Graphic Design</a>
        <a href="cs115.php">CS 115 - Visual Basic</a>
        <a href="cis233.php">CIS 233 - Systems Analysis</a>
        <a href="cis234.php">CIS 234 - Systems Design</a>
        <a href="cis241.php">CIS 241 - XHTML</a>
         <a href="cis242.php">CIS 242 - JavaScript</a>
         <a href="cis243.php">CIS 243 - PHP</a>
        <a href="cis244.php">CIS 244 - SEO</a>
        <a href="cis251.php">CIS 251 - SQL</a>
        <a href="internship.php">Internship</a>
    </div>
	</li>
	<li><a href="about.php" onmouseover="menuOpen('m5')" onmouseout="menuClose()">About Me</a>
	</li>
    <li><a href="contact.php" onmouseover="menuOpen('m6')" onmouseout="menuClose()">Contact Me</a>
	</li>
    <li><a href="../portfolio.php" onmouseover="menuOpen('m7')" onmouseout="menuClose()">My Main Portfolio</a>
    </li>
</ul></p>
</span>

<p>&nbsp;</p>
<p>&nbsp;</p>

<div id="picture">
<img src="pictures/jeremy1.jpg" width="354" height="237" alt="A picture of Jeremy" />
</div>
here;
?>