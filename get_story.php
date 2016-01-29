<?PHP

$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
};

//$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);

$sql = "SELECT Story FROM Item WHERE Item_ID = '60'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
//echo $row[0];
echo $result;

// close connection
mysqli_close($conn);
?>