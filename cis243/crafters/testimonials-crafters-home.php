<?php

session_start();
require "common_elements/checkstatus.php";

//Without the database connection, this page can't function properly.
require "common_elements/dbconnection.php";

//Pulls the meta information from the database.
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = 'testimonials-crafters-home.php'");
$row = mysql_fetch_array($resultMeta);
$metaTitle = $row['META_TITLE'];
$metaKeywords = $row['META_KEYWORDS'];
$metaDescription = $row['META_DESCRIPTION'];

//Pulls the count from the database for later use
$resultCount = mysql_query("SELECT COUNT(*)
FROM CUSTOMER_TESTIMONIALS");
$rowCount = mysql_fetch_array($resultCount);
$count = $rowCount['COUNT(*)'];

//Pulls all of the active testimonial id's from the database
$resultTest = mysql_query("SELECT TESTIMONIAL_ID
FROM CUSTOMER_TESTIMONIALS");
//All of the testimonial id's are put into the $storage array
while($rowTest = mysql_fetch_array($resultTest))
{
$storage[] =  $rowTest['TESTIMONIAL_ID'];
}

/*If the count of testimonial id's exceeds 5, this if statement will execute to select five random id's
for printing later in the document.*/
if ($count > 5)
	{
	$testimonialArray = array(5);
	for($i=0; $i<5;)
		{
		$random = rand(0, $count-1);
		$id = $storage[$random];
		if(!in_array($id, $testimonialArray))
			{
			$testimonialArray[$i] = $id;
			$i++;
			}
		}
	}

/*If the count of testimonial id's doesn't exceed 5, this if statement will execute to populate the testimonial array
for printing later in the document.  I choose this method because it simplifies the process later on*/
if ($count < 6)
	{
	for($i=0; $i < $count; $i++)
		{
		$testimonialArray[$i] = $storage[$i];
		}
	shuffle($testimonialArray);
	}

//The header is in a PHP print statement to incorporate the meta elements.
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
<br />

<table border="2" cellpadding="1" width="900" cellspacing="3" bgcolor="#FFFFFF">
	<tr>
		<td colspan="3" bgcolor="#F6B2C0">
        	<table width="100%">
				<tr>
					<td class="navTop"><img border="0" src="images/logo.jpg" width="266" height="58" align="left" alt="Crafter's Home" /></td>
					<td align="right"><b><i><font size="3" color="#5C4E23">
						Creativity is our passion; inspiration is our specialty!
					</font></i></b></td>
            	</tr>

			</table>
		</td>
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
		<td width="67%" valign="top">
			<h3>Testimonials</h3>

			<div align="center">
			<table width="80%" border="0" cellpadding="0" cellspacing="0"  >			
				<tr>
					<td width="75%" valign="top">
			        	<table cellpadding="0" border="0"  style="border-collapse:collapse" width="100%">
							<tr><td colspan="2">
								</td></tr>

							
							 <tr>
								
								<?php
								/*This foreach loop runs through all of the selected testimonial id's and populates their associated information into
								the document*/
								foreach ($testimonialArray as $value)
								{
								$resultContent = mysql_query("SELECT TESTIMONIAL, CUSTOMER_NAME, CUSTOMER_COMPANY, CUSTOMER_LOCATION
								FROM CUSTOMER_TESTIMONIALS
								WHERE TESTIMONIAL_ID = $value");
								$rowContent = mysql_fetch_array($resultContent);
								$testimonial = $rowContent['TESTIMONIAL'];
								$custName = $rowContent['CUSTOMER_NAME'];
								$custComp = $rowContent['CUSTOMER_COMPANY'];
								$custLoc = $rowContent['CUSTOMER_LOCATION'];
								
								print'<td colspan="2" valign="top" bgcolor="#ffffff">';
								print '<hr style="width: 95%" size="1" />';
								print'<p align=left style="margin-left: 25px">';
								print $testimonial;
								print '</p>';
								print'<p class="sign" style="margin-left: 25px">';
								print $custName;
								print '<br />';
						        print '<a href="http://" target="_blank">';
						        print $custComp;
						        print '</a><br/>';
								print'<i>';
								print $custLoc;
								print '</i></p>';
								print'</td></tr><tr>';
								}
								?>
					          
					         <td colspan="2">

								<hr style="width: 95%" size="1" /></td></tr>
								
								
								
								<tr>
								 
								<br>
								</tr>
						   </table>
				</td>      
			</tr>
   		</table>
			
			<p>&nbsp;</div>

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
</div>

</body>
<?php
mysql_close($con);
?>
</html>
