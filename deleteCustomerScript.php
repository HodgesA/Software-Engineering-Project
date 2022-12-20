<?php

require('mysqli_connect.php');

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
$cs_id = $_GET["cs_id"];
$cs_name = $_GET["cs_name"];
$att_id = $_GET["att_id"];

// Deletes the attendees associated with the course
$delete_from_course_attendee = "DELETE FROM `course_attendee` WHERE att_id = '{$att_id}'";
$result = @mysqli_query($dbc, $delete_from_course_attendee);

if ($result === TRUE) {
    header("Location: roster.php?id=$site_id&cs_date=$cs_date&cs_id=$cs_id&cs_name=$cs_name");
} else {
    echo "Error: " . $result . "<br>" . $dbc->error;
}

$dbc->close();
