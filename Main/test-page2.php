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




 INSERT INTO `chatapp`.`Users`
 (`Admin`, `UserID`, `CreateDate`, `EmailVerified`, `Phone`, `PhoneA`, `FirstName`, `LastName`, `Username`, `Email`, `ZipCode`, `UserPassword`, `Location`, `BirthDate`)
 VALUES (NULL, NULL, NULL, '1', '5408884061', 'address goes here', 'David', 'Jamison', 'masterchief', 'dave@dave.com', '53075', 'letmein', NULL, '1987-03-20');


 ?>
