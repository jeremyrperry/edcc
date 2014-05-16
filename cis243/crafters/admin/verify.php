<?php
session_start();

//This PHP script can't function without the database connection
require "../common_elements/dbconnection.php";

//These variables collect the username and password from the login page.
$userName = filter_input(INPUT_POST, "StoreID");
$password = filter_input(INPUT_POST, "password");

//This MySQL query calls on the database to check the validity of the username and password
$result = mysql_query("SELECT USERNAME, USER_F_NAME, USER_LEVEL
FROM USER_INFO
WHERE USERNAME = '$userName'
AND USER_PASSWORD = '$password'");
$row = mysql_fetch_array($result);

/*If there is no returned information, it means the user entered invalid information and will be redirected back to the login page
with an error message.*/
if (!$row)
{
$_SESSION['errorMsg'] = "<p color='red'>Your username and/or password do not match our records.</p>";
header("Location: ../login-crafters-home.php");
}
/*If there is returned information, variables are stored and the user will be routed to the control center page.*/
else
{
$_SESSION['authorized'] = true;
$_SESSION['username'] = $row['USERNAME'];
$_SESSION['userFName'] = $row['USER_F_NAME'];
$_SESSION['userLevel'] = $row['USER_LEVEL'];
header("Location: controlCenter.php");
}

mysql_close($con);
?>