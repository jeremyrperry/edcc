<?php
session_start();
unset($_SESSION['access']);
unset($_SESSION['timeout']);
$_SESSION['loginError'] = "<p>Thank you for viewing my CMS project.</p>";
header("Location: ../../crafterslogin.php");

?>