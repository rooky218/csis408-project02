<!-- This checks POST data from login.php against Database. If login works,
this should lead to main.php. -->
<?php

   //build query
   $q =
   "SELECT MessageID,
   TextBody,
   SenderID,
   RecipientID,
   DeliverTime
   FROM Messages
   WHERE RoomID = \"$roomID\"
   ORDER BY DeliverTime ASC;";

		$r = @mysqli_query($my_db, $q); // Run the query.

		if ($r) { // If results came back
        echo "<p>message sent ";
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    /*    while($row = $r->fetch_assoc()) {
          echo "<br> Username: ". $row["sentFromUserID"] .
          " - MessageID: " . $row["messageID"];

        }//end while */
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
<!--
echo "
<br/>messageID: " . $row["messageID"] .
"<br>Message: ". $row["message"] .
"<br>Sent From: " . $row["sentFromUserID"] .
"<br>Sent To: " . $row["sentToUserID"] .
"<br>Time/Date: " . $row["timedatemessage"] .
"<br/><br/>";

<ul class="message-screen">

<li class='message-bbl send-bbl'>
<p>Hello World</p>
</li>

<li class='message-bbl send-bbl'>
<p>How are you?</p>
</li>

<li class='message-bbl receive-bbl'>
<p>I am great</p>
</li>

<li class="message-bbl receive-bbl">
<p>How is Mary?</p>
</li>

<li class="message-bbl receive-bbl">
<p>Any news yet from the doctors?</p>
</li>

<li class="message-bbl send-bbl">
<p>They said she is doing great!</p>
</li>
</ul>

-->
