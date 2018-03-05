<?php

DEFINE ("DB_USER", "user-3");
DEFINE ("DB_PASSWORD", "letmein");
DEFINE ("DB_HOST", "localhost");
DEFINE ("DB_NAME", "chatapp");

// Make the connection
$connection = mysqli_connect('localhost',$username,$password,$dbname);
 = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
(' Could not connect to MySQL: ' . mysqli_connect_error());

// If connection was not successful, handle the error
if($connection === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
}



 ?>
