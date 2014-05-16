<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - Art 225.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, Art 225, Graphic Design";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio Resume .";
$heading = "Art 225 - Introduction to Graphic Design";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>This class is exactly as the name implies: an introduction to Graphic Design.</p>
  <p>According to the course description, this class introduces students to the   history, imagining and the elements and principles of digital design in visual communication. It also stated that students would also learn computer graphic design production tools and processes in visual illustration.  </p>
  <p>I didn't know what to expect of taking graphic design. I knew that I wanted to be a developer, and while I felt it was a good thing to have a sense of design aesthetics, I wasn't too enthused.  While I am not horrorible in my design sense, I tend to stick with relatively simple themes because I know I can't screw them up.  Throughout the class, I had the nagging fear that I wasn't going to do well. By far my biggest fear was that the class required the use of inDesign. While I am no stranger to embracing technology, the little exposure to inDesign I had prior to this class made me wonder.</p>
  <p>Fast forward one whole quarter. Were my designs the best in the class? The answer is no. However, I did learn a lot about things like balancing and matching colors, effective use of whitespace, and conquered my fear of inDesign. For some reason, I also became a big fan of the helvectica font afterwards. I also felt good in the fact that some of my fellow classmates genuinely liked some of my work. While I by no means claim to be a graphic designer, and hesitate to even think of myself of a web designer, the design principles I learned have proven to be quite useful.</p>
  
  <p>Below is a selection field for my coursework. You can either choose to view my work in a Google Docs viewer, or view/download it in a new window. Please be aware that some of the files (particularly my final) are large in size and may take a while to load into the viewer or download.</p>
  <p>&nbsp;</p>

<span style="text-align:center">
<form action="" onsubmit="return getFile();">
<p><select name='selectFile'>
    
<?php
$fileDirectory = opendir("documents/art225");
while($fileName = readdir($fileDirectory))
{
	$fileArray[] = $fileName;
}
closedir($fileDirectory);
$fileCount = count($fileArray);


for($i=2; $i<$fileCount; $i++)
{
print '<option value="art225/' . $fileArray[$i] . '">' . $fileArray[$i] . '</option>\n';
}

?>
</select></p>


<p><input type="button" name="btnLoadDoc" id="btnLoadDoc" value="Load Into Viewer" onclick="return loadDoc();" /></p>
</form>

<div id="gDoc">
<a href="documents/art225/Assignment_1_reflection.docx">Click here</a> to view or download the displayed assignment directly<br />
<iframe src="http://docs.google.com/gview?url=http://www.jeremyrperry.com/edcc/documents/art225/Assignment_1_reflection.docx&embedded=true" style="width:600px; height:700px;" frameborder="0"></iframe>
</div>
</span>

<p>&nbsp;</p>

</div>

<?php
include"common_elements/footer.php";
?>