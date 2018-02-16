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

    //NOTE: This page will upload all session user data to the database


    //these values are optional on the second page, run if statement to confirm isset
    if(myisset($_SESSION["firstNameInS"]
    && myisset($_SESSION["lastnameInS"]))
    && myisset($_SESSION["zipInS"])
    && myisset($_SESSION["phoneInS"])){
      //if values are set, copy all session to DB
      $_SESSION["userNameInS"];
      $_SESSION["emailInS"];
      $_SESSION["passwordInS"];
      $_SESSION["firstNameInS"];
      $_SESSION["lastnameInS"];
      $_SESSION["zipInS"];
      $_SESSION["phoneInS"];
    } else {
      //if second page skipped, only upload required data
      $_SESSION["userNameInS"];
      $_SESSION["emailInS"];
      $_SESSION["passwordInS"];
    }

 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="sign-bg">

      <div class="container" style="padding: 30px;">

          <h2 class="text-center test">Welcome to Chat App!</h2>
          <br/>

          <h4 class="text-center test">What next?</h4>

          <p class="test">We know your time is important, so when you have the time, confirm your email and phone number. This is really important in case you forget your login.</p>

          <br/>

          <?php
              //output session data to confirm all user input.
              //testing purposes only, not included in final
              echo "User input <br/><p class='test'>" .
              "Username: " . $_SESSION["userNameInS"] . "<br/>" .
                "Email: " . $_SESSION["emailInS"] . "<br/>" .
                "Password: " . $_SESSION["passwordInS"] ."<br/>" .
                "First Name: " . $_SESSION["firstNameInS"] . "<br/>" .
                "Last Name: " . $_SESSION["lastnameInS"] . "<br/>" .
                "Zip code: " . $_SESSION["zipInS"] . "<br/>" .
                "Phone: " . $_SESSION["phoneInS"] . "</p>";
          ?>

          <!-- Start Texting -->
          <a id="login-submit"
             class="btn btn-default btn-lg btn-block"
             href="../Main/main.php">Start Chatting</a> <!-- back to login.php -->

          <!-- Confirm your phone -->
          <a class="btn btn-default btn-lg btn-block"
             href="../Reg/signup.php">Verify Info</a> <!-- back to login.php -->

  </body>
  </html>
