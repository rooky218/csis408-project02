<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){
    //header("location: ./../includes/headers/header_main.php");
  }

    //if not logged in add header
    $title = "Sign Up";
    require("../includes/headers/header_main.php");

    //load functions
    require("../includes/PHP/functions.php");

    //reset variables, if page is reloaded this will clear out values
    $invalid_name = false; //return for non-letters
    $invalid_phone = false; //return for invalid Phone
    $invalid_zip = false; //return for invalid zipCode
    $invalid_missing = false; //return for some fields no complete
    $counter = 0; //used to track if fields are not completed

    //set form data
    $firstNameIn = $_POST["fName"];
    $lastNameIn = $_POST["lName"];
    $phoneIn = $_POST["phone"];
    $zipIn = $_POST["zipCode"];


    //this is pre-validation format for testing. Validation logic starts on line 71
    if(myisset($firstNameIn)
    && myisset($lastNameIn)
    && myisset($phoneIn)
    && myisset($zipIn)){
      $_SESSION["firstNameInS"] = $firstNameIn;
      $_SESSION["lastnameInS"] = $lastNameIn;
      $_SESSION["phoneInS"] = $phoneIn;
      $_SESSION["zipInS"] = $zipIn;

      //redirect to next page
      header("location: ./signup_done.php");

    } else {
      //if not all fields are NOT entered, check if any fields were entered
      if(myisset($firstNameIn)){
        $counter++;
      }
      if(myisset($lastNameIn)){
        $counter++;
      }
      if(myisset($phoneIn)){
        $counter++;
      }
      if(myisset($zipIn)){
        $counter++;
      }

      //if counter is > 0, return error message
      //else, show page as normal
      if($counter > 0){
        //return error Message
        $invalid_missing = true;
      }
    }



    //check null
    //NOTE: this page can be skipped, but if a user choose to
    //enter it, then all data is required
    /*
    if(myisset($firstNameIn)
    && myisset($lastNameIn)
    && myisset($phoneIn)
    && myisset($zipIn)){
      //if all values set, verify data
      if(Firstname and lastname only letters && is under max length){
        //firstname and lastname are valid
        if(phonein is a valid phone number){
          //phone is correct
          if(zipin is valid){
            //all data verified, store in session_start
            $_SESSION["firstNameInS"] = $firstNameIn;
            $_SESSION["lastnameInS"] = $lastNameIn;
            $_SESSION["phoneInS"] = $phoneIn;
            $_SESSION["zipInS"] = $zipIn;

            //redirect to next page
            header("location: ./signup_done.php");

          } else {
            //zip is not correct format
            //return error message
            $invalid_zip = true;

          }
        } else {
          //phone is error_incorrect
          //return error message
          $invalid_phone = true;
        }

    } else {
      //firstname and/or lastname did not meet critera
      //return error message
      $invalid_name = true;
    }
  } else {
    //it not all fields set, see what is set
    if(myisset($firstNameIn))
      $counter++;
    if(myisset($lastNameIn))
      $counter++;
    if(myisset($phoneIn))
      $counter++;
    if(myisset($zipIn))
      $counter++;

    //if counter is > 0, return error message
    //else, show page as normal
    if($counter > 0){
      //return error Message
      $invalid_missing = true;
    }
  }
  */

 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="sign-bg">

      <div class="container" style="padding: 30px;">

            <h2 class="text-center test" style="">Complete your profile</h2>

            <br/>

            <!-- form submits to own page -->
            <form id=""
                method="post"
                action="signup_profile.php"
                name="signup-frm"
                onsubmit="return validateForm()">

             <!--First Name Input -->
              <label for="firstName"
                     class="label-input-style">First Name</label>
              <input type="text"
                     id="fName"
                     class="form-control signup-ben"
                     name="fName"
                     value="<?php echo $firstNameIn;?>"
                     placeholder="John">

            <!--Last Name Input -->
              <label for="lastName"
                     class="label-input-style">Last Name</label>
              <input type="text"
                     id="lName"
                     class="form-control signup-ben"
                     name="lName"
                     value="<?php echo $lastNameIn;?>"
                     placeholder="Smith">

             <!--Phone Number Input -->
              <label for="phone"
                     class="label-input-style">Phone Number</label>
              <input type="text"
                     id="phone"
                     class="form-control signup-ben"
                     name="phone"
                     value="<?php echo $phoneIn;?>"
                     placeholder="888-434-7799">

             <!--Zip Code Input -->
              <label for="zip"
                     class="label-input-style">Zip Code</label>
              <input type="text"
                     id="zipCode"
                     class="form-control signup-ben"
                     name="zipCode"
                     value="<?php echo $zipIn;?>"
                     placeholder="22603">

              <br/><br/>

              <!-- php triggered errors -->
              <?php
                if($invalid_name == true){
                  echo "<div class='alert alert-danger'>Oops, your name can only have letters</div>";
                }

                if($invalid_zip == true){
                  echo "<div class='alert alert-danger'>Sorry, we don't understand that zip</div>";
                }

                if($invalid_phone == true){
                  echo "<div class='alert alert-danger'>Sorry, but something is wrong with your phone number</div>";
                }
                if($invalid_missing == true){
                  echo "<div class='alert alert-danger'>Looks like your missing some info,
                  you must fill in everything to proceed</div>";
                }

              ?>

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
