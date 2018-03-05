<?php

  //build Query
  $q =
    "SELECT DISTINCT SenderID, RecipientID
    FROM Messages
    WHERE roomID = \"$roomID\";";

  //Run Q
  $r = @mysqli_query($my_db, $q);

  //Process
  $i = 0;
  if ($r){
    while($row = $r->fetch_assoc()) {
        //save users into array
        $permited_userID[$i] = $row["SenderID"];
        $i++;
        $permited_userID[$i] = $row["RecipientID"];
        $i++;
    }//end while
  } else {
    //DB could not be reached
    echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
    echo "DB could not be reached";
  }

  //find names of other people

  for($i = 0; $i < count($permited_userID); $i++){
    if($_SESSION["userIDInS"] != $permited_userID[$i]){
      $q2 =
        "SELECT Username, CONCAT(FirstName,' ',LastName) AS FullName
        FROM Users
        WHERE UserID = \"$permited_userID[$i]\";";

      $r2 = @mysqli_query($my_db, $q2);

      if($r2){
        $row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
        $permited_usernames[$i] = $row2["Username"];
        $permited_names[$i] = $row2["FullName"];
        //echo "<br/>" . $permited_names[$i];
      }
    }
  }

?>
