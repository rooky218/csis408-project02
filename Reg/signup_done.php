<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){
    //header("location: ./../includes/headers/header_main.php");
  }

    //if not logged in add header
    $title = "Welcome!"; //set page title
    require("../includes/headers/header_main.php");

    //load functions
    require("../includes/PHP/functions.php");

    //load DB
    require("../includes/PHP/DB/dblogin_final.php");

    //load Queries
    require("../includes/PHP/DB/profile_settings/set_get.php");

    $_SESSION["userIDInS"] = createUser();


 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="menu-page1">

      <div class="container" style="padding: 30px;">

          <h2 class="text-center test">Welcome to Chat App!</h2>
          <br/>

          <?php
              //output session data to confirm all user input.
              //testing purposes only, not included in final
              echo "Username: " . getUsername() . "<br/>";
              echo "Password: " . getPassword() . "<br/>";
              echo "Zip: " . getZip() . "<br/>";
              echo "Location: " . getLocation() . "<br/>";
              echo "First Name: " . getFirstname() . "<br/>";
              echo "Last Name: " . getLastname() . "<br/>";
              echo "Email: " . getEmail() . "<br/>";
              echo "Email Verified: " . getEmailV() . "<br/>";
              echo "Phone: " . getPhone() . "<br/>";
              echo "Phone Verified: " . getPhoneV() . "<br/>";
              echo "Birthay: " . getBirthday() . "<br/>";
              echo "User ID: " . $_SESSION["userIDInS"] . "<br/>";
          ?>

          <!-- Start Texting -->
          <a id="login-submit"
             class="btn btn-default btn-lg btn-block"
             href="../Main/main_dynamic.php">Start Chatting</a> <!-- back to login.php -->

          <!-- Confirm your phone -->
          <a class="btn btn-default btn-lg btn-block"
             href="../Reg/signup.php">Verify Info</a> <!-- back to login.php -->

  </body>
  </html>
