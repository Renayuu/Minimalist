<?php include ("views/navbar.php"); ?>



<title>Minimize: Goals</title>

<div class="container-fluid">

<div id="info-box" class="col-sm-12 col-md-12">

	<h1 align = "center">GOALS</h1>

	<h3 align="center">
            You own 
            <?php echo count($items); ?> 
            items.
	</h3>

	<br> 
	<br> 

	<h3 align="center">
            You want to own  
            # <!--SELECT Goal_Num FROM Goal WHERE Goal_ID = '1'-->
            or less items.
	</h3>

	<br> 
	<br> 

	<h3 align="center">
            You have 
            # <!--first value - second value-->
            items left to reach your goal.
	</h3>

	<br> 
	<br> 

	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editGoalModal" align="center">
		  edit your goal
	</button>

</div>

</div>

<!-- EDIT GOAL Modal -->

	<!-- Modal -->
	<div class="modal fade" id="editGoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">EDIT YOUR GOAL</h4>
	      </div>
	      <form action="insert_goal.php" method="post" name="edityourgoal" id="editGoalForm">
	      <div class="modal-body">
	        
		        <p>
			        <label for="goal">I want to own  </label> <input type="text" size="3" name="Goal_Num" id="Goal_Num"> <label for="goal">  or less items.</label>
		        </p>

		        <input type="submit" id="editGoalSubmit" class="btn btn-primary" value="Submit" data-dismiss="modal">
	            <!--go to an ajax function that updates the last two numbers-->
	        
	      </div>
	      </form>

	    </div> <!-- end modalContent -->
	  </div> <!-- end modalDialog -->
	</div> <!-- end my modal -->

</body>