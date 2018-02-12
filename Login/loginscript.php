<!-- This checks POST data from login.php against Database. If login works, this should lead to main.php. -->
<?php

    session_start(); //start session

		require("../includes/functions.php");

	//connect to DB
    //include("../DB/dblogin.php");
    include("../DB/dblogin.php");

  //Build Query
  $q = "SELECT admin, email, FName, LName, password, phone, username FROM Users
  WHERE username = \"{$_POST["uName"]}\";";

		$r = @mysqli_query($my_db, $q); // Run the query.

		if ($r) { // If results came back

					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

					$username = $row["username"];

					$password = $row["password"];

					if(myisset($_POST["uName"]) && myisset($_POST["pword"])){ //IF Not Null

							if($_POST["uName"] == $username && $_POST["pword"] == $password){	//IF LOGIN SUCCESS
								$_SESSION["LOGGED_IN"] = true;
								$_SESSION["timeout"] = time();	//sets timer for auto logout
								$_SESSION["User"] = $username;	//sets the user for the session
								$_SESSION["FName"] = $row["FName"];
								$_SESSION["LName"] = $row["LName"];
								$_SESSION["AdminAccess"] = $row["admin"];
								$_SESSION["Email"] = $row["email"];
								$_SESSION["Phone"] = $row["phone"];

                $_SESSION["Alert_Logged_In_Success"] = true;
                if(myisset($_SESSION["return_to"])){
								  header("location: ./../" . $_SESSION["return_to"]);//if login successful send here
                  unset($_SESSION["return_to"]);
                } else {
                  header("location: ./../index.php");
                }
							} else {	//login not correct, set session data for return error messaging

								//this part re-enters what user had in the login fields, with an error message

								$_SESSION["return_un"] = $_POST["uName"];	//value was set, check validity
								$_SESSION["return_pw"] = $_POST["pword"];	//value was set, check validity
                $_SESSION["error_incorrect"] = true; //un or pw incorrect


								header("location: ./login.php"); //return to login page
						}


				} else {//IF NO VALUE SET, then do this part: value not set, redirect

					$_SESSION["return_un"] = $_POST["uname"];	//value was set, check validity
					$_SESSION["return_pw"] = $_POST["pword"];	//value was set, check validity
          $_SESSION["error_missing"] = true;

					header("location: ./login.php");
				}

		} else { //else -- could not access data base or no results back
			// Public message:

   			echo "<p>We could access the database b218</p>";
        $_SESSION["error_nouser"] = true;

     	// Debugging message:

    		echo "<p>" . mysqli_error($my_db) . "<br /><br /> Query: " . $q . '</ p >';
			echo "DB could not be reached";
		}


?>
