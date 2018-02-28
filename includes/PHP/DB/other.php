<?php

  //set variables
  $whoAmI = $_SESSION["userIDInS"];

  //build Query
  //return all the rooms I am in
  $q =
    "SELECT DISTINCT roomID
    FROM conversation
    WHERE sentFromUserID = \"$whoAmI\"
    OR sentToUserID = \"$whoAmI\";";

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
        echo "<br/>RoomID: " . $row["roomID"];

        //return results from second q
        //return all information relating to a specific room
        $q2 = "SELECT * FROM conversation WHERE roomID = \"$extract_room\";";
        $r2 = @mysqli_query($my_db, $q2);
        if ($r2){
          echo "<br/>".$row2["roomID"];
        $row2 = mysqli_fetch_array($r, MYSQLI_ASSOC);

        $row2 = $r2->fetch_assoc();
        echo "<br/>".$row2["roomID"];


        //output results to page
        echo "<a href='convo_dynamic.php?room=".$row2["roomID"]."
            'class='list-group-item list-group-item-action'
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
