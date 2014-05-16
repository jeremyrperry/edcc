<?php
Header("content-type: application/x-javascript");
$jquery = file_get_contents("http://code.jquery.com/jquery-latest.js");
print $jquery;
?>