<!DOCTYPE html>
<html>
<head>
	<title>Minimize: Your Closet</title>

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

<div class="container-fluid">

	<header>
		<img src="../images/minimize-logo.png" alt="minimize logo" id="logo" />
	</header>

	<h1>Your Closet</h1>


	<div class="form-container">      
		<h2>Add new item</h2>
        <form action="insert.php" method="post" name="addnewitem">
        <div class="col-xs-12 col-sm-6 col-md-4">
        	<p>
	        <label for="itemName">Item Name:</label>
	        <input type="text" name="itemname" id="itemName">
	        </p>

	        <p>
	        <label for="itemType">Item Type:</label>
	        <!-- <input type="text" name="itemtype"> -->
		        <select name="itemtype" id="itemType" >
				  <option name="tops" value="tops">Tops</option>
				  <option name="bottoms" value="bottoms">Bottoms</option>
				  <option name="outerwear" value="outerwear">Outerwear</option>
				  <option name="dresses" value="dresses">Dresses</option>
				  <option name="shoes" value="shoes">Shoes</option>
				  <option name="accessories" value="accessories">Accessories</option>
				</select>
	        </p>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-4">
	        <p>
		        <label for="itemPrice">Item Price:</label>
		        <input type="text" name="itemprice" id="itemPrice">
	        </p>

	        <p>
		        <label for="itemColour">Item Colour:</label>
		        <input type="text" name="itemcolour" id="itemColour">
	        </p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
	        <p>
		        <label for="wearCount">Number of times worn:</label>
		        <input type="text" name="wearcount" id="wearCount">
	        </p>

	        <p>
	        	<label for="datepicker">Date bought:</label>
		        <input type="text" name ="itemadd" id="datepicker">
	        </p>
	    </div>

	    <div class="clearfix"></div>
        	<input type="submit" value="Add New Item">

        </form>
	</div>

	<div>
	<?php 
		echo "<h2>Total number of items: ";
		echo count($items);
		echo "</h2>";
	?>

		<div class="items-container">
		<?php

	        foreach ($items as $item) {
	        	if ($item["itemType"] == "tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 tops'> ";
	        		}
	        	if ($item["itemType"] == "bottoms") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 bottoms'> ";
	        		}
	        	if ($item["itemType"] == "outerwear") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 outerwear'> ";
	        		}
	        	if ($item["itemType"] == "dresses") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 dresses'> ";
	        		}
	        	if ($item["itemType"] == "shoes") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 shoes'> ";
	        		}
	        	if ($item["itemType"] == "accessories") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 accessories'> ";
	        		}

	        		echo "<h3 class='item-name'> ";
	        			echo $item["itemName"];
	        		echo "</h3>";

	        		echo "<p>Item Type: ";
	        			echo $item["itemType"];
	        		echo "</p>";
                
                    echo "<p>Item Price: ";
                    	echo "$ ".number_format($item["itemPrice"], 2);
	        		echo "</p>";

	        		echo "<p>Date added: ";
	        			echo $item["itemAdd"];
	        		echo "</p>";
                
                    echo "<p>Item Colour: ";
	        			echo $item["itemColour"];
	        		echo "</p>";
                
                    echo "<p>Times worn: ";
	        			echo $item["wearCount"];
	        		echo "</p>";

	        		echo "<p>Cost per wear: ";
	        			if ($item["itemPrice"]) {
	        				echo "$ ".number_format($item["itemPrice"] / $item["wearCount"], 2);
	        			}
	        			else {
	        				echo "Cost unknown";
	        			}
	        		echo "</p>";

	        	echo "</div>";
	         }


	            
        ?>


		</div> <!-- end items container -->

	</div> <!-- end all items div -->

</div> <!-- End Container div -->
</body>


<script type="text/javascript">
	  $(function() {
	    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
	  });
	 </script>
</html>