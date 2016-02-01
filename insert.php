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
$type = mysqli_real_escape_string($conn, $_POST['Type']);
$price = mysqli_real_escape_string($conn, $_POST['Price']);
$colour = mysqli_real_escape_string($conn, $_POST['Colour']);
$material = mysqli_real_escape_string($conn, $_POST['Material']);
// $description = mysqli_real_escape_string($conn, $_POST['Description']);
$avg_temp = 0;
//$date = date("Y-m-d");

function GetImageExtension($imagetype)
{
   if(empty($imagetype)) return false;
   switch($imagetype)
   {
       case 'image/bmp': return '.bmp';
       case 'image/gif': return '.gif';
       case 'image/jpeg': return '.jpg';
       case 'image/png': return '.png';
       default: return false;
   }

 }

if (!empty($_FILES["uploadimage"]["name"])) {

	$file_name=$_FILES["uploadimage"]["name"];
	$temp_name=$_FILES["uploadimage"]["tmp_name"];
	$imgtype=$_FILES["uploadimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("Y-m-d")."-".time().$ext;
	$target_path = "uploadclothes/".$imagename;

    
move_uploaded_file($temp_name, $target_path);

}

// attempt insert query execution
$sql = "INSERT INTO `Item` (`Type`, `Price`, `Colour`,`Material`, `Image_Path`,  `Avg_Temp`) VALUES ('$type', '$price', '$colour','$material','$target_path','$avg_temp')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>

<!-- <div>
    
<form action="http://s4325075-minimalist.uqcloud.net/development.html">
    <input type="submit" value="Go Back">
</form>
    
</div> -->

<script type='text/javascript'>
  window.location.href = "development.html";
</script>