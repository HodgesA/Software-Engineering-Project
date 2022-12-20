<?php

$cs_name = $_POST['cs_name'];
$cs_date = $_POST['cs_date'];
$role_name = $_POST['role_name'];
$cs_start = $_POST["cs_start"];
$cs_end = $_POST["cs_end"];
$cs_room = $_POST["cs_room"];

require('mysqli_connect.php');

$site_id = $_GET["id"];
$original_cs_date = $_GET["cs_date"];
$cs_id = $_GET["cs_id"];

$edit_course = "UPDATE `course` SET cs_name = '{$cs_name}', cs_date = '{$cs_date}', role_name = '{$role_name}', cs_start = '{$cs_start}', cs_end = '{$cs_end}', cs_room = '{$cs_room}' WHERE cs_id = '{$cs_id}'";
$result = @mysqli_query($dbc, $edit_course);

if ($result === TRUE) {
    header("Location: courseList.php?id=$site_id&cs_date=$original_cs_date");
} else {
    echo "Error: " . $result . "<br>" . $dbc->error;
}

$dbc->close();
