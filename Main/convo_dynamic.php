<?php
  session_start();

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

  //set variables
  $message = $_POST["user-message"];
  $roomID = $_GET["room"];
  $access_allowed = false;
  $whoAmI = $_SESSION["userIDInS"];

  //Who is in room
  $whoIsHere = whoInRoom($roomID);
  $whoIsHere2 = whoInRoom($roomID); //User id exclude

  //echo print_r($whoIsHere2);

  //Set permissions, remove primary user from array
  for($i = 0; $i < count($whoIsHere); $i++){
    if($whoIsHere[$i] == $whoAmI){
      $access_allowed = true;
      $whoIsHere2[$i] = null;
    }
  }

  //if not allowed, kick out
  if($access_allowed == false){
    echo "User Not Allowed";
    //header(./main_dynamic.php)
  }

  //set title, and menu title with OTHER user Full Names
  $title = null;
  for($i = 0; $i <= count($whoIsHere2); $i++){
    if($title == null){
      if($whoIsHere2[$i] != null){
        $title = getFullname($whoIsHere2[$i]);
      }
    } else {
      if($whoIsHere2[$i] != null){
        $title = $title . ", " . getFullname($whoIsHere2[$i]);
      }
    }
  }

  //Set Page title and load header

  require("../includes/headers/header_main.php");

  //if there is a sent message
  if(myisset($message)){
      //send message will go to each user in room (internal loop in function)
      sendMessage($roomID, $message);
  }

  //load messages
  //require("../includes/PHP/DB/load_message.php");
  //getMessages($roomID, $whoAmI);




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
        $options_link = "other_list.php?room=". $roomID;
        $options_icon = "glyphicon-user";
        $page_title = $title;
        require("../includes/headers/page_topnav.php");
    ?>

    <div id="convo-container" class="container">

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


      <script>

      var myVar = setInterval(loadMessages, 1000);

    function loadMessages() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("convo-container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","test4.php?<?php echo "room=" . $roomID . "&user=" . $whoAmI;?>",true);
        xmlhttp.send();
    }

    var myVar2 = setInterval(function() {
      $("html, body").animate({ scrollTop: 9999 }, 'fast');
    }, 1000);

      </script>

    </body>
</html>
