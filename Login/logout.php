<!-- if user decides to log out, this page resets the session permitting a logout -->

<?php session_start();

	unset($_SESSION["LOGGED_IN"]);
    unset($_SESSION["User"]);
    unset($_SESSION["FName"]);
    unset($_SESSION["LName"]);
    unset($_SESSION["Phone"]);
    unset($_SESSION["Email"]);
    unset($_SESSION["AdminAcess"]);
    header("location: ./../index.php"); //this will need to go to main.php

?>
