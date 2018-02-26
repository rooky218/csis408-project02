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
        echo "helllo world";
        //save users into array
        $convosID[$i] = $row["roomID"];
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
