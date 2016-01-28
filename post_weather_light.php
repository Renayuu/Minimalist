<?php

//just try

require_once 'utils.php';

$light_colours = "";

$sql = "SELECT Item_ID, Avg_Temp FROM Item WHERE RFID_Tag != 0";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(); //push the result in array

//Get the latest temperature
//'read the json file contents' code from http://www.startutorial.com/articles/view/php-curl
$cSession = curl_init(); 
curl_setopt($cSession,CURLOPT_URL,"http://api.openweathermap.org/data/2.5/weather?q=Brisbane&&units=metric&APPID=3f66b3cd437c6662ec552179273e2832");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
$weather=curl_exec($cSession);
curl_close($cSession);

$data = json_decode($weather, true);
$current_temp = $data[main][temp];

foreach ($result as $row) 
//loop every single element in results
{
	$avg_temp = $row['Avg_Temp']; //take the heading and read the value from the collumn
	$temp_diff = $current_temp - $avg_temp; //compare the average temp of each item with the current temp
	
	if (abs($temp_diff) < 5)
	{
		$light_colours .= "purple";
	}
	else if ($temp_diff > 10) //current temperature is greater than the avg temp of the item, means the item is too hot to wear
	{
		$light_colours .= "red";
	}
	else if ($temp_diff < -10) //current temperature is smaller than the avg temp of the item, means the item is too cold to wear
	{
		$light_colours .= "blue";
	}
	else
	{
		$light_colours .= "off";
	}
	$light_colours .= ",";
}

echo $light_colours;


?>