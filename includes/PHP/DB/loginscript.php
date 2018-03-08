<?php


  //Build Query
  $q = "SELECT
  Admin,
  BirthDate,
  Email,
  EmailVerified,
  FirstName,
  LastName,
  UserPassword,
  Phone,
  PhoneA,
  UserID,
  Username,
  ZipCode
  FROM Users
  WHERE Email = \"$email_login\";";

		$r = @mysqli_query($my_db, $q); // Run the query.

		if ($r) { // If results came back
          echo "results back ";
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

					$emailDB = $row["Email"];

					$passwordDB = $row["UserPassword"];

					if($email_login == $emailDB
          && $password_login == $passwordDB){
            //IF data matches, login session
						$_SESSION["LOGGED_IN"] = true;
            if($row["Admin"] == 1){
              $_SESSION["AdminAccess"] = true;
            } else {
              $_SESSION["AdminAccess"] = false;
            }

            //Load user information into session
            $_SESSION["userNameInS"] = $row["Username"];
            $_SESSION["userIDInS"] = $row["UserID"];
            $_SESSION["emailInS"] = $row["Email"];
            $_SESSION["email_V_InS"] = $row["EmailVerified"];
            $_SESSION["passwordInS"] = $row["Password"];
            $_SESSION["firstNameInS"] = $row["FirstName"];
            $_SESSION["lastnameInS"] = $row["LastName"];
            $_SESSION["phoneInS"] = $row["Phone"];
            $_SESSION["phone_a_InS"] = $row["PhoneA"];
            $_SESSION["zipInS"] = $row["ZipCode"];
            $_SESSION["passwordInS"] = $row["UserPassword"];


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
