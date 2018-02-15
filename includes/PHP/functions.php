<?php

	//place at top of each CMS page
	function loggedin(){
	//check if session has been logged in
		if(!myisset($_SESSION["LOGGED_IN"]) || $_SESSION["LOGGED_IN"] != true){
			unset($_SESSION["LOGGED_IN"]);
			$_SESSION["timeout"] = time();
			header("location: ./logout.php");

		} else {
		//check for recent activity
			if ($_SESSION["timeout"] + 60 * 60 < time()) { 	//log out if inactive for 1 hour
		    	unset($_SESSION["LOGGED_IN"]);
		    	unset($_SESSION["User"]);
		    	$_SESSION["timeout"] = time();
					header("location: ./logout.php");

		  	} else {
				$_SESSION["timeout"] = time(); 	//new activity re-ups the time limit
			}

		}

	}//end function loggedin()



	function setnav(){
		if(myisset($_SESSION['LOGGED_IN']) && $_SESSION['AdminAccess'] == 1){
			$_SESSION['navbar'] = "../include/layout/adminnavbar.php";
		} else {
			$_SESSION['navbar'] = "../include/layout/navbar.php";
		}
	}

	//checks a form for null values - return TRUE = has value
	function myisset($xin){
		if($xin == null || $xin == ""){
			return false;
		} else {
			return true;
		}
	}//end myisset


	function hitcounter($page){

	//connect to DB
		require("layout/db/dblogin.php");


	//Build Query
		$q = "UPDATE Stats SET Hit=Hit+1 WHERE Page = " . $page . ";";

		$r = @mysqli_query($my_db, $q);

	//read back results
		$q = "SELECT * FROM Stats WHERE Page = " . $page . ";";

		$r = @mysqli_query($my_db, $q);

		if ($r) { // If it ran OK, display the records.

		// Fetch and print all the records:
		 	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

		   		$output = $row["Hit"];

			echo $output;
			}
		}
	}

?>
