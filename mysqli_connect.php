<?php
// Defines the details of the target database (agfa_db)
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'agfa_db');

// Makes the connection with the target database
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to MySQL: ' . mysqli_connect_error());

// Sets the encoding for the database
mysqli_set_charset($dbc, 'utf8');
