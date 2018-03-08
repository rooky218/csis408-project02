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

  //set variables


  //Set Page title and load header
  $title = "New Conversation";
  //echo "Goes Here: " . $permited_names[1];
  require("../includes/headers/header_main.php");

  //close connection
  //mysql_close($my_db);
?>

<script src="../includes/JS/convo.js"></script>

<script>

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("results").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("results").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "test5.php?search=" + str, true);
        xmlhttp.send();
    }
}

</script>


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

    <div id="results" class="container-fluid">

    </div><!-- end container -->

      <div class="container-fluid" >
          <div class="custom-form-search">
            <form name="myForm">
              <input type="input" class="form-control"
              id="search-bar"
              onkeyup="showHint(this.value)"
              placeholder="Type a username">
            </form>
          </div>
      </div>

    </body>
</html>
