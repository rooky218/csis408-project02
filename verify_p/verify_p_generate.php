<?php
  session_start();

  //check for post value, display content appropriatly
  //load functions
  require("../includes/PHP/functions.php");

    //if sent from confirm.php
    if(myisset($_SESSION["temp-phone"])){
      $phone = $_SESSION["temp-phone"];
      $exit = "location: ./../Account/dashboard.php";
    } else {
      //if sent from Registration
      $phone = $_SESSION["phoneInA"];
      $exit = "location: ./../Main/convo_dynamic.php";
    }



    //reset lockout counter - testing only
    $_SESSION['counter_pv'] = 1;

    //assign phone address
    $phoneArray[0] = $phone . "@tmomail.net";
    $phoneArray[1] = $phone . "@txt.att.net";
    $phoneArray[2] = $phone . "@vtext.com";
    $phoneArray[3] = $phone . "@messaging.sprintpcs.com";
    $phoneArray[4] = $phone . "@vmobl.com";
    $phoneArray[5] = $phone . "@mmst5.tracfone.com";
    $phoneArray[6] = $phone . "@mymetropcs.com";
    $phoneArray[7] = $phone . "@myboostmobile.com";
    $phoneArray[8] = $phone . "@mms.cricketwireless.net";
    $phoneArray[9] = $phone . "@ptel.com";
    $phoneArray[10] = $phone . "@text.republicwireless.com";
    $phoneArray[11] = $phone . "@msg.fi.google.com";
    $phoneArray[12] = $phone . "@tms.suncom.com";
    $phoneArray[13] = $phone . "@message.ting.com";
    $phoneArray[14] = $phone . "@email.uscc.net";
    $phoneArray[15] = $phone . "@cingularme.com";
    $phoneArray[16] = $phone . "@cspire1.com";
    $phoneArray[17] = $phone . "@vtext.com";

    //LOOP - generate codes for 18 different phone providers
    for($i = 0; $i < 18; $i++){
      //gen code and store code
      $code[$i] = rand(100000, 999999);
    }

    //save to session
    $_SESSION["code_array"] = $code;
    $_SESSION["address_array"] = $phoneArray;

    //Compose and send Text Message
    for($y = 0; $y < 18; $y++){
      //create subject
      $sub = "Phone Verification";

      //create message
      $message = "Your code is: " . $code[$y] . " \nPlease enter this to complete verification.";

      //create header
      $header = "From: Chatty < system@frontdoor.design > \n";

      //send T-Mobile text
      echo $mes_tmo;

      if(mail($phoneArray[$y], $sub, $mes_tmo, $header)){
        //if sent, direct to next page
        //echo "<br/> Message was sent";
        header("location: ./verify_p.php");
      } else {
        //if failed, try again
        echo "<br/> Message failed to send";
      }
    }//end message for loop


 ?>
