<?php

print <<<here


<table border="1" align="center">
<colgroup width="100" span="7" />
<tr style="font-weight:bold">
<td>Programmer Name</td><td>Vendor Name</td><td>Divison Name</td><td>Charge Unit Number</td><td>Invoice Number</td><td>Service Start Date</td><td>Service End Date</td><td>Total Hours Worked</td><td>Invoice Total</td><td>Date Submitted</td>
</tr>
<tr>
here;

$result = mysql_query("SELECT *
FROM qryprogrammer_me_expense_part1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");

$resultTotal = mysql_query("SELECT SUM(Invoice_Total)
FROM qryprogrammer_me_expense_part1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");
$rowTotal = mysql_fetch_array($resultTotal);
$total = "$" . $rowTotal['SUM(Invoice_Total)'];

while($row = mysql_fetch_array($result))
{
print"<td>";
print $row['Programmer_Name'];
print "</td>";
print "<td>";
print $row['Vendor_Name'];
print "</td>";
print "<td>";
print $row['Division_Name'];
print "</td>";
print "<td>";
print $row['Charge_Unit_Number'];
print "</td>";
print "<td>";
print $row['Invoice_Number'];
print "</td>";
print "<td>";
print $row['Service_Start_Date'];
print "</td>";
print "<td>";
print $row['Service_End_Date'];
print "</td>";
print "<td>";
print $row['Total_Hours_Worked'];
print "</td>";
print "<td>";
print "$" . $row['Invoice_Total'];
print "</td>";
print "<td>";
print $row['Date_Submitted'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>

<h3>Total by Divison</h3>
<table border="1" align="center">
<colgroup width="100" span="2" />
<tr style="font-weight:bold">
<td>Division Name</td><td>Total Per Division</td>
</tr>
here;

$result2 = mysql_query("SELECT Division_Name, SUM(Invoice_Total) AS Total
FROM qryprogrammer_me_expense_part1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'
GROUP BY Division_Name");

while($row2 = mysql_fetch_array($result2))
{
print "<td>";
print $row2['Division_Name'];
print "</td>";
print "<td>";
print "$" . $row2['Total'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>

<h3>Total by Charge Unit</h3>
<table border="1" align="center">
<colgroup width="100" span="2" />
<tr style="font-weight:bold">
<td>Charge Unit</td><td>Total Per Division</td>
</tr>
here;

$result3 = mysql_query("SELECT Charge_Unit_Number, SUM(Invoice_Total) AS Total_2
FROM qryprogrammer_me_expense_part1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'
GROUP BY Charge_Unit_Number");

while($row3 = mysql_fetch_array($result3))
{
print "<td>";
print $row3['Charge_Unit_Number'];
print "</td>";
print "<td>";
print "$" . $row3['Total_2'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>

<p><b>Monthly Invoice Total:  </b>$total</p>
here;


?>
