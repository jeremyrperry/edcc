// JavaScript Document
$(document).ready(function (){
	
var xmlDocument = "";

$("#get_calendar").click(function (){
	if($('#rdo_jquery').attr('checked')){
	$.ajax({
    	type: "GET",
    	url: "../Project4/JRPproject4.xml",
    	dataType: "xml",
    	success: $.parseXML
  	});	
	}
	else{
		fetch_calendar();
	}
});


function fetch_calendar(){
	var request = "";
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else if (window.ActiveXObject) {
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(request.overrideMimeType){
		request.overrideMimeType("text/xml");
	}
	if(request){
		request.open("GET", "../Project4/JRPproject4.xml", true);
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var the_xml = request.responseXML;
				$("#calendar_wrapper").show();
				$("#calendar_wrapper").append("<p>The raw XML:</p>" + request.the_xml.xml);
				$.parseXML(the_xml);
			}
			else if (request.status == 404){
				alert ("Request couldn't be completed.  Ready state: " + request.readyState + ".  Status: " + request.status + ".");
			}
		}
	request.send(null);
	}
}


$.parseXML = function(xml){
	$("#calendar_wrapper").show();
	$(xml).find("title").each(function(){
		$("#calendar_header").append("<div>" + $(this).text() + "</div>");
	});
	var calendar_header_extra = "<div>";
	$(xml).find("quarter").each(function(){
		calendar_header_extra += $(this).attr("id") + ": ";
		$("#calendar_body").append("<h3 class='heading'>" + $(this).text() + "</h3>");
	});
	var month_count = $(xml).find("month").length;
	var current_month = 1;
	$(xml).find("month").each(function(){
		var month_name = $(this).attr("id");
		var month_name_short = month_name.substring(0, 3);
		var day_count = $(xml).find("month").length;
		var final_day = day_count--;
		var current_day = 1;
		$(this).find("day").each(function(){
			var date = $(this).attr("id");
			if(current_month == 1 && current_day == 1){
				calendar_header_extra += month_name_short + " " + date + "-";
			}
			if(current_month == month_count && current_day == final_day){
				calendar_header_extra += month_name_short + " " + date + "</div>";
			}
			$(this).find("event").each(function(){
				var the_event = $(this).text();
				var write_event = "<div class='event'><strong>" + month_name_short + " " + date + ":</strong> " + the_event + ".</div>";
				$("#calendar_body").append(write_event);
			});
			current_day++;
		});
		current_month++;
	});
	$("#calendar_header").append(calendar_header_extra);
	$("#request_calendar").hide();
};


	
});