<?php

//load functions
require("../includes/PHP/functions.php");

//load DB
require("../includes/PHP/DB/dblogin_final.php");

//load Queries
require("../includes/PHP/DB/profile_settings/set_get.php");

//format 2018-03-08 03:19:29
echo "Hello Ben <br/>";

$message = "This is a fantastic test";
$room = 5;
$receiver = 2;

$_SESSION["userIDInS"] = 1;

//sendMessage(5, $message);
$user[0] = 1;
$user[1] = 2;
//$user[2] = 3;

//echo createRoom($user);
//print_r($user);

//sendMessage(25, $message);
//getRooms(1);

createRoom($user);

//echo print_r(whoInRoom(25));
?>
