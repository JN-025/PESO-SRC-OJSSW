<?php
$page_title = "Training";
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
            <h1>Congratulations!, You have successfully finished the game</h1>
            <h1 id="finalScore"></h1>
         <!--   <form>
                <input type="text" name="username" id="username" placeholder="username">
                <button id="saveScoreBtn" type="submit" class="btn" onclick="saveHighScore(event)" disabled>Save</button>
            </form>-->
            <a class="btn">Submit</a>
            <a href="game.php" class="btn">Play Again</a>
            <a href="Index.php" class="btn">Go Home</a>
        </div>
    </div>
    <script src="js/end.js"></script>
</body>

</html>