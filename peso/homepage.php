<?php
$page_title = "Homepage";
session_start();
// Include config file
include "../peso_function.php";
$alert = ""; 
if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/peso_homepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../assets/js/applicant/loader.js"></script>
</head>



<body>



<div class="loader"><div></div><div></div><div></div><div></div></div>
<div class="main-container">
        <div class="main-row">
            <div class="col-1">
                <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <br> <br>
                <center>
                <div class="col-2">
                    <br>
                    <h1>PESO ACCESS</h1>
                    <br>
                    <button class="access" onclick="document.location='A_access_login.php'"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;APPLICANTS</button>
                    <button class="access" onclick="document.location='C_access_login.php'"><i class="bi bi-building-add"></i>&nbsp;&nbsp;COMPANY</button>
                    <button class="access" onclick="document.location='J_access_login.php'"><i class="bi bi-briefcase-fill"></i>&nbsp;&nbsp;JOB POSTING</button>
                    <button class="access" onclick="document.location='R_access_login.php'"><i class="bi bi-bar-chart-fill"></i>&nbsp;&nbsp;REPORTS</button>
                    <button class="access" onclick="document.location='#'"><i class="bi bi-lock"></i>&nbsp;&nbsp;POLICIES</button>

                
                </div>
                </center>

            </div>
           
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>