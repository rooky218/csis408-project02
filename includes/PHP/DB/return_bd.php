<?php

  //variables
  $user = $_SESSION["userIDInS"];
  $bd = null;

   //build query
   $q =
   "SELECT BirthDate
   FROM Users
   WHERE UserID = \"$user\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if ($r) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $bd = $row["BirthDate"];

        //find age
        $today = date("Y");
        $diff = abs(strtotime($today) - strtotime($bd));
        $age = floor($diff / (365*60*60*24));

		} else {
			// Public message:

   			echo "<p>We could not access the database</p>";
     	  // Debugging message:

    	  echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
			  echo "DB could not be reached";
		}

    //unset $q
    unset($q);

?>
