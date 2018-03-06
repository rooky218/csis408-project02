<?php

//check unique values
//true = match found
//false = unique value
//input value required, no default
function checkUsername($value){
  //link to DB
  global $my_db;


  //build query
  $q =
  "SELECT Username
  FROM Users
  WHERE UserName = \"$value\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $returned = $row["Username"];
    if($returned == $value){
      return true;
    } else {
      return false;
    }
  } else {
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function checkEmail($value){
  //link to DB
  global $my_db;


  //build query
  $q =
  "SELECT Email
  FROM Users
  WHERE Email = \"$value\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $returned = $row["Email"];
    if($returned == $value){
      return true;
    } else {
      return false;
    }
  } else {
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function checkPhone($value){
  //link to DB
  global $my_db;


  //build query
  $q =
  "SELECT Phone
  FROM Users
  WHERE Phone = \"$value\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $returned = $row["Phone"];
    if($returned == $value){
      return true;
    } else {
      return false;
    }
  } else {
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function checkPassword($value){
  //link to DB
  global $my_db;


  //build query
  $q =
  "SELECT Password
  FROM Users
  WHERE Password = \"$value\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $returned = $row["Password"];
    if($returned == $value){
      return true;
    } else {
      return false;
    }
  } else {
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function


//get values
function getUsername($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT Username
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["Username"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getPassword($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT UserPassword
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["UserPassword"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getLocation($zip = 0){
  //link to DB
  global $my_db;

  //variables
  if($zip == 0){
    $zip = $_SESSION["zipInS"];
  }

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
    //format text
    $city = mb_convert_case($city, MB_CASE_LOWER, "UTF-8");
    $city = ucwords($city);
    $state = $row["State"];
    $location = $city . ", " . $state;
    return $location;

  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }

  //unset $q
  unset($q);
  unset($r);
} //end function

function getLocationByUser($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

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
    //format text
    $city = mb_convert_case($city, MB_CASE_LOWER, "UTF-8");
    $city = ucwords($city);
    $state = $row["State"];
    $location = $city . ", " . $state;
    return $location;

  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }

  //unset $q
  unset($q);
  unset($r);
} //end function

function getLocationDev($zip = 0){
  //link to DB
  global $my_db;

  //variables
  if($zip == 0){
    $zip = $_SESSION["zipInS"];
  }

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
    //format text
    $city = mb_convert_case($city, MB_CASE_LOWER, "UTF-8");
    $city = ucwords($city);
    $state = $row["State"];
    $location = $city . "+" . $state;
    return $location;

  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }

  //unset $q
  unset($q);
  unset($r);
} //end function

function getZip($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT ZipCode
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["ZipCode"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }

  //unset $q
  unset($q);
  unset($r);
} //end function

function getFullname($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT FirstName, LastName
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["FirstName"] . " " . $row["LastName"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getFirstname($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT FirstName
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["FirstName"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getLastname($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT LastName
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["LastName"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getEmail($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT Email
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["Email"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getEmailV($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT Username
  FROM EmailVerified
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["EmailVerified"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getPhone($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT Phone
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["Phone"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getPhoneV($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

  //build query
  $q =
  "SELECT PhoneA
  FROM Users
  WHERE UserID = \"$user\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["PhoneA"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getBirthday($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

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
    $value = $row["BirthDate"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getAge($user = 0){
  //link to DB
  global $my_db;

  //variables
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }

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
    return $age;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

function getDatetime($messageID){
  //link to DB
  global $my_db;

  //build query
  $q =
  "SELECT DeliverTime
  FROM Messages
  WHERE MessageID = \"$messageID\";";

  // Run the query.
  $r = @mysqli_query($my_db, $q);

  // If results came back
  if ($r) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $value = $row["DeliverTime"];
    return $value;
  } else {
    // Public message:
    echo "<p>We could not access the database</p>";
    // Debugging message:
    echo "<p>" . mysqli_error($my_db);
  }
  //unset $q
  unset($q);
  unset($r);
} //end function

//set values
function setUsername($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET Username = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["userNameInS"] = getUsername();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setFirstname($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET FirstName = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["firstNameInS"] = getFirstname();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setLastname($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET LastName = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["lastnameInS"] = getLastname();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setPassword($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET UserPassword = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["passwordInS"] = getPassword();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setZip($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET ZipCode = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["zipInS"] = getZip();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setAdmin($newValue, $where){
  //only an admin can create an admin
  if($_SESSION["AdminAccess"] != true){
    return "Access Denied";
  }

  if($newValue != 1 || $newValue != 0){
    //admin can only be 1 or 0
    //admin = 1
    //usder = 0
    return "Action could not be performed. Incorrect value.";
  }

  //link to DB
  global $my_db;

   //build query
   $q =
   "UPDATE Users
   SET Admin = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //unset $q
    unset($q);
    unset($r);
}//end function

function setBirthday($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET BirthDate = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //unset $q
    unset($q);
    unset($r);
}//end function

function setEmail($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET Email = \"$newValue\",
   EmailVerified = '0'
   WHERE UserID` = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["emailInS"] = getEmail();
    $_SESSION["email_V_InS"] = getEmailV();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setName($firstName, $lastName){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET FirstName = \"$firstName\",
   LastName = \"$lastName\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["firstNameInS"] = getFirstname();
    $_SESSION["lastnameInS"] = getLastname();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setPhone($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET Phone = \"$newValue\",
   PhoneA = ''
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["phoneInS"] = getPhone();
    $_SESSION["PhoneA"] = getPhoneV();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setPhoneV($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET PhoneA = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["phone_a_InS"] = getPhoneV();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setEmailV($newValue){

  //link to DB
  global $my_db;

  //variables
  $where = $_SESSION["userIDInS"];

   //build query
   $q =
   "UPDATE Users
   SET EmailVerified = \"$newValue\"
   WHERE UserID = \"$where\";";

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //Reset Session Variable
    $_SESSION["email_V_InS"] = getEmailV();

    //unset $q
    unset($q);
    unset($r);
}//end function

function setDatetime($newValue = 0){

  //link to DB
  global $my_db;

  if($newValue == 0){
    date_default_timezone_set("America/New_York");
    $newValue = date("Y-m-d h:i:s");
  }

  return $newValue;

  /*
   //build query
   $q =
   "UPDATE Messages
   SET DeliverTime = \"$newValue\";";

   //format 2018-03-08 03:19:29

   // Run the query.
   $r = @mysqli_query($my_db, $q);

    // If results came back
		if (!$r){
			// Public message:
   		echo "<p>We could not access the database</p>";
     	// Debugging message:
    	echo "<p>" . mysqli_error($my_db);
		}

    //unset $q
    unset($q);
    unset($r);
    */
}//end function

//task oriented Queires

function whoInRoom($roomID){
  //link to DB
  global $my_db;

  //build Query

  $q =
    "SELECT SentFromID
    FROM Chatrooms
    WHERE RoomID = \"$roomID\";";

  //Run Q
  $r = @mysqli_query($my_db, $q);

  //Process results
  $i = 0;
  if ($r){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    do{
      $permited_userID[$i] = $row["SentFromID"];
      $i++;
    } while($row = mysqli_fetch_array($r));

  } else {
    //DB could not be reached
    echo "<p>" . mysqli_error($my_db) . "</p>";
    echo "DB could not be reached";
  }

  //unset variables
  unset($i);
  unset($r);
  unset($q);

  $permited_userID = array_unique($permited_userID);
  return $permited_userID;

}//end whoInRoom

function sendMessage($roomID, $message){
  //link to DB
  global $my_db;

  //variables
  $senderID = $_SESSION["userIDInS"];
  $now = setDatetime();
  //build query
  $q = "INSERT INTO messages (
    TextBody,
    DeliverTime,
    RoomID)
    VALUES (
    \"$message\",
    \"$now\",
    \"$roomID\");";

    $r = @mysqli_query($my_db, $q); // Run the query.

    if ($r) {
      $last_id = mysqli_insert_id($my_db);
      //echo "<br> Last ID: " . $last_id . "<br/>";
    } else {
      echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
      echo "DB could not be reached";
    }

    //unset $q
    unset($q);
    unset($r);

    $q = "INSERT INTO Chatrooms (
    RowID,
    RoomID,
    SentFromID,
    MessageID)
    VALUES (
    NULL,
    \"$roomID\",
    \"$senderID\",
    \"$last_id\");";

    $r = @mysqli_query($my_db, $q); // Run the query.

    if ($r) { // If success
    } else { //else -- could not access data base or no results back
      // Public message:

        echo "<p>We could not access the database</p>";
        // Debugging message:
        echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
        echo "DB could not be reached";
    }

    //unset $q
    unset($q);
    unset($r);

}

function createRoom($userID){
  //find last roomID - sort by ASC, return number, add one

  //link to DB
  global $my_db;

  //build query - return roomID
  $q =
  "SELECT *
  FROM Chatrooms
  ORDER BY RoomID
  DESC LIMIT 1";

   $r = @mysqli_query($my_db, $q);

  if($r){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $roomID = $row["RoomID"];
    $roomID++;
  } else {
  //Database no results back
  echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
  echo "DB could not be reached";
  }

   //unset $q
   unset($q);


   //build query - return roomID
   for($i = 0; $i < count($userID); $i++){
   $q =
   "INSERT INTO Chatrooms (
     RowID,
     RoomID,
     SentFromID,
     MessageID)
     VALUES (
       NULL,
       \"$roomID\",
       \"$userID[$i]\",
       NULL);";

    $r = @mysqli_query($my_db, $q);

   if($r){
     return $roomID;
   } else {
   //Database no results back
   echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
   echo "DB could not be reached";
   }
 }

}

function addUserToRoom($userID){

}

function getMessages($roomID, $sender){
  //link to DB
  global $my_db;

  //build query
  $q =
  "SELECT Messages.MessageID,
  Messages.TextBody,
  Messages.RoomID,
  Messages.DeliverTime,
  Chatrooms.SentFromID
  FROM Chatrooms
  INNER JOIN Messages
  ON Messages.MessageID = Chatrooms.MessageID
  WHERE Messages.RoomID = \"$roomID\"
  ORDER BY DeliverTime ASC;";


  $r = @mysqli_query($my_db, $q);

  if($r){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      if(myisset($row)){
        if(myisset($row["MessageID"])){
        echo "<ul class='message-screen'>";
        do{
          //If user sent it
          if($row["SentFromID"] == $sender){
          echo "<li class='message-bbl send-bbl'>
          <p>" . $row["TextBody"] . "</p>
          </li>";
          } else {
          //sent by other user
          echo "<li class='message-bbl receive-bbl'>
          <p>" . $row["TextBody"] . "</p>
          </li>";
          }
        } while($row = mysqli_fetch_array($r));

        echo "</ul>";
      }
    }
  }

   //unset $q
   unset($q);
}

function getRooms($user = 0){
  //link to DB
  global $my_db;

  //variable
  if($user == 0){
    $user = $_SESSION["userIDInS"];
  }
  //build Query

  $q =
    "SELECT Chatrooms.RoomID,
    Chatrooms.SentFromID,
    Messages.MessageID,
    Messages.TextBody,
    Messages.DeliverTime
    FROM Messages
    INNER JOIN Chatrooms
    ON Messages.MessageID = Chatrooms.MessageID
    WHERE Chatrooms.SentFromID = \"$user\"
    GROUP BY RoomID
    ORDER BY DeliverTime DESC;";

  //Run Q
  $r = @mysqli_query($my_db, $q);

  //Process results
  $i = 0;
  if ($r){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    //$whoIsHere = whoInRoom($row["RoomID"]);
    //echo "roomid: " . $row["RoomID"];
    $i = 0;
    do{
      //find who in room
      $whoIsHere = whoInRoom($row["RoomID"]);

      //create initial bubble
      $initial_first = getFirstname($whoIsHere[$i]);
      $initial_last = getLastname($whoIsHere[$i]);
      ucwords($initial_first);
      ucwords($initial_last);
      $initial_first = substr($initial_first, 0, 1);
      $initial_last = substr($initial_last, 0, 1);
      $initials_full = $initial_first . $initial_last;

      //Remove primary user from array
      for($i = 0; $i < count($whoIsHere); $i++){
        if($whoIsHere[$i] == $user){
          //$access_allowed = true;
          $whoIsHere[$i] = null;
        }
      }

      //return all names
      $title = null;
      for($i = 0; $i <= count($whoIsHere); $i++){
        if($title == null){
          if($whoIsHere[$i] != null){
            $title = getFullname($whoIsHere[$i]);
          }
        } else {
          if($whoIsHere[$i] != null){
            $title = $title . ", " . getFullname($whoIsHere[$i]);
          }
        }
      }


      //output results to page

      echo "<a href='convo_dynamic.php?room=" . $row["RoomID"] . "'
          class='list-group-item'
          style='background-color: rgba(255, 255, 255, 0.85);'>
            <div class='media'>
            <div class='media-left'>
              <div style='width: 40px;
              height: 40px;
              margin-top: 7px;
              background-color: #737373;
              text-align: center;
              border-radius: 50%;
              -webkit-border-radius: 50%;
              -moz-border-radius: 50%;
              '>
                <span
                style='position: relative;
                top: 9px;
                font-size: 14pt;
                color: #fff;
                '>
                " . $initials_full ."</span>
              </div>
                </div>
            <div class='media-body' style='color: black;'>
                <h4 class='media-heading'>". $title ."</h4>
                <p>". $row["TextBody"] ."</p>
            </div>
            </div>
            </a>";

            $i++;
    } while($row = mysqli_fetch_array($r));

  } else {
    //DB could not be reached
    echo "<p>" . mysqli_error($my_db) . "</p>";
    echo "DB could not be reached";
  }

  //unset variables
  unset($i);
  unset($r);
  unset($q);

}

function formatDateTime(){

}




?>
