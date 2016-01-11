jQuery(document).ready(function($){

	console.log("hello from closet.js");
	var item_data = [];

	$("#button_filter").click(function(){
		console.log("hello alyssa");
		$.ajax({
			type: "GET",
			url: "../lib/get_closet_items.php",
			success: function(data) {
				console.log(data);
				item_data = JSON.parse(data);
				//console.log("number in item_data "+item_data.length);
				fantastic(item_data);
			}, 
			error: function (err){
				console.log("error:"+err)
			}
		})
	});





});

	function fantastic(item_data)
	{
		for (i=0; i<item_data.length; i++) 
		{	
			console.log(item_data[i].Type); // just to test that it is working

			//insert code here to calculate the days since last worn
			
			
			// construct the web page elements
			var page_element = "";
			page_element += "<div class='item-box col-xs-6 col-sm-4 col-md-3 ";
			if (item_data[i].Type == "Tank Tops") {
				page_element += "tank_tops";
			}
			else if (item_data[i].Type == "Short Sleeve Tops"){
				page_element += "short_sleeves_top";
			}
			else if (item_data[i].Type == "Long Sleeve Tops"){
				page_element += "long_sleeves_top";
			}
			else if (item_data[i].Type == "Dresses"){
				page_element += "dresses";
			}
			else if (item_data[i].Type == "Skirts"){
				page_element += "skirts";
			}
			else if (item_data[i].Type == "Shorts"){
				page_element += "shorts";
			}
			else if (item_data[i].Type == "Pants"){
				page_element += "pants";
			}
			page_element += "'>";
			
			page_element = item_data[i].Image_Path

			

			// continue from here
			
			// insert into webpage into the div with id closet
			var html = $.parseHTML(page_element);
			$('#closet').append(html);
			
		}
	};