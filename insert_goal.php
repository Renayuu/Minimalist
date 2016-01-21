<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
// $submission_date = mysqli_real_escape_string($conn, $_POST['Submission_Date']);
$goal = mysqli_real_escape_string($conn, $_POST['Goal_Num']);

// attempt insert query execution
$sql = "UPDATE Goal SET Goal_Num = '$goal' WHERE Goal_ID = '1'";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>

<div>
    
<form action="http://s4325075-minimalist.uqcloud.net/goal">
    <input type="submit" value="Go Back">
</form>
    
</div>