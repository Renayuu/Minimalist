<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);
//$photo = mysqli_real_escape_string($conn, $_POST['photo']);

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

if (!empty($_FILES["uploadphoto"]["name"])) {

	$file_name=$_FILES["uploadphoto"]["name"];
	$temp_name=$_FILES["uploadphoto"]["tmp_name"];
	$imgtype=$_FILES["uploadphoto"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename2=date("Y-m-d")."-".time().$ext;
	$target_path2 = "uploadmemory/".$imagename2;

    
move_uploaded_file($temp_name2, $target_path2);

}

// attempt insert query execution
$sql = "UPDATE Item SET Image_Path_2 = '".$target_path2."' WHERE Item_ID = '".$itemid."'";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>

<div>
    
<form action="http://s4325075-minimalist.uqcloud.net/discarded_items.php">
    <input type="submit" value="Go Back">
</form>
    
</div>