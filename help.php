<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="sidebar.css" />

</head>

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

<div style="margin-left:25%">
    <div style="margin-left:25%">
        <style>
            .myclass {
                display: inline-block;
                width: 240px;
                height: 40px;
            }
        
            table{
                border-radius: 15px;
            }
            th{
                border-radius:15px;
            }
            td {
                border: 1px solid black;
            }
            tr{
                border-radius:15px;
            }
            tbody{
                border-radius: 15px;
            }
        
            th#weekdays{
                color: white;
                font-family: "Lato", sans-serif;
                background-color: #d10f0f;
                border-radius: 10px;
        }
        
            .adjust-line-height {
                line-height: 2em;
            }
        
        </style>
        
        <body>
            <p></p>
        </div>
        
        <div id=logo style="margin-left:20%"></div><h2> User Manual  </h2>
        <div id=logo style="margin-left:40%">
            <p></p>
        </div>
        
        <div id="body"></div>
        <p>
            <p><h2>  Add Sites </h2>
                Designed to be accessed by admin-type users, the interface allowing for the addition of healthcare sites is available through the admin/instructor page. 
                By default, the form which enables this function will be displayed on page load, so there is no need to navigate to the appropriate tab. 
                The user will be presented with a form requesting the sites name, as well as the date range over which training will be administered at that location. 
                When filled out correctly, the site is added to the system database and will become accessible through the landing page, also intended for use by admin-type users. 
                Should the user fail to meet the criteria for a valid input, they will be presented with a message detailing the issue (in this case, either a field left empty/unspecified, an invalid date range, or an attempted duplicate site entry), and the form will not be processed.
                Should a user decide they would like to edit or remove a healthcare site from the system, they are able to do so by navigating to the tab directly under “Add Site” and selecting the location they wish to modify/delete from a dropdown list. 
                This is handled in a similar fashion to the add site feature, i.e., through presenting the user with a matching form that they can use to adjust site information, alongside an additional button option labeled “Delete Site”.
                </p>
                <img src="agfa_w.png" width="128" height="60" title="Logo of Add Sites" alt="Add Site" />

                <p><h2>Customer Menu / Adding Customers</h2>
                    Clicking on a course from the course list of any block will take you to the roster page for that training session. Here, you will see a table of all customers who have registered for the course. Information such as their name, email, and whether or not they have confirmed their attendance will be displayed on this page. Editing or adding customers from this table is possible by clicking the respective edit or add buttons. 

                    Adding a customer will redirect you to a form where you can type in the required information for a customer
                    </p>

                    <p><h2>Form Submission</h2>
                        Confirm site readiness through submission form 
                        Users will be able to: 
                        Users will click “Fill out site readiness form” which will prompt them to  fill out a form to select which resources are readily available for go live. 
                        Click submit to save changes 
                        Edit their submissions 

                        </p>

                        <p><h2>Site Selection</h2>
                            Designed to be accessed by admin-type users, the interface allowing for the selection of a healthcare site is available through the landing page. 
                            On this screen, the user will be presented with a button that, upon click, will produce a dropdown list of the healthcare sites that have been added to the system. 
                            When the user makes a selection by clicking a particular site option, the page will redirect to a custom calendar view for that healthcare site which is designed to be used by the customer and referenced by the instructor.
                            
                            </p>
        <img src="site.png" width="128" height="60" title="Logo of Site Select" alt="Site" />
        </style>
            
        </p> 
    </div>