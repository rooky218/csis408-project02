<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){
    //header("location: ./../includes/headers/header_main.php");
    //$_SESSION["Alert_already_logged_in"] = true;
  }

    //if not logged in add header
    $title = "Sign Up"; //set page title
    require("../includes/headers/header_main.php");
    //require("includes/header_logged_out.php"); //load page header
    //require("includes/header_logged_in.php"); //load page header
 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="sign-bg">
      
      <div class="container" style="padding: 30px;">
           
          <h2 class="text-center test" style="">Sign Up</h2>
          <br/>
    
     
          <form id="" 
                method="" 
                action="" 
                name="signup-frm" 
                onsubmit="return validateForm()">
                
                <!--User Name Input -->
                <label for="Username"
                       class="label-input-style">Username</label>
                <input type="text" 
                       id="userName" 
                       class="form-control signup-ben" 
                       name="username" 
                       value="<?php echo $_SESSION["return_fn"];?>" 
                       placeholder="WingMan234">      

                <!--Email Input -->
                <label for="Email"
                       class="label-input-style">Email</label>
                <input type="email" 
                       id="email" 
                       class="form-control login-ben"
                       name="email" 
                       value="<?php echo $_SESSION["return_em"];?>"
                       placeholder="john@domain.com">
                

                <!--Password Input -->
                <label for="Password"
                       class="label-input-style">Password</label>
                <input type="password" 
                       id="password1" 
                       class="form-control signup-ben" 
                       name="password1" 
                       value="<?php echo $_SESSION["return_pw"];?>"
                       placeholder="">
                
                <!--Password Input -->
                <label for="confirm_password"
                       class="label-input-style">Confirm Password</label>
                <input type="password" 
                       id="password2" 
                       class="form-control signup-ben" 
                       name="password2" 
                       value="<?php echo $_SESSION["return_pw"];?>">
                
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
