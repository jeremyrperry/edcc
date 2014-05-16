<?php

print <<<here


<table border="1" align="center">
<colgroup width="100" span="7" />
<tr style="font-weight:bold">
<td>Division Name</td><td>Charge Unit</td><td>Contract Number</td><td>Programmer Name</td><td>Service Start Date</td><td>Service End Date</td><td>Hourly Fee</td><td>Project Manager Name</td><td>PM Phone Number</td><td>Fee Maximum</td>
<td>Total Charged To Contract</td><td>Contract Percentage Used</td><td>Most Recent Invoice Paid</td>
</tr>
<tr>
here;

$result = mysql_query("SELECT *
FROM qryfeemaxvsact");


while($row = mysql_fetch_array($result))
{
print"<td>";
print $row['Division_Name'];
print "</td>";
print "<td>";
print $row['Charge_Unit_Number'];
print "</td>";
print "<td>";
print $row['Contract_Number'];
print "</td>";
print "<td>";
print $row['Programmer_name'];
print "</td>";
print "<td>";
print $row['Service_Start_Date'];
print "</td>";
print "<td>";
print $row['Service_End_Date'];
print "</td>";
print "<td>";
print "$" . $row['Hourly_Fee'];
print "</td>";
print "<td>";
print $row['Project_Manager_Name'];
print "</td>";
print "<td>";
print $row['PM_Phone_Number'];
print "</td>";
print "<td>";
print "$" . $row['Fee_Maximum'];
print "</td>";
print "<td>";
print "$" . $row['Total_Charged_To_Contract'];
print "</td>";
print "<td>";
print $row['Percent_Used'] . "%";
print "</td>";
print "<td>";
print $row['Last_Paid'];
print "</td></tr><tr>";
}

print <<<here
</tr>
</table>
<p>&nbsp;</p>
here;


?>
