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
        width: 500px;
    }

    th {
        border-radius: 15px;
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

    * {
        margin: 0;
    }

    body {
        margin: 0;
    }
</style>

<?php

$site_id = $_GET["id"];
$cs_date = $_GET["cs_date"];
$cs_id = $_GET["cs_id"];
$cs_name = $_GET["cs_name"];

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

<div style="margin-left:25%">

    <body>

        <h2 style="margin:0%"> Add New Attendee to <?php echo $cs_name ?> </h2>

        <form action="addCustomerScript.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id  . '&cs_name=' . $cs_name ?>" method="post">
            <table>
                <tr>
                    <td align="right">Name:</td>
                    <td align="left"><input type="text" name="att_name"></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td align="left"><input type="text" name="att_email"></td>
                </tr>
                <tr>
                    <td align="right">Status:</td>
                    <td align="left"><select name="att_status">
                            <option value="Scheduled">Scheduled</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Did Not Attend">Did Not Attend</option>
                            <option value="Attended">Attended</option>
                        </select>
                    </td>
                </tr>

            </table>

            <input type="submit">

        </form>
        <p> </p>
        <!-- Add Item -->

        </form>