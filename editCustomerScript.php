<?php

$att_name = $_POST['att_name'];
$att_email = $_POST['att_email'];
$att_status = $_POST['att_status'];

require('mysqli_connect.php');

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
$cs_id = $_GET["cs_id"];
$cs_name = $_GET["cs_name"];
$att_id = $_GET["att_id"];

$edit_customer = "UPDATE `course_attendee` SET att_name = '{$att_name}', att_email = '{$att_email}', att_status = '{$att_status}' WHERE att_id = '{$att_id}'";
$result = @mysqli_query($dbc, $edit_customer);

if ($result === TRUE) {
    header("Location: roster.php?id=$site_id&cs_date=$cs_date&cs_id=$cs_id&cs_name=$cs_name");
} else {
    echo "Error: " . $result . "<br>" . $dbc->error;
}

$dbc->close();
