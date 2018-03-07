<?php
    session_start();

    //check if already logged in send to main
    if($_SESSION["LOGGED_IN"] == true){
      header("location: ./../Main/main_dynamic.php");
    }

    //if not logged in add header and set title
    $title = "Sign Up";
    require("../includes/headers/header_main.php");

    //load functions
    require("../includes/PHP/functions.php");

    //load DB
    require("../includes/PHP/DB/dblogin_final.php");

    //load Queries
    require("../includes/PHP/DB/profile_settings/set_get.php");


    //reset variables, if page is reloaded this will clear out values
    $userNameIn = "";
    $emailIn = "";
    $password1In = "";
    $password2In = "";
    $password_no_match = false; //return bool for password no match
    $username_taken = false; //return for taken userName
    $invalid_entry = false; //return for error on entry (bad characters, unallowed characters etc)

    //set inputs variables
    $userNameIn = $_POST["username"];
    $emailIn = $_POST["email"];
    $password1In = $_POST["password1"];
    $password2In = $_POST["password2"];


    //check null
    if(myisset($userNameIn)
    && myisset($emailIn)
    && myisset($password1In)
    && myisset($password2In)){
        //if all values set, next confirm password

        if($password1In == $password2In){
            //if password match, check db if Username is taken
            echo "passwords match";
            if(!checkUsername($userNameIn)){
                //1 == 1 is a temporary thing, this will be changed out
                //for a query to check the username availablilty in the database
                //if username available, save user data into session
                $_SESSION["userNameInS"] = $userNameIn;
                $_SESSION["emailInS"] = $emailIn;
                $_SESSION["passwordInS"] = $password1In;

                //continue to next page
                header("location: ./../Verify/verify_generate.php");

            } else {
                //username taken
                $username_taken = true; //trigger error message
                echo "Username already taken";
            }

        } else {
            //password did not match
            $password_no_match = true; //trigger error message
            echo "password does not match";
        }

    }



 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="menu-page">

      <div class="container" style="padding: 30px;">

          <h2 class="text-center test" style="">Sign Up</h2>
          <br/>

            <!-- form submits to own page -->
          <form id=""
                method="post"
                action="signup.php"
                name="signup-frm"
                onsubmit="return validateForm()">

                <!--User Name Input -->
                <label for="Username"
                       class="label-input-style">Username</label>
                <input type="text"
                       id="userName"
                       class="form-control signup-ben"
                       name="username"
                       value="<?php echo $userNameIn;?>"
                       placeholder="WingMan234">

                <!--Email Input -->
                <label for="Email"
                       class="label-input-style">Email</label>
                <input type="email"
                       id="email"
                       class="form-control login-ben"
                       name="email"
                       value="<?php echo $emailIn;?>"
                       placeholder="john@domain.com">


                <!--Password Input -->
                <label for="Password"
                       class="label-input-style">Password</label>
                <input type="password"
                       id="password1"
                       class="form-control signup-ben"
                       name="password1"
                       value="<?php echo $password1In;?>"
                       placeholder="">

                <!--Password Input -->
                <label for="confirm_password"
                       class="label-input-style">Confirm Password</label>
                <input type="password"
                       id="password2"
                       class="form-control signup-ben"
                       name="password2"
                       value="<?php echo $password2In?>">

              <br/><br/>


              <!-- php triggered errors -->
              <?php
                if($password_no_match == true){
                  echo "<div class='alert alert-danger'>Passwords do not match</div>";
                }

                if($username_taken== true){
                  echo "<div class='alert alert-danger'>That username is not available</div>";
                }

                if($invalid_entry == true){
                  echo "<div class='alert alert-danger'>Oops, that doesn't seem right. Please do not use these characters</div>";
                }
                if($invalid_entry == true){
                  echo "<div class='alert alert-danger'>Oops, that doesn't seem right. Please do not use these characters</div>";
                }
              ?>

              <!-- js triggered -->
              <div id="alert-invalid-danger"
                   class="alert alert-danger"
                   style="display: none;">
                characters not allowed
              </div>

              <!-- js triggered -->
              <div id="alert-missing-danger"
                   class="alert alert-danger"
                   style="display: none;">
                Please fill in all the fields
              </div>

              <!-- js triggered -->
              <div id="alert-block-danger"
                   class="alert alert-danger"
                   style="display: none;">
                Too many logins attempted, please try again later
              </div>


              <!-- buttons -->
              <div class="text-center">

                  <button id="login-submit"
                          type="submit"
                          class="btn btn-primary btn-lg btn-block">Next</button>



                  <a class="btn btn-default btn-lg btn-block"
                     href="../Login/login.php">Go Back</a> <!-- back to login.php -->

              </div><!-- end text center -->
          </form>

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
