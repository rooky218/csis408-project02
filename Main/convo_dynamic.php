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



  //load functions
  require("../includes/PHP/functions.php");

  //load DB
  require("../includes/PHP/DB/dblogin_final.php");

  //set variables
  $message = $_POST["user-message"];
  $roomID = $_GET["room"];
  $access_allowed = false;
  $whoAmI = $_SESSION["userIDInS"];

  //confirm if you have access to room
  require("../includes/PHP/DB/user_convo_check.php");
    //compare results from DB
  for($i = 0; $i < count($permited_userID); $i++){
    if($_SESSION["userIDInS"] == $permited_userID[$i]){
      $access_allowed = true;
    }
  }//end for
    //if not in chat, redirect home
  if($access_allowed == false){
    //if access denied, redirect to main page
    //header("location: ./main.php");
    echo "<br/><br/><h1 style='color: white;'>User Not Allowed</h1>";
  }

  //Set Page title and load header
  $title = "Chatting: " . $permited_names[1];
  //echo "Goes Here: " . $permited_names[1];
  require("../includes/headers/header_main.php");

  //if there is a sent message
  if(myisset($message)){
    //if set, upload meesage to DB
    require("../includes/PHP/DB/sent_message.php");
  }

  //load messages
  require("../includes/PHP/DB/load_message.php");



  //close connection
  //mysql_close($my_db);
?>

<script src="../includes/JS/convo.js"></script>

    <body id="main-page"
    style="margin: 55px 0 70px 0; background-color: #f2f2f2;"
    onload="setMyBox();">

    <?php
        //set header options
        $back_link = "main_dynamic.php";
        $back_icon = "glyphicon-chevron-left";
        $options_link = "#";
        $options_icon = "glyphicon-user";
        $page_title = $permited_names[1];
        require("../includes/headers/page_topnav.php");
    ?>

    <div id="convo-container" class="container">

    <?php

    if(myisset($row)){
      echo "<ul class='message-screen'>";
      while($row = $r->fetch_assoc()){
        //If user sent it
        if($row["SenderID"] == $whoAmI){
          echo "<li class='message-bbl send-bbl'>
          <p>" . $row["TextBody"] . "</p>
          </li>";
        } else {
          //sent by other user
          echo "<li class='message-bbl receive-bbl'>
          <p>" . $row["TextBody"] . "</p>
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
            action="convo_dynamic.php?room=<?php echo $roomID;?>"
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
