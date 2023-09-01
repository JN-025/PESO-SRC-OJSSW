<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/applicant_sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/applicant_homepage.css">
</head>
<body>
<?php 
        include "../function.php";
        include "sidenav.php";
        include "topnav.php";
        ?>
    <div class="main-wrapper">
        <div class="main-container">
            <div class="content-title">
            <h1>RECOMMENDED JOBS</h1>
            <button>FILTERS</button>
            </div>
            <div class="content-col-1">

            </div>
        </div>
    </div>
</body>
</html>