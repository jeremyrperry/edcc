<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CiS 246 Project 2</title>
    <!-- author: Jeremy Perry
     CIS 246, Spring 2012 -->
    <meta name="author" content="Jeremy Perry" />
    <meta name="keywords" content="CIS 246 Project 2" />
    <meta name="description" content="CIS 246 Project 2." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="none" />
<script type="text/javascript" src="../jQuery/jquery.php"></script>
<script type="text/javascript">

$(document).ready(function(){
	
$('.show_pic').click(function() {
        var open_id = $(this).attr('id');
		open_id = open_id.replace("show_", "");
		open_id = "#" + open_id;
		$(open_id).fadeIn(2000).delay(13000).fadeOut(2000);
});	

});
</script>
<style type="text/css">

ul li
{
	list-style: none;
}

.picture
{
	display: none;
}

</style>

</head>
<!--
The pictures included in this demonstration of my nephew Mason along with his parents, my brother Marcus and sister-in-law Kendra.  I have full permission to use them for a class project
-->
<body>

<h1>Click on any hyperlink to see the corresponding picture.  You will have 15 seconds until the picture closes</h1>

<ul>
<?php
$directory = "images/";
$dont_print = array(".", "..");
$get_pic = scandir($directory);
$number = 1;
foreach($get_pic as $pic)
{
	if(!in_array($pic, $dont_print))
	{
	print <<<here
	<li><a href="#" id="show_pic_$number" class="show_pic">Show $pic</a></li>
	<li id="pic_$number" class="picture"><img src="$directory$pic" alt="Picture $number of Mason" /></li>\n
here;
	$number++;
	}
}
?>
</ul>

</body>
</html>