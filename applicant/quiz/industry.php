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
    <link rel="stylesheet" href="css/industry.css">
    
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
            <h1>Pick an industry</h1>
            <button onclick="document.location='#'" class="back">BACK</button>

            <div class="card">
                <button onclick="document.location='#'" class="industry">Industry #1</button>
                <button onclick="document.location='#'" class="industry">Industry #2</button>
                <button onclick="document.location='#'" class="industry">Industry #3</button>
                <button onclick="document.location='#'" class="industry">Industry #4</button>
            </div>
            <div class="card">
                <button onclick="document.location='#'" class="industry">Industry #5</button>
                <button onclick="document.location='#'" class="industry">Industry #6</button>
                <button onclick="document.location='#'" class="industry">Industry #7</button>
                <button onclick="document.location='#'" class="industry">Industry #8</button>

            </div>

            

        </div>
    </div>

</body>
</html>
