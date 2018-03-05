<?php
  session_start();

    //if not logged in add header
    $title = "Verify your Phone"; //set page title
    require("../includes/headers/header_main.php");

    //load functions
    require("../includes/PHP/functions.php");

    //load DB
    require("../includes/PHP/DB/dblogin_final.php");

    //load Queries
    require("../includes/PHP/DB/profile_settings/set_get.php");


    //set variables
    $user_code = $_POST["confirm_code"];
    $invalid_code = false;
    $change_display = false;
    $match = false;

    //testing only
    echo "<p class='test'>" . $_SESSION["code_array"][0] . "</p>";
    $_SESSION["phoneInA"] = 4342197737;

    //set or add to counter
    //counter counts how many times a user has submitted a code
    //if counter reaches 3, user may not try again
    //NOTE: this is not the best way to count this, session
    //can be reset by user, ideally, we would update the DB
    //with each count
    if(myisset($_SESSION['counter_pv'])){
      $_SESSION['counter_pv'] = $_SESSION['counter_pv'] + 1;
    } else {
      $_SESSION['counter_pv'] = 1;
    }

    if($_SESSION['counter_pv'] <= 4){

      //if form data submitted...
      if(myisset($user_code)){
        //if user form submitted
        for($i = 0; $i < 18; $i++){
          //run loop until match is found
          if($_SESSION["code_array"][$i] == $user_code){
            //if match Confirmed
            $phone_code_confirmed = $_SESSION["code_array"][$i];
            $phone_address_confirmed = $_SESSION["address_array"][$i];
            //UPLOAD CONFIRMED TO DB
            setPhone($_SESSION["temp-phone"]);
            setPhoneV($phone_address_confirmed);

            //send to confirm message page
            header("location: ./verify_p_confirm.php");

          }//end if
        }//end for loop

        //script only gets this far IF match not found
        //return error message
        $invalid_code = true;
      }
    } else {
      //user has made 3 attempts
      //return error message
      //$invalid_exceeded_attempts = true;
      $change_display = true;
    }

    //if user attempts to resend 3 times - lock account
    // 4 is used because on first load, counter starts at 1
    //thus allowing 3 attempts



 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="menu-page">

      <div class="container" style="padding: 30px;">

        <!-- back to last page icon link -->
        <a class="glyphicon glyphicon-chevron-left ben-back-icon"
           href="#"
           style="position: absolute;
                  top: 40px;
                  left: 20px;
                  color: #adadad;
                  font-size: 18pt;"></a>

          <?php
              if(!$change_display == true){
                //if not locked out
                echo "<h2 class='text-center test'>
                Verify Your Email</h2>";

                echo "<br/>";

                echo "<h4 class='text-center test'>An text has been sent to:<br/><br/>
                  <strong>
                    <span style='color: #77E9F3;'>" . $_SESSION["phoneInS"] . "</span></strong><br/><br/>
                  Please enter the 6 digit code to verify your phone number.
                </h4>";

              } else {
                //if locked out
                echo "<h2 class='text-center test'>
                Unable to Verify</h2>";

                echo "<br/>";

                echo "<h4 class='text-center test'>Sorry! You have made too many incorrect attempts.
                  But don't worry, you can always try again tomorrow!
                </h4>";
              }
          ?>

          <br/><br/>

          <form id=""
                method="post"
                action="verify_p.php"
                name="signup-frm"
                style="<?php
                  if($change_display == true){
                    echo 'display:none';
                  } else {
                    echo 'display:block';
                  }
                  ?>"
                onsubmit="return validateForm()">


                <input type="text"
                       id="confirm_code"
                       class="form-control verify-phone-ben"
                       name="confirm_code"
                       placeholder="000000">

                <br/><br/>

                <?php
                  //PHP error message
                  if($invalid_code == true){
                    echo "<div class='alert alert-danger'>
                          That code did not match, please try again
                          </div>";
                  }
                ?>

                <button id="login-submit"
                        type="submit"
                        class="btn btn-primary btn-lg btn-block">Submit</button>

                      <br/><br/>

                <div class="text-center">
                  <a style="color: #5fbac2;"
                      href="verify_generate.php?trouble=yes">Having Trouble?</a>

                      <br/><br/>
                </div>

          </form>

          <

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
