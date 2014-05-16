<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - CIS 234.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, CIS 234, Systems Design and Development";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Systems Design and Development.";
$heading = "CIS 234 - Systems Design &amp; Development";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>Systems Design and Development is the second of a two class series whose goal is to teach students within the various CIS programs at EdCC a practical approach to learning how to properly plan for planning, analyzing, designing, and developing an actual computer system to be utilized by a business operation. We as students were expected to continue to build on the concepts learned in Systems Analysis. While there was still some individual reading and work to do, the bulk of our work for this class was a team-oriented project in desigining and developing the proposed database management system</p>
  <p>An almost disadvantage to anybody in the web development pipeline was that the class was geared towards developing a Microsoft Access solution, although our instructor Pete Farrar gave us enough leeway to pursue a web-based solution if we so desired. While I did learn how to use SQL (MySQL in particular) by the time I took this class, I was taking PHP at the same time and didn't want to make the mistake on relying on a programming language I was not fully familiar with yet. I was fortunate enough to be placed in a team who had enough Microsoft Access experience to where I was placed on as an SQL developer. We as a team decided on a hybrid system solution of an Access front-end with a MySQL back-end to make the best use of all of our talents.  </p>
  <p>Our team came to the solution that building a Microsoft Access front-end would be the most cost effective automated solution for the fictional bank, since Access was already installed on the bank's computers (as far as the storyline went), and MySQL would be in place as the back-end and be able to scale beyond the limits of Access if need be.  A part of me cringed because of the combination of already knowing how much of a pain in the butt that Access can be in developing a truly workable user interface, and the thought of taking a stereotyipcal corporate approach.</p>
  <p>My team had some signifigant struggles. We did well at ensuring that our collaborative assignments were turned in on time, but the development of the system was by far the biggest issue we faced. Developing the system in Access turned out to be tougher than our main Access developer anticipated, which resulted in some major delays in our planned development milestones. That coupled with communications problems that the team had was all but a recipe for disaster. It was only after we admitted some of our weaknesses that things started progressing. Our alternate Access developer was actually able to go in and give a good set of second eyes. I was able to migrate the reports that proved to be too tough for the Access developers and put them in a MySQL view (in my opinion, it is much easier this way).</p>
  <p>To me, it was unacceptable that Access had such a steep development learning curve to where 
    
    each group was only expected to get two of the five monthly reports the &quot;bank&quot; needed. That, combined with my growing fondness for open source and a little bit of vino compelled me one night to write some PHP scripts that would generate the reports in one night. While they lacked aesthetics, I did pull
    it off.  Those scripts, along with the idea of using phpMyAdmin as a backup to Access, were a part of our overall system that we presented.</p>
  <p>In the end, we did pull it off and managed to do quite well on our group presentation.</p>
  <p> I couldn't help but think when another team, who like me was more web developer oriented, presented a PHP/MySQL solution. Theirs was a very effective and economical way to go, more so than using Access. Two other revelations also got to me.  One of them was I learned that one of the Access developers on my team admitted she was much better at web design.  Also, I found my PHP skills progressing to the point where if the PHP and MySQL code was all I had to focus on,we could have pulled off a web based solution and faced no worse of a risk than our original approach.  Hindsight is always 20/20 I guess.
<p>The course work that myself and the rest of my team did can be found on the Google Docs wiki that we set up for our course project: <br />
  <a href="https://sites.google.com/site/5stardatabasedesign/file-cabinet">Five Star Database Design Files</a></p>
  <p>The backup report generator that I created is hosted on this site and can be accessed here:<br />
  <a href="box/">Bank of Xanadu backup reports generator</a></p>
</div>

<?php
include"common_elements/footer.php";
?>