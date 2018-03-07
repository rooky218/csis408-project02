<!-- for new users, this is the second screen/main screen they will see. They will be asked to login or signup -->

<?php
  session_start();

  //check if already logged in
  if($_SESSION["LOGGED_IN"] == true){
    //if logged in, redirect to main page
    //header("location: ./../Main/main.php");
  }

  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");

  //Set Page title and load header
  $title = "Login"; //set page title
  require("../includes/headers/header_main.php");

  //set variables
  $email_login = $_POST["email"]; //this is now checking email
  $password_login = $_POST["password"];
  $missing_password = false;
  $missing_username = false;
  $invalid_password = false;
  $invalid_username = false;
  $did_not_exist = false;

  //check for POST Data
  if(myisset($email_login && $password_login)){
    //if POST is set -- run db login query
    require("../includes/PHP/DB/loginscript.php");

  } elseif(myisset($email_login)){
    //return error - password missing
    $missing_password = true;
  } elseif(myisset($password_login)){
    //return error message - username missing
    $missing_username = true;
  }

 ?>

<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">


<body id="menu-page">

    <!-- page header -->
    <div class="top-m">
        <br/><br/><br/><br/><br/>
        <h1 class="text-center" style="color: white;">Chat App</h1>
    </div>

    <div class="container" style="padding: 30px;">


        <!-- Login Form -->
        <form method="post" action="login.php" name="login-frm" onsubmit="return validateForm()">

             <!-- Email In -->
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input id="email"
                       name="email"
                       type="text"
                       class="form-control login-ben"
                       placeholder="Email"/>
            </div>

            <br/>

            <!-- Password In -->
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input id="password"
                       name="password"
                       type="text"
                       class="form-control login-ben"
                       placeholder="Password"/>
            </div>

            <br/><br/>

            <!-- php triggered errors -->
            <?php
                if($missing_password == true){
                echo "<div class='alert alert-danger'>Please enter your password</div>";
                }

                if($missing_username == true){
                echo "<div class='alert alert-danger'>Please enter your email</div>";
                }

                if($did_not_exist == true){
                echo "<div class='alert alert-danger'>Email does not exist</div>";
                }

                //should add an error for too many login attempts
            ?>

                <!-- js triggered errors-->
                <!-- email is invalid -->
                <div id="alert-invalid-danger" class="alert alert-danger" style="display: none;">
                characters not allowed
                </div>

                <!-- js triggered -->
                <!-- not all fields filled in -->
                <div id="alert-missing-danger" class="alert alert-danger" style="display: none;">
                Please fill in all fields
                </div>

                <!-- js triggered -->
                <!-- too many login attempts -->
                <div id="alert-block-danger" class="alert alert-danger" style="display: none;">
                Too many logins attempted, please try again later
                </div>

                <!-- submit button -->
                <div class="text-center">

                    <button id="login-submit" type="submit" class="btn btn-default btn-lg btn-block">LOG IN</button>

                    <br/>

                    <!-- forget password link -->
                    <a style="color: #5fbac2;" href="#">Forgot password?</a><br/><br/>

                    <!-- new user signup link -->
                    <a style="color: #5fbac2;" href="../Reg/signup.php">New User?</a><br/><br/><br/><br/>

                    <p style="color: #adadad; font-size: 8pt;">Benjamin Walker | Shane Torres | Matthew Schultz | Holly Smith<br/>CSIS 408 - Project 02</p>

                </div><!-- end text center -->

            </form>
    </div><!-- end container -->


    <script src="../includes/JS/login.js"></script>

    </body>
</html>
