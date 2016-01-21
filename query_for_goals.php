<?php

require_once 'utils.php';

$stmt = $db->prepare("SELECT Goal_Num FROM Goal WHERE Goal_ID = 1");
$stmt->execute();
$result = $stmt->fetch(); 
$goal = $result["Goal_Num"];

echo $goal;

?>