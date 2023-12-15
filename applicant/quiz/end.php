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
    <title>Congrats!</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/end.css">
</head>

<body>
    <?php
    include "../../function.php";
    include "topnav.php";
    ?>
    <div class="container">
        <div class="flex-center flex-column" id="end">
        <h1 id="resultTitle"></h1>
            <div class="success">
            <img id="resultImage" alt="No Image">
            <h1 id="finalScore"></h1>
            </div>
            <span id="sub-header" class="sub-text bold"></span>
            <span id="sub-header-content" class="sub-text"></span>
            <div class="end-display">
            <a href="game.php" class="end-btn">Play Again</a>
            <a href="Index.php" class="end-btn">Go Home</a>
            </div>
        </div>
    </div>
    <script src="js/end.js"></script>
</body>

</html>