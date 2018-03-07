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
<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

<body id="menu-page" style="color: white;">
  <div class="container" style="padding: 30px;">

    <h3 class='test text-center'>Phone Verified</h3>

    <br/><br/>

    <h4 class='test text-center' style='color:#77E9F3;'>
      <?php echo $_SESSION["phoneInS"]?>
    </h4>

    <br/><br/>

    <a style="background-color: #77E9F3; border: none;" class='btn btn-default btn-lg btn-block'
       href='../Reg/signup_done.php'>Continue</a>

     </div><!-- end container -->

     </body>
     </html>
