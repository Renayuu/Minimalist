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
			console.log(item_data[i].Type);
		}
	};



	