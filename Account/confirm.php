<?php
  session_start();

  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){

  }

    //if not logged in add header
    $title = "Update Profile"; //set page title
    require("../includes/headers/header_main.php");

    $pageID = $_GET["page"];

    //update username***************************************************
    if($pageID == "username"){

      //check for submission, confirm password, then update DB
      if(myisset($_POST["username"]) && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          echo "Database called <br/>";
          setUsername($_POST["username"]);
          echo "New Username: " . $_SESSION["userNameInS"];
          echo "<br><a href='dashboard.php'>Go</a>";
        } else {
          echo "Password Incorrect";
        }

      } else {
          //return error message - Username or Password Missing
          echo "Username or Password missing";
      }

    }//end group


    //add phone number***************************************************
    elseif($pageID == "phone-update"){
      //check for submission, confirm password, then update DB
      if(myisset($_POST["value1"]) && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          echo "Database called <br/>";
          setPhone($_POST["value1"]);
          echo "New phone: " . $_SESSION["phoneInS"];
          echo "<br><a href='dashboard.php'>Go</a>";
        } else {
          echo "Password Incorrect";
        }

      } else {
          //return error message - Username or Password Missing
          echo "Username or Password missing";
      }
    } //end phone add

    //update phone number***************************************************
    elseif($pageID == "phone-update2"){
      echo "<h1 style='color: white'>Update Phone</h1>";

    }

    //add email***************************************************
    elseif($pageID == "email-add"){
      //check for submission, confirm password, then update DB
      if(myisset($_POST["value1"]) && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          echo "Database called <br/>";
          setEmail($_POST["value1"]);
          echo "New phone: " . $_SESSION["emailInS"];
          echo "<br><a href='dashboard.php'>Go</a>";
        } else {
          echo "Password Incorrect";
        }

      } else {
          //return error message - Username or Password Missing
          echo "Username or Password missing";
      }
    } //end email add


    //update email***************************************************
    elseif($pageID == "email-update"){
      echo "<h1 style='color: white'>Update Email</h1>";

    }

    //add zip***************************************************
    elseif($pageID == "location-add"){
      echo "<h1 style='color: white'>Add Location</h1>";

      //submit to confirm.php?set=email

    }

    //update zip***************************************************
    elseif($pageID == "location-change"){
      //check for submission, confirm password, then update DB
      if(myisset($_POST["value1"]) && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          echo "Database called <br/>";
          setZip($_POST["value1"]);
          echo "New zip: " . $_SESSION["zipInS"];
          echo "<br><a href='dashboard.php'>Go</a>";
        } else {
          echo "Password Incorrect";
        }

      } else {
          //return error message - Username or Password Missing
          echo "Username or Password missing";
      }

    }

    //Change password***************************************************
    elseif($pageID == "password-change"){
      //check for submission, confirm password, then update DB
      if(myisset($_POST["value1"])
      && myisset($_POST["value2"])
      && myisset($_POST["password"])){
        if($_POST["value1"] == $_POST["value2"]){
          if($_POST["password"] == $_SESSION["passwordInS"]){
            //call db
            echo "Database called <br/>";
            setPassword($_POST["value1"]);
            echo "New phone: " . $_SESSION["emailInS"];
            echo "<br><a href='dashboard.php'>Go</a>";
          } else {
            echo "Current password incorrect";
          }
        } else {
          echo "New password does not match";
        }
      } else {
          //return error message - Username or Password Missing
          echo "Please fill in all fields";
      }
    } //end email add

    elseif($pageID == "profile-change"){
      //check for submission, confirm password, then update DB
      if(myisset($_POST["value1"])
      && myisset($_POST["value2"])
      && myisset($_POST["bd-month"])
      && myisset($_POST["bd-day"])
      && myisset($_POST["bd-year"])
      && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          echo "Database called <br/>";
          setFirstname($_POST["value1"]);
          setLastname($_POST["value2"]);
          $birthdate = $_POST["bd-year"] . "-" . $_POST["bd-month"] . "-" . $_POST["bd-day"];
          echo "BD cat: ". $birthdate. "<br/>";
          setBirthday($birthdate);
          echo "FN: " . $_SESSION["firstNameInS"]. "<br/>";
          echo "LN: " . $_SESSION["lastnameInS"]. "<br/>";
          echo "BD db: ". getBirthday(). "<br/>";

          echo "<br><a href='dashboard.php'>Go</a>";
        } else {
          //password wrong
          echo "password incorrect";
        }
      } else {
        //missing values
        echo "missing values";
      }
    } //end email add


    /*
    //if NULL
    elseif(!isset($pageID)){
      //update username script
      echo "<h1 style='color: white'>Page Does Not Exist - empty</h1>";

    }

    //if URL WRONG
    else {
      //update username script
      echo "<h1 style='color: white'>Page Does Not Exist - wrong</h1>";
    }
    */
 ?>
