<?php


// This file contains the database access information.
// This file also establishes a connection to MySQL
// selects the database, and sets the encoding.
// Set the database access information as constants:


DEFINE ("DB_USER", "user1");
DEFINE ("DB_PASSWORD", "letmein");
DEFINE ("DB_HOST", "localhost");
DEFINE ("DB_NAME", "testing");

// Make the connection:

$my_db = @mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
(' Could not connect to MySQL: ' . mysqli_connect_error());

// Set the encoding...

mysqli_set_charset( $my_db, 'utf8');
