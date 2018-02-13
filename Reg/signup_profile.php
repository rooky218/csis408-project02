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
           
            <h2 class="text-center test" style="">Complete your profile</h2>
          
            <br/>
          
           <!--First Name Input -->
            <label for="firstName"
                   class="label-input-style">First Name</label>
            <input type="text" 
                   id="fName" 
                   class="form-control signup-ben" 
                   name="fName" 
                   value="<?php echo $_SESSION["return_fn"];?>" 
                   placeholder="John">      

          <!--Last Name Input -->
            <label for="lastName"
                   class="label-input-style">Last Name</label>
            <input type="text" 
                   id="lName" 
                   class="form-control signup-ben" 
                   name="lName" 
                   value="<?php echo $_SESSION["return_fn"];?>" 
                   placeholder="Smith">  
          
           <!--Phone Number Input -->
            <label for="phone"
                   class="label-input-style">Phone Number</label>
            <input type="text" 
                   id="phone" 
                   class="form-control signup-ben" 
                   name="phone" 
                   value="<?php echo $_SESSION["return_fn"];?>" 
                   placeholder="888-434-7799"> 
           
           <!--Zip Code Input -->
            <label for="zip"
                   class="label-input-style">Zip Code</label>
            <input type="text" 
                   id="zipCode" 
                   class="form-control signup-ben" 
                   name="zipCode" 
                   value="<?php echo $_SESSION["return_fn"];?>" 
                   placeholder="22603"> 
          
            <br/><br/>
          
            <div class="text-center">
                
                  <button id="login-submit" 
                          type="submit" 
                          class="btn btn-primary btn-lg btn-block">Next</button>
                  
                  
                  <a class="btn btn-default btn-lg btn-block" 
                     href="../Reg/signup.php">Go Back</a> <!-- back to login.php -->
                
                <br/>
                    <!-- Skip Profile link -->
                    <a style="color: #5fbac2;" 
                       href="../Reg/signup_done.php">Skip</a><br/><br/><br/><br/>
              </div><!-- end text center -->
          </form>
          
          
      </div><!-- end container -->
          
