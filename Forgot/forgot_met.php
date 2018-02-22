<?php
  session_start();

    //check if already logged in send to main
    if($_SESSION["LOGGED_IN"] == true){

    }

    //if not logged in add header
    $title = "Verify your Email"; //set page title
    require("../includes/headers/header_main.php");

    //load functions
    require("../includes/PHP/functions.php");

    //set variables
    $user_code = $_POST["confirm_code"];
    $invalid_code = false;
    $change_display = false;

    //echo for testing
    echo "<p class='test'> " . $_SESSION["verify_email"] . "</p>";

    //set or add to counter
    //counter counts how many times a user has submitted a code
    //if counter reaches 3, user may not try again
    //NOTE: this is not the best way to count this, session
    //can be reset by user, ideally, we would update the DB
    //with each count
    if(myisset($_SESSION['load_counter'])){
      $_SESSION['load_counter'] = $_SESSION['load_counter'] + 1;
    } else {
      $_SESSION['load_counter'] = 1;
    }


    //if user attempts to resend 3 times - lock account
    // 4 is used because on first load, counter starts at 1
    //thus allowing 3 attempts
    if($_SESSION['load_counter'] <= 100){
      //compare results
      if(myisset($user_code)){
        //if user form submitted
        if($_SESSION["verify_email"] == $user_code){
            //if code matched
            //submit query to DB with verified status

            //unset variables
            unset($_SESSION["verify_email"]);
            unset($_POST["confirm_code"]);

            //redirect to confirm screen
            header("location: ./verify_confirm.php");

        } else {
            //if code does not match
            //return error message
            $invalid_code = true;
        }
      }
    } else {
      //user has made 3 attempts
      //return error message
      //$invalid_exceeded_attempts = true;
      $change_display = true;
    }


 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="login-bg">

      <div class="container" style="padding: 30px;">

        <!-- back to last page icon link -->
        <a class="glyphicon glyphicon-chevron-left ben-back-icon"
           href="#"
           style="position: absolute;
                  top: 40px;
                  left: 20px;
                  color: #adadad;
                  font-size: 18pt;"></a>


        <h2 class='text-center test'>Password Reset</h2>
        <br/>
        <h4 class='text-center test'>Please enter your phone or email to proceed.</h4>


          <br/><br/>



          <!-- collapsing panel -->
          <div class="panel-group" id="accordion">
              <div class="panel panel-default" style="border: none;">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse"
                       data-parent="#accordion"
                       href="#collapse1">Phone</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div style="background-color: #4b2840;" class="panel-body">

                    <h4 style="color: white;">Enter your phone number to proceed</h4>

                    <br/><br/>

                    <form id=""
                          method="post"
                          action="verify.php"
                          name="signup-frm"
                          onsubmit="return validateForm()">


                          <input type="text"
                                 id="confirm_code"
                                 class="form-control"
                                 name="confirm_code"
                                 placeholder="8883234000">

                          <br/>

                          <button id="login-submit"
                                  type="submit"
                                  class="btn btn-primary btn-lg btn-block">Submit</button>

                    </form>



                  </div>
                </div>
              </div>
            </div>


<!-- collapsing panel -->
<div class="panel panel-default">
<div class="panel-heading">
   <h4 class="panel-title">
   <a data-toggle="collapse"
      data-parent="#accordion"
      href="#collapse2">Email</a>
   </h4>
</div>

<div id="collapse2"
   class="panel-collapse collapse">
<div class="panel-body">

<p>Enter your email to proceed</p>

<br/><br/>

<form id=""
method="post"
action="verify.php"
name="signup-frm"
onsubmit="return validateForm()">


<input type="text"
id="confirm_code"
class="form-control"
name="confirm_code"
placeholder="000000">

<br/>

<button id="login-submit"
type="submit"
class="btn btn-primary btn-lg btn-block">Submit</button>

</form>



</div>
</div>
</div>
</div>
</div>
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
