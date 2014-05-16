<?php
//Without the connection to the database, this page can't function
require "common_elements/dbconnection.php";

//Calls up the meta information from the database
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = 'about-crafters-home.php'");
$row = mysql_fetch_array($resultMeta);
$metaTitle = $row['META_TITLE'];
$metaKeywords = $row['META_KEYWORDS'];
$metaDescription = $row['META_DESCRIPTION'];

//Calls up the first section of contents from the database
$result1 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'about-crafters-home.php'
AND CONTENT_SECTION = 1");
$row1 = mysql_fetch_array($result1);	
$html1 = $row1['CONTENT_HTML'];

//Calls up the second section of contents from the database
$result2 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'about-crafters-home.php'
AND CONTENT_SECTION = 2");
$row2 = mysql_fetch_array($result2);	
$html2 = $row2['CONTENT_HTML'];

print <<<here
<script type="text/javascript">
alert ($html2);
</script>
here;

//The header is printed from a PHP function so it can incorporate the meta elements from the databse
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
       <meta name="robots" content="…, …" />
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
            </tr></table>

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
				<h3>Welcome to our family of independent craft and scrapbook retailers!</h3>

				<p><p style="text-align: center">There is strength in numbers and Crafters Home is the largest group of independent scrapbook and paper craft retailers in the world. We have&nbsp;over 110 independently owned retail stores in&nbsp;34 states and&nbsp;7 different countries all exchanging information in order to provide you with the freshest ideas, the newest products, cutting-edge techniques and out-of-this-world customer service.</p>
<p style="text-align: center">At Crafters Home we understand the relationship between manufacturer, retailer and you, our customer. Our group was created to help emphasize this synergy. Our logo was developed as a symbol of those three parts working together to create something special.</p>
<p style="text-align: center">Crafters Home stores are passionate about what they do. Over the next several months you will begin to see some big changes at our stores. Come experience the difference and let us help you create and preserve those special memories in a way that is uniquely you.</p>
<p style="text-align: center">Inspiration is our purpose; helping you get there is our specialty!</p></p>
			<!-- <p align="center"><a href="mock2.htm">NEXT EXAMPLE</a> </p>  -->
		  	</td>
			
		  <td width="33%" valign="top">

			<div align="center"><br />
				<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#5C4E23" style="border-collapse: collapse">
					
					<tr>
						<td bgcolor="#5C4E23" align="center" height="35px" valign="center">
						<b><font color="#FFFFFF">In the News</font></b></td>
					</tr>
					<tr>
						<td>
						
						<!--The first section is printed here in PHP-->
						<?php
						print "$html1";
						?>
						
						</td>
					</tr>
					
				</table>
				<p style="margin-top: 5px; margin-bottom: 5px">&nbsp;</p>
				<div align="center">
					<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#5C4E23" style="border-collapse: collapse">
						
						<tr>
							<td bgcolor="#5C4E23" align="center" height="35px">
							
							<b><font color="#FFFFFF">Membership Benefits</font></b>
							
							</td>

						</tr>
						<tr>
							<td>
							
							<!--The second section is printed here in PHP-->
							<?php
							print "$html2";
							?>
							
							</td>
						</tr>
						
					</table>
				</div>
			  </div>

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

            <td align="center"><a href="login-crafters-home.php" class="footer"><b>LOGIN</b></a></td>
        </tr>
    </table>
</div>
			</td>
		</tr>
	</table>
</div>

</body>

<!--The MySQL connection is closed here-->
<?php
mysql_close($con);
?>

</html>
