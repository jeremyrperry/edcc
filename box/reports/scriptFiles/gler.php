<?php

print <<<here
<table border="1" align="center">
<colgroup width="60" span="10" />
<tr style="font-weight:bold">
<td>Contract Number</td><td>Programmer Name</td><td>Vendor Name</td><td>Charge Unit</td><td>Invoice Number</td><td>Service Start Date</td><td>Service End Date</td><td>Total Hours Worked</td><td>Invoice Total</td><td>Date Submitted</td><td>Payment Status</td><td>Date Paid</td>
</tr>
<tr>
here;

$result = mysql_query("SELECT *
FROM qrygeneralledgerexpensereport
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");

while($row = mysql_fetch_array($result))
{
print"<td>";
print $row['Contract_Number'];
print"</td>";
print "<td>";
print $row['Programmer_Name'];
print "</td>";
print "<td>";
print $row['Vendor_Name'];
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
print $row['Total_Hours_worked'];
print "</td>";
print "<td>";
print "$" . $row['Invoice_Total'];
print "</td>";
print "<td>";
print $row['Date_Submitted'];
print "</td>";
print "<td>";
print $row['Payment_Status'];
print "</td>";
print "<td>";
print $row['Date_Paid'];
print "</td></tr></tr>";
}
print <<<here
</tr>
</table>
<p>&nbsp;</p>
here;

$resultTotal = mysql_query("SELECT SUM(Invoice_Total)
FROM qrygeneralledgerexpensereport
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");

$rowTotal = mysql_fetch_array($resultTotal);
$total = "$" . $rowTotal['SUM(Invoice_Total)'];

print <<<here
<p><b>Monthly Invoice Total:  </b>$total</p>
here;

?>
