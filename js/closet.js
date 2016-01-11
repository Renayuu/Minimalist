$(document).ready(function(){

	console.log("hello from closet.js");

	$("#button_filter").click(function(){
		console.log("hello alyssa");
		$.ajax({
			type: "GET",
			url: "../lib/get_closet_items.php",
			success: function(data) {
				console.log(data);
			}, 
			error: function (err){
				console.log("error:"+err)
			}
		})
	});



});