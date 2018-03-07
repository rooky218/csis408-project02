<?php
  session_start();

	$_SESSION = array();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){

  }

  //if not logged in add header
  $title = "Verify your Email"; //set page title
  require("../includes/headers/header_main.php");

  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");

    //if not logged in add header
    $title = "Email Confirmed!"; //set page title
    require("../includes/headers/header_main.php");



 ?>
 <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

 <body id="menu-page">

<div class="container" style="padding: 30px;">
<h2 class='text-center test'>You have been logged out</h2>

<br/><br/>

<h4 class='test text-center'>Come back again soon! <?php echo $_SESSION["firstNameInS"];?></h4>
<br/><br/>

<a style="background-color: #77E9F3; border: none;" class="btn btn-default btn-lg btn-block"
  href="login.php">Return to Login</a>

</body>
</html>
