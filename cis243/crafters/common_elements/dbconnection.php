<?php

//The MySQL connection used for the entire website
$con = mysql_connect("phpprojectjrp.db.7368935.hostedresource.com","phpprojectjrp","Jrp1234!");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("phpprojectjrp", $con);

?>