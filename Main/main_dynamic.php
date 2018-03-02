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

<body id="login-bg" style="margin:70px 0 0 0;">
  <?php
    //set header options
    $back_link = 0;
    $back_icon = "glyphicon-chevron-left";
    $options_link = "#";
    $options_icon = "glyphicon-user";
    $page_title = "Messages";
    require("../includes/headers/page_topnav.php");?>

    <div class="container-fluid" style="padding: 0;">


    <div class="list-group">

      <?php
      //load messages
      require("../includes/PHP/DB/all_messages.php");
      ?>

    </div>


    <div style='width: 50px;
    height: 50px;
    background-color: #adadad;
    text-align: center;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    position: fixed;
    bottom: 50px;
    right: 30px;
    '>
      <span
      style='position: relative;
      top: 13px;
      font-size: 18pt;
      color: #fff;
      font-weight: bold;'>
      <a class="glyphicon glyphicon-comment"
      href="#"
      style="color: white;"></a></span>
    </div>




</body>
</html>
