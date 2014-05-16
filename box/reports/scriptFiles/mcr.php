<?php

print <<<here


<table border="1" align="center">
<colgroup width="100" span="7" />
<tr style="font-weight:bold">
<td>Project Manager Name</td><td>PM Contract Unit</td><td>Programmer Name</td><td>Vendor Name</td><td>Contract Number</td><td>Contract Start Date</td><td>Contract End Date</td><td>Hourly Fee</td><td>Project Description</td><td>Fee Maximum</td>
<td>Charge Unit Number</td><td>Invoice Number</td><td>Invoice Start Date</td><td>Invoice End Date</td><td>Total Hours Worked</td><td>Invoice Total</td>
</tr>
<tr>
here;

$result = mysql_query("SELECT *
FROM qrymonthlycontractrecappart1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");


while($row = mysql_fetch_array($result))
{
print"<td>";
print $row['Project_Manager_Name'];
print "</td>";
print "<td>";
print $row['PM_Contact_Unit'];
print "</td>";
print "<td>";
print $row['Programmer_Name'];
print "</td>";
print "<td>";
print $row['Vendor_Name'];
print "</td>";
print "<td>";
print $row['Contract_Number'];
print "</td>";
print "<td>";
print $row['Contract_Start_Date'];
print "</td>";
print "<td>";
print $row['Contract_End_Date'];
print "</td>";
print "<td>";
print "$" . $row['Hourly_Fee'];
print "</td>";
print "<td>";
print $row['Project_Desc'];
print "</td>";
print "<td>";
print "$" . $row['Fee_Maximum'];
print "</td>";
print "<td>";
print $row['Charge_Unit_Number'];
print "</td>";
print "<td>";
print $row['Invoice_Number'];
print "</td>";
print "<td>";
print $row['Invoice_Start_Date'];
print "</td>";
print "<td>";
print $row['Invoice_End_Date'];
print "</td>";
print "<td>";
print $row['Total_Hours_Worked'];
print "</td>";
print "<td>";
print "$" . $row['Invoice_Total'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>

<h2>Invoice Total Per Contract</h2>
<table border="1" align="center">
<colgroup width="60" span="2" />
<tr style="font-weight:bold">
<td>Contract</td><td>Invoice Total</td>
</tr>
<tr>
here;

$result2 = mysql_query("SELECT Contract_Number, SUM(Invoice_Total)
FROM qrymonthlycontractrecappart1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'
GROUP BY Contract_Number");
while($row2 = mysql_fetch_array($result2))
{
print "<td>";
print $row2['Contract_Number'];
print "</td>";
print "<td>";
print "$" . $row2['SUM(Invoice_Total)'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>

<p>&nbsp;</p>

<h2>Monthly Percentage Total Per Contract</h2>
<table border="1" align="center">
<colgroup width="60" span="2" />
<tr style="font-weight:bold">
<td>Contract</td><td>Monthly Percentage Used</td>
</tr>
<tr>
here;

$result3 = mysql_query("SELECT Contract_Number, ((SUM(Invoice_Total) / Fee_Maximum)*100) AS Monthly_Pct_Used
FROM qrymonthlycontractrecappart1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'
GROUP BY Contract_Number");
while($row3 = mysql_fetch_array($result3))
{
print "<td>";
print $row3['Contract_Number'];
print "</td>";
print "<td>";
print $row3['Monthly_Pct_Used'] . "%";
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>

<p>&nbsp;</p>

<h2>Contract Remaining Value</h2>
<table border="1" align="center">
<colgroup width="60" span="2" />
<tr style="font-weight:bold">
<td>Contract</td><td>Remaining Vaule</td>
</tr>
<tr>
here;

$result4 = mysql_query("SELECT Contract_Number, Fee_Remain
FROM qrymonthlycontractrecappart1
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'
GROUP BY Contract_Number");
while ($row4 = mysql_fetch_array($result4))
{
print "<td>";
print $row4['Contract_Number'];
print "</td>";
print "<td>";
print "$" . $row4['Fee_Remain'];
print "</td></tr><tr>";
}
print <<<here
</tr>
</table>
here;



?>
