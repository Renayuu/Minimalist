<!DOCTYPE html>
<html>
<head>
	<title>Your Closet</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

<h1>Your Closet</h1>

	<div>      
        <form action="insert.php" method="post">
        <p>
        <label for="itemName">Item Name:</label>
        <input type="text" name="itemname" id="itemName">
        </p>
        <p>
        <label for="itemType">Item Type:</label>
        <input type="text" name="itemtype" id="itemType">
        </p>
        <p>
        <label for="itemPrice">Item Price:</label>
        <input type="text" name="itemprice" id="itemPrice">
        </p>
        <p>
        <label for="itemColour">Item Colour:</label>
        <input type="text" name="itemcolour" id="itemColour">
        </p>
        <label for="wearCount">Wear Count:</label>
        <input type="text" name="wearcount" id="wearCount">
        </p>
        <input type="submit" value="Add Records">
        </form>
	</div>

	<div>
		<div class="item">


		<?php
	        foreach ($items as $item) {

	        	echo "<div class='item_box'> ";

	        		echo "<h3 class='item_name'> ";
	        			echo $item["itemName"];
	        		echo "</h3>";

	        		echo "<p> Date added: ";
	        			echo $item["itemAdd"];
	        		echo "</p>";
                    
                    echo "<p> Item Type: ";
	        			echo $item["itemType"];
	        		echo "</p>";
                
                    echo "<p> Item Price: ";
	        			echo $item["itemPrice"];
	        		echo "</p>";
                
                    echo "<p> Item Colour: ";
	        			echo $item["itemColour"];
	        		echo "</p>";
                
                    echo "<p> Wear Count: ";
	        			echo $item["wearCount"];
	        		echo "</p>";

	        	echo "</div>";
	         }
	            
        ?>

		</div>

	</div>

</body>
</html>