<?php

$db = new PDO('mysql:host=localhost; dbname=Minimize; charset=utf8', 'Bear','123456');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

try
{
    $testresult = $db->query("SELECT * FROM Item");
    //echo "Connected to db";
}
catch(PDOException $ex)
{
    echo "An Error occured!";
    echo $ex->getMessage();
}

?>