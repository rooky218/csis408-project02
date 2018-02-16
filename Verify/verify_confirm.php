<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){

  }

    //if not logged in add header
    $title = "Email Confirmed!"; //set page title
    require("../includes/headers/header_main.php");

 ?>

 <h1>Confirmed</h1>
