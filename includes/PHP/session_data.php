<?php
//page is not currently used or referenced, this is just a guide
//of session variables

//IF data matches, login session
$_SESSION["LOGGED_IN"] = true;
$_SESSION["timeout"] = time();	//sets timer for auto logout
if($row["admin"] == 1){
  $_SESSION["AdminAccess"] = true;
} else {
  $_SESSION["AdminAccess"] = false;
}

//Load user information into session
$_SESSION["userNameInS"];
$_SESSION["userIDInS"];
$_SESSION["emailInS"];
$_SESSION["email_V_InS"];
$_SESSION["passwordInS"];
$_SESSION["firstNameInS"];
$_SESSION["lastnameInS"];
$_SESSION["phoneInS"];
$_SESSION["phone_a_InS"];
$_SESSION["zipInS"];
$_SESSION["passwordInS"]
$_SESSION["birthdayInS"];
?>
