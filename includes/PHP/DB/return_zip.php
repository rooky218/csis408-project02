<?php

  //variables
  $zip = $_SESSION["zipInS"];

   //build query
   $q =
   "SELECT *
   FROM Zipcode
   WHERE zipID = \"$zip\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if ($r) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $city = $row["City"];
        $city = mb_convert_case($city, MB_CASE_LOWER, "UTF-8");
        $city = ucwords($city);
        $state = $row["State"];

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
