<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php print $metaTitle; ?></title>
       <!-- author: Jeremy Perry
       CIS 245, Winter 2012 -->
       <meta name="author" content="Jeremy Perry" />
       <meta name="keywords" content="class example, explanation of the examples included, Winter 2012, Edmonds Community College, <?php print $metaKeywords; ?>" />
       <meta name="description" content="<?php print $metaDescription; ?>" />
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
       <meta name="robots" content="none" />

<?php $current_loc = $_SERVER['HTTP_HOST']  . "/cis_245_final/" ?>
<base href="http://<?php print $current_loc; ?>" />
<link rel="shortcut icon" href="images/favicon.ico" />
<style type="text/css" media="screen">@import url("css/style.css");</style>
<style type="text/css" media="print">@import url("css/print-style.css");</style>
<style type="text/css" media="only screen and (max-device-width: 480px)">@import url("css/mobile-style.css");</style>
<!--[if IE]>
	<style type="text/css" media="all">@import url("css/ie-style.css");</style>
<![endif]-->
<script type="text/javascript" src="javascript/jquery.php"></script>
<script type="text/javascript" src="javascript/curvycorners.js"></script>
</head>

<body>
<div id="main">

<div id="header">
<div id="header-content">
	<div class="head-left">
	<?php print $issue_info; ?>

    </div>
  <div class="head-center">
  MONTHLY JOURNAL OF INFORMATION TECHNOLOGY
  </div>
  <div class="head-right">
  <h1><img src="images/tech_time.png" alt="Tech Time" width="306" height="72" /></h1>
  </div>
</div>
</div>


<div id="below-header">



<div id="left-column">
<?php print $left_content; ?>
</div>

<div id="right-column">

<img class="img-rounded" src="images/woman_at_computer.jpg" alt="Woman at Computer" />

<div id="right-links">
<?php print $right_links; ?>


</div>


<div id="content-region">