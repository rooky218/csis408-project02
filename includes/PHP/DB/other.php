<?php

  //set variables
  $whoAmI = $_SESSION["userIDInS"];

  //build Query
  $q =
    "SELECT DISTINCT roomID
    FROM conversation
    WHERE sentFromUserID = \"$whoAmI\";";

  //Run Q
  $r = @mysqli_query($my_db, $q);

  //Process
  $i = 0;
  if ($r){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    while($row = $r->fetch_assoc()) {
        echo "<br/>start loop ";
        //save users into array
        $extract_room = $row["roomID"];
        echo "<br/>There are " . count($extract_room) . " rooms";

        //return results from second q
        $q2 = "SELECT * FROM conversation WHERE roomID = \"$extract_room\";";
        $r2 = @mysqli_query($my_db, $q2);
        if ($r2){
          echo "<br/> Results 2 worked";
        $row2 = mysqli_fetch_array($r, MYSQLI_ASSOC);

        //output results to page
        echo "<a href='convo_dynamic.php?room=".$row2["roomID"]."'
              class='list-group-item list-group-item-action'
              style='height: 75px;'>
            <img src='../includes/photos/19884356_10154716410676409_7622955142588271372_n.jpg'
            class='rounded-circle float-left'
            style='margin-right: 25px;'
            height='50px'
            width='50px'
            alt='user-photo'>
            User number here: " . $row2['sentFromUserID'] . "<br/>
            <small>Message here: " . $row2["message"] . "</small>
        </a>";

        echo "<a href='#' class='list-group-item list-group-item-action' style='height: 75px;'>
            <img src='../includes/photos/19884356_10154716410676409_7622955142588271372_n.jpg' class='rounded-circle float-left' style='margin-right: 25px;' height='50px' width='50px' alt='user-photo'>
            Ben Walker<br/>
            <small>This is what a sample text could look like, but...</small>
        </a>";

      } else {
        echo "<br>inner DB request failed";
      }
        $i++;
    }//end while
  } else {
    //DB could not be reached
    echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
    echo "DB could not be reached";
  }

  //close DB connection
  //mysql_close($my_db);

  //unset $q
  unset($q);
?>
