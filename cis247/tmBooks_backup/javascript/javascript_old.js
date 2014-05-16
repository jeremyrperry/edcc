// JavaScript Document
$(document).ready(function(){
	var window_width = $(window).width() - 100;
	var window_height = $(window).height() - 100;
	$("#book_container, #flipbook").width(window_width);
	$("#book_container, #flipbook").height(window_height);
	
	
	$.ajax({
		crossDomain: true,
    	type: "GET",
    	url: "http://development.tm-publisher.com/tester.html",
    	dataType: "html",
    	success: $.pull_content
  	});

	/*
	$.get("http://development.tm-publisher.com/tester.html", function(result){
	alert(result);
    $("#original_content").html(result);
  	});
	*/
	//$('#original_content').load('http://www.jeremyrperry.com/tester.html');

	
	$.pull_content = function(html){
		alert(html);
		("#original_content").html(html);
	};
	
	/*
	$.get("http://development.tm-publisher.com/node/13", function(data){
		alert(data);
		$("#original_content").html(data);
		
		var content = '<div class="hard">tmBooks Test Book</div>';
		var div_height = 0;
		$(data.idTextPanel).find().each(function(){
			$(this).width(window_width);
			var element_height = $(this).height();
			var element_content = '';
			if(div_height == 0){
				element_content +='<div class="page">';
			}
			var height_test = eval(element_height + "+" + div_height);
			if(height_test < window_height){
				element_content += $(this).html();
				div_height = height_test;
			}
			else{
				element_content += "<div>";
				div_height = 0;
			}
			content += element_content;
		});
		content += '<div class="hard">The End</div>';
		$("#flipbook").append(content);
	
	});
	*/
	
	$("#flipbook").turn({
    width: window_width,
    height: window_height,
    autoCenter: true,
	display: "single",
	});

});