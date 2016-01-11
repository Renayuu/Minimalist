<?php

require_once "mysqlconnect.php";

//$sql = "SELECT * FROM Item ORDER BY Date_Last_Worn ASC";
$stmt = $conn->prepare("SELECT * FROM Item ORDER BY Date_Last_Worn ASC");
$stmt->execute();
//
$result = $stmt->fetchALL();

//echo json_encode($result);
print_r($result);

$conn = NULL;

?>