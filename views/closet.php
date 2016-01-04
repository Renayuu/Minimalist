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
        <form action="insert.php" method="post" name="addnewitem" enctype="multipart/form-data">
        
        <div class="col-xs-12 col-sm-6 col-md-4">

	        <p>
	        <label for="Type">Item Type:</label>
	        <!-- <input type="text" name="itemtype"> -->
		        <select name="Type" id="Type" >
				  <option name="tops" value="Top">Tops</option>
				  <option name="bottoms" value="Bottoms">Bottoms</option>
				  <option name="outerwear" value="Outer Wear">Outer Wear</option> 
				  <option name="dresses" value="Dresses">Dresses</option>
				  <option name="short sleeves top" value="Short Sleeves Top">Short Sleeves Top</option>
				  <option name="long sleeves top" value="Long Sleeves Top">Long Sleeves Top</option>
				</select>
	        </p>
            
            <p>
		        <label for="Material">Item Material:</label>
		        <input type="text" name="Material" id="Material">
	        </p>
            
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-4">
	        <p>
		        <label for="Price">Item Price:</label>
		        <input type="text" name="Price" id="Price">
	        </p>
            
            <p>
		        <label for="Description">Item Description:</label>
                <textarea name="Description" id="Description"></textarea>
	        </p>

        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-4">

            <p>
                <label for="Colour">Item Colour:</label>
                <input type="text" name="Colour" id="Colour">
            </p>
            
            <p>
                <label for="uploadimage">Upload Image:</label>
                <input name="uploadimage" type="file">
            
            </p>
            
        </div>
            
        </div>

	    <div class="clearfix"></div>
        	<input type="submit" value="Add New Item">

        </form>

	<div>
	<?php 
		echo "<h2>Total number of items: ";
		echo count($items);
		echo "</h2>";
	?>

		<div class="items-container">
		<?php

	        foreach ($items as $item) {
	        	if ($item["Type"] == "Top") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 tops'> ";
	        		}
	        	if ($item["Type"] == "Bottoms") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 bottoms'> ";
	        		}
	        	if ($item["Type"] == "Outer Wear") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 outerwear'> ";
	        		}
	        	if ($item["Type"] == "Dresses") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 dresses'> ";
	        		}
	        	if ($item["Type"] == "Short Sleeves Top") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 short_sleeves_top'> ";
	        		}
	        	if ($item["Type"] == "Long Sleeves Top") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 long_sleeves_top'> ";
	        		}
                
                    echo "<p>";
	        			echo "<img src="; echo $item["Image_Path"]; echo ">";
	        		echo "</p>";


	        		echo "<p>Item Type: ";
	        			echo $item["Type"];
	        		echo "</p>";
                
                    echo "<p>Item Price: ";
                    	echo "$ ".number_format($item["Price"], 2);
	        		echo "</p>";

	        		echo "<p>Date added: ";
	        			echo $item["Submission_Date"];
	        		echo "</p>";
                
                    echo "<p>Item Colour: ";
	        			echo $item["Colour"];
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