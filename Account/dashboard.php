<!-- 
This is the user profile view. This is for the user viewing THEIR OWN PROFILE, not other users.

When viewing other users, other infomation will be displayed, with buttons to Message and Add friend
-->

<?php
  session_start();

  //check if already logged in send to main
  if($_SESSION["LOGGED_IN"] == true){
    //header("location: ./../includes/headers/header_main.php");
    //$_SESSION["Alert_already_logged_in"] = true;
  }

    //if not logged in add header
    $title = "My Account"; //set page title
    require("../includes/headers/header_main.php");
    //require("includes/header_logged_out.php"); //load page header
    //require("includes/header_logged_in.php"); //load page header
 ?>



<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

  <body id="sign-bg">
      
    <!-- image container -->
    <div class="account-background"></div><!--blur profile image-->
    <div class="account-transparent"></div><!-- dark overlay -->
      
    <div class="content-container">
        <br/>
        <!-- back to last page icon link -->
        <a class="glyphicon glyphicon-chevron-left ben-back-icon"
           href="#"
           style="position: absolute;
                  top: 40px;
                  left: 20px;
                  color: #adadad;
                  font-size: 18pt;"></a>
        
        <!-- edit profile settings -->
        <a class="glyphicon glyphicon-cog ben-back-icon"
           href="#"
           style="position: absolute;
                  top: 40px;
                  left: 350px;
                  color: #adadad;
                  font-size: 18pt;"></a>
        
        
        <h3 class="">Profile</h3>
        
        <img src="../includes/photos/19884356_10154716410676409_7622955142588271372_n.jpg" 
            height="125px" 
            width="125px" 
            class="img-circle">
              
        <h2 class="">Ben Walker</h2>
            
        <h5 class="">Lynchburg, Virginia</h5>
          
      </div><!-- end content container -->
      
      
      
           <!-- navbar 
          <header>
            <!-- top nav bar 
            <nav class="navbar navbar-expand-md bg-primary navbar-dark">
              <!-- Brand 
              <a class="navbar-brand" href="#">Conversations</a>
                
            </nav>
        
        </header>
        -->
   <!--   
    <br/>
    <ul class="nav nav-pills text-center" >
        <div class="col-xs-4">
            <li class="active">
                <a data-toggle="pill" href="#home">Contact</a>
            </li>
        </div>
        <div class="col-xs-4">
            <li>
                <a data-toggle="pill" href="#menu1">Settings</a>
            </li>
        </div>
        <div class="col-xs-4">
            <li>
                <a data-toggle="pill" href="#menu2">Links</a>
            </li>
        </div>
    </ul>
      
      <br/>
      
      <ul class="nav nav-pills nav-justified">
  <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
  <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
</ul>
          
      
    <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3 class="test">HOME</h3>
      <p class="test">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3 class="test">Menu 1</h3>
      <p class="test">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3 class="test">Menu 2</h3>
      <p class="test">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
    
      -->
      <div class="container" style="padding: 30px;">
          <br/>
          <h3 class="test" style="margin-top: 0;">Contact Info</h3>
          
          <!-- contact settings icon -->
          <a class="glyphicon glyphicon-cog ben-back-icon"
           href="#"
           style="position: absolute;
                  top: 450px;
                  left: 350px;
                  color: #adadad;
                  font-size: 18pt;"></a>
          <br/>
          <h4 class="test-2">Username<br/><small style="color: #77E9F3;">rooky218</small></h4>
          <br/>
          <h4 class="test-2">Phone<br/>
              <small style="color: #77E9F3;">(540)514-8370&nbsp; &nbsp; &nbsp;</small>
              <span class="label label-success">Verified</span></h4>
          <br/>
          
          
          <h4 class="test-2">Email<br/>
              <small style="color: #77E9F3;">bwalker35@liberty.edu&nbsp; &nbsp; &nbsp;</small>
              <span class="label label-default">Unverified</span></h4>
          <br/><br/>
          
          <h3 class="test">Settings</h3>
          <br/>
          <h4 class="test-2">Pin Screen</h4>
          <br/>
          <h4 class="test-2">Logout</h4>
          <br/>
          <h4 class="test-2">Help</h4>
          <br/>
          <h4 class="test-2">Contact the Developer</h4>
          <br/><br/>
          
          
          
          
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
          <h3 class="test">Benjamin Walker</h3>
                
          <hr/>
          

                
          

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
