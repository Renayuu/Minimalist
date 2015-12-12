<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Rena");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$itemName = mysqli_real_escape_string($link, $_POST['itemname']);
$itemType = mysqli_real_escape_string($link, $_POST['itemtype']);
$itemColour = mysqli_real_escape_string($link, $_POST['colour']);
 
// attempt insert query execution
$sql = "INSERT INTO `Rena`.`Minimalist` (`itemName`, `itemType`, `itemColour`) VALUES ('$itemName', '$itemType', '$itemColour');";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>