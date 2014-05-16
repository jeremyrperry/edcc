<?php
require "common_elements/dbconnection.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">

<head>
<title>Bank of Xanadu - End of Month Reports</title>
   <!-- author: Jeremy Perry
   CIS 243, Spring 2011 -->
   <meta name="author" content="your name" />
   <meta name="keywords" content="Assignment 2, access form field values, using form information" />
   <meta name="description" content="Creating a page based upon your user's specified preferences is important." />
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name="robots" content="none" />

 
</head>
<body>

<div style="text-align:center">
<h1>Bank of Xanadu - Bellevue Banking Center</h1>
<h2>End of Month Reports</h2>
</div>

<form method="post" action="reports/getReport.php">
<h3>Step 1</h3>
<p><b>Please choose your report:</b></p>
<p><input type="radio" name="rdoSelect" id="rdoGLER" checked="checked" value="1" />General Ledger Expense Report<br />
<input type="radio" name="rdoSelect" id="rdoAccrual" value="2" />Accrual Report<br />
<input type="radio" name="rdoSelect" id="rdoAccrual" value="3" />Contract Programmer's Monthly Expense Recap Report<br />
<input type="radio" name="rdoSelect" id="rdoAccrual" value="4" />Contractor Programmer Report - Fee Maximum Vs Actuals<br />
<input type="radio" name="rdoSelect" id="rdoAccrual" value="5" />Monthly Contract Recap Report</p>

<h3>Step 2</h3>
<p><b>Please choose your date range:</b></p>
<p><i>Note: Format must be yyyy-mm-dd</i></p>
<p>Begin date:<br />
<input type="text" name="txtBeginDate" id="beginDate" value="yyyy-mm-dd"></p>
<p>End Date:<br />
<input type="text" name="txtEndDate" id="endDate" value="yyyy-mm-dd"></p>

<h3>Step 3</h3>
<p><b>Enter a subtitle for the report (optional):</b></p>
<p><input type="text" name="txtSubtitle" id="subtitle" /></p>

<h3>Step 4</h3>
<p><input type="submit" value="Pull Information"></p>
<form>
<p><a href="../../portfolio.php">Back to my portfolio</a></p>
</body>
</html>