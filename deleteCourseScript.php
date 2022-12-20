<?php

require('mysqli_connect.php');

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
$Name = $_GET["cs_name"];
$cs_id = $_GET["cs_id"];

// Deletes the attendees associated with the course
$delete_from_course_attendee = "DELETE FROM `course_attendee` WHERE cs_id = '{$cs_id}'";
$result1 = @mysqli_query($dbc, $delete_from_course_attendee);

// Deletes the course itself
$delete_from_course = "DELETE FROM `course` WHERE cs_id = '{$cs_id}'";
$result2 = @mysqli_query($dbc, $delete_from_course);

if ($result1 === TRUE && $result2 === TRUE) {
    header("Location: courseList.php?id=$site_id&cs_date=$cs_date");
} else if ($result1 === FALSE) {
    echo "Error: " . $result1 . "<br>" . $dbc->error;
} else if ($result2 === FALSE) {
    echo "Error: " . $result2 . "<br>" . $dbc->error;
}

$dbc->close();
