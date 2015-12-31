<!-- 
Original PHP code taken from
http://deepakagupta.blogspot.com.au/2014/07/step-by-step-to-upload-image-and-store.html 

Errors solved by referring
http://stackoverflow.com/questions/27768354/error-because-of-sql-syntax
http://stackoverflow.com/questions/28913931/upload-an-image-and-store-in-database-and-retrieve-using-php-code
-->
<?php
include ("mysqlconnect.php");

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

if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "uploadclothes/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {
    $date = date("Y-m-d");
    $query_upload= "INSERT INTO `Upload_Image` (Images_Path,submission_date) VALUES ('$target_path','$date')";

    /* $query_upload="INSERT into 'Upload_Image' ('Images_Path','Submission_Date') VALUES ('".$target_path."','".date("Y-m-d")."')"; */
    
	mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
	
}else{

   exit("Error While uploading image on the server");
} 

}

?>

