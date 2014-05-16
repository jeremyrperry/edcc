
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">


<head>
<title>Guess the Number</title>
       <meta name="author" content="Jeremy Perry" />
       <meta name="keywords" content="Jeremy Perry, class example, PHP, random number generator, guess the number" />
       <meta name="description" content="This web page generates a random number between 1 and 100.  See if you can guess it!" />
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
       <meta name="robots" content="none" />
       <meta name="robots" content="…, …" />

<?php       
print <<<here
<script type="text/javascript">
function checkEntry()
{
var userNumber = document.forms[0].txtNumber.value;
var userNumberSearch = (userNumber / Math.floor(userNumber));
if ((isNaN(userNumber)) || (userNumber > 100) || (userNumber < 1) || (userNumberSearch != 1))
{
	alert('You must enter a whole number between 1 and 100.');
	document.forms[0].txtNumber.focus();
	return false;
}
return true;
}

function clearStats()
{
	document.forms[0].txtNumber.value = "";
	document.forms[0].txtLastGuess.value = "n/a";
	document.forms[0].txtLastNumber.value = "n/a";
	document.forms[0].txtResults.value = "None yet...";
	document.forms[0].txtGuesses.value = 0;
	document.forms[0].txtCorrectGuesses.value = 0;
}
</script>
here;
?>

<?php
$userNumber = "n/a";
$randomNumber = "n/a";
$results = "None yet...";
$guesses = 0;
$correctGuesses = 0;
$displayResults = "";
$userNumberCheck = filter_input(INPUT_POST, "txtNumber");
if (is_numeric ($userNumberCheck))
{
$userNumber = $userNumberCheck;
$guesses = filter_input(INPUT_POST, "txtGuesses");
$correctGuesses = filter_input(INPUT_POST, "txtCorrectGuesses");
$randomNumber = rand(1, 100);
if ($userNumber == $randomNumber)
{
print "<script type='text/javascript'>\n";
print "alert('You guessed correctly.  Congratulations!!');\n";
print "</script>";
$results = "You guessed correctly.  Congratulations!!";
$guesses = $guesses + 1;
$correctGuesses = $correctGuesses + 1;
}
if ($userNumber < $randomNumber)
{
print "<script type='text/javascript'>\n";
print "alert('You guessed below the actual number.  Please try again!');\n";
print "</script>";
$results = "You guessed below the actual number.  Please try again!";
$guesses = $guesses + 1;
}
if ($userNumber > $randomNumber)
{
print "<script type='text/javascript'>\n";
print "alert('You guessed above the actual number.  Please try again!');\n";
print "</script>";
$results = "You guessed above the actual number.  Please try again!";
$guesses = $guesses + 1;
}
}
?>

       
</head>

<body> 
 

<?php

print <<<here

<h1>Guess the Number!</h1>

<p> This web page generates a random number between 1 and 100.  See if you can guess it.  Good luck!</p>
<p>
<form method="post" action="jrpRandomNumber.php" onsubmit="return checkEntry();">
Enter your number:  <input type="text" size="3" name="txtNumber" /></p>
<p><input type="submit" value="Submit" name="cmdSubmit" /></p>
<h3>Results from Last Attempt</h3>
<p>Your Guessed Number:  <input type="text" style="border:none;"  name="txtLastGuess" readonly="readonly" value="$userNumber" /><br />
Actual Number:  <input type="text" style="border:none;"  name="txtLastNumber" readonly="readonly" value="$randomNumber" /><br />
Results:  <input type="text" style="border:none;"  size="60" name="txtResults" readonly="readonly" value="$results" /></p>
<h3>Tally:</h3>
<p>Total Guesses:  <input type="text"  style="border:none;" name="txtGuesses" readonly="readonly"  value="$guesses" /><br />
Total Correct Guesses:  <input type="text" style="border:none;"  name="txtCorrectGuesses" readonly="readonly"  value="$correctGuesses" /></p>
<p><input type="button" value="Clear Stats" name="cmdClearStats" onclick="return clearStats();"></p>
</form>


here;

?>

<p><a href="../cis243.php">Back to my PHP class page</a></p>

</body>
</html>