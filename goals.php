<?php include ("views/navbar.php"); ?>
<script type="text/javascript" src = "js/goals.js"></script>


<title>Minimize: Goals</title>

<div class="container-fluid">

<div id="info-box" class="col-sm-12 col-md-12">

	<h1 align = "center">GOALS</h1>

	<h3 align="center">
            You own 
            <b><?php echo count($items); ?></b>
            <b><span id="my_clothes" data-val="<?php echo count($items); ?>"></span></b>
            items.
	</h3>

	<br> 

	<h3 align="center">
            You want to own  
            <b><span id="my_goal">#</span></b>
            or less items.
	</h3>

	<br> 

	<h3 align="center">
            You have 
            <b><span id="clothes_left">#</span></b>
            items left to reach your goal.
	</h3>

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
	      <form name="edityourgoal" enctype="multipart/form-data" id="editGoalForm">
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


