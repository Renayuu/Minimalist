<?php

// function getData() {
//     $query = MySQL::getInstance()->query("SELECT * FROM Hello ORDER BY posted DESC");
//     return $query->fetchALL();
// }

// function publishData($message) {
//     $query = MySQL::getInstance()->prepare("INSERT INTO Hello (posted, message) VALUES (:posted,:message)");
//     $query->bindValue(":posted",date("Y-m-d H:i:s"), PDO::PARAM_STR); //check the time format
//     $query->bindValue(":message", $message, PDO::PARAM_STR);
//     $query->execute(); //please do that 
// }


function getData() {
	$query = MySQL::getInstance()->query("SELECT * FROM Minimalist ORDER BY itemAdd DESC");
    return $query->fetchALL();
}

// function publishData($item) {
//     $query = MySQL::getInstance()->prepare("INSERT INTO Minimalist (itemAdd, itemName) VALUES (:itemAdd,:itemName)");
//     $query->bindValue(":itemAdd",date("Y-m-d H:i:s"), PDO::PARAM_STR); //check the time format
//     $query->bindValue(":itemName", $item, PDO::PARAM_STR);
//     $query->execute(); //please do that 
// }



?>