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

        <h2> Add New Course to <?php echo $_GET["cs_date"] ?> </h2>

        <form action="addCourseScript.php?id=<?php echo $site_id . '&cs_date=' . $cs_date ?>" method="post">
            <table>
                <tr>
                    <td align="right">Name:</td>
                    <td align="left"><input type="text" name="cs_name"></td>
                </tr>
                <tr>
                    <td align="right">Attendee Role:</td>
                    <td align="left"><select name="role_name">
                            <?php

                            $sql = "SELECT DISTINCT role_name FROM role;";
                            $result = @mysqli_query($dbc, $sql);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $role_name = $row['role_name'];
                                echo '<option value="' . $role_name . '">' . $role_name . '</option>';
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Start Time:</td>
                    <td align="left"><input type="time" name="cs_start"></td>
                </tr>
                <tr>
                    <td align="right">End Time:</td>
                    <td align="left"><input type="time" name="cs_end"></td>
                </tr>
                <tr>
                    <td align="right">Locaton:</td>
                    <td align="left"><input type="text" name="cs_room"></td>
                </tr>

            </table>

            <input type="submit">

        </form>
        <p> </p>
        <!-- Add Item -->

        </form>