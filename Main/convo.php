<!-- this is the converstion page, lead in from main. Conversation is
//displayed here. This page will facility connection to DB and output
message results here -->


<?php
  //need to which room the user is trying to access
  //confirm that user is allowed to be in room
  //if yes, load data for user
  //if no, redirect out

  session_start();

  if($_SESSION["LOGGED_IN"] == true){
    //if logged in, redirect to main page
    //header("location: ./../Main/main.php");
  }

  //Set Page title and load header
  $title = "Login"; //set page title
  require("../includes/headers/header_main.php");

  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_test.php");

  //set variables
  $message = $_POST["user-message"];
  $_POST["user-message"] = null;
  $roomID = 2; //later to be set by GET data
  $access_allowed = false;
  $whoAmI = $_SESSION["userIDInS"];
  //$permited_userID[] --- array declared and set in user_convo_check.php

  //confirm if you have access to room
    //check DB
  require("../includes/PHP/DB/user_convo_check.php");
    //compare results from DB
  for($i = 0; $i < count($permited_userID); $i++){
    echo $permited_userID[$i];
    if($_SESSION["userIDInS"] == $permited_userID[$i]){
      $access_allowed = true;
    }
  }//end for
    //if not in chat, redirect home
  if($access_allowed == false){
    //if access denied, redirect to main page
    header("location: ./main.php");
  }

  //if there is a sent message
  if(myisset($message)){
    //if set, upload meesage to DB
    echo "My message: " . $message;
    require("../includes/PHP/DB/sent_message.php");
    //reset message
    unset($message);
  }

  //load messages
  require("../includes/PHP/DB/load_message.php");



  //close connection
  //mysql_close($my_db);
?>

<script src="../includes/JS/convo.js"></script>

    <body id="login-bg" style="margin-bottom: 70px;" onload="setMyBox();">

      <?php
      //load page header
       include("../includes/headers/page_topnav.php");
       ?>

        <div id="convo-container" class="container">

<?php


  if(myisset($row)){
    echo "<ul class='message-screen'>";
  while($row = $r->fetch_assoc()){
    //If user sent it
    if($row["sentFromUserID"] == $whoAmI){
      echo "<li class='message-bbl send-bbl'>
      <p>" . $row["message"] . "</p>
      </li>";
    } else {
      //sent by other user
      echo "<li class='message-bbl receive-bbl'>
      <p>" . $row["message"] . "</p>
      </li>";
    }

  //If user received it
  }
  echo "</ul>";
  }

?>

      </div><!-- end container -->

      <div class="container-fluid">
          <div class="custom-form">
            <form name="myForm"
            method="post"
            action="convo.php"
            class="">
              <textarea class="form-control autoExpand"
              rows="1"
              id="user-message"
              name="user-message"></textarea>

              <button id="my-button-1" type="submit"
              class="btn btn-default">Submit</button>

            </form>
          </div>
      </div>



    </body>
</html>
