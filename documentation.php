<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - Documentation.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, Documentation";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Documentation.";
$heading = "Documentation";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>Below is the documentation for my website structure (EdCC directory only). Please feel free to look over it.</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<h2><u>Colors</u></h2>

<div style="width: 750px;">
<p><a href="http://www.colourlovers.com/palette/1722978/Jeremys_Pallette">COLOURlovers.com - Jeremy's Pallette</a></p>
<span class="border">
<span class="color" style="background-color: #000000;"></span>
<span class="colorname">
<strong>Black</strong><br />
RGB: 0, 0, 0<br />
Hex: 000000
</span>
</span>
<span class="border">
<span class="color" style="background-color: #FFFFFF;"></span>
<span class="colorname">
<strong>white</strong><br />
RGB: 255, 255, 255<br />
Hex: FFFFFF
</span>
</span>
<span class="border">
<span class="color" style="background-color: #5970B2;"></span>
<span class="colorname">
<strong>Purpleish blue</strong><br />
RGB: 89, 112, 178<br />
Hex: 5970B2
</span>
</span>
<span class="border">
<span class="color" style="background-color: #EAEBD8;"></span>
<span class="colorname">
<strong>sexy nurse</strong><br />
RGB: 234, 235, 216<br />
Hex: EAEBD8
</span>
</span>
<span class="border">
<span class="color" style="background-color: #49A3FF;"></span>
<span class="colorname">
<strong>Aquaish blue</strong><br />
RGB: 73, 163, 255<br />
Hex: 49A3FF
</span>
</span>
</div>
 
<p>&nbsp;</p>
<p>&nbsp;</p>

 <table width="620" border="1" cellpadding="0" cellspacing="0">
   <tr>
     <td width="165" valign="top"><p>Color Name</p></td>
     <td width="75" valign="top"><p>Hex</p></td>
     <td width="120" valign="top"><p>RGB</p></td>
     <td width="220" valign="top"><p>General Usage</p></td>
   </tr>
   <tr>
     <td width="165" valign="top"><p>Black</p></td>
     <td width="75" valign="top"><p>#000000</p></td>
     <td width="120" valign="top"><p>0, 0, 0</p></td>
     <td width="220" valign="top"><p>Background</p></td>
   </tr>
   <tr>
     <td width="165" valign="top"><p>White</p></td>
     <td width="75" valign="top"><p>#FFFFFF</p></td>
     <td width="120" valign="top"><p>255, 255, 255</p></td>
     <td width="220" valign="top"><p>Foreground</p></td>
   </tr>
   <tr>
     <td width="165" valign="top"><p>Purpleish Blue</p></td>
     <td width="75" valign="top"><p>#5970B2</p></td>
     <td width="120" valign="top"><p>89, 112, 178</p></td>
     <td width="220" valign="top"><p>Menu button color</p></td>
   </tr>
   <tr>
     <td width="165" valign="top"><p>Sexy Nurse (don't ask why)</p></td>
     <td width="75" valign="top"><p>#EAEBD8</p></td>
     <td width="120" valign="top"><p>234, 235, 216</p></td>
     <td width="220" valign="top"><p>Menu dropdown background</p></td>
   </tr>
   <tr>
     <td width="165" valign="top"><p>Auqaish Blue</p></td>
     <td width="75" valign="top"><p>#49A3FF</p></td>
     <td width="120" valign="top"><p>73, 163, 255</p></td>
     <td width="220" valign="top"><p>Menu dropdown background highlight</p></td>
   </tr>
 </table>
<p>&nbsp;</p>


<h2><u>Design Wireframe</u></h2>
<img src="pictures/wireframe.gif" />

<h2><u>Site Structure &amp; Navigation </u></h2>
<p><a href="documents/sitemap.xml">XML Sitemap</a></p>
<p><a href="documents/sitemap.html">HTML Sitemap</a></p>
<p><a href="documents/Visio_Website_Readout.vsd">Visio Drawing</a></p>
<h2><u>Site Directory Listing</u></h2>
<p><img src="pictures/edcc_directory_pic.jpg" width="399" height="451" alt="EdCC directory picture" /></p>
<strong>EdCC Main Directory</strong>
<ul>
  <?php
$fileDirectory1 = opendir("../edcc/");
while($fileName1 = readdir($fileDirectory1))
{
	$fileArray1[] = $fileName1;
}
closedir($fileDirectory1);
$fileCount1 = count($fileArray1);


for($i=2; $i<$fileCount1; $i++)
{
print '<li>' . $fileArray1[$i] . '</li>';
}

?>
</ul>

<div style="margin-left:100px">
<strong>Bank of Xanadu (box) Directory</strong>
<ul>
  <?php
$fileDirectory2 = opendir("box/");
while($fileName2 = readdir($fileDirectory2))
{
	$fileArray2[] = $fileName2;
}
closedir($fileDirectory2);
$fileCount2 = count($fileArray2);


for($i=2; $i<$fileCount2; $i++)
{
print '<li>' . $fileArray2[$i] . '</li>';
}

?>
</ul>
<strong>CIS 241 Directory</strong>
<ul>
  <?php
$fileDirectory3 = opendir("cis241/");
while($fileName3 = readdir($fileDirectory3))
{
	$fileArray3[] = $fileName3;
}
closedir($fileDirectory3);
$fileCount3 = count($fileArray3);


for($i=2; $i<$fileCount3; $i++)
{
print '<li>' . $fileArray3[$i] . '</li>';
}

?>
</ul>
<strong>CIS 242 Directory</strong>
<ul>
  <?php
$fileDirectory4 = opendir("cis242/");
while($fileName4 = readdir($fileDirectory4))
	{
	$fileArray4[] = $fileName4;
	}
closedir($fileDirectory4);
$fileCount4 = count($fileArray4);


for($i=2; $i<$fileCount4; $i++)
{
print '<li>' . $fileArray4[$i]	. '</li>';
}

?>
</ul>
<strong>CIS 243 Directory</strong>
<ul>
  <?php
$fileDirectory5 = opendir("cis243/");
while($fileName5 = readdir($fileDirectory5))
{
	$fileArray5[] = $fileName5;
}
closedir($fileDirectory5);
$fileCount5 = count($fileArray5);


for($i=2; $i<$fileCount5; $i++)
{
print '<li>' . $fileArray5[$i] . '</li>';
}

?>
</ul>
<strong>Common Elements Directory</strong>
<ul>
  <?php
$fileDirectory6 = opendir("common_elements/");
while($fileName6 = readdir($fileDirectory6))
{
	$fileArray6[] = $fileName6;
}
closedir($fileDirectory6);
$fileCount6 = count($fileArray6);


for($i=2; $i<$fileCount6; $i++)
{
print '<li>' . $fileArray6[$i] . '</li>';
}

?>
</ul>
<strong>CSS Directory</strong>
<ul>
  <?php
$fileDirectory7 = opendir("css/");
while($fileName7 = readdir($fileDirectory7))
{
	$fileArray7[] = $fileName7;
}
closedir($fileDirectory7);
$fileCount7 = count($fileArray7);


for($i=2; $i<$fileCount7; $i++)
{
print '<li>' . $fileArray7[$i] . '</li>';
}

?>
</ul>
<strong>Documents Main Directory</strong>
<ul>
  <?php
$fileDirectory8 = opendir("documents/");
while($fileName8 = readdir($fileDirectory8))
{
	$fileArray8[] = $fileName8;
}
closedir($fileDirectory8);
$fileCount8 = count($fileArray8);


for($i=2; $i<$fileCount8; $i++)
{
print '<li>' . $fileArray8[$i] . '</li>';
}

?>
</ul>

<div style="margin-left:100px"> <strong>Art 225 Documents</strong>
<ul>
  <?php
$fileDirectory9 = opendir("documents/art225/");
while($fileName9 = readdir($fileDirectory9))
{
	$fileArray9[] = $fileName9;
}
closedir($fileDirectory9);
$fileCount9 = count($fileArray9);


for($i=2; $i<$fileCount9; $i++)
{
print '<li>' . $fileArray9[$i] . '</li>';
}
?>
</ul>
<strong>CIS 233 Documents</strong>
<ul>
  <?php
$fileDirectory11 = opendir("documents/cis233/");
while($fileName11 = readdir($fileDirectory11))
{
	$fileArray11[] = $fileName11;
}
closedir($fileDirectory11);
$fileCount11 = count($fileArray11);


for($i=2; $i<$fileCount11; $i++)
{
print '<li>' . $fileArray11[$i] . '</li>';
}

?>
</ul>
<strong>CIS 244 Documents</strong>
<ul>
  <?php
$fileDirectory12 = opendir("documents/cis244/");
while($fileName12 = readdir($fileDirectory12))
{
	$fileArray12[] = $fileName12;
}
closedir($fileDirectory12);
$fileCount12 = count($fileArray12);


for($i=2; $i<$fileCount12; $i++)
{
print '<li>' . $fileArray12[$i] . '</li>';
}

?>
</ul>
<strong>CIS 251 Documents</strong>
<ul>
  <?php
$fileDirectory13 = opendir("documents/cis251/");
while($fileName13 = readdir($fileDirectory13))
{
	$fileArray13[] = $fileName13;
}
closedir($fileDirectory13);
$fileCount13 = count($fileArray13);


for($i=2; $i<$fileCount13; $i++)
{
print '<li>' . $fileArray13[$i] . '</li>';
}

?>
</ul>
<strong>CS 115 Documents</strong>
<ul>
  <?php
$fileDirectory10 = opendir("documents/cs115/");
while($fileName10 = readdir($fileDirectory10))
{
	$fileArray10[] = $fileName10;
}
closedir($fileDirectory10);
$fileCount10 = count($fileArray10);


for($i=2; $i<$fileCount10; $i++)
{
print '<li>' . $fileArray10[$i] . '</li>';
}
?>
</ul>

</div>
<strong>JavaScript Documents</strong>
<ul>
  <?php
$fileDirectory14 = opendir("javascript/");
while($fileName14 = readdir($fileDirectory14))
{
	$fileArray14[] = $fileName14;
}
closedir($fileDirectory14);
$fileCount14 = count($fileArray14);


for($i=2; $i<$fileCount14; $i++)
{
print '<li>' . $fileArray14[$i] . '</li>';
}
?>
</ul>
<strong>Pictures</strong>
<ul>
  <?php
$fileDirectory15 = opendir("pictures/");
while($fileName15 = readdir($fileDirectory15))
{
	$fileArray15[] = $fileName15;
}
closedir($fileDirectory15);
$fileCount15 = count($fileArray15);


for($i=2; $i<$fileCount15; $i++)
{
print '<li>' . $fileArray15[$i] . '</li>';
}
?>
</ul>

</div>

</div>

<?php
include"common_elements/footer.php";
?>