<!--
This is the user profile view. This is for the user viewing THEIR OWN PROFILE, not other users.

When viewing other users, other infomation will be displayed, with buttons to Message and Add friend
-->

<?php
  session_start();

    //check if already logged in send to main
    if($_SESSION["LOGGED_IN"] != true){
      header("location: ./../Login/login.php");
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

    //if not logged in add header
    $title = "My Account"; //set page title
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
           href="../Main/main_dynamic.php"
           style="position: absolute;
                  top: 40px;
                  left: 7%;
                  color: #adadad;
                  font-size: 18pt;"></a>

        <!-- edit profile settings -->
        <a class="glyphicon glyphicon-cog ben-back-icon"
           href="settings.php?page=profile-change"
           style="position: absolute;
                  top: 40px;
                  left: 85%;
                  color: #adadad;
                  font-size: 18pt;"></a>


        <h3 class="">Profile</h3>

        <img src="../includes/photos/default-user.png"
            height="125px"
            width="125px"
            class="img-circle">

        <h2 class=""><?php echo $_SESSION["firstNameInS"] . " " . $_SESSION["lastnameInS"] . ", " . getAge();?></h2>

        <h5 class=""><?php echo getLocation();?></h5>

        </div><!-- end content container -->

        <br/>

        <?php //echo "<span style='color: white;'>" . $_SESSION["email_V_InS"]."</span>";?>

        <!-- Username -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Username</h4>
        <a href='settings.php?page=username' style='color: #77E9F3;'><?php echo $_SESSION["userNameInS"];?></a>
        </div>
        <div class="media-right media-top">
          <?php if($_SESSION["AdminAccess"] == true){
          echo "<h4><span class='label label-primary'>Admin</span></h4>";
        };
        ?>
        </div>
        </div>
        </div>

        <!-- Phone -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Phone</h4>
        <?php
        //check if phone set
        if($_SESSION["phoneInS"] == "0"){
          echo "<a href='#outoftime' style='color: #77E9F3;'>Add phone</a>";
        } else {
          echo "<a href='#outoftime' style='color: #77E9F3;'>" . $_SESSION["phoneInS"] . "</a>";
        }
        ?>
        </div>
        <div class="media-right media-top">
        <?php
        //check it phone verified
        if(!myisset($_SESSION["phone_a_InS"])){
          echo "<a href='#phoneV'><h4><span class='label label-default'>Unverified</span></h4></a>";
        } else {
          echo "<h4><span class='label label-success'>Verified</span></h4>";
        }
        ?>
        </div>
        </div>

        <!-- Email -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Email</h4>
        <?php
        //check if email set
        if($_SESSION["emailInS"] == "0"){
          echo "<a href='#outoftime' style='color: #77E9F3;'>Add email</a>";
        } else {
          echo "<a href='#outoftime' style='color: #77E9F3;'>" . $_SESSION["emailInS"] . "</a>";
        }
        ?>
        </div>
        <div class="media-right media-top">
        <?php
        //check it email verified
        if($_SESSION["email_V_InS"] == 0){
            echo "<a href='#emailV'><h4><span class='label label-default'>Unverified</span></h4></a>";
        } else {
            echo "<h4><span class='label label-success'>Verified</span></h4>";
        }
        ?>
        </div>
        </div>

        <!-- Zip -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Location</h4>
        <a href='settings.php?page=location-change' style="color: #77E9F3;">Change Location</a>
        </div>
        <div class="media-right media-top">
        <a href='settings.php?page=location-change' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-globe"></i></h4></a>
        </div>
        </div>

        <!-- Password -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4 class="media-heading">Password</h4>
        <a href='settings.php?page=password-change' style="color: #77E9F3;">Change Password</a>
        </div>
        <div class="media-right media-top">
        <a href='settings.php?page=password-change' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-lock"></i></h4></a>
        </div>
        </div>


        <hr style="width: 80%; border-color: #adadad;" />

        <!-- Logout -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='../Login/logout.php' style='color: white;'>Logout</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='../Login/logout.php' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-log-out"></i></h4></a>
        </div>
        </div>

        <!-- Help -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#help' style='color: white;'>Help</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#help' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-question-sign"></i></h4></a>
        </div>
        </div>

        <!-- Help -->
        <div class="media" style="padding: 0 20px 0 20px; color: white">
        <div class="media-body">
        <h4><a href='#feedback' style='color: white;'>Send Feedback</a></h4>
        </div>
        <div class="media-right media-top">
        <a href='#feedback' style="color: #f2f2f2;"><h4><i class="glyphicon glyphicon-comment"></i></h4></a>
        </div>
        </div>
        <br/>


      </div><!-- end container -->


<script src="../includes/JS/signup.js"></script>

</body>
</html>

<?php
  unset($_SESSION["error_incorrect"]);
  unset($_SESSION["error_missing"]);
  unset($_SESSION["error_nouser"]);
  unset($_SESSION["return_un"]);
  unset($_SESSION["return_pw"]);
?>
