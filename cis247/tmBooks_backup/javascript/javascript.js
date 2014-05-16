// JavaScript Document
$(document).ready(function(){
	/*
	var window_width = $(window).width();
	var window_height = $(window).height();
	if(window_height < 700){
		window_height = eval(window_height + "-" + 100);
		$("#book_container, #flipbook").height(window_height);
	}
	var book_window_width = 700;
	if(window_width < 1000){
		alert("condition met");
		book_window_width = eval(window_width + "-" + 100);
	}
	$("#book_container, #flipbook").width(book_window_width);
	var flipbook_width = $("#flipbook").width();
	alert(flipbook_width);
	*/
	
	var window_width = 700;//$(window).width() - 100;
	var window_height = $(window).height() - 100;
	var book_url_path ="book_files/test_book1/";
	var book_url = book_url_path + "index.html";
	$.get(book_url, function(data){
		$("#original_content").html(data);
		$("#original_content img").each(function(){
			var img_src = $(this).attr("src");
			var img_src_replace = book_url_path + img_src;
			$(this).attr("src", img_src_replace);
		});
		var page_counter = 1;
		var title = $(".field-name-title").html();
		var image = $(".field-name-image").html();
		var cover_content = title + image;
		var cover = $("<div />", {"class": "hard"}).html(cover_content);
		$("#flipbook").turn("addPage", cover, page_counter);
		page_counter++;
		$(".field-name-body").children().each(function(){
			var old_html = $("#temp_storage").html();
			var child_html = $(this);
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
		$("#original_content").empty();
	});
	
	
	$("#book_container, #flipbook, #original_content").width(window_width);
	$("#book_container, #flipbook").height(window_height);
	
	$("#flipbook").turn({
    width: window_width,
    height: window_height,
    autoCenter: true,
	display: "single",
	});

});