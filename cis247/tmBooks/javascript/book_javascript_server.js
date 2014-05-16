$(document).ready(function(){
	var cookie_check = GetCookie("book_source");
	if(cookie_check == "cloud"){
	var window_width = 700 ;
	var window_height = $(window).height() - 100;
	$.get('http://development.tm-publisher.com/ebook_view_test.xml', function(xml){
	
	var found_match = false;
	var directory = $(location).attr('href');
	var qs = directory.split("directory=");
	var match_link = "http://development.tm-publisher.com/" + qs[1];
	$(xml).find("item").each(function(){
		var title = "";
		var content = "";
		var server_link = $(this).find("link").text();
			if(server_link == match_link){
				title = $(this).find("title").text();
				content = $(this).find("description").text();
				$("#original_content").html(content);
				setTimeout(function() { extract_data(title) },4000);
			}
	});
	});
var page_counter = 1;

function extract_data(title){
	
var image_link = $(".file").find('a').attr('href');
var image = "<img src='" + image_link + "' alt='" + title + " image' />";
title = "<h1>" + title + "</h1>";
var cover_content = title + image;
var cover = $("<div />", {"class": "hard"}).html(cover_content);
$("#flipbook").turn("addPage", cover, page_counter);
page_counter++;

$("#ebook_content").children().each(function(){
	//alert("in function");
	var old_html = $("#temp_storage").html();
	var child_html = $(this);
	//alert(child_html);
	$("#temp_storage").append(child_html);
	var holder_height = $("#temp_storage").height();
	if(holder_height > 450){
		$("#temp_storage").empty();
		$("#temp_storage").html(child_html);
		element = $("<div />", {"class": "page"}).html(old_html);
		$("#flipbook").turn("addPage", element, page_counter);
		page_counter ++;
	}
});
var last_html = $("#temp_storage").html();
if(last_html != ""){
	element = $("<div />", {"class": "page"}).html(last_html);
	$("#flipbook").turn("addPage", element, page_counter);
		page_counter ++;
	}
var the_end_content = "<h1>The End</h1>";
var the_end = $("<div />", {"class": "hard"}).html(the_end_content);
$("#flipbook").turn("addPage", the_end, page_counter);
page_counter++;
//$("#original_content").empty();
//$("#temp_storage").empty();



}
}

var window_width = 700;
	var window_height = $(window).height() - 100;

$("#book_container, #flipbook, #original_content").width(window_width);
	$("#book_container, #flipbook").height(window_height);
	
	$("#flipbook").turn({
    width: window_width,
    height: window_height,
    autoCenter: true,
	display: "single",
	});


});