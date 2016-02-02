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

		if (clothesLeft>=0) {
			var doughnutOptions = {
			//Number - The width of each segment stroke
			segmentStrokeWidth : 1,
			//The percentage of the chart that we cut out of the middle.
			percentageInnerCutout : 70,
			}

			// Doughnut Chart Data
			var doughnutData = [
				{
					value: numClothes-clothesLeft,
					color:"#64688F"
				},
				{
					value : clothesLeft,
					color : "#aaa"
				}
			]

			var rice = document.getElementById('rice').getContext('2d');
			var donutChart = new Chart(rice).Doughnut(doughnutData, doughnutOptions);
			$('#success').hide();
			$('#goalItems').show();
		}
		else {
			var doughnutOptions = {
			//Number - The width of each segment stroke
			segmentStrokeWidth : 1,
			//The percentage of the chart that we cut out of the middle.
			percentageInnerCutout : 70,
			}

			// Doughnut Chart Data
			var doughnutData = [
				{
					value: 100,
					color:"#64688F"
				}
				
			]

			var rice = document.getElementById('rice').getContext('2d');
			var donutChart = new Chart(rice).Doughnut(doughnutData, doughnutOptions);
			$('#success').show();
			$('#goalItems').hide();
		}
		
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


				if (clothesLeft>=0) {
					var doughnutOptions = {
					//Number - The width of each segment stroke
					segmentStrokeWidth : 1,
					//The percentage of the chart that we cut out of the middle.
					percentageInnerCutout : 70,
					}

					// Doughnut Chart Data
					var doughnutData = [
						{
							value: numClothes-clothesLeft,
							color:"#64688F"
						},
						{
							value : clothesLeft,
							color : "#aaa"
						}
					]

					var rice = document.getElementById('rice').getContext('2d');
					rice.canvas.width = $('#rice').width(); // resize to parent width
				  	rice.canvas.height = $('#rice').height(); // resize to parent height
					var donutChart = new Chart(rice).Doughnut(doughnutData, doughnutOptions);
					$('#success').hide();
					$('#goalItems').show();
				}
				else {
					var doughnutOptions = {
					//Number - The width of each segment stroke
					segmentStrokeWidth : 1,
					//The percentage of the chart that we cut out of the middle.
					percentageInnerCutout : 70,
					}

					// Doughnut Chart Data
					var doughnutData = [
						{
							value: 100,
							color:"#64688F"
						}
						
					]

					var rice = document.getElementById('rice').getContext('2d');
					rice.canvas.width = $('#rice').width(); // resize to parent width
				  	rice.canvas.height = $('#rice').height(); // resize to parent height
					var donutChart = new Chart(rice).Doughnut(doughnutData, doughnutOptions);

					$('#success').show();
					$('#goalItems').hide();
				}

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