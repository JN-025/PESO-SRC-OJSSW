<?php
$page_title = "Training";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/peso.png" type="image/x-icon">
    <title>Quiz</title>
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
            <h4>* This game will test your skill and determine the most suitable job for you</h4>
            <a href="game.php" class="btn">Play</a>
            <a href="" class="btn">Select Option</a>
            <!--<a href="highscores.php" class="btn">High Scores</a>-->
        </div>
    </div>
</body>

</html>