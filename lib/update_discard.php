<?php

require_once "utils.php";

$item_id = $_POST['itemID'];

//$sql = "SELECT * FROM Item ORDER BY Date_Last_Worn ASC";
$stmt = $db->prepare("UPDATE Item WHERE Item_ID = :itemID SET Discarded=1");
$stmt->bindValue(":itemID", $item_id, PDO::PARAM_STR);
$stmt->execute();
//

$result = $stmt->fetchALL();


?>