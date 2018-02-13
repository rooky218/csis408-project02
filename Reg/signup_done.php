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
           
          <h2 class="text-center test">Welcome to Chat App!</h2>
          <br/>
          
          <h4 class="text-center test">What next?</h4>
          
          <p class="test">We know your time is important, so when you have the time, confirm your email and phone number. This is really important in case you forget your login.</p>
          
          <br/>
          
          <!-- Start Texting -->
          <a id="login-submit" 
             class="btn btn-default btn-lg btn-block"         
             href="../Main/main.php">Start Chatting</a> <!-- back to login.php -->
          
          <!-- Confirm your phone -->
          <a class="btn btn-default btn-lg btn-block" 
             href="../Reg/signup.php">Verify Info</a> <!-- back to login.php -->