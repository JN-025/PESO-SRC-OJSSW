<?php
    session_start(); //we need session for the log in thingy XD 
    include("../peso_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/peso_homepage.css">
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
                <button class="access" onclick="document.location='register.php'">HTML Tutorial</button>
                <button onclick="document.location='login.php'">log in</button>

                
                </div>
                </center>

            </div>
           
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>