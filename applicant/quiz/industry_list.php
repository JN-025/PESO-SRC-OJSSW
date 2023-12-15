<?php
$page_title = "Training";
include "../../conn.php";
session_start();
$applicant_id = $_SESSION["applicant_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/peso.png" type="image/x-icon">
    <title>Industry</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="../../assets/css/applicant_topnav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include "../../function.php";
    include "topnav.php";
    ?>
    <div class="industry-container">
        <h1>Pick an industry</h1>
        <div class="industry">
            <div class="industry-box">
                <a href="game.php">Technology #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
                <a href="">Industry #1</a>
            </div>
        </div>
    </div>
</body>

</html>