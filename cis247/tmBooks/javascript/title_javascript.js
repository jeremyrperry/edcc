// JavaScript Document
$(document).ready(function(){

	
	var source_check = GetCookie("book_source");
	if(source_check  == ""){
		SetCookie("book_source", "device");
		source_check = GetCookie("book_source");
	}
	$("#"+source_check).css("background-color","gray");
	
	$.get_source = function(){
	$("#book_titles").empty();
	$.get('book_files/books.xml', function(xml){
		$(xml).find("book").each(function(){
			var image = "";
			var directory = "";
			var author = "";
			var title = "";
			var source_check = GetCookie("book_source");
			var pic_source = "";
			$(this).find("image").each(function(){
				image = $(this).text();
			});
			$(this).find("title").each(function(){
				title = $(this).text();
			});
			
			if(source_check == "device"){
				$(this).find("directory").each(function(){
					directory = $(this).text();
				});
				pic_source = "book_files/" + directory + "/images/" + image;
			}
			else{
				$(this).find("online_directory").each(function(){
					directory = $(this).text();
				});
				pic_source = "http://development.tm-publisher.com/sites/default/files/" + image;
			}
			var title_content = '<div class="book_block"><div class="book_image"><a id="' + directory + '" href="book.html?directory=' + directory + '" class="read_the_damn_book"><img src="' + pic_source +'" alt="' + title + ' image" /></a></div>';
			$(this).find("author").each(function(){
				author = $(this).text();
			});
			
			title_content += '<div class="book_info"><h3>' + title + '</h3>';
			title_content += 'By ' + author + '</div></div>';
			$("#book_titles").append(title_content);
		});
	});
	};
	
	if ($("#book_titles").length > 0){
		$.get_source();
	}
	
	$(".source_select").click(function(){
		var id = $(this).attr("id");
		var source_check = GetCookie("book_source");
		$(this).css("background-color","gray");
		$("#"+source_check).css("background-color","#BEBBBB");
		SetCookie("book_source", id);
		$.get_source();
	});
	
	$(".read_the_damn_book").click(function(event){
		alert("working!");
		event.preventDefault();
		window.location.replace("book.html");
	});
	
});