<!-- lead in from welcome - this is the main page, similar to a home page. From here we will see most recent conversations compiled in a list. There should be a navigation menu at the bottom to take to to where you want to go, a search bar at the top to search for conversations -->
<?php
  session_start();

  //check if already logged in
  if($_SESSION["LOGGED_IN"] == true){
    //if logged in, redirect to main page
    //header("location: ./../Main/main.php");
  }

  //Set Page title and load header
  $title = "Mainpage"; //set page title
  require("../includes/headers/header_main.php");



  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_test.php");

  //set variables


  //logic


?>


<body>
    <div class="container">


    <div class="list-group">

      <?php
      require("../includes/PHP/DB/other.php");

      /*

      <a href="#" class="list-group-item list-group-item-action" style="height: 75px;">
          <img src="../includes/photos/19884356_10154716410676409_7622955142588271372_n.jpg" class="rounded-circle float-left" style="margin-right: 25px;" height="50px" width="50px" alt="user-photo">
          Ben Walker<br/>
          <small>This is what a sample text could look like, but...</small>
      </a>
      <!-- text inside the small brackets will show most recent text -->
      <a href="#" class="list-group-item list-group-item-action" style="height: 75px;">
          <img src="../includes/photos/default-user.png" class="rounded-circle float-left" style="margin-right: 25px;" height="50px" width="50px" alt="user-photo"> Holly Smith<br/>
          <small>This is what a sample text could look like, but...</small>
      </a>

      */
      ?>


        <!-- JS - if no image, image code is changed to default user -->


    </div>

</body>
</html>
