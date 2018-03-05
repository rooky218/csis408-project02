<!--
This is the user profile view. This is for the user viewing THEIR OWN PROFILE, not other users.

When viewing other users, other infomation will be displayed, with buttons to Message and Add friend
-->

<?php
  session_start();

    //check if already logged in send to main
    if($_SESSION["LOGGED_IN"] == true){
      //header("location: ./../includes/headers/header_main.php");
      //$_SESSION["Alert_already_logged_in"] = true;
    }

    //load functions
    require("../includes/PHP/functions.php");

    //load DB
    require("../includes/PHP/DB/dblogin_final.php");

    //load Queries
    require("../includes/PHP/DB/profile_settings/set_get.php");

    //Variables
    //$city - set in return_zip.php
    //$state - set in return_zip.php
    //$age - set in return_bd.php

    $whotheyare = $_GET["user"];

    //if not logged in add header
    $title = getFullname($whotheyare); //set page title
    require("../includes/headers/header_main.php");

 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="menu-page">

    <!-- image container -->
    <div class="account-background"></div><!--blur profile image-->
    <div class="account-transparent"></div><!-- dark overlay -->

    <div class="content-container">
        <br/>
        <!-- back to last page icon link -->
        <a class="glyphicon glyphicon-chevron-left ben-back-icon"
           href="../Main/main_dynamic.php"
           style="position: absolute;
                  top: 40px;
                  left: 7%;
                  color: #adadad;
                  font-size: 18pt;"></a>


        <h3 class="">Profile</h3>

        <img src="../includes/photos/19884356_10154716410676409_7622955142588271372_n.jpg"
            height="125px"
            width="125px"
            class="img-circle">

        <h2 class=""><?php echo getFullname($whotheyare) . ", " . getAge($whotheyare);?></h2>

        <h5 class=""><?php echo getLocationByUser($whotheyare);?></h5>

        </div><!-- end content container -->

        <br/>

        <?php //echo "<span style='color: white;'>" . $_SESSION["email_V_InS"]."</span>";?>

        <!-- Username -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Username</h4>
        <a href='settings.php?page=username' style='color: #77E9F3;'><?php echo getUsername($whotheyare);?></a>
        </div>
        <div class="media-right media-top">
          <?php if(0 == 0){
          echo "<h4><span class='label label-primary'>Status</span></h4>";
        };
        ?>
        </div>
        </div>
        </div>

        <!-- Message User -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#help' style='color: white;'>Message</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#help' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-comment"></i></h4></a>
        </div>
        </div>

        <!-- Add Friend -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#help' style='color: white;'>Add Friend</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#help' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-plus"></i></h4></a>
        </div>
        </div>

        <!-- Report User -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#help' style='color: white;'>Report User</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#help' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-info-sign"></i></h4></a>
        </div>
        </div>

        <!-- Help -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#feedback' style='color: white;'>Block User</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#feedback' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-remove-sign"></i></h4></a>
        </div>
        </div>
        <br/>


      </div><!-- end container -->


<script src="../includes/JS/signup.js"></script>

</body>
</html>
