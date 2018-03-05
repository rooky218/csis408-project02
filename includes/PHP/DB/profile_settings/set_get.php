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

?>
