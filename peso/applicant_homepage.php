<?php
$page_title = "Homepage";
session_start();
// Include config file
include "../conn.php";
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
    <title>PESO COMPANY Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/applicant_homepage.css">
</head>
<body>
    <?php 
    include "../function.php";
    include "applicant_sidenav.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <div class="main-row">
            <div class="col-1">
                <div class="header">
                    <h1><?php echo $page_title?></h1>
                </div>
            </div>

            
        </div>
    </div>
</body>
</html>
