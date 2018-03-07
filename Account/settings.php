<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){

  }

  //load functions
  require("../includes/PHP/functions.php");

  //check for unique page id, if not set, send to dashboard
  if(myisset($_GET["page"])){
    $pageID = $_GET["page"];
  } else {
    header("location: ./dashboard.php");
  }


  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //load Queries
  require("../includes/PHP/DB/profile_settings/set_get.php");


  //if not logged in add header
  $title = "Update Profile"; //set page title
  require("../includes/headers/header_main.php");

?>

<body id="menu-page">
  <div class="container" style="padding: 30px;">

<?php

    $pageID = $_GET["page"];

    //update username
    if($pageID == "username"){
      echo "
        <br/>
        <br/>
        <h3 class='test text-center'>Change Username</h3>
        <br/>
        <br/>
        <h4 class='test text-center' style='color:#77E9F3;'>
        ". getUsername() ."
        </h4>

        <br/><br/>

        <!-- Login Form -->
        <form method='post'
          action='confirm.php?page=".$pageID."'>

        <!-- Email In -->
        <label class='test'>Enter new username</label>
          <input id='username'
             name='username'
             type='text'
             class='form-control login-ben'
             placeholder='Username'
             style='text-align: center;' />
        <br/>

        <!-- Password In -->
        <label class='test'>Enter password to save change</label>
        <input id='password'
           name='password'
           type='text'
           class='form-control login-ben'
           placeholder='Password'
           style='text-align: center;' />

        <br/><br/>
        <!-- submit button -->
        <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

        <a class='btn btn-default btn-lg btn-block'
           href='dashboard.php'>Go Back</a> <!-- back to login.php -->

        </form>";
    }

    //add phone number***************************************************
    elseif($pageID == "phone-add"){

      echo "
      <br/>
      <br/>
      <h3 class='test text-center'>Add Phone Number</h3>

      <br/><br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your phone</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='Phone'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";

    }

    //update phone number***************************************************
    elseif($pageID == "phone-update"){
      echo "
      <br/>
      <br/>
      <h3 class='test text-center'>Update Phone Number</h3>
      <br/>
      <br/>
      <h4 class='test text-center' style='color:#77E9F3;'>
      ". getPhone() ."
      </h4>

      <br/><br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your phone</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='Phone'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";

    }

    //add email***************************************************
    elseif($pageID == "email-add"){
      echo "<br/>
      <br/>
      <h3 class='test text-center'>Add Email Address</h3>
      <br/>
      <br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your email</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='name@domain.com'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";
    }

    //update email***************************************************
    elseif($pageID == "email-update"){
      echo "<br/>
      <br/>
      <h3 class='test text-center'>Update Email Address</h3>
      <br/>
      <br/>
      <h4 class='test text-center' style='color:#77E9F3;'>".
         getEmail()
        . "
      </h4>

      <br/><br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your email</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='name@domain.com'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";


      //submit to confirm.php?set=email

    }

    //add zip***************************************************
    elseif($pageID == "location-add"){
      echo "
      <h3 class='test text-center'>Add your location</h3>

      <br/><br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your zipcode</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='22601'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";

    }

    //update zip***************************************************
    elseif($pageID == "location-change"){
      echo "
      <h3 class='test text-center'>Change your location</h3>
      <h4 class='test text-center' style='color:#77E9F3;'>"
      . getLocation() .
      "
      </h4>
      <br/><br/>
      <div style='text-align: center;'>
      <iframe
       width='200'
       height='200'
       frameborder='0' style=
       'border: solid #53a3aa 5px;
       border-radius: 50%;
       '
       src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDvXjk_57bj1L_7HrmtnfP3dJqcO4_LBSk
         &q=". getLocationDev() . "' allowfullscreen>
     </iframe>
     </div>


      <br/><br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Email In -->
      <label class='test'>Enter your zipcode</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='".getZip()."'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter password to save change</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";


    }

    //Change password***************************************************
    elseif($pageID == "password-change"){
      echo "<br/>
      <br/>
      <h3 class='test text-center'>Change your password</h3>
      <br/>
      <br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- Old Password In -->
      <label class='test'>Enter new password</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           placeholder='New Password'
           style='text-align: center;' />
      <br/>

      <!-- Email In -->
      <label class='test'>Confirm your new password</label>
        <input id='value2'
           name='value2'
           type='text'
           class='form-control login-ben'
           placeholder='New Password'
           style='text-align: center;' />
      <br/>

      <!-- Password In -->
      <label class='test'>Enter your current password</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Current Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";
    }

    //Change password***************************************************
    elseif($pageID == "profile-change"){
      $bd = getBirthday();
      $bdyear = substr($bd,0,4);
      $bdmonth = substr($bd,5,2);
      $bdday = substr($bd,8,2);

      echo "<br/>
      <br/>
      <h3 class='test text-center'>Update your Profile</h3>
      <br/>
      <br/>

      <!-- Login Form -->
      <form method='post'
        action='confirm.php?page=".$pageID."'>

      <!-- First Name -->
      <label class='test'>Update First Name</label>
        <input id='value1'
           name='value1'
           type='text'
           class='form-control login-ben'
           value='".getFirstname()."'
           style='text-align: center;' />
      <br/>

      <!-- Last Name -->
      <label class='test'>Update Last Name</label>
        <input id='value2'
           name='value2'
           type='text'
           class='form-control login-ben'
           value='".getLastname()."'
           style='text-align: center;' />
      <br/>

      <!-- Update Birthday -->
      <label class='test'>Update Birthday</label>
      <div style='display: flex; flex-wrap: nowrap;'>
       <select name='bd-month' class='form-control' id='sel1'
       style='width: 200px;
       height: 40px;
       padding: 3px;
       margin: 5px;
       display: inline-block;
       font-size: 14pt;
       '><option>Month</option>
       ";
       for($i=1; $i < 13; $i++){
        if($i == $bdmonth){
          echo"<option value=".$i." selected>".$i."</option>";
        } else {
          echo"<option value=".$i.">".$i."</option>";
        }
      }
       echo "
       </select>

       <select name='bd-day' class='form-control' id='sel2'
       style='width: 200px;
       height: 40px;
       padding: 3px;
       margin: 5px;
       display: inline-block;
       font-size: 14pt;
       '>
         <option>Day</option>";
         for($i=1; $i < 32; $i++){
           if($i == $bdday){
             echo"<option value=".$i." selected>".$i."</option>";
           } else {
             echo"<option value=".$i.">".$i."</option>";
           }
         }
       echo "</select>


       <select name='bd-year' class='form-control' id='sel3' style='width: 200px;
       height: 40px;
       padding: 3px;
       margin: 5px;
       display: inline-block;
       font-size: 14pt;
       '>
       <option>Year</option>";
       for($i=2018; $i > 1949; $i--){
         if($i == $bdyear){
           echo"<option value=".$i." selected>".$i."</option>";
         } else {
           echo"<option value=".$i.">".$i."</option>";
         }
       }
       echo "</select>
     </div><!-- end birthday box -->

       <br/><br/>


      <!-- Password In -->
      <label class='test'>Enter password to save changes</label>
      <input id='password'
         name='password'
         type='text'
         class='form-control login-ben'
         placeholder='Password'
         style='text-align: center;' />

      <br/><br/>
      <!-- submit button -->
      <button id='login-submit' type='submit' class='btn btn-default btn-lg btn-block'>Submit</button>

      <a class='btn btn-default btn-lg btn-block'
         href='dashboard.php'>Go Back</a> <!-- back to login.php -->

      </form>";

    }

    /*
    //if NULL
    elseif(!isset($pageID)){
      //update username script
      echo "<h1 style='color: white'>Page Does Not Exist - empty</h1>";


    //if URL WRONG
    else {
      //update username script
      echo "<h1 style='color: white'>Page Does Not Exist - wrong</h1>";
    }
    */
 ?>


</div><!-- end container -->

</body>
</html>
