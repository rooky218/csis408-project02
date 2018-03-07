<?php
  session_start();
  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");

  //echo "hello: " . $_SESSION["userNameInS"];

  $user[0] = $_GET["user"];
  $user[1] = $_SESSION["userIDInS"];

  print_r($user);
  createRoom($user);
?>
