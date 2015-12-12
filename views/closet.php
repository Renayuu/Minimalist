<!DOCTYPE html>
<html>
<head>
	<title>Your Closet</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

<h1>Your Closet</h1>

	<div>
		<!-- <form>
			Item name:
			<input type="text" name = "item_name">
			
		</form> -->
	</div>

	<div>
		<div class="item">
			<!-- <h3>Item Name</h3>
			<p>Type: </p>
			<p>Worn .. times</p>
			<p>Cost per wear: $</p>
			<p>Price: $</p>
			<p>Colour: </p>
			<p></p> -->

		<?php
	        foreach ($items as $item) {

	        	echo "<div class='item_box'> ";

	        		echo "<h3 class='item_name'> ";
	        			echo $item["itemName"];
	        		echo "</h3>";

	        		echo "<p> Date added: ";
	        			echo $item["itemAdd"];
	        		echo "</p>";

	        	echo "</div>";
	         }
	            
        ?>

		</div>

	</div>

</body>
</html>