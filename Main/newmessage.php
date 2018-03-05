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


  //Set Page title and load header
  $title = "New Conversation";
  //echo "Goes Here: " . $permited_names[1];
  require("../includes/headers/header_main.php");

  //close connection
  //mysql_close($my_db);
?>

<script src="../includes/JS/convo.js"></script>

    <body id="main-page"
    style="margin: 110px 0 0 0; background-color: #f2f2f2;"
    onload="setMyBox();">

    <?php
        //set header options
        $back_link = "main_dynamic.php";
        $back_icon = "glyphicon-chevron-left";
        $options_link = NULL;
        $options_icon = NULL;
        $page_title = "New Conversation";
        require("../includes/headers/page_no_right.php");
    ?>

    <div class="container-fluid">

      <a href='convo_dynamic.php?room=" . $row1["RoomID"] . "'
          class='list-group-item'
          style='background-color: rgba(255, 255, 255, 0.85);'>
            <div class='media'>
            <div class='media-left'>
              <div style='width: 40px;
              height: 40px;
              margin-top: 7px;
              background-color: #737373;
              text-align: center;
              border-radius: 50%;
              -webkit-border-radius: 50%;
              -moz-border-radius: 50%;
              '>
                <span
                style='position: relative;
                top: 9px;
                font-size: 14pt;
                color: #fff;
                '>
                BW</span>
              </div>
                </div>
            <div class='media-body' style='color: black;'>
                <h4 class='media-heading'>Ben Walker</h4>
                <p>rooky218</p>
            </div>
            </div>
        </a>

        <a href='convo_dynamic.php?room=" . $row1["RoomID"] . "'
            class='list-group-item'
            style='background-color: rgba(255, 255, 255, 0.85);'>
              <div class='media'>
              <div class='media-left'>
                <div style='width: 40px;
                height: 40px;
                margin-top: 7px;
                background-color: #737373;
                text-align: center;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                '>
                  <span
                  style='position: relative;
                  top: 9px;
                  font-size: 14pt;
                  color: #fff;
                  '>
                  BW</span>
                </div>
                  </div>
              <div class='media-body' style='color: black;'>
                  <h4 class='media-heading'>Ben Walker</h4>
                  <p>rooky218</p>
              </div>
              </div>
          </a>


    </div><!-- end container -->

      <div class="container-fluid" >
          <div class="custom-form-search">
            <form name="myForm"
            method="post"
            action="convo_dynamic.php?room=<?php echo $roomID;?>"
            class="">
              <input type="input" class="form-control"
              id="search-bar"
              name=""
              placeholder="Type a username">

              <button id="my-button-2" type="submit"
              class="btn btn-default">Search</button>

            </form>
          </div>
      </div>



    </body>
</html>
