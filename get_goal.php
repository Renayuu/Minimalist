<?PHP

$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
};

$sql = "SELECT Goal_Num FROM Goal WHERE Goal_ID = '1'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo $row[0];

// close connection
mysqli_close($conn);
?>