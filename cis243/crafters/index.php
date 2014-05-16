<?php

session_start();
require "common_elements/checkstatus.php";
	
//Without the connection to the database, this page can't function
require "common_elements/dbconnection.php";

//Calls up the meta results from the database
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = 'index.php'");
$row = mysql_fetch_array($resultMeta);
$metaTitle = $row['META_TITLE'];
$metaKeywords = $row['META_KEYWORDS'];
$metaDescription = $row['META_DESCRIPTION'];

//Calls up the second content section from the database
$result2 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'index.php'
AND CONTENT_SECTION = 2");
$row2 = mysql_fetch_array($result2);	
$html2 = $row2['CONTENT_HTML'];

//Calls up the third content section from the database
$result3 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'index.php'
AND CONTENT_SECTION = 3");
$row3 = mysql_fetch_array($result3);	
$html3 = $row3['CONTENT_HTML'];

//Calls up the fourth content section from the database
$result4 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'index.php'
AND CONTENT_SECTION = 4");
$row4 = mysql_fetch_array($result4);	
$html4 = $row4['CONTENT_HTML'];

/*The header is made from a print statement to incorporate the meta elements.  Also, this page has a javascript and 
jQuery reference to run the slideshow for the pictures*/
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
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/crafters.js"></script>
</head>

<body>
here;
if(isset($_SESSION['message']))
	{
	$userFname = $_SESSION['userFName'];
	print'<script type="text/javascript">';
	print'alert ("Welcome to my CMS project, ' . $userFname . '.  Feel free to look around the site.  For security reasons, you will be logged out after 10 minutes of inactivity.");';
	print'</script>';
	unset($_SESSION['message']);
	}
?>

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
			<td width="33%" align="center" valign="middle">
	    	
	    	
	    	<?php
	    	/*I incorporated the use of PHP to dynamically load the pictures for the first section from a dedicated file.
	    	jQuery then populates the results into a slideshow*/
	    	$pictureDirectory = opendir("mainPictures");
			while($pictureName = readdir($pictureDirectory))
				{
				$pictureArray[] = $pictureName;
				}
			closedir($pictureDirectory);
			$picCount = count($pictureArray);

			print '<div id="mainPictures">';

			for($i=3; $i<$picCount; $i++)
				{
				print '<img src="mainPictures/';
				print $pictureArray[$i];
				print '" border="0" width="253" height="380" alt="" />';
				}
			print "</div>";
	    	?>
	    					
	      </td>

			<td width="33%" valign="top">
			
			<!--The second section is printed here in PHP-->
			<?php
			print "$html2";
			?>
			</td>
			
			<td width="33%" valign="top">
			<div align="center"><br />
				<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#5C4E23" style="border-collapse: collapse">
					
						<tr>
							<td bgcolor="#5C4E23" align="center" height="35px">

							<b><font color="#FFFFFF">
							<strong>In the News</strong></font></b></td>
						</tr>
						<tr>
							<td>
							
							<!--The third section is printed here in PHP-->
							<?php
							print "$html3";
							?>
							
							</td>
						</tr>

						
				</table>
				<p style="margin-top: 5px; margin-bottom: 5px">&nbsp;</p>
				<div align="center">
					<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#5C4E23" style="border-collapse: collapse">
						
						<tr>
							<td bgcolor="#5C4E23" align="center" height="35px">
							<b><font color="#FFFFFF">
							<strong>The MANY Membership Benefits</strong></font></b></td>

						</tr>
						<tr>
							<td>
							
							<!--The second section is printed here in PHP-->
							<?php
							print "$html4";
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
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="login-crafters-home.php"><b>LOGIN</b></a></td>
            <td align="center"><a href="common_elements/logout.php" class="footer"><b>SITE LOGOUT</b></a></td>
        </tr>
    </table>
</div>
			</td>
		</tr>
	</table>

</div>

<!--The MySQL connection is closed here-->
<?php
mysql_close($con);
?>

</body>

</html>
