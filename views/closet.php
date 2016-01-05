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
	        	if ($item["Type"] == "Tank Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 tops'> ";
	        		}
	        	if ($item["Type"] == "Short Sleeve Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 bottoms'> ";
	        		}
	        	if ($item["Type"] == "Long Sleeve Tops") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 outerwear'> ";
	        		}
	        	if ($item["Type"] == "Dresses") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 dresses'> ";
	        		}
	        	if ($item["Type"] == "Skirts") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 short_sleeves_top'> ";
	        		}
	        	if ($item["Type"] == "Shorts") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 long_sleeves_top'> ";
                    }
                if ($item["Type"] == "Pants") {
	        		echo "<div class='item-box col-xs-6 col-sm-4 col-md-3 dresses'> ";
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
                
                    echo "<p>Cost Per Wear: ";
                    	echo "$ ".number_format($item["Price"] / $item["Times_Worn"], 2);
	        		echo "</p>";
                
                
                    echo "<p>Item Colour: ";
	        			echo $item["Colour"];
	        		echo "</p>";
                
                    echo "<p>Number of Times Worn: ";
	                   echo $item["Times_Worn"];
	        		echo "</p>";
                
                    echo "<p>Number of Days Ago Last Worn: ";
	                   echo $item["Days_Last_Worn"];
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