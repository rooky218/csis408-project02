<!-- This checks POST data from login.php against Database. If login works,
this should lead to main.php. -->
<?php
   //connect to DB
   //include("../DB/dblogin.php");
   require("dblogin_test.php");

  //Build Query
  $q = "SELECT
  admin,
  birthdate,
  email,
  emailVerified,
  firstname,
  lastname,
  password,
  phone,
  phoneA,
  userID,
  username,
  zipcode
  FROM users
  WHERE username = \"$username_login\";";

		$r = @mysqli_query($my_db, $q); // Run the query.

		if ($r) { // If results came back
          echo "results back ";
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

					$usernameDB = $row["username"];

					$passwordDB = $row["password"];

					if($username_login == $usernameDB
          && $password_login == $passwordDB){
            //IF data matches, login session
						$_SESSION["LOGGED_IN"] = true;
						$_SESSION["timeout"] = time();	//sets timer for auto logout
            if($row["admin"] == 1){
              $_SESSION["AdminAccess"] = true;
            } else {
              $_SESSION["AdminAccess"] = false;
            }

            //Load user information into session
            $_SESSION["userNameInS"] = $row["username"];
            $_SESSION["userIDInS"] = $row["userID"];
            $_SESSION["emailInS"] = $row["email"];
            $_SESSION["email_V_InS"] = $row["emailverified"];
            $_SESSION["passwordInS"] = $row["password"];
            $_SESSION["firstNameInS"] = $row["firstname"];
            $_SESSION["lastnameInS"] = $row["lastname"];
            $_SESSION["phoneInS"] = $row["phone"];
            $_SESSION["phone_a_InS"] = $row["phonea"];
            $_SESSION["zipInS"] = $row["zipcode"];


            //upon load, redirect to main page
            header("location: ./../Main/main_dynamic.php");
				} else {
          //no match found
          $did_not_exist = true;
        }

		} else { //else -- could not access data base or no results back
			// Public message:

   			echo "<p>We could access the database</p>";
     	  // Debugging message:

    	  echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
			  echo "DB could not be reached";
		}
?>
