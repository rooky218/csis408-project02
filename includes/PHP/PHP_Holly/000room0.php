<?php
//Connect to the database
/*
/Connect to mysql server
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
//Select database
$db = mysql_select_db(DB_DATABASE);
if(!$db) {
    die("Unable to select database");
}
//This needs to be retrieved from the database
$lastRoomIDNumber = row[?];
*/
//this will eventually be  $lastRoomIDNumber + 1; but for testing purposes it is set to be 2

$roomIDNumber = 1;
$roomID = 'room'.$roomIDNumber.'.php';
echo "your room number is: " . $roomIDNumber . '<br><br><br>';


$myfile = fopen($roomID, "w") or die("Unable to open file!");
$txt = "<?php include '000roomCode.php'; ?>" ;
fwrite($myfile, $txt);

fclose($myfile);
echo "<td align = left><a href='$roomID'>Click here to be taken to your room</a></td>";
?>
