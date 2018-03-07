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
    $roomID = $_GET["room"];
    $return = $_GET["page"]; //return to main
    $theirZip = getZip($whotheyare);
    $theirLocation = getLocation($theirZip);

    if($return != null){
      $roomID = "newmessage.php";
    } else {
      $roomID = "other_list.php?room=". $roomID;
    }

    //find initials
    $initial_first = getFirstname($whotheyare);
    $initial_last = getLastname($whotheyare);
    ucwords($initial_first);
    ucwords($initial_last);
    $initial_first = substr($initial_first, 0, 1);
    $initial_last = substr($initial_last, 0, 1);
    $initials_full = $initial_first . $initial_last;

    //if not logged in add header
    $title = getFullname($whotheyare); //set page title
    require("../includes/headers/header_main.php");

 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="menu-page">

    <!-- image container -->
    <div class="account-background-other"></div><!--blur profile image-->
    <div class="account-transparent-other"></div><!-- dark overlay -->

    <div class="content-container">
        <br/>
        <!-- back to last page icon link -->
        <a class="glyphicon glyphicon-chevron-left ben-back-icon"
           href="../Main/<?php echo $roomID;?>"
           style="position: absolute;
                  top: 40px;
                  left: 7%;
                  color: #adadad;
                  font-size: 18pt;"></a>


        <h3 class="">Profile</h3>

        <br/><br/>

        <div style='width: 100px;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        background-color: #77E9F3;
        text-align: center;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        '>
          <span
          style='position: relative;
          top: 9px;
          font-size: 45pt;
          font-weight: bolder;
          color: #fff;
          '><?php echo $initials_full;?></span>
        </div>
        <br/>


        <h2 class=""><?php echo getFullname($whotheyare) . ", " . getAge($whotheyare);?></h2>

        <h5 class=""><?php echo $theirLocation?></h5>

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
        <h4><a href='start_convo.php?user=<?php echo $whotheyare;?>' style='color: white;'>Message</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='start_convo.php?user=<?php echo $whotheyare;?>' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-comment"></i></h4></a>
        </div>
        </div>

      </div><!-- end container -->


<script src="../includes/JS/signup.js"></script>

</body>
</html>
