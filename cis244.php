<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - CIS 244.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, CIS 244, SEO and Content Management Systems";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - SEO and Content Management Systems.";
$heading = "CIS 244 - SEO and Content Management Systems";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>CIS 244 was an online class that spent half the time with Search Engine Optimization, and the other half in content management systems.</p>
  <p>I quickly learned that SEO is to websites like fuel is to vehicles. Without the former, the later isn't going anywhere. I spent the first 4-5 weeks learning a bunch of SEO concepts wand what it takes to make sure that a website is not onlly visible to a search engine such as Google, Yahoo, or Bing, but also ranks well with each one of them. SEO is divided into two different part. The first part is  organic SEO, which is what can be done to ensure the website itself to allow it to rank well with the search engines. This is where I learned about how to write not only compelling content but to ensure that the site's meta tags were properly written to alert the search engines of the site's content. I also learned the importance of backlinks when it comes to organic SEO and the role that social media plays in this. This is why you will see some type of social media &quot;like us&quot; button on just about every website I develop these days. The second part of SEO is Search Engine Marketing (SEM), which comprises of active marketing strategies (usually in the form of Pay Per Click ads) to get the word out about the website. Both go hand in hand in order to make a website an overall SEO success.</p>
  <p>The second part of the class was to learn more about the effective use of content management systems (not the development aspects) and how they can be extremely efficient in managing a website that can be hundreds or even thousands of pages long. While I am a fan of a completely custom website architecture, utilizing a pre-designed CMS does have its place in managing a large and complex website.</p>
  <p>In both the SEO and CMS portions of the class, my class used several local businesses with a web presence as case studies to see how we could improve not only their marketing goals through an effective SEO campaign, but also how to miggrate their present website over to a CMS that will properly suit their for efficient management of their content and allow for future growth. This part required me to become a lot more knowledgeable with some of the CMS solutions out there, and know which one would suit the needs of a customer well.</p>
  <p>Much of my work was done on Blackboard, but I do have two of my assignments available for viewing in the Google Docs reader below:</p>
  <p>&nbsp;</p>
  
<span style="text-align:center">

<form action="" onsubmit="return getFile();">
<p><select name='selectFile'>
    
<?php
$fileDirectory = opendir("documents/cis244");
while($fileName = readdir($fileDirectory))
{
	$fileArray[] = $fileName;
}
closedir($fileDirectory);
$fileCount = count($fileArray);


for($i=2; $i<$fileCount; $i++)
{
print '<option value="cis244/' . $fileArray[$i] . '">' . $fileArray[$i] . '</option>\n';
}

?>
</select></p>

<p><input type="button" name="btnLoadDoc" id="btnLoadDoc" value="Load Into Viewer" onclick="return loadDoc();" /></p>

</form>

<div id="gDoc">
<a href="documents/cis244/CIS_244_Assignment_4.docx">Click here</a> to view or download the displayed assignment directly<br />
<iframe src="http://docs.google.com/gview?url=http://www.jeremyrperry.com/edcc/documents/cis244/CIS_244_Assignment_4.docx&embedded=true" style="width:600px; height:700px;" frameborder="0"></iframe>
</div>
</span>  
  
<p>&nbsp;</p>  
  
</div>

<?php
include"common_elements/footer.php";
?>