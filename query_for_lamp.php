<?php

require_once 'utils.php';

$lamp = "";

$sql = "SELECT Date_Last_Worn FROM Item WHERE RFID_Tag != 0 AND Discarded = 1";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(); //push the result in array

$date1 = new DateTime();

foreach ($result as $row) 
//loop every single element in results
{
	$date2 = new DateTime(date('Y-m-d', strtotime($row['Date_Last_Worn']))); //take the heading and read the value from the collumn
	$daysago = $date1->diff($date2)->days; //calculate the days difference
	
	if ($daysago < 1)
	{
		$lamp .= "glow";
	}
	else
	{
		$lamp .= "off";
	}
}

echo $lamp;


?>