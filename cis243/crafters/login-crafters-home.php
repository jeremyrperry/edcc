<?php

session_start();
require "common_elements/checkstatus.php";

//If the user doesn't have authorization to be in the admin section, this part helps generate an error message.
$errorMsg = "";
if (isset($_SESSION['errorMsg']))
	{
	$errorMsg = $_SESSION['errorMsg'];
	unset($_SESSION['errorMsg']);
	}
	
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Crafters Home Landing Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
<!--
function chkForm(){

	for (var i = 0; i < 2; i++){
		
		if (document.forms[0].elements[i].value == ""){
			if (i == 0){
				alert("Please enter your store ID.");
				document.forms[0].elements[0].focus();
			}
			else {
				alert("Please enter your password.");
				document.forms[0].elements[1].focus();
			}
			return false;
		}
	}
	return true;
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
					<td class="navTop">
						<img border="0" src="images/logo.jpg" width="266" height="58" align="left">
					</td>
					<td align="right"><b><i><font size="3" color="#5C4E23">

						Creativity is our passion; inspiration is our specialty!</font></i></b>
					</td>
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
			<h3>Login</h3>
			<div align="center">
			
			<!--If an error message was generated, it will print here-->
			<?php
			if ($errorMsg != "")
			{
			print "$errorMsg<br />";
			}
			?>
			
			</div>
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" >
				<tr>

			    	<td align="center" valign="top">
			    	<!--Submitting the form will call up the verify.php script and check the validity of the username and password-->
						<form name="login" action="admin/verify.php" method="post" onsubmit="return chkForm()">
						<p>&nbsp;</p>
                		<table width="300"  border="1" align="center" cellpadding="8" cellspacing="0" style="border-collapse:collapse;" bordercolor="#5C4E23">
							<tr>
								<td colspan="2" bgcolor="#5C4E23"><span style="color:#ffffff"><b>Member Login</b></span></td>
							</tr>
							<tr>

								<td colspan="2">
									
								</td>
  							</tr>
  							<tr>
    							<td width="136">User ID:</td>
    							<td width="156">
      								<input type="text" name="StoreID" id="StoreID" value="">
    							</td>

  							</tr>
  							<tr>
    							<td>Password:</td>
    							<td>
      								<input type="password" name="password" id="password" value="">				
								</td>
							</tr>
						</table>
                		<p>&nbsp;</p>

						<div align="center">
							<input type="image" value="Submit" name="B1" src="images/submit-wh.jpg">
						</div> 
						</form>
						<p><a href="recoverPass.php">Forgot your password?</a></p>
						<!-- Removed quick admin Link for demonstration -->
						<!--p><a href="admin/index.php">admin</a></p-->
                		<!--table border="0" cellpadding="2" cellspacing="0" width="100%" bordercolor="#ffffff" id="table1">
							<tr>
								<td colspan="2">&nbsp;<p>&nbsp;</p>
									<p><b>Forgot your password?</b></p>
									<p style="text-align: center; margin-bottom: 0">Enter your email address..
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>
									<input name="email" type="text" size="31">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div align="center">
										<input type="button" name="Submit2" value="Send Me My Password" onClick="document.location.href='lostpw.php?email=' + document.form1.email.value">
							        </div>
								</td>
							</tr>
						</table-->
					</td>

				</tr>
			</table>
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

<script type="text/javascript">
<!--
document.login.StoreID.focus();
//-->
</script>
</body>

</html>