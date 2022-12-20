<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sidebar.css" />

</head>

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
    </style>

    <body>

        <?php

        echo '<h2> Roster for ' . $cs_name . '</h2>';

        ?>
        <table>
            <thead>
                <tr>
                    <th id="weekdays">Attendee Name</th>
                    <th id="weekdays">Email</th>
                    <th id="weekdays">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT DISTINCT att_id, cs_id, att_status, att_name, att_email FROM course_attendee WHERE cs_id = '{$cs_id}'";
                $result = @mysqli_query($dbc, $sql);


                while ($row = $result->fetch_assoc()) {

                    $att_id = $row['att_id'];
                    $att_name = $row['att_name'];
                    $att_email = $row["att_email"];
                    $att_status = $row["att_status"];

                    echo '<tr>';
                    echo '<td>' . $att_name . '</td>';
                    echo '<td>' . $att_email . '</td>';
                    echo '<td>' . $att_status . '</td>';
                    echo '<td> <a href="editCustomer.php?id=' . $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id  . '&cs_name=' . $cs_name . '&att_id=' . $att_id  . '">Edit</a></td>';
                    echo '<td> <a href="deleteCustomerScript.php?id=' . $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id  . '&cs_name=' . $cs_name . '&att_id=' . $att_id . '">Delete</a></td>';
                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>
        <p></p>

        <!-- Add Item -->

        <a href="addCustomer.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id  . '&cs_name=' . $cs_name ?>">
            <button type="submit">Add</button>
        </a>


</div>
</div>

</div>