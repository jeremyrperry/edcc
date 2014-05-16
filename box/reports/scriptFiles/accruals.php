<?php

print <<<here

<table border="1" align="center">
<colgroup width="100" span="7" />
<tr style="font-weight:bold">
<td>Programmer Name</td><td>Vendor Name</td><td>Charge Unit</td><td>Invoice Number</td><td>Invoice Total</td><td>Date Submitted</td><td>Payment Status</td>
</tr>
<tr>
here;


$result = mysql_query("SELECT *
FROM qryaccruals
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");

while($row = mysql_fetch_array($result))
{
print"<td>";
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
print "$" . $row['Invoice_Total'];
print "</td>";
print "<td>";
print $row['Date_Submitted'];
print "</td>";
print "<td>";
print $row['Payment_Status'];
print "</td></tr></tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>
here;

$resultTotal = mysql_query("SELECT SUM(Invoice_Total)
FROM qryaccruals
WHERE Date_Submitted >= '$beginDate'
AND Date_Submitted <= '$endDate'");

$rowTotal = mysql_fetch_array($resultTotal);
$total = "$" . $rowTotal['SUM(Invoice_Total)'];


print <<<here
<p><b>Monthly Invoice Total:  </b>$total</p>
here;

?>
