<?php

$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);
$photo = mysqli_real_escape_string($conn, $_POST['photo']);


$sql = "UPDATE Item SET Image_Path_2 = '".$photo."' WHERE Item_ID = '".$itemid."'";


if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);


?>