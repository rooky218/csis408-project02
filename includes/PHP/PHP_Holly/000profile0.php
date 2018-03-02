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
$UserProfileID = row[?];
*/
//this will line is just for testing once connected to database it can be deleated


$userProfileID = Holly;

//Create a unique profile page
$profileID = $userProfileID.'.php';
echo "your username is: " . $userProfileID . '<br><br><br>';


$myfile = fopen($profileID, "w") or die("Unable to open file!");
$txt = "<?php include '000profileCode.php'; ?>" ;
fwrite($myfile, $txt);

fclose($myfile);
echo "<td align = left><a href='$profileID'>Click here to be taken to your room</a></td>"; 
echo '<br><br><br>';
//Create a new conversation page
$convoID = $userProfileID.'Convo.php';



$myfile = fopen($convoID, "w") or die("Unable to open file!");
$txt = "<?php include '000convoCode.html'; ?>" ;
fwrite($myfile, $txt);

fclose($myfile);
echo "<td align = left><a href='$convoID'>Click here to be taken to your convo room</a></td>"; 
echo '<br><br><br>';
//Create a new settings page
$settingsID = $userProfileID.'Settings.php';



$myfile = fopen($settingsID, "w") or die("Unable to open file!");
$txt = "<?php include '000settingsCode.php'; ?>" ;
fwrite($myfile, $txt);

fclose($myfile);
echo "<td align = left><a href='$settingsID'>Click here to be taken to your settings room</a></td>";
echo '<br><br><br>';
?>


