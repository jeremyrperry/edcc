// JavaScript Document
$(document).ready(function(){
	/*$.ajax({
    	type: "GET",
    	url: "/book_files/books.xml",
    	dataType: "xml",
    	success: $.parseXML
  	});	
	*/
	//$.parseXML = function(xml){
	$.get('book_files/books.xml', function(xml){
	$(xml).find("book").each(function(){
		var image = "";
		var directory = "";
		var author = "";
		var title = "";
		$(this).find("image").each(function(){
			image = $(this).text();
		});
		$(this).find("title").each(function(){
			title = $(this).text();
			
		});
		$(this).find("directory").each(function(){
			directory = $(this).text();
		});
		$(this).find("author").each(function(){
			author = $(this).text();
		});
		var title_content = '<div class="book_block"><div class="book_image"><a href="book.html?directory=' + directory + '"><img src="book_files/' + directory + '/images/' + image + '" alt="' + title + ' image" /></a></div>';
		title_content += '<div class="book_info"><h3>' + title + '</h3>';
		title_content += 'By ' + author + '</div></div>';
		$("#book_titles").append(title_content);
	});
	
});

});