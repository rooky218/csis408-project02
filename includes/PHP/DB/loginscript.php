<!-- This checks POST data from login.php against Database. If login works,
this should lead to main.php. -->
<?php
   //connect to DB
   //include("../DB/dblogin.php");
   require("dblogin_test.php");

  //Build Query
  $q = "SELECT
  admin,
  birthday,
  email,
  emailV,
  fname,
  lname,
  password,
  phone,
  phoneA,
  userID,
  username,
  zip
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
            $_SESSION["email_V_InS"] = $row["email-verified"];
            $_SESSION["passwordInS"] = $row["password"];
            $_SESSION["firstNameInS"] = $row["fname"];
            $_SESSION["lastnameInS"] = $row["lname"];
            $_SESSION["phoneInS"] = $row["phone"];
            $_SESSION["phone_a_InS"] = $row["phone-address"];
            $_SESSION["zipInS"] = $row["zip"];


            //upon load, redirect to main page
            header("location: ./../Main/convo.php");
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
