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
    <link rel="stylesheet" href="css/training.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>



<body>
    <?php
    include "../../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <center>
        <div class="container">
            
            <h1>START TRAINING</h1>
            <div class="card">
                <div class="card-col-1">
                <img src="../../assets/img/training.png" alt="Training" class="training-img">
                </div>

                <div class="card-col-2">
                    <h3>Play</h3>
                    <button onclick="document.location='#'"><i class="bi bi-play-fill" style="font-size: 5vw; color: white;"></i></button>

                </div>

            </div>
            <h2>This game will test your skills and knowledge
about a certain topic. Pick what you think is best for you and play!</h2>
            

            
        </div>
        </center>
    </div>
</body>

</html>