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
    <title>Quiz</title>
    <link rel="stylesheet" href="../../assets/css/font.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="../../assets/css/applicant_topnav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include "../../function.php";
    include "topnav.php";
    ?>
    <div class="container">
        <div id="home" class="flex-center flex-column">
            <h1>Start Training</h1>
            <div class="image-btn">
            <img src="../../assets/img/training.png" alt="" srcset="">
            <div class="play-column">
            <label>Play</label>
            <a href="industry_list.php" class="btn"><i class="bi bi-play-fill"></i></a>
            </div>
            </div>
            <h4>This game will test your skills and knowledge<br>about a certain topic. Pick what you think is best for you and play!</h4>
        </div>
    </div>
</body>

</html>