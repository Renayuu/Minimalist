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
	$query = MySQL::getInstance()->query("SELECT * FROM Item ORDER BY submission_date DESC");
    return $query->fetchALL();

     // $sql = "INSERT INTO `Rena`.`Minimalist` (`itemID`, `itemAdd`, `itemName`, `itemType`, `itemPrice`, `itemColour`, `wearCount`) VALUES ('', '2015-12-12 06:24:00', 'Cord Mini Skirt', 'Skirt', '$20', 'Tan', '1');";
}

// function publishData($item) {
//     $query = MySQL::getInstance()->prepare("INSERT INTO Minimalist (itemAdd, itemName) VALUES (:itemAdd,:itemName)");
//     $query->bindValue(":itemAdd",date("Y-m-d H:i:s"), PDO::PARAM_STR); //check the time format
//     $query->bindValue(":itemName", $item, PDO::PARAM_STR);
//     $query->execute(); //please do that 
// }


// $servername = "localhost";
// $username = "s4325075";
// $password = "Amj4blys9Efl";
// $dbname = "Rena";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    
   
//     // use exec() because no results are returned
//     $conn->exec($sql);
//     echo "New record created successfully";
//     }
// catch(PDOException $e)
//     {
//     echo $sql . "<br>" . $e->getMessage();
//     }

// $conn = null;



?>