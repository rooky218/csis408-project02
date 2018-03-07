<?php

//load functions
require("../includes/PHP/functions.php");

//load DB
require("../includes/PHP/DB/dblogin_final.php");

//load Queries
require("../includes/PHP/DB/profile_settings/set_get.php");


$roomID = $_GET["room"];
$userID = $_GET["user"];
getMessages($roomID, $userID);
