<?php

require_once 'utils.php';
echo "Hello Everyone";

$sql = "SELECT Item_ID, Days_Last_Worn FROM Item";
$stmt = $db->query($sql); 
$row = $stmt->fetchALL();

print_r($row)


//echo "<p>Item_ID: ";
//echo $row[Item_ID];
//echo "</p>"
//echo $row['Days_Last_Worn'];
//echo $row[Days_Last_Worn];


?>