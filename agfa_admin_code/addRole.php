<?php

$role_name = $_POST['role_name'];
$num_seats = $_POST['num_seats'];

require('../mysqli_connect.php');

$insert_role = "INSERT INTO role (role_name, num_seats) VALUES
('$role_name', '$num_seats');";
$result = @mysqli_query($dbc, $insert_role);

// Redirects user back to add site page
header("Location: admin.html");
