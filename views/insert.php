<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "s4325075", "Amj4blys9Efl", "Rena");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$item_name = mysqli_real_escape_string($conn, $_POST['itemname']);
$item_type = mysqli_real_escape_string($conn, $_POST['itemtype']);
$item_colour = mysqli_real_escape_string($conn, $_POST['colour']);
 
// attempt insert query execution
$sql = "INSERT INTO persons (item_name, item_type, item_colour) VALUES ('$item_name', '$item_type', '$item_colour')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
?>