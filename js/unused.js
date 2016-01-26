jQuery(document).ready(function($){
	var item_data = [];
    
    $.ajax({
        type: "GET",
        url: "../lib/get_closet_items.php",
        success: function(data) {
            item_data = JSON.parse(data);
            get_used(item_data);
        }, 
        error: function (err){
            console.log("error:"+err)
        }
    });	
    
});

function get_used(item_data) {



	for (i=0; i<item_data.length; i++) 
	{
		var page_element = "";	

		var date1 = new Date();
    var date2 = item_data[i].Date_Last_Worn;
    date2 = new Date(date2);
    var daysago = Math.round((date1 - date2) / (1000 * 3600 * 24));

		if (daysago >= 100) {
			page_element += "<div class='item'> <img src="+ item_data[i].Image_Path + "> </div>";

			var html = $.parseHTML(page_element);
			$('#unused-images').append(html);
		}		
	};

	$('.item').first().addClass("active");
};