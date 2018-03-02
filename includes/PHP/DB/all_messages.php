<?php
  //load all messages a user is onto HOME Message screen


  //set variables
  $whoAmI = 3; //$_SESSION["userIDInS"];

  //build Query
  //return all the rooms I am in
  $q =
    "SELECT RoomID,
    MessageID,
    TextBody,
    DeliverTime
    FROM Messages
    WHERE SenderID=\"$whoAmI\"
    OR RecipientID=\"$whoAmI\"
    GROUP BY RoomID;";

  //Run Q
  $r = @mysqli_query($my_db, $q);

  //Process
  $i = 0;

  if ($r){
    while($row1 = $r->fetch_assoc()) {

        $myMessageID = $row1["MessageID"];
        //find who sent and recieved
        $q2 = "SELECT SenderID, RecipientID FROM Messages WHERE MessageID=\"$myMessageID\"";
        $r2 = @mysqli_query($my_db, $q2);
        $row2 = $r2->fetch_assoc();

        $sentFrom = $row2["SenderID"];
        $sentTo = $row2["RecipientID"];

        if($sentTo == $whoAmI){
          //return username of other user
          $q3 = "SELECT CONCAT(FirstName,' ',LastName) AS FullName FROM Users WHERE UserID=\"$sentFrom\";";
          $r3 = @mysqli_query($my_db, $q3);
          $row3 = $r3->fetch_assoc();
          $sentToUsername = $row3["FullName"];
        } else {
          //return username of other user
          $q3 = "SELECT CONCAT(FirstName,' ',LastName) AS FullName FROM Users WHERE UserID=\"$sentTo\";";
          $r3 = @mysqli_query($my_db, $q3);
          $row3 = $r3->fetch_assoc();
          $sentToUsername = $row3["FullName"];
        }

        //output results to page

        echo "    <a href='convo_dynamic.php?room=" . $row1["RoomID"] . "'
            class='list-group-item'
            style='background-color: rgba(255, 255, 255, 0.5);'>
              <div class='media'>
              <div class='media-left'>
                <div style='width: 60px;
                height: 60px;
                background-color: #77E9F3;
                text-align: center;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                '>
                  <span
                  style='position: relative;
                  top: 11px;
                  font-size: 21pt;
                  color: #fff;
                  font-weight: bold;'>
                  BW</span>
                </div>
                  </div>
              <div class='media-body' style='color: black;'>
                  <h4 class='media-heading'>". $sentToUsername ."</h4>
                  <p>". $row1["TextBody"] ."</p>
              </div>
              </div>
              </a>";

          $sentToUsername = NULL;
      //} else {
        //echo "<br>inner DB request failed";
      //}
      //  $i++;
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
