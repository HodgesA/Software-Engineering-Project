<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sidebar.css" />

</head>

<style>
    .myclass {
        display: inline-block;
        width: 175px;
        height: 40px;
    }

    table {
        border-radius: 15px;
    }

    th {
        border-radius: 15px;
        width: 200px;
    }

    td {
        border: 1px solid black;
    }

    tr {
        border-radius: 15px;
    }

    tbody {
        border-radius: 15px;
    }

    .adjust-line-height {
        line-height: 2em;
    }
</style>

<?php
$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
require('mysqli_connect.php');
?>

<div class="w3-sidebar w3-red w3-bar-block" style="width:11%">
    <div id=logo style="margin-left:8%">
        <img src="agfa_w.png" width="128" height="60" title="Logo of Agfa" alt="Logo" />
        <p></p>
    </div>
    <a href="index.php?id=<?php echo $site_id ?>" class="w3-bar-item w3-button">View Calendar</a>
    <a href="addCourse.php?id=<?php echo $site_id ?>" class="w3-bar-item w3-button">Add Course</a>
    <a href="form.php?id=<?php echo $site_id ?>" class="w3-bar-item w3-button">Form Submission</a>
    <a href="help.php?id=<?php echo $site_id ?>" class="w3-bar-item w3-button">Help</a>
</div>

<div style="margin-left:20%">

    <body>

        <h2 style="width: 90%; float:left; position:relative; left:30%;"> Courses for <?php echo $_GET["cs_date"] ?> </h2>

        <table>
            <thead>
                <tr>

                    <th id="weekdays">Course Name</th>
                    <th id="weekdays">Attendee Role</th>
                    <th id="weekdays">Start Time</th>
                    <th id="weekdays">End Time</th>
                    <th id="weekdays">Location</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT DISTINCT cs_id, cs_name, cs_start, cs_end, cs_room, site_id, role_name FROM course WHERE site_id = '{$site_id}' AND cs_date = '{$cs_date}'";
                $result = @mysqli_query($dbc, $sql);

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    $Course_ID = $row["cs_id"];
                    $Name = $row["cs_name"];
                    $Start_Time = date('h:i a', strtotime($row["cs_start"]));
                    $End_Time = date('h:i a', strtotime($row["cs_end"]));
                    $Location = $row["cs_room"];
                    $Role_Name = $row["role_name"];

                ?>

                    <tr>
                        <td><?php echo $Name ?></td>
                        <td><?php echo $Role_Name ?></td>
                        <td><?php echo $Start_Time ?></td>
                        <td><?php echo $End_Time ?></td>
                        <td><?php echo $Location ?></td>

                        <td> <a href="roster.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $Course_ID  . '&cs_name=' . $Name ?>">Roster</a></td>
                        <td> <a href="editCourse.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $Course_ID  . '&cs_name=' . $Name ?>">Edit</a></td>
                        <td> <a href="deleteCourseScript.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $Course_ID  . '&cs_name=' . $Name ?>">Delete</a></td>
                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>
        <p> </p>
        <!-- Add Item -->
        <a href="addCourse.php?id=<?php echo $site_id . '&cs_date=' . $cs_date ?>">
            <button type="submit">Add</button>
        </a>
        </form>