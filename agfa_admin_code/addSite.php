<?php

$site_name = $_POST['site_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

require('../mysqli_connect.php');

$six_digit_random_number = random_int(100000, 999999);

$id_check = "SELECT DISTINCT site_name FROM site WHERE site_id = '{$six_digit_random_number}'";
$result = @mysqli_query($dbc, $id_check);

while ($result->num_rows == 1) {
    $six_digit_random_number = random_int(100000, 999999);
    $id_check = "SELECT DISTINCT site_name FROM site WHERE site_id = '{$six_digit_random_number}'";
    $result = @mysqli_query($dbc, $id_check);
}

$insert_site = "INSERT INTO site (site_id, site_name, start_date, end_date) VALUES
('$six_digit_random_number', '$site_name', '$start_date', '$end_date');";
$result = @mysqli_query($dbc, $insert_site);

// Redirects user back to add site page
header("Location: admin.html");
