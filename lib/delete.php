<?php
include "mysqlconnect.php";
$id=$_POST['Item_ID'];
$delete = "DELETE FROM Item WHERE Item_ID = $id";
$result = mysql_query($delete) or die(mysql_error());
?>