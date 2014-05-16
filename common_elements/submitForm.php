<?php
session_start();

$firstName = filter_input(INPUT_POST, "txtFName");
$lastName = filter_input(INPUT_POST, "txtLName");
$email = filter_input(INPUT_POST, "txtEmail");
$msg= filter_input(INPUT_POST, "txtMessage");
$sendCopy = filter_input(INPUT_POST, "chkSendCopy");
$date = date("Y-m-d");

$to = "jeremyrperry@gmail.com";
$subject = "New message from EdCC Portfolio";

$message = "Hello,\n";
$message .= "\n";
$message .= "You have a new message from your EdCC portfolio!\n";
$message .= "\n";
$message .= "Name:\n";
$message .= "$firstName $lastName\n";
$message .= "\n";
$message .= "E-mail:\n";
$message .= "$email\n";
$message .= "\n";
$message .= "Message:\n";
$message .= "$msg\n";
$message .= "\n";
$message .= "Remember to respond and let the person know their message was received.\n";

$from = "donotreply@jeremyrperry.com (Website Server)";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

if ($sendCopy == "true")
	{
	$toCopy = $email;
	$subjectCopy = "Thank you for contacting me";

	$messageCopy = "Hello $firstName,\n";
	$messageCopy .= "\n";
	$messageCopy .= "Here is a copy of your message sent to me:\n";
	$messageCopy .= "\n";
	$messageCopy .= "Name:\n";
	$messageCopy .= "$firstName $lastName\n";
	$messageCopy .= "\n";
	$messageCopy .= "E-mail:\n";
	$messageCopy .= "$email\n";
	$messageCopy .= "\n";
	$messageCopy .= "Message:\n";
	$messageCopy .= "$msg\n";
	$messageCopy .= "\n";
	$messageCopy .= "I'm a fairly busy guy these days, but I will try to reply as soon as I can.  Once again, thank you for viewing my EdCC portfolio.\n";
	$messageCopy .= "Sincerely\n";
	$messageCopy .= "\n";
	$messageCopy .= "Jeremy";

	$fromCopy = "donotreply@jeremyrperry.com (Jeremy Perry)";
	$headersCopy = "From:" . $fromCopy;
	mail($toCopy,$subjectCopy,$messageCopy,$headersCopy);
	}

$_SESSION['infoSubmitted'] = $firstName;
header("Location: ../contact.php");

?>