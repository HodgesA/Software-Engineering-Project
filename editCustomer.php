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

$att_id = $_GET["att_id"];
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

        <?php

        $sql = "SELECT DISTINCT att_id, cs_id, att_name, att_email, att_status FROM course_attendee WHERE att_id = '{$att_id}'";
        $result = @mysqli_query($dbc, $sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $att_name = $row["att_name"];
            $att_email = $row["att_email"];
            $att_status = $row["att_status"];
        }

        ?>

        <h2> Edit Attendee Information for <?php echo $att_name ?> </h2>

        <form action="editCustomerScript.php?id=<?php echo $site_id . '&cs_date=' . $cs_date  . '&cs_id=' . $cs_id  . '&cs_name=' . $cs_name . '&att_id=' . $att_id ?>" method="post">
            <table>
                <tr>
                    <td align="right">Name:</td>
                    <td align="left"><input type="text" name="att_name" value="<?php echo $att_name; ?>"></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td align="left"><input type="text" name="att_email" value="<?php echo $att_email; ?>"></td>
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