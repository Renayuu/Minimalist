jQuery(document).ready(function($){

	console.log("hello from closet.js");
	var item_data = [];
    
    $.ajax({
        type: "GET",
        url: "../lib/get_closet_items.php",
        success: function(data) {
            console.log(data);
            item_data = JSON.parse(data);
            //console.log("number in item_data "+item_data.length);
            $("#no_items").text(item_data.length);
            fantastic(item_data);
        }, 
        error: function (err){
            console.log("error:"+err)
        }
    });
    
	$("#button_filter").click(function(){
		console.log("hello alyssa");
//		$.ajax({
//			type: "GET",
//			url: "../lib/get_closet_items.php",
//			success: function(data) {
//				console.log(data);
//				item_data = JSON.parse(data);
//				//console.log("number in item_data "+item_data.length);
//				fantastic(item_data);
//			}, 
//			error: function (err){
//				console.log("error:"+err)
//			}
//		})
        //add filter then call fantastic
	});





});

	function fantastic(item_data)
	{
		for (i=0; i<item_data.length; i++) 
		{	
			console.log(item_data[i].Type); // just to test that it is working

			//insert code here to calculate the days since last worn
            
            var date1 = new Date();
            var date2 = item_data[i].Date_Last_Worn;
            date2 = new Date(date2);
            
            var daysago = Math.round((date1 - date2) / (1000 * 3600 * 24));
            
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
			
			page_element += "<p>" + "<img src=" + item_data[i].Image_Path + ">" + "</p>";

			page_element += "<p> <span class='item_label'>Type: </span>" + item_data[i].Type + "</p>";

			page_element += "<p> <span class='item_label'>Price: </span>$" + item_data[i].Price + "</p>";

			page_element += "<p> <span class='item_label'>Cost Per Wear: </span>$" + (item_data[i].Price / item_data[i].Times_Worn).toFixed(2) + "</p>";

			page_element += "<p> <span class='item_label'>Colour: </span>" + item_data[i].Colour + "</p>";

			page_element += "<p><span class='item_label'>Times Worn: </span>" + item_data[i].Times_Worn + "</p>";

			page_element += "<p> <span class='item_label'>Last Worn: </span>";

			if (daysago == 1){
				page_element += daysago + "day ago";
			}
			else if (daysago == 0){
				page_element += "Today";
			}
			else {
				page_element += daysago + " days ago";
			}


			

			// continue from here
			
			// insert into webpage into the div with id closet
			var html = $.parseHTML(page_element);
			$('#closet').append(html);
			
		
	};
        
    };