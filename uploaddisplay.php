<!-- 
Original PHP code taken from
http://deepakagupta.blogspot.com.au/2014/07/step-by-step-to-upload-image-and-store.html 

Errors solved by referring
http://stackoverflow.com/questions/27768354/error-because-of-sql-syntax
http://stackoverflow.com/questions/28913931/upload-an-image-and-store-in-database-and-retrieve-using-php-code
-->
<?php
include ("lib/mysqlconnect.php");

$select_query = "SELECT `images_path` FROM `Upload_Image` ORDER by `image_id` DESC";
$sql = mysql_query($select_query) or die(mysql_error());	
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){
$image = $row['images_path']
                                        
?>

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
    
    <img src="<?php echo $row["images_path"]; ?>" alt=" " />


</td>
</tr>
</tbody></table>

<?php
}
?>
