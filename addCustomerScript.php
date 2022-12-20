<?php

$att_name = $_POST['att_name'];
$att_email = $_POST['att_email'];
$att_status = $_POST['att_status'];

require('mysqli_connect.php');

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
$cs_id = $_GET["cs_id"];
$cs_name = $_GET["cs_name"];

$insert_course_attendee = "INSERT INTO course_attendee (att_id, cs_id, att_status, att_name, att_email, site_id) VALUES
(NULL, '$cs_id', '$att_status', '$att_name', '$att_email', '$site_id');";

$r = @mysqli_query($dbc, $insert_course_attendee);

if ($r === TRUE) {
    header("Location: roster.php?id=$site_id&cs_date=$cs_date&cs_id=$cs_id&cs_name=$cs_name");
} else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
}

$dbc->close();
