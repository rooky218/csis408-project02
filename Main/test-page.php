<?php

//load functions
require("../includes/PHP/functions.php");

//load DB
require("../includes/PHP/DB/dblogin_final.php");

//load Queries
require("../includes/PHP/DB/profile_settings/set_get.php");

$username = "rooky218";
if(checkUsername($username)){
  echo "username exists";
} else {
  echo "username does not exist";
}

$phone = "4342197737";
if(checkPhone($phone)){
  echo "phone exists";
} else {
  echo "phone does not exist";
}

$email = "ben.walker218@gmail.com";
if(checkEmail($email)){
  echo "email exists";
} else {
  echo "email does not exist";
}

?>
