<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Records Form</title>
</head>
<body>
<form action="insert_test.php" method="post">
    <p>
        <label for="itemName">Item Name:</label>
        <input type="text" name="itemname" id="itemName">
    </p>
    <p>
        <label for="itemType">Item Type:</label>
        <input type="text" name="itemtype" id="itemType">
    </p>
    <p>
        <label for="itemColour">Colour:</label>
        <input type="text" name="colour" id="itemColour">
    </p>
    <input type="submit" value="Add Records">
    
            
</form>
</body>
</html>