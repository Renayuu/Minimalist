<?php include ("views/navbar.php"); ?>
<script type="text/javascript" src = "js/stories.js"></script>


<head>
	<title>Minimize: Discarded Items</title>

	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<!-- BOOTSTRAP LINKS -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Isotope plugin: http://isotope.metafizzy.co/ -->
	<script src="js/isotope.pkgd.min.js"></script>

	<!-- Developer Javascript -->
	<script src="js/discarded_pete.js"></script>


	<!-- Custom Styles -->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<div class="container-fluid">

	<h1 align = "center">DISCARDED ITEMS</h1>
	<div class='row'>
		<div id="discarded"></div>
	</div>
</div>

<!-- Modal for Story -->
	<div class="modal fade" id="editStoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">ADD A STORY</h4>
	      </div>
	      <form name="editstory" enctype="multipart/form-data" id="editStoryForm">
	      <div class="modal-body">
	        
		        <p>
		        	<!-- <label for="instructions">Note that adding a new story will override the story currently displayed.</label> -->
			        <textarea rows="5" cols="50" name="story" id="story"></textarea>
		        </p>

		        <!-- <input type="submit" id="editStorySubmit" class="btn btn-default" value="Submit" data-dismiss="modal"> -->
	            <!--go to an ajax function that updates the last two numbers-->
	        
	      </div>
	      
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-default" id="modalCloseStory">Add Story</button>
	      </div>
			</form>

	    </div> <!-- end modalContent -->
	  </div> <!-- end modalDialog -->
	</div> <!-- end my modal -->


<!-- Modal for Images -->
	<div class="modal fade" id="uploadPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">ADD A PHOTO</h4>
	      </div>
	      <div class="modal-body">
	      <form action="insert_memory_photo.php" method="post" name="addaphoto" enctype="multipart/form-data" id="uploadPhotoForm">
	        
		        <p>
			        <label for="instructions">Note that you can only upload one photo per item (apart from the item photo). Uploading an additional photo will override the first photo you have uploaded.</label> 
			        <label for="uploadphoto">Upload Photo:</label>
	                <input name="uploadphoto" type="file">
		        </p>

		        <!-- <input type="submit" id="uploadPhotoSubmit" class="btn btn-default" value="Submit" data-dismiss="modal"> -->
	            <!--go to an ajax function that updates the last two numbers-->
	       
	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-default" id="modalClosePhoto">Add Photo</button>
	      </div>
	      </form> 

	    </div> <!-- end modalContent -->
	  </div> <!-- end modalDialog -->
	</div> <!-- end my modal -->


	  
	
