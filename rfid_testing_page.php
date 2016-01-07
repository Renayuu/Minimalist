<?php

require_once 'utils.php';

date_default_timezone_set('Australia/Brisbane');

//POSTING and SELECTING
$p_RFID = $_POST["rfidscan"]; //get and store from the web address
//$p_date = date("Y-m-d h:i:sa");
//rfidscan

$sql = "SELECT Item_ID, Times_Worn FROM Item WHERE RFID_Tag = :p_rfid";
$stmt = $db->prepare($sql);
$stmt->bindParam(":p_rfid", $p_RFID, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch();
$item_id = $result["Item_ID"];
$times_worn = $result["Times_Worn"];

$new_times_worn = $times_worn + 1; //incrementing

//INSERT Date_Worn into Wearing_Data
try 
{
    $stmt = $db->prepare("INSERT INTO Wearing_Data (Date_Worn, Item_ID) VALUES (:date_worn, :item_id)");
    
    $stmt->bindValue(":date_worn", date("Y-m-d H:i:s"), PDO::PARAM_STR);
    $stmt->bindValue(":item_id", $item_id, PDO::PARAM_STR);
    
    $stmt->execute();
                     
    echo "data pushed to Minimize db";
}
catch (PDOException $e)
{
    echo "Error: ", $e->getMessage();
}


//UPDATE Date_Last_Worn and Times_Worn into Item
try 
{
    $stmt = $db->prepare("UPDATE Item SET Times_Worn=:new_times_worn, Date_Last_Worn=:date_worn WHERE Item_ID=:item_id");
    
    $stmt->bindValue(":new_times_worn", $new_times_worn, PDO::PARAM_STR);
    $stmt->bindValue(":date_worn", date("Y-m-d H:i:s"), PDO::PARAM_STR);
    $stmt->bindValue(":item_id", $item_id, PDO::PARAM_STR);
    
    $stmt->execute();
                     
    echo "data pushed to Minimize db";
}
catch (PDOException $e)
{
    echo "Error: ", $e->getMessage();
}

$db = null;

?>