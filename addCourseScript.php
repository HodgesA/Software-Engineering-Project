<?php

$Name = $_POST['cs_name'];
$Role_Name = $_POST['role_name'];
$Start_Time = $_POST["cs_start"];
$End_Time = $_POST["cs_end"];
$Location = $_POST["cs_room"];

require('mysqli_connect.php');

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];

$sql = "INSERT INTO course (cs_id, cs_name, cs_start, cs_end, cs_date, cs_room, site_id, role_name) VALUES
(NULL, '$Name', '$Start_Time', '$End_Time', '$cs_date', '$Location', '$site_id', '$Role_Name');";

$result = @mysqli_query($dbc, $sql);

if ($result === TRUE) {
    header("Location: courseList.php?id=$site_id&cs_date=$cs_date");
} else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
}

$dbc->close();
