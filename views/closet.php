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
	            
	            echo $item["itemName"]; 
	            echo $item["itemAdd"];
		        }
	            
        ?>

		</div>

	</div>

</body>
</html>