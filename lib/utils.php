<?php
$db = new PDO('mysql:host=localhost;dbname=newdata;charset=utf8',
'webuser','webuser');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

try
{
	$testresult = $db->query("SELECT * FROM newdata");
	echo "Connected to db";
}
catch(PDOException $ex)
{
	echo "an error occured";
	echo $ex->getMessage();
}

?>