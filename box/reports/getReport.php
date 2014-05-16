<?php
session_start();
$report = filter_input(INPUT_POST, "rdoSelect");
$beginDate = filter_input(INPUT_POST, "txtBeginDate");
$endDate = filter_input(INPUT_POST, "txtEndDate");
$reportSubtitle = filter_input(INPUT_POST, "txtSubtitle");

require "../common_elements/dbconnection.php";

if ($report == 1)
{
$reportName = "General Ledger Expense Report";
}
if ($report == 2)
{
$reportName = "Accrual Report";
}
if ($report == 3)
{
$reportName = "Contract Programmer's Monthly Expense Recap Report";
}
if ($report == 4)
{
$reportName = "Contrator Programmer Report - Fee Maximum Vs Actuals";
}
if ($report == 5)
{
$reportName = "Monthly Contract Recap Report";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">

<head>
<?php
print <<<here
<title>Bank of Xanadu - $reportName</title>
here;
?>
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

<?php
print <<<here
<h2>$reportName</h2>
here;

if ($reportSubtitle !="")
{
print "<h3><i>$reportSubtitle</i></h3>";
}

setlocale(LC_ALL, 'pl_PL.utf8');
if ($report == 1)
{
include "scriptFiles/gler.php";
}
if ($report == 2)
{
include "scriptFiles/accruals.php";
}
if ($report == 3)
{
include "scriptFiles/cpmerr.php";
}
if ($report == 4)
{
include "scriptFiles/fmva.php";
}
if ($report == 5)
{
include "scriptFiles/mcr.php";
}
?>
<p><a href="../index.php">Back to Home Page</a></p>
</div>
</body>
</html>