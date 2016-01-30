<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "Amj4blys9Efl", "Minimize");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$itemid = mysqli_real_escape_string($conn, $_POST['itemID']);
//$uploadphoto = mysqli_real_escape_string($conn, $_POST['uploadphoto']);

// function GetImageExtension($imagetype)
// {
//    if(empty($imagetype)) return false;
//    switch($imagetype)
//    {
//        case 'image/bmp': return '.bmp';
//        case 'image/gif': return '.gif';
//        case 'image/jpeg': return '.jpg';
//        case 'image/png': return '.png';
//        default: return false;
//    }

//  }
$newname = date('Y').date('m').date('d').date('h').date('i');
$file_name=$_FILES["uploadphoto"]["name"];
$temp_name=$_FILES["uploadphoto"]["tmp_name"];
// $imgtype=$_FILES["uploadphoto"]["type"];
// $ext= GetImageExtension($imgtype);
$imagename=$itemid;
$target_path = "uploadmemory/".$newname.".jpg";

// if(file_exists('$target_path')) {
//     chmod('$target_path',0755); //Change the file permissions if allowed
//     unlink('$target_path'); //remove the file
// }

 //echo $file_name;

if (move_uploaded_file($_FILES["uploadphoto"]["tmp_name"], $target_path)) {
  echo "File uploaded.";
  echo $itemid;
}
else {
  echo "failed";
}

// attempt insert query execution
$sql = "UPDATE Item SET Image_Path_2 = '$target_path' WHERE Item_ID = '".$itemid."'";

if(mysqli_query($conn, $sql)){
    //echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>