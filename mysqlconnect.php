<!-- 
Original PHP code taken from
http://deepakagupta.blogspot.com.au/2014/07/step-by-step-to-upload-image-and-store.html 
-->
<?php
/**********MYSQL Settings****************/
$host="localhost";
$databasename="Minimalist";
$user="root";
$pass="Amj4blys9Efl";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass);

if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
    die('Not connected : ' . mysql_error());
}

?>