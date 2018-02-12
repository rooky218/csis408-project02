<!-- for new users, this is the second screen/main screen they will see. They will be asked to login or signup -->

<?php
  session_start();

  //check if already logged in
  if($_SESSION["LOGGED_IN"] == true){
    header("location: ./../index.php");
    $_SESSION["Alert_already_logged_in"] = true;
  }

  //Set Page title and load header
  $title = "Login"; //set page title
  require("../includes/headers/header_main.php");

 ?>

<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">


<body id="login-bg">

    <!-- page header -->
    <div style="height:250px;">
        <br/><br/><br/><br/><br/>
        <h1 class="text-center" style="color: white;">Chat App</h1>
    </div>
      
    <div class="container" style="padding: 30px;">
          
        
        <!-- Login Form -->
        <form method="" action="" name="login-frm" onsubmit="return validateForm()">
            
             <!-- Email In -->
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input id="username" 
                       name="uName" 
                       type="text" 
                       class="form-control login-ben" placeholder="Email"/ 
                       value="<?php echo $_SESSION["return_un"];?>">
            </div>
            
            <br/>
            
            <!-- Password In -->
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input id="password" 
                       name="pword" 
                       type="text" 
                       class="form-control login-ben" 
                       placeholder="Password" 
                       value="<?php echo $_SESSION["return_pw"];?>" />
            </div>
            
            <br/><br/>
        
            <!-- php triggered errors -->
            <?php
                if($_SESSION["error_incorrect"] == true){
                echo "<div class='alert alert-danger'>Username or password is incorrect</div>";
                }

                if($_SESSION["error_missing"] == true){
                echo "<div class='alert alert-danger'>Please fill in all the fields</div>";
                }

                if($_SESSION["error_nouser"] == true){
                echo "<div class='alert alert-danger'>Username does not exist</div>";
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

<?php
//clear errors - errors will disappear on page reload
  unset($_SESSION["error_incorrect"]);
  unset($_SESSION["error_missing"]);
  unset($_SESSION["error_nouser"]);
  unset($_SESSION["return_un"]);
  unset($_SESSION["return_pw"]);
?>
