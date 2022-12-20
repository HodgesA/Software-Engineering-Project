<html>

<head>
    <!-- Link to css the site will use -->
    <link rel="stylesheet" href="landing.css" />
    <!-- Link to js the site will use -->
    <script src="script.js" defer></script>
</head>

<body>

    <div class="container">
        <div class="logo">
            <!-- Display Agfa Logo (should be above input)-->
            <img class="agfa-logo" src="agfaLogo.jpg" />
        </div>

        <!-- Create a drop down menu with sites in it-->
        <div class="dropdown">
            <button onclick="displaySites()" class="dropbtn">Site Select</button>
            <div id="myDropdown" class="dropdown-content">
                <?php

                require('../mysqli_connect.php');
                
                $sql = "SELECT DISTINCT site_id, site_name FROM site;";
                $result = @mysqli_query($dbc, $sql);

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $id = $row['site_id'];
                    $name = $row["site_name"];

                ?>
                    <a href="../index.php?id=<?php echo $row["site_id"] ?>"><?php echo $row["site_name"] ?></a>
                <?php

                }

                ?>
            </div>
        </div>
    </div>

</body>