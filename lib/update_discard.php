<?php

// require_once "utils.php";

// $item_id = $_POST['itemID'];

// $stmt = $db->prepare("UPDATE Item WHERE Item_ID = :itemID SET Discarded='1'");
// $stmt->bindParam(":itemID", $item_id);
// $stmt->execute();


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);

// attempt insert query execution
// $sql = "UPDATE Goal SET Goal_Num = '".$goal."' WHERE Goal_ID = '1'";
$sql = "UPDATE Item  SET Discarded='1' WHERE Item_ID = '".$itemid."' ";


if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);


?>