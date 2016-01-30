<?php

$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);
$story = mysqli_real_escape_string($conn, $_POST['story']);

// $itemid = ($_POST['itemID']);
// $story = ($_POST['story']);

$sql = "UPDATE Item SET Story = '".$story."' WHERE Item_ID = '".$itemid."'";
//echo $itemid;
//echo $story;

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);


?>