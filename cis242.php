<?php

$metaTitle = "Jeremy R Perry's Web Application Development ATA Portfolio - EdCC - CIS 242.";
$metaKeywords = "Jeremy Perry, EdCC Web Application Development ATA Portfolio, CIS 241, Introduction to JavaScript";
$metaDescription = "Jeremy R Perry's Web Application Development Portfolio - Introduction to JavaScript.";
$heading = "CIS 242 - Introduction to JavaScript";


include "common_elements/header.php";
?>



<div id="idTextPanel">
  <p>CIS 242 is in many ways a continuation of CIS 241. In 241, we learned how to create a web page. In 242, we learned how to add some enhanced functionality to those web pages.</p>
  <p>JavaScript (not to be confused with Java, another programming language) is a client-side web programming language that is widely used on the internet. It is used for a whole variety of reasons that include but aren't limited to calculations, functions, page manipulation, form validation, web applications, queries, event handlers, utilizing common HTML elements for an entire website (thus saving a lot of time from performing the sam edit on every page),etc. In short, JavaScript is a capable object oriented programming language that is able to make an otherwise static (and boring) web page more interactive with the user. Because it is a client-side language, JavaScript runs directly on browsers without the assistance of a server. JavaScript also has speciality classes that handle very specific kinds of client side operations such as DOM's, Dynamic HTML, AJAX, and jQuery (my personal favorite).</p>
  <p>My first project in the class was to create a JavaScript calculator. The one I created is capable of evaluating a mathematical statement and giving the result. If an invalid mathematical statement is given, the code will generate an error. The program can be found here:</p>
  <p><a href="cis242/calculator.html">Calculator Program</a></p>
  <p>My second project involved making a tac-tac-toe game. Don't let the seeming simplicity of the game fool you, as there was a fair amount of complex coding that took place to ensure that the game could work in both two and one player mode. It can be viewed here:</p>
  <p><a href="cis242/tictactoe.html">Tic Tac Toe</a></p>
  <p>My third and final project was to create an online ordering form for a pizza parlor. It involved the use of JavaScript in terms of calcuating the order total, validating the form, and utilizing cookies as a way to transfer the form information from one page to another. In an actual ordering form, some form of server-side validation and scripting would be needed to at least process a credit card transaction. However, JavaScript works quite well for a simulation. Because it is possible for JavaScript to be disabled and for somebody to unintentionally store actual credit card information on their computer for the whole world to see, I wrote the page to where JavaScript is required to be enabled to use the form and required everybody using it to acknowledge that the form is a simulation. The project can be found here:</p>
  <p><a href="cis242/Pizza_Parlor/welcome.html">Pizza Ordering Project</a></p>
  <p>In short, JavaScript is absolutely vital for a web developer to learn, as dynamic an interactive web pages are the de facto standard in the world wide web today. This class gave me the necessary knowledge and tools to do that.</p>
</div>

<?php
include"common_elements/footer.php";
?>