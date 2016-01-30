<?PHP

$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
};

$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);
echo $itemid;

$sql = "SELECT Story FROM Item WHERE Item_ID = '".$itemid."'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo $row[0];

// close connection
mysqli_close($conn);
?>