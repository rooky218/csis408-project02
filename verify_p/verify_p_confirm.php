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

    <h3 class='test text-center'>Phone Updated</h3>

    <br/><br/>

    <h4 class='test text-center' style='color:#77E9F3;'>
      <?php echo getPhone();?>
    </h4>

    <br/><br/>

    <a class='btn btn-default btn-lg btn-block'
       href='../Account/dashboard.php'>Done</a>

     </div><!-- end container -->

     </body>
     </html>
