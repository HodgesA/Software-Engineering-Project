<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sidebar.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
    $(function() {
        $("#datepicker").datepicker();
    });
    $(function() {
        $('#timepicker').timepicker({});
    });
</script>

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
$cs_name = $_GET["cs_name"];
$cs_id = $_GET["cs_id"];

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

        <?php

        $sql = "SELECT DISTINCT cs_start, cs_end, cs_room, role_name FROM course WHERE cs_id = '{$cs_id}'";
        $result = @mysqli_query($dbc, $sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $Start_Time = $row["cs_start"];
            $End_Time = $row["cs_end"];
            $Location = $row["cs_room"];
            $Role_Name = $row["role_name"];
        }

        ?>

        <h2> Edit Course: <?php echo $cs_name ?> </h2>

        <form action="editCourseScript.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id ?>" method="post">
            <table>
                <tr>
                    <td align="right">Name:</td>
                    <td align="left"><input type="text" name="cs_name" value="<?php echo $cs_name; ?>"></td>
                </tr>
                <tr>
                    <td align="right">Date:</td>
                    <td align="left"><input type="text" name="cs_date" value="<?php echo $cs_date; ?>"></td>
                </tr>
                <tr>
                    <td align="right">Attendee Role:</td>
                    <td align="left"><select name="role_name">
                            <?php

                            echo '<option value="' . $Role_Name . '" selected>' . $Role_Name . '</option>';

                            $sql = "SELECT DISTINCT role_name FROM role;";
                            $result = @mysqli_query($dbc, $sql);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $role_name = $row['role_name'];
                                if ($role_name != $Role_Name) {
                                    echo '<option value="' . $role_name . '">' . $role_name . '</option>';
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Start Time:</td>
                    <td align="left"><input type="time" name="cs_start" value="<?php echo $Start_Time; ?>"></td>
                </tr>
                <tr>
                    <td align="right">End Time:</td>
                    <td align="left"><input type="time" name="cs_end" value="<?php echo $End_Time; ?>"></td>
                </tr>
                <tr>
                    <td align="right">Locaton:</td>
                    <td align="left"><input type="text" name="cs_room" value="<?php echo $Location; ?>"></td>
                </tr>

            </table>

            <input type="submit">

        </form>
        <p> </p>
        <!-- Add Item -->

        </form>