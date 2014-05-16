<?php
session_start();
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}

/*This PHP script populates the testSelection div element on selectTestimonials.php with the available 
testimonials for editing and deleting if called upon.*/

//Because it's simply required
 require "../../common_elements/dbconnection.php";

//Can't remember if there's a reason for having the count, but it's harmless so it can stay for now
$resultCount = mysql_query("SELECT COUNT(*)
FROM CUSTOMER_TESTIMONIALS");
$rowCount = mysql_fetch_array($resultCount);
$count = $rowCount['COUNT(*)'];
 
/*We first off pull some basic elements from the database, which will help the user identify the testimonial
they wish to edit or delete.*/
$result = mysql_query("SELECT TESTIMONIAL_ID, CUSTOMER_NAME, CUSTOMER_LOCATION
FROM CUSTOMER_TESTIMONIALS");

/*A while loop then populates all of the data into an select box*/
print "<p><select name='testimonials'>";
while($row = mysql_fetch_array($result))
{
print "<option value=";
print $row['TESTIMONIAL_ID'];
print ">";
print $row['TESTIMONIAL_ID'];
print " -- ";
print $row['CUSTOMER_NAME'];
print " -- ";
print $row['CUSTOMER_LOCATION'];
print "</option>";
}

print <<<here
</select><br />			
here;
//Last but not least
mysql_close($con);
?>