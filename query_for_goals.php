<?php

require_once 'utils.php';

$stmt = $db->prepare("SELECT Goal_Num FROM Goal WHERE Goal_ID = 1");
$stmt->execute();
$result = $stmt->fetch(); 
$goal = intval($result["Goal_Num"]);

$stmt2 = $db->prepare("SELECT COUNT(*) as total FROM Item WHERE Discarded = 0");
$stmt2->execute();
$result2 = $stmt2->fetch(); 

$num_clothes = intval($result2['total']);

$clothes_left = $num_clothes - $goal;

echo $clothes_left;

?>