<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){

  }
    //load functions
    require("../includes/PHP/functions.php");

    //for testing only - REMOVE ONCE TESTING DONE!
    //this resets counter so that session doesn't have to be erased
    $_SESSION['load_counter'] = 1;

    //create random code
    $random_number = rand(100000, 999999);
    $_SESSION["verify_email"] = $random_number;

    //compose email
    $email = $_SESSION["emailInS"];
    $header = "";
    $message = "";

    //send code to user email


    //redirect to next page
    header("location: ./verify.php");
 ?>
