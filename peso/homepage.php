<?php
$page_title = "Homepage";
session_start();
// Include config file
include "../conn.php";

$alert = ""; 
if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: index.php");
    exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESO COMPANY Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/peso_home.css">
</head>
<body>

    <div class="main">
        <?php 
        include "../function.php";
        include "topnav.php";
        ?>
        <center>
        <div class="row-1">
            <div class="col-1">
                <button class="access" onclick="document.location='type/applicant/A_access_login.php'"><i class="bi bi-people-fill"></i><br>APPLICANTS</button>
                <button class="access" onclick="document.location='type/company/C_access_login.php'"><i class="bi bi-buildings-fill"></i><br>COMPANIES</button>
                <button class="access" onclick="document.location='type/jobposting/J_access_login.php'"><i class="bi bi-briefcase-fill"></i><br>JOB POSTING</button>
                <button class="access" onclick="document.location='type/report/R_access_login.php'"><i class="bi bi-bar-chart-fill"></i><br>REPORTS</button>
            </div>

            <div class="col-1">
                <button class="access" onclick="document.location='type/updates/U_access_login.php'"><i class="bi bi-file-plus-fill"></i><br>UPDATES</button>
                <button class="access" onclick="document.location='type/training/T_access_login.php'"><i class="bi bi-person-video3"></i><br>TRAINING</button>
                <button style="font-size: 1.7vw;" class="access" onclick="document.location='type/otherservices/O_access_login.php'"><i class="bi bi-gear-wide"></i><br>OTHER SERVICES</button>
                <button class="access" onclick="document.location='#'"><i class="bi bi-shield-shaded"></i><br>POLICIES</button>
            </div>
        


        </div>
    
    
    
        </center>
    </div>
</body>
</html>



