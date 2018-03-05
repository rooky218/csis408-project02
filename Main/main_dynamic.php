<!-- lead in from welcome - this is the main page, similar to a home page. From here we will see most recent conversations compiled in a list. There should be a navigation menu at the bottom to take to to where you want to go, a search bar at the top to search for conversations -->
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

?>

<body id="main-page" style="margin:50px 0 0 0;">
  <?php
    //set header options
    $back_link = NULL;
    $back_icon = NULL;
    $options_link = "../Account/dashboard.php";
    $options_icon = "glyphicon-user";
    $page_title = "Messages";
    require("../includes/headers/page_no_left.php");?>

    <div class="container-fluid" style="padding: 0;">


    <div class="list-group">

      <?php
      //load messages
      require("../includes/PHP/DB/all_messages.php");
      ?>

    </div>


    <div class="circle-button">
      <span class="circle-button-text">
      <a class="glyphicon glyphicon-comment"
      href="newmessage.php"
      style="color: white;"></a></span>
    </div>




</body>
</html>
