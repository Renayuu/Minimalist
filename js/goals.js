$('document').ready(function()
{
	var goalNum;
	var numClothes = $('#my_clothes').attr("data-val");
	console.log(numClothes);
	var currentGoal;
	var clothesLeft;

	$.ajax({
		url: "../get_goal.php",
		method: "GET",
		success: function(data){
			console.log(data);
			currentGoal = data;
			$('#my_goal').text(currentGoal);
			clothesLeft = numClothes - currentGoal;
			$('#clothes_left').text(clothesLeft);
		},
		error: function(err){
			console.log(err);
		}
	});

	$('#editGoalSubmit').click(function (){
		//console.log($("#Goal_Num").val());
		goalNum = $("#Goal_Num").val();
		console.log(goalNum);

		$.ajax({
			data: {"Goal_Num": $("#Goal_Num").val()},
			url: "../insert_goal.php",
			method: "POST",
			success: function(msg){
				console.log(msg);
				$('#my_goal').text(goalNum);
				console.log(numClothes - goalNum);
				clothesLeft = numClothes - goalNum;
				$('#clothes_left').text(clothesLeft);
			},
			error: function(err){
				console.log(err);
			}
		});
	});
});




// $("#editGoalModal").on('hide', function () {
//         window.location.reload();
// 	});

// 	// submits modal form - fixes form submission problem, tutorial from:
// 	//http://stackoverflow.com/questions/9349142/twitter-bootstrap-2-modal-form-dialogs/9349329#9349329
// 	$('#editGoalSubmit').on('click', function(e){
// 	    // We don't want this to act as a link so cancel the link action
// 	    e.preventDefault();

// 	    // Find form and submit it
// 	    $('#editGoalForm').submit();
// 	});