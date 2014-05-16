<?php
session_start();
if(isset($_SESSION['infoSubmitted']))
{
$firstName = $_SESSION['infoSubmitted'];
print <<<here
<script type='text/javascript'>
	alert('Thank you for sending me your message, $firstName.  I will try to be in touch with you shortly.');
</script>
here;
unset($_SESSION['infoSubmitted']);
}

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - Contact Me.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, Contact me";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Contact me.";
$heading = "Contact me";


include "common_elements/header.php";
?>



<div id="idTextPanel">

<p>This day in age, there is always at least several different ways of getting a hold of people. Feel free to reach me by <a href="mailto:jeremyrperry@gmail.com">e mail (jeremyrperry@gmail.com)</a>, <a href="http://www.facebook.com/people/Jeremy-R-Perry/1036808799">Facebook</a>, <a href="http://www.linkedin.com/pub/jeremy-perry/18/8aa/ab4">LinkedIn</a>, or by sending me a message through the contact form below.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<span style="text-align:center">

  <form action="common_elements/submitForm.php" method="post" onsubmit="return chkForm();">
	<p>	<strong>First Name</strong><br />

		<input name="txtFName" size="25" type="text" />
	</p>
	<p>
		<strong>Last Name</strong><br />
		<input name="txtLName" size="25" type="text" /></p>
	<p>
		<strong>E-Mail</strong><br />
		<input name="txtEmail" size="25" type="text" /></p>
	<p>
		<strong>Message</strong><br />
	<textarea cols="40" name="txtMessage" rows="8"></textarea></p>
	<p>

		<input id="chkSendCopy" name="chkSendCopy" type="checkbox" value="false" />Send a copy of this message to yourself</p>
	<p>
		<input type="submit" value="Submit" /></p>
</form>
<p>
  <i>All fields are required. This contact form only submits the message to me by e mail. I will not sell or share your contact information for any reason.</i></p>

  </span>
</div>

<?php
include"common_elements/footer.php";
?>