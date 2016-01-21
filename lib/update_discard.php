<?php

require_once "utils.php";

$item_id = $_POST['itemID'];

echo "test";
echo $item_id;

// $stmt = $db->prepare("UPDATE Item WHERE Item_ID = :itemID SET Discarded=1");
// $stmt->bindValue(":itemID", $item_id, PDO::PARAM_STR);
// $stmt->execute();
// $result = $stmt->fetch();

?>