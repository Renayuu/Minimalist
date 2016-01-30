$('document').ready(function()
{
	var itemStory;

	$.ajax({
		url: "../get_story.php",
		method: "GET",
		success: function(data){
			//console.log(data);
			itemStory = data;
			$('#story').val(itemStory);
			//console.log(itemStory);
		},
		error: function(err){
			console.log(err);
		}
	});

});