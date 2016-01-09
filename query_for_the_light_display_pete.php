<?php

require_once 'utils.php';

$light_colours = "";

$sql = "SELECT Item_ID, Date_Last_Worn FROM Item";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(); //push the result in array

$date1 = new DateTime();

foreach ($result as $row) //loop every single element in results
{
	$date2 = new DateTime(date('Y-m-d', strtotime($row['Date_Last_Worn']))); //take the heading and read the value from the collumn
	$daysago = $date1->diff($date2)->days; //calculate the days difference
	
	if ($daysago == 0)
	{
		$light_colours .= $row['Item_ID'].":green";
	}
	else if ($daysago < 7)
	{
		$light_colours .= $row['Item_ID'].":blue";
	}
	else if ($daysago < 14)
	{
		$light_colours .= $row['Item_ID'].":purple";
	}
	else if ($daysago < 30)
	{
		$light_colours .= $row['Item_ID'].":blue";
	}
	else if ($daysago < 100)
	{
		$light_colours .= $row['Item_ID'].":orange";
	}
	else
	{
		$light_colours .= $row['Item_ID'].":red";
	}
	$light_colours .= "-";
}

echo $light_colours;


?>