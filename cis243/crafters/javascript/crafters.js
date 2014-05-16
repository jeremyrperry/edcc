//This function initializes the mainPictures div element on the main page for the jQuery slideshow.
function init() 
{
	$('#mainPictures img').hide();
	$('#mainPictures img:first').show();
}

//This function defines the timer for the slideshow
$(document).ready(function() {
 init();
    setInterval( "slide()", 5000 );
});

//This function runs the slideshow
function slide() 
{
	var $top = $('#mainPictures img:visible');
    var $next;
	if($top.next().length > 0)
	{
  		$next = $top.next();
  	}
 	else
 	{
        $next = $('#mainPictures img:first');
	}
	$top.hide();
	$next.show();
}
