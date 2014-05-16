<?php
Header("content-type: application/x-javascript");
$jquery_src = array();
$jquery_src[0] = "http://code.jquery.com/jquery-latest.js";
$jquery_src[1] = "jquery.js";
if(!file_get_contents($jquery_src[0]))
{
$jquery = file_get_contents($jquery_src[1]);
}
else
{
$jquery = file_get_contents($jquery_src[0]);
}
print $jquery;
?>