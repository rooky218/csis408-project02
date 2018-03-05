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

    ?>

    <body id="menu-page" style="color: white;">
      <div class="container" style="padding: 30px;">

    <?php

    $pageID = $_GET["page"];

    //update username***************************************************
    if($pageID == "username"){

      //check for submission, confirm password, then update DB
      if(myisset($_POST["username"]) && myisset($_POST["password"])){
        if($_POST["password"] == $_SESSION["passwordInS"]){
          //call db
          setUsername($_POST["username"]);

          echo "
          <h3 class='test text-center'>Username Updated</h3>

          <br/><br/>

          <div style='text-align: center;'>

         <h4 class='test text-center' style='color:#77E9F3;'>"
         . getUsername() .
         "
         </h4>
         <br/><br/>

          <a class='btn btn-default btn-lg btn-block' href='dashboard.php'>Done</a>
          ";
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
          //send to verify
          $_SESSION["temp-phone"] = $_POST["value1"];
          header("location: ./../verify_p/verify_p_generate.php");

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
          setZip($_POST["value1"]);

          echo "
          <h3 class='test text-center'>Location Updated</h3>

          <br/><br/>

          <div style='text-align: center;'>
          <iframe
           width='200'
           height='200'
           frameborder='0' style=
           'border: solid #53a3aa 5px;
           border-radius: 50%;
           '
           src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDvXjk_57bj1L_7HrmtnfP3dJqcO4_LBSk
             &q=". getLocationDev() . "' allowfullscreen>
         </iframe>
         </div>
         <h4 class='test text-center' style='color:#77E9F3;'>"
         . getLocation() .
         "
         </h4>

          <br/><br/>

          <a class='btn btn-default btn-lg btn-block'
             href='dashboard.php'>Done</a>
          ";



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
            setPassword($_POST["value1"]);

            echo "
            <h3 class='test text-center'>Password Updated</h3>

            <br/><br/>

            <a class='btn btn-default btn-lg btn-block'
               href='dashboard.php'>Done</a>
            ";

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

</div><!-- end container -->

</body>
</html>
