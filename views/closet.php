<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<title>Minimize: My Closet</title>

	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<!-- BOOTSTRAP LINKS -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Custom Styles -->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>


<body>

<?php include ("views/navbar.php"); ?>

<div class="container-fluid" align = "center"><font face="proxima nova soft">

	<h1 style="font-size:80px" align = "center"><font face="proxima nova soft">M   I   N   I   M   I   Z   E</font></h1>

	<h3 align = "center"><font face="proxima nova soft">Name's Closet</font></h3>
	<div>
		<h4 align = "center"><font face="proxima nova soft">
			<?php echo count($items); ?>
			ITEMS
		</font></h4>

	<!-- ADD New Item Modal -->

	<!-- Button trigger for modal -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newItemModal">
		  add a new item
		</button>

	<!-- Modal -->
		<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">

		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">ADD A NEW ITEM</h4>
		      </div>
		      <form action="insert.php" method="post" name="addnewitem" enctype="multipart/form-data" id="newItemForm">
		      <div class="modal-body">
		        
			        <p>
			        <label for="Type">Item Type:</label>
				        <select name="Type" id="Type" >
						  <option name="Tank Tops" value="Tank Tops">Tank Tops</option>
		                  <option name="Short Sleeve Tops" value="Short Sleeve Tops">Short Sleeve Tops</option>
						  <option name="Long Sleeve Tops" value="Long Sleeve Tops">Long Sleeve Tops</option>
		                  <option name="Dresses" value="Dresses">Dresses</option>
		                  <option name="Skirts" value="Skirts">Skirts</option>
						  <option name="Shorts" value="Shorts">Shorts</option>
						  <option name="Pants" value="Pants">Pants</option> 
						</select>
			        </p>
		            <p>
				        <label for="Material">Item Material:</label>
				        <input type="text" name="Material" id="Material">
			        </p>
			        <p>
				        <label for="Price">Item Price:</label>
				        <input type="text" name="Price" id="Price">
			        </p>
		            <p>
				        <label for="Description">Item Description:</label>
		                <textarea name="Description" id="Description"></textarea>
			        </p>
		            <p>
		                <label for="Colour">Item Colour:</label>
		                <!-- <input type="text" name="Colour" id="Colour">-->
		                <select name="Colour" id="Colour" >
		                    <option name="Multi" value="Multi">Multi</option>
		                    <option name="Black" value="Black">Black</option>
		                    <option name="Gray" value="Gray">Gray</option>
		                    <option name="White" value="White">White</option>
		                    <option name="Red" value="Red">Red</option>
		                    <option name="Orange" value="Orange">Orange</option>
		                    <option name="Yellow" value="Yellow">Yellow</option> 
		                    <option name="Green" value="Green">Green</option>
		                    <option name="Blue" value="Blue">Blue</option>
		                    <option name="Purple" value="Purple">Purple</option>
		                    <option name="Pink" value="Pink">Pink</option>
		                    <option name="Brown" value="Brown">Brown</option>
						</select>
		            </p>
		            <p>
		                <label for="uploadimage">Upload Image:</label>
		                <input name="uploadimage" type="file">
		            </p>
			         
			        <input type="submit" id="newItemSubmit" class="btn btn-primary" value="Add New Item" data-dismiss="modal">
		        
		      </div>
		      </form>

		    </div> <!-- end modalContent -->
		  </div> <!-- end modalDialog -->
		</div> <!-- end my modal -->


<div id="filter">
		<h4 align = "center"><font face="proxima nova soft">FILTER BY</font></h4>
		<div align = "center"><font face="proxima nova soft">
			<form action="">
				<input type="radio" name="measurement" value="times_worn"> Times Worn
				<input type="radio" name="measurement" value="last_worn"> Days Ago Last Worn
				<input type="radio" name="measurement" value="price"> Price
				<input type="radio" name="measurement" value="cost_per_wear"> Cost Per Wear
			</form>
		</font></div>
	</div>

	<div id="filter">
		<h4 align = "center"><font face="proxima nova soft">ONLY SHOW</font></h4>
		<div align = "center"><font face="proxima nova soft">
			<input type="checkbox" name="type" value="tank_tops"> Tank Tops
			<input type="checkbox" name="type" value="ss_tops"> Short Sleeve Tops
			<input type="checkbox" name="type" value="ls_tops"> Long Sleeve Tops
			<input type="checkbox" name="type" value="dresses"> Dresses
			<input type="checkbox" name="type" value="skirts"> Skirts
			<input type="checkbox" name="type" value="shorts"> Shorts
			<input type="checkbox" name="type" value="pants"> Pants
		</font></div>
	</div>

	<div id="filter">
		<div align = "center"><font face="proxima nova soft">
			<input type="checkbox" name="color" value="multi"> Multi
			<input type="checkbox" name="color" value="black"> Black
			<input type="checkbox" name="color" value="gray"> Gray
			<input type="checkbox" name="color" value="white"> White
			<input type="checkbox" name="color" value="red"> Red
			<input type="checkbox" name="color" value="orange"> Orange
			<input type="checkbox" name="color" value="yellow"> Yellow
			<input type="checkbox" name="color" value="green"> Green
			<input type="checkbox" name="color" value="blue"> Blue
			<input type="checkbox" name="color" value="purple"> Purple
			<input type="checkbox" name="color" value="pink"> Pink
			<input type="checkbox" name="color" value="brown"> Brown
		</font></div>
	</div>

	<div id="filter">
		<h4 align = "center"><font face="proxima nova soft">ORDER BY</font></h4>
		<div align = "center"><font face="proxima nova soft">
			<form action="">
				<input type="radio" name="order" value="ascending"> Ascending
				<input type="radio" name="order" value="descending"> Descending
			</form>
		</font></div>
	</div>

	<!-- get days ago in the right format -->

		<div class="items-container" id="closet">
		<?php
		foreach ($items as $item){
			$date1 = new DateTime();
			$date2 = new DateTime(date('Y-m-d', strtotime($item["Date_Last_Worn"])));
			$daysago = $date1->diff($date2)->days;
			   
	        	if ($item["Type"] == "Tank Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 tank_tops'> ";
	        		}
	        	if ($item["Type"] == "Short Sleeve Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 short_sleeves_top'> ";
	        		}
	        	if ($item["Type"] == "Long Sleeve Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 long_sleeves_top'> ";
	        		}
	        	if ($item["Type"] == "Dresses") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 dresses'> ";
	        		}
	        	if ($item["Type"] == "Skirts") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 skirts'> ";
	        		}
	        	if ($item["Type"] == "Shorts") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 shorts'> ";
                    }
                if ($item["Type"] == "Pants") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 pants'> ";
	        		}
                
                    echo "<p>";
	        			echo "<img src="; echo $item["Image_Path"]; echo ">";
	        		echo "</p>";


	        		echo "<p> <span class='item_label'>Type: </span>";
	        			echo $item["Type"];
	        		echo "</p>";
                
                    echo "<p> <span class='item_label'>Price: </span>";
                    	echo "$ ".number_format($item["Price"], 2);
	        		echo "</p>";
                
                    echo "<p> <span class='item_label'>Cost Per Wear: </span>";
                    	echo "$ ".number_format($item["Price"] / $item["Times_Worn"], 2);
	        		echo "</p>";
                
                
                    echo "<p> <span class='item_label'>Colour: </span>";
	        			echo $item["Colour"];
	        		echo "</p>";
                
                    echo "<p><span class='item_label'>Times Worn: </span>";
	                   echo $item["Times_Worn"];
	        		echo "</p>";
                
                    echo "<p> <span class='item_label'>Last Worn: </span>";

                    	if ($daysago == 1) {
                    		echo $daysago." day ago";
                    	}
                    	else if ($daysago == 0){
                    		echo "Today";
                    	}
                    	else {
                    		echo $daysago." days ago";
                    	}
	                   
	        		echo "</p>";
                
                echo "</div>";

	       }
	            
        ?>

		</div> <!-- end items container -->

	</div> <!-- end all items div -->

</font></div> <!-- End Container div -->
</body>


<script type="text/javascript">
	  // $(function() {
	  //   $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
	  // });

	$("#newItemModal").on('hide', function () {
        window.location.reload();
	});

	// submits modal form - fixes form submission problem, tutorial from:
	//http://stackoverflow.com/questions/9349142/twitter-bootstrap-2-modal-form-dialogs/9349329#9349329

	$('#newItemSubmit').on('click', function(e){
	    // We don't want this to act as a link so cancel the link action
	    e.preventDefault();

	    // Find form and submit it
	    $('#newItemForm').submit();
	});

</script>


</html>