<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - CIS 251.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, CIS 251, SQL, Structured Query Language, MySQL";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Structured Query Language.";
$heading = "CIS 251 - Structured Query Language";

include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>CIS 251 is the Introduction to Structured Query Language (SQL).</p>
  <p>SQL is the standard coding languages for most electronic databases. Virtually every modern relational database management system (RDBMS)uses SQL. This includes but isn't limited to MySQL, Microsoft Access (the database portion), SQL Server, Oracle, SQLite, and PostgreSQL. SQL databases are in heavy use today as they are able to not only store large aomounts of raw data, but can also perform calcuations based on that data.</p>
  
   <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  
  <p>My 251 class learned the basics of how to set up, run, and manage a SQL database. Some of the topics that were covered included the following:</p>
  <ul>
    <li>Creating and dropping databases</li>
    <li>Creating, modifying, and dropping tables</li>
    <li>Primary and foreign keys</li>
    <li>Select statements</li>
    <li>Inner and outer joins</li>
    <li>Inserting, updating, and deleting rows</li>
  </ul>
  <p>As a web developer, I got a lot out of this class because how databases are extensively used with websites to do all sorts of things from collecting data from a contact form to even powering an entire website. The RDBMS used for the class was MySQL because of its open source nature.</p>
  <p>My coursework is available in the Google Docs reader below:</p>
  <span style="text-align:center">
<form action="" onsubmit="return getFile();">
<p><select name='selectFile'>
    
<?php
$fileDirectory = opendir("documents/cis251");
while($fileName = readdir($fileDirectory))
{
	$fileArray[] = $fileName;
}
closedir($fileDirectory);
$fileCount = count($fileArray);


for($i=2; $i<$fileCount; $i++)
{
print '<option value="cis251/' . $fileArray[$i] . '">' . $fileArray[$i] . '</option>\n';
}

?>
</select></p>

<p><input type="button" name="btnLoadDoc" id="btnLoadDoc" value="Load Into Viewer" onclick="return loadDoc();" /></p>

</form>

<div id="gDoc">
<a href="documents/cis251/CIS 251_Assign_2.doc">Click here</a> to view or download the displayed assignment directly<br />
<iframe src="http://docs.google.com/gview?url=http://www.jeremyrperry.com/edcc/documents/cis251/CCIS 251_Assign_2.doc&embedded=true" style="width:600px; height:700px;" frameborder="0"></iframe>
</div>
</span>  
 
 <p>&nbsp;</p>
  
</div>

<?php
include"common_elements/footer.php";
?>