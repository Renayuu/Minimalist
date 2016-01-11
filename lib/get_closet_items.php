<?php

require_once "utils.php";

//$sql = "SELECT * FROM Item ORDER BY Date_Last_Worn ASC";
$stmt = $db->prepare("SELECT * FROM Item ORDER BY Date_Last_Worn ASC");
$stmt->execute();
//
$result = $stmt->fetchALL();

echo json_encode($result);
//print_r($result);

//$conn = NULL;

?>