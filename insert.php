<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Rena");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$item_add = mysqli_real_escape_string($conn, $_POST['itemadd']);
$item_name = mysqli_real_escape_string($conn, $_POST['itemname']);
$item_type = mysqli_real_escape_string($conn, $_POST['itemtype']);
$item_price = mysqli_real_escape_string($conn, $_POST['itemprice']);
$item_colour = mysqli_real_escape_string($conn, $_POST['itemcolour']);
$wear_count = mysqli_real_escape_string($conn, $_POST['wearcount']);
 
// attempt insert query execution
$sql = "INSERT INTO `Rena`.`Minimalist` (`itemAdd`, `itemName`, `itemType`, `itemPrice`, `itemColour`, `wearCount`) VALUES ('$item_add', '$item_name', '$item_type', '$item_price', '$item_colour', '$wear_count')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
?>

<div>
    
<form action="http://s4325075-minimalist.uqcloud.net/">
    <input type="submit" value="Go Back">
</form>
    
</div>