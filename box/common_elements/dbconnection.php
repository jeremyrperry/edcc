<?php
$con = mysql_connect("localhost","jeremyp1_01","get$0meass");
if (!$con)
	{
	die('Could not connect: ' . mysql_error());
  	}

mysql_select_db("jeremyp1_bbcisexpenses", $con);
?>
