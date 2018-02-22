<!-- This checks POST data from login.php against Database. If login works,
this should lead to main.php. -->
<?php

   //build query
   $q = "INSERT INTO conversation (
     message,
     sentFromUserID,
     sentToUserID,
     timedatemessage,
      roomID)
     VALUES (
       \"$message\",
       \"$whoAmI\",
       '2',
       '2018-02-22 00:00:09',
       \"$roomID\");";

		$r = @mysqli_query($my_db, $q); // Run the query.

		if ($r) { // If success
        echo "<p>message sent ";

		} else { //else -- could not access data base or no results back
			// Public message:

   			echo "<p>We could not access the database</p>";
     	  // Debugging message:
    	  echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
			  echo "DB could not be reached";
		}

    //unset $q
    unset($q);
?>
