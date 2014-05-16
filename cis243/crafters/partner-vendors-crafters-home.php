<?php

session_start();
require "common_elements/checkstatus.php";
	
//Without the database connection, this page won't function properly.
require "common_elements/dbconnection.php";

//Pulls up the meta information
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = 'partner-vendors-crafters-home.php'");
$row = mysql_fetch_array($resultMeta);
$metaTitle = $row['META_TITLE'];
$metaKeywords = $row['META_KEYWORDS'];
$metaDescription = $row['META_DESCRIPTION'];


//The header is printed from PHP to incorporate the meta elements from the database
print <<<here
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<html>

<head>
<title>$metaTitle</title>
       <meta name="author" content="Jeremy Perry" />
       <meta name="keywords" content="$metaKeywords" />
       <meta name="description" content="$metaDescription" />
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
       <meta name="robots" content="none" />
<link rel="stylesheet" type="text/css" href="style.css" />
here;
?>

</head>

<body>

<div align="center">
	
	<br>
	<table border="2" cellpadding="1" width="900" cellspacing="3" bgcolor="#FFFFFF">

		<tr>
			<td colspan="3" bgcolor="#F6B2C0">
          <table width="100%"><tr><td class="navTop">
			<img border="0" src="images/logo.jpg" width="266" height="58" align="left"></td>
			<td align="right"><b><i><font size="3" color="#5C4E23">
			Creativity is our passion; inspiration is our specialty!</font></i></b></td>
            </tr></table>            </td>
		</tr>

		<tr>
			<td colspan="3">
			<div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="navigation" style="border-collapse: collapse">
        <tr>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="index.php"> home </a></td>            
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="membership-benefits-crafters-home.php">membership benefits</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="partner-vendors-crafters-home.php">partner vendors</a></td>

            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="store-locator-crafters-home.php">store locator</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="testimonials-crafters-home.php">testimonials</a></td>
           	<td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="about-crafters-home.php">about us</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="contact-crafters-home.php">contact us</a></td>
            <td align="center"><a href="login-crafters-home.php"><b>MEMBER LOGIN</b></a></td>

        </tr>

    </table>
</div>
			</td>
		</tr>
		<tr>
			
			<td width="100%" valign="top">
			<h3>Partner Vendors</h3>
			<div align="center">
			<table border="0" cellpadding="3" width="850" id="table12" bgcolor="#FFFFFF">

				<tr>
				
					<?php
					//The vendor logos are dynamically loaded into the web page
					
					//This sets the counter for a function below
					$trcounter = 0;
					
					//Pulls the results from the database
					$results = mysql_query("SELECT *
					FROM VENDORS");
					
					//A while loop is used to populate the database results into the web page
					while($row = mysql_fetch_array($results))
						{
						print '<td bgcolor="#FFFFFF"  align="center" valign="top">';
						print '<p align="center" style="text-align: center">';
						print '<a target="_blank" href="' . $row['VENDOR_WEBSITE'] . '">';
						print '<img border="0" src="VendorLogos/' . $row['VENDOR_GRAPHIC_INFO'] . '" height="100" width="150"></a><br>';
						print '<font face="Arial" style="font-size: 9pt">';
						print '<a target="_blank" href="' . $row['VENDOR_WEBSITE'] . '">';
						print '<font color="#000080">' . $row['VENDOR_NAME'] . '</font></a></font></td>';
						print '<td bgcolor="#FFFFFF" width="168" align="center" valign="top">';
						print '<p align="center" style="margin-top: 5px">';			
						print '</td>';
						//Value is added to the trcounter variable
						$trcounter +=1;
						/*If the trcounter exceeds three, the print statement is executed to prevent more than four vendors in the same
						row, and trcounter is reset to zero for the next loop cycle.*/
						if ($trcounter > 3)
							{
							print "</tr><tr>";
							$trcounter = 0;
							}
						}
					?>
				</tr>
				

					
				</table>			</div>
			</td>
	</tr>
		<tr>
			<td colspan="3" bgcolor="#F6B2C0">
			<div align="center">
<table border="0" cellpadding="3" style="border-collapse: collapse" width="600">
        <tr height="20px;">
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="index.php" class="footer"> home </a>&nbsp;&nbsp;</td>

           
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="membership-benefits-crafters-home.php" class="footer">membership benefits</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="partner-vendors-crafters-home.php" class="footer">partner vendors</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="store-locator-crafters-home.php" class="footer">store locator</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="testimonials-crafters-home.php" class="footer">testimonials</a></td>
             <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="about-crafters-home.php" class="footer">about us</a></td>
             <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="contact-crafters-home.php" class="footer">contact us</a></td>

            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="login-crafters-home.php"><b>LOGIN</b></a></td>
            <td align="center"><a href="common_elements/logout.php" class="footer"><b>SITE LOGOUT</b></a></td>
        </tr>
    </table>
</div>
			</td>
		</tr>
</table>
	  
		</tr>

	</table>

</div>

</body>
<?php
mysql_close($con);
?>

</html>