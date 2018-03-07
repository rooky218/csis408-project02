<?php

//load functions
require("../includes/PHP/functions.php");

//load DB
require("../includes/PHP/DB/dblogin_final.php");

//load Queries
require("../includes/PHP/DB/profile_settings/set_get.php");


$roomID = $_GET["room"];
$message = $_GET["message"];
echo "room: " . $roomID . " message " . $message
sendMessage(1, $message);


name="myForm"
method="post"
action="convo_dynamic.php?room=<?php echo $roomID;?>"
class=""
