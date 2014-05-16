<?php

session_start();
require "common_elements/checkstatus.php";

//Without the MySQL connection, this page won't function properly.
require "common_elements/dbconnection.php";

//Calls up the meta results from the database
$resultMeta = mysql_query("SELECT META_TITLE, META_KEYWORDS, META_DESCRIPTION
FROM META_DATA
WHERE PAGE_ID = 'membership-benefits-crafters-home.php'");
$row = mysql_fetch_array($resultMeta);
$metaTitle = $row['META_TITLE'];
$metaKeywords = $row['META_KEYWORDS'];
$metaDescription = $row['META_DESCRIPTION'];

//Calls up the first content section from the database.
$result1 = mysql_query("SELECT CONTENT_HTML
FROM CONTENT_STORAGE
WHERE CONTENT_PAGE = 'membership-benefits-crafters-home.php'
AND CONTENT_SECTION = 1");
$row1 = mysql_fetch_array($result1);	
$html1 = $row1['CONTENT_HTML'];

//Calls up the second content section from the database.
$result2 = mysql_query("SELECT TESTIMONIAL, CUSTOMER_NAME, CUSTOMER_COMPANY
FROM CUSTOMER_TESTIMONIALS
WHERE TESTIMONIAL_ID = (SELECT MAX(TESTIMONIAL_ID) FROM CUSTOMER_TESTIMONIALS)");
$row2 = mysql_fetch_array($result2);
$testominial = $row2['TESTIMONIAL'];
$customerName = $row2['CUSTOMER_NAME'];
$customerCompany = $row2['CUSTOMER_COMPANY'];
$html2 = "<p style='text-align: center'>$testominial - $customerName, $customerCompany</p>";

//The head information is printed from PHP to incorporate the meta elements from the database.
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
<script type="text/javascript">
<!--
var intMonthlySales
var intCostOfGoods
var intPercentage
var intPercentPurchase
var intCHVendors
var intMonthlySavings
var intNetSavings

function calcCostOfGoods(){
	var intTempPercentValue
	intMonthlySales = document.calculator.storeSales.value;
	
	if (isNaN(intMonthlySales)){
		alert("Please enter only numbers in the store sales");
		document.calculator.storeSales.value = "";
		document.calculator.storeSales.focus();
		return false;
	}
	else{
		intCostOfGoods = intMonthlySales/2;
		intCostOfGoods = intCostOfGoods.toFixed(0);
		document.getElementById("costOfGoods").innerHTML = intCostOfGoods;
		calcPercentageOfCost();
		// Because we are going to set this at a fixed rate of 50% code below is commented out, if we wanted the customer to put in the %, uncomment 
		/*if (document.calculator.percent.value != ""){
			//clear out any left over data from a different calculation
			document.getElementById("percentOfCost").innerHTML = "";
			document.getElementById("monthlySavings").innerHTML = "";
			document.getElementById("netSavings").innerHTML = "";
			//return calcPercentageOfCost();
		}*/
		
	}
	
	
	
	return true;
	
}

function calcPercentageOfCost(){
	
	// assign the percentage of goods that will be purchased from crafter's home vendors
	// 12/11/09 - customer requested that there be a static 50% for percentage of materials purchased from Crafter's Home
	// Leaving the capability here in case they change
	//intPercentage = parseFloat(document.calculator.percent.value);
	
	// leave as whole number as calculation is done below to change to a percentage
	intPercentage = 50;
	
	intMonthlySavings = 0;
	
	if (isNaN(intPercentage)){
		alert("Please enter only numbers in the percentage purchased.");
		document.calculator.percent.value = "";
		document.calculator.percent.focus();
		return false;
	}
	else{
		// change the value to calculate the 
		intPercentage = intPercentage * .01;
		intPercentPurchase = parseFloat(document.getElementById("costOfGoods").innerHTML) * intPercentage;
		intPercentPurchase = intPercentPurchase.toFixed(0);
		document.getElementById("percentOfCost").innerHTML = (intCostOfGoods * intPercentage);
		intMonthlySavings = intPercentPurchase * .1;
		intMonthlySavings = parseInt(intMonthlySavings);
		document.getElementById("monthlySavings").innerHTML = parseInt(intMonthlySavings);
		intNetSavings = (parseInt(intMonthlySavings)) - 250;
		document.getElementById("netSavings").innerHTML = intNetSavings.toFixed(0);
		document.calculator.storeSales.focus();
		document.calculator.storeSales.select();
	}
	
	return true;
}

function chkField(MonthlySales){
	document.calculator.storeSales.value = MonthlySales;
	calcCostOfGoods();
}

//-->
</script>
</head>

<body>

<div align="center">

<br>
<table border="2" cellpadding="1" width="900" cellspacing="3" bgcolor="#FFFFFF">
	<tr>
		<td colspan="3" bgcolor="#F6B2C0">
         	<table width="100%">
				<tr>
					<td class="navTop"><img border="0" src="images/logo.jpg" width="266" height="58" align="left"></td>
					<td align="right"><b><i><font size="3" color="#5C4E23">Creativity is our passion; inspiration is our specialty!</font></i></b></td>
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
			<h3>Why Become a member of Crafters Home?</h3>

			<p><p style="text-align: center">As a retail store owner you know that buying in a group results in lower costs and greater margins.&nbsp; With the&nbsp;average savings per vendor&nbsp;of approximately 10%,&nbsp;the&nbsp;calculator below lets you see in dollars and cents what&nbsp;your monthly savings as a Crafters Home member will be.&nbsp;</p>
<p style="text-align: center">In addition to real dollar savings, you will also have access to a discussion board,&nbsp;pre-trade show events&nbsp;and a library of relevant&nbsp;and timely information from some of the <strong>VERY BEST</strong>&nbsp;scrapbook stores in the world!</p></p>

	

			<form name="calculator">
			<table width="83%" align="center" cellpadding="5">
				<tr>
					<td colspan="2"><strong>CALCULATE YOUR NET MONTHLY SAVINGS</strong></td>
				</tr>
				<tr>
				  <td align="right" width="33%">
					<input type="text" name="storeSales" style="text-align: right;" onChange="calcCostOfGoods()" size="5" /></td>

					<td width="61%">Your Average Monthly Store Sales </td>
				</tr>
				<tr>
					<td align="right" width="33%" id="costOfGoods"></td>
					<td width="61%">Cost of Goods Sold (50%)</td>
				</tr>
				<tr>
				  <td align="right" valign="top">50%<!--input type="text" name="percent" style="text-align: right;" size="2" onChange="calcPercentageOfCost()" /-->

					<br></td>
					<td width="61%">Currently Crafters Home stores purchase at 
					least 50% of their inventory from partner vendors.</td>
				</tr>
				<tr>
					<td id="percentOfCost" style="text-align:right;">&nbsp;</td>
					<td width="61%">Cost of inventory purchased from vendors</td>
				</tr>
				<tr>

					<td align="right" width="33%">10%</td>
				<td width="61%">Average Vendor Discount</td>
				</tr>
				<tr>
					<td align="right" width="33%" id="monthlySavings">&nbsp;</td>
					<td width="61%">Your Monthly Savings</td>
				</tr>

				<tr>
					<td align="right" width="33%">- $250</td>
				<td width="61%">Crafters Home Monthly Fee</td>
				</tr>
				<tr>
				  <td width="33%"><div align="right">============</div></td>
			  <td width="61%"></td>

			  </tr>
              <tr>
			    <td align="right" width="33%"><span id="netSavings"></span></td><!--input type="text" name="netSavings" style="text-align: right;" disabled="disabled" style="text-align: right; border-bottom: none; border-left: none; border-right: none; border-top: none; color: Black;" /-->
			  <td width="61%"><strong>YOUR NET MONTHLY SAVINGS</strong></td>
			  </tr>
			</table>
		  </form>
		</td>

	  	<td width="33%" valign="top">
			<div align="center"><br />
				<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#5C4E23" style="border-collapse: collapse">
					
					<tr>
						<td bgcolor="#5C4E23" align="center" height="35px" valign="center"><b><font color="#FFFFFF">In the News</font></b></td>
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

						<td bgcolor="#5C4E23" align="center" height="35px" valign="center"><b><font color="#FFFFFF">Latest Member Testimonials</font></b></td>
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

<!--The MySQL connection is closed here-->
<?php
mysql_close($con);
?>

</html>
