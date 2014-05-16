<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Crafters Home Landing Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
 <script language="javascript">

function validate(a) {

if (a.fullname.value=='') {
alert("Name is a required field.")
a.fullname.focus();
return false
}
if (a.email.value == '') {
alert("Please provide your email address.")
a.email.focus();
return false
} 
var emailAt = document.forms[0].email.value.indexOf("@", 0);		
var emailDot = document.forms[0].email.value.indexOf(".", 0);
	if (( emailAt == -1) || ( emailDot == -1)) { 		// check to see if email address has @ and . 
		alert("Your email address does not seem to be correct. \nPlease check the value you have entered."); 
		document.forms[0].email.focus(); 
		document.forms[0].email.select(); 
		return false; 
	}

return true
}
</script>

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
			<h3>Contact Us</h3>

			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="40%" rowspan="2" valign="top"><strong>		        Crafters Home<br>
			      </strong>15025 Glazier Avenue<br>
				Suite 220<br>
				Apple Valley, MN 55124<br>

			      <br>
			      <strong>Phone</strong>:   800-657-7270<br>
			      <strong>Fax</strong>: 801-315-4115<br>
			      <strong>Email</strong>: <a href="mailto:info@craftershome.com">info@craftershome.com</a>
                  <p>&nbsp;</p>

                  If you are interested in opening a store, or   already have a store and want to find out more about becoming a member, we would   love to speak with you. Email, phone or fax, you can usually catch us at any   time.<br>
                    <br>
                    THANK YOU
               <br>
&nbsp;</td>
                <td width="3%" rowspan="2">&nbsp;</td>
			    <td width="57%" align="center">
                <div align="center">
			      <form method="POST" action="contact-thankyou.php" onsubmit="return validate(this);">

									
									
								
									
<div align="center">
										<br>
&nbsp;<table border="0" cellpadding="0" style="border-collapse: collapse" width="93%">
											<tr>
												<td width="181" valign="top">Name</td>
												<td width="236" valign="top">
												<input type="text" name="fullname" size="35"></td>
											</tr>
											<tr>

												<td width="181" valign="top">Email</td>
												<td valign="top">
												<input type="text" name="email" size="35"> </td>
											</tr>
                                            
											<tr>
												<td width="181" valign="top">
												<br>
												Question or 
												Comment</td>

												<td valign="top">
												<textarea rows="4" name="info" cols="29"></textarea></td>
											</tr>

</table>
									</div>
									<p style="text-align: center; margin-right: 50px">
									<input type="image" value="Submit" name="B1" src="images/submit-wh.jpg"></p>
								</form>

			      </div>
                  </td>
		      </tr>
			  <tr>
			    <td valign="top" align="center">&nbsp;</td>
			  </tr>
			  </table></tr>
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

</html>