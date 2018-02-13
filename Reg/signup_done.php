<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){
    //header("location: ./../includes/headers/header_main.php");
    //$_SESSION["Alert_already_logged_in"] = true;
  }

    //if not logged in add header
    $title = "Sign Up"; //set page title
    require("../includes/headers/header_main.php");
    //require("includes/header_logged_out.php"); //load page header
    //require("includes/header_logged_in.php"); //load page header
 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="sign-bg">
      
      <div class="container" style="padding: 30px;">
           
          <h2 class="text-center test" style="">Welcome to Chat App!</h2>
          <br/>
          
          <h3>What next?</h3>
          
          <p>We know your time is important to you, so when you get the time, confirm your email and set up Two Factor Authentication. You can do this at anytime in your profile.</p>
          
          <!-- Start Texting -->
          <a class="btn btn-default btn-lg btn-block" 
                     href="../Main/main.php">Start Texting</a> <!-- back to login.php -->
          
          <!-- Confirm your phone -->
          <a class="btn btn-default btn-lg btn-block" 
                     href="../Reg/signup.php">Verify Phone</a> <!-- back to login.php -->
          
          <!-- Confirm your email -->
          <a class="btn btn-default btn-lg btn-block" 
                     href="../Reg/signup.php">Verify Email</a> <!-- back to login.php -->