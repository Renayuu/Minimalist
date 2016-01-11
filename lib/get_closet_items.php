<?php

require_once "mysqlconnect.php";

$sql = "SELECT * FROM Item ORDER BY Date_Last_Worn ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->fetchALL();

echo json_encode($stmt);

$conn = NULL;

?>