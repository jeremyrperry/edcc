<?php

//The MySQL connection used for the entire website
$con = mysql_connect("host","username","password");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("dbname", $con);

?>
