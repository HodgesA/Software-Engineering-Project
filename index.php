<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sidebar.css" />
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<style>
    .myclass {
        display: inline-block;
        width: 240px;
        height: 100px;
    }

    table {
        border-radius: 15px;
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

    th#weekdays {
        color: white;
        font-family: "Lato", sans-serif;
        background-color: #d10f0f;
        border-radius: 10px;
    }

    .adjust-line-height {
        line-height: 2em;
    }
</style>

<?php
$site_id = $_GET["id"];
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

<div style="margin:auto; margin-right:-11%;">

    <body>

        <table style="margin:auto">
            <tr>

                <?php

                $sql = "SELECT DISTINCT site_name, start_date, end_date FROM site WHERE site_id = '{$site_id}'";
                $result = @mysqli_query($dbc, $sql);

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    $site_name = $row["site_name"];
                    $start_date = $row["start_date"];
                    $end_date = $row["end_date"];
                }
                echo '<h2 style="text-align:center; margin:0;">' . $site_name . " Schedule" . '</h2>';
                echo '<h2 style="text-align:center">' . "Week of " . $start_date . " to " . $end_date . '</h2>';

                $dayofweek = $start_date;

                while ($dayofweek <= $end_date) {

                    $sql = "SELECT DAYOFWEEK('{$dayofweek}')";
                    $result = @mysqli_query($dbc, $sql);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        if ($row["DAYOFWEEK('{$dayofweek}')"] == 1) {
                            echo '<th id=weekdays>' . 'Sunday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 2) {
                            echo '<th id=weekdays>' . 'Monday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 3) {
                            echo '<th id=weekdays>' . 'Tuesday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 4) {
                            echo '<th id=weekdays>' . 'Wednesday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 5) {
                            echo '<th id=weekdays>' . 'Thursday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 6) {
                            echo '<th id=weekdays>' . 'Friday' . '</th>';
                        } else if ($row["DAYOFWEEK('{$dayofweek}')"] == 7) {
                            echo '<th id=weekdays>' . 'Saturday' . '</th>';
                        }
                    }

                    $dayofweek = date('Y-m-d', strtotime($dayofweek . ' + 1 day'));
                }

                ?>

            </tr>

            <?php

            $dayofweek2 = $start_date;

            while ($dayofweek2 <= $end_date) {
                echo "<td>" . "<a href='courseList.php?id={$site_id}&cs_date={$dayofweek2}'>" . '<input class="myclass" type="button" value="' . $dayofweek2 . '" />' . '</a>' . "</td>\n";
                $dayofweek2 = date('Y-m-d', strtotime($dayofweek2 . ' + 1 day'));
            }

            ?>

        </table>

        <?php

        ?>

    </body>

</html>