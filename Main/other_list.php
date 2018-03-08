<?php
  session_start();

  //check if already logged in
  if($_SESSION["LOGGED_IN"] == true){
    //if logged in, redirect to main page
    //header("location: ./../Main/main.php");
  }

  //Set Page title and load header
  $title = "Mainpage"; //set page title
  require("../includes/headers/header_main.php");

  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");

  $roomID = $_GET["room"];

?>

<body id="main-page" style="margin:50px 0 0 0;">
  <?php
    //set header options
    $back_link = "convo_dynamic.php?room=" . $roomID;
    $back_icon = "glyphicon-chevron-left";
    $options_link = "../Account/dashboard.php";
    $options_icon = null;
    $page_title = "Chatting With...";
    require("../includes/headers/page_no_right.php");?>

    <div class="container-fluid" style="padding: 0;">


    <div class="list-group">

      <?php
      //load messages
      //require("../includes/PHP/DB/all_messages.php");
      getUsersByList($roomID);
      ?>

    </div>





</body>
</html>
