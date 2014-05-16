<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - CIS 233.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, CIS 233, Systems Analysis";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Systems Analysis.";
$heading = "CIS 233 - Sytems Analysis";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>Systems Analysis is the first of a two class series whose goal is to teach students within the various CIS programs at EdCC a practical approach to learning how to properly plan for planning, analyzing, designing, and developing an actual computer system to be utilized by a business operation. We as students were expected to learn about the importance of the Systems Development Life Cycle (SDLC), requirements analysis, project planning and feasibility, as well as systems documentation and recommendation. Because the best way to learn all of these concepts was to actually do them, our class was divided into teams who would get to work on the planning and analysis phases of the SDLC for a database system that a fictional business needed to better handle keeping track of their IT expenses.</p>
  <p>Most everybody who has taken Pete Farrar's CIS 233 and 234 classes within the past couple of years has become well acquainted with the legendary Bank of Xanadu project. Each team got a chance to not only demonstrate a custom approach to meeting the bank's needs, but to also show that they can work together as an effective team. I was fortunate enough to be placed with team members who were industrious enough to ensure our project meets or exceeds all expectations that &quot;Patrick Jay&quot; has made of us.</p>
  <p>While our group did hit a few bumps here and there, we did quite well in ensuring that all of our deliverables were met on time and without fail. We were a team who not only shared the common purpose of exellence, but also had a few team members who had practical experience in dealing with systems like the one were were planning form. I was personally surprised to see how how relatively cost effective that having a reliable database system in place in comparison to doing everything manually. In the case of the bank, they were trying to keep track of managing their IT expenses by an Excel spreadsheet, which proved to extremely time consuming (resulting in increased labor costs) as well as a higher margin of error.</p>
  <p>Our team came to the solution that building a Microsoft Access database would be the most cost effective automated solution for the bank since Access was already installed on the bank's computers. To address the scalability issues that Access has, the back-end database would be allowed to scaled to SQL Server if the need arises. A part of me cringed because of the combination of already knowing how much of a pain in the butt that Access can be in developing a truly workable user interface with a back-end database, and the thought of taking a stereotyipcal corporate approach. None the less, we did a very good job in researching. I couldn't help but think when another team, who like me was more web developer oriented, presented a PHP/MySQL solution as the way to go. Theirs was a very effective and economical way to go, more so than using Microsoft solutions. 
<p>Because my Lab 6 assignments are Microsoft Visio documents, they can't be read by the Google Docs reader and are available only as a direct download (links are below).  For all my other assignments, you can either choose to view my work in a Google Docs viewer, or view/download it from a new window.</p>

<span style="text-align:center">
<p><a href="documents/Jeremy_Lab_6_DFD.vsd">Lab 6 DFD</a><br />
<a href="documents/Jeremy_Lab_6_FDD.vsd">Lab 6 FDD</a></p>


<form action="" onsubmit="return getFile();">
<p><select name='selectFile'>
    
<?php
$fileDirectory = opendir("documents/cis233");
while($fileName = readdir($fileDirectory))
{
	$fileArray[] = $fileName;
}
closedir($fileDirectory);
$fileCount = count($fileArray);


for($i=2; $i<$fileCount; $i++)
{
print '<option value="cis233/' . $fileArray[$i] . '">' . $fileArray[$i] . '</option>\n';
}

?>
</select></p>

<p><input type="button" name="btnLoadDoc" id="btnLoadDoc" value="Load Into Viewer" onclick="return loadDoc();" /></p>

</form>

<div id="gDoc">
<a href="documents/cis233/CIS_233_Lab_1_report.doc">Click here</a> to view or download the displayed assignment directly<br />
<iframe src="http://docs.google.com/gview?url=http://www.jeremyrperry.com/edcc/documents/cis233/CIS_233_Lab_1_report.doc&embedded=true" style="width:600px; height:700px;" frameborder="0"></iframe>
</div>
</span>

<p>&nbsp;</p>

</div>

<?php
include"common_elements/footer.php";
?>