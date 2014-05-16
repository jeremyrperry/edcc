// JavaScript Document
$(document).ready(function(){
	var window_width = 700;
	var window_height = $(window).height() - 100;
	var cookie_check = GetCookie("book_source");
	if(cookie_check == "device"){
	var directory = $(location).attr('href');
	var qs = directory.split("directory=");
	var book_url_path ="book_files/" + qs[1] + "/";
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
		var the_end_content = "<h1>The End</h1>";
		var the_end = $("<div />", {"class": "hard"}).html(the_end_content);
		$("#flipbook").turn("addPage", the_end, page_counter);
		page_counter++;
		$("#original_content").empty();
	});
	}

});