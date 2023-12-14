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
    <title>Quick Quiz - Play</title>
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="#">
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Gelasio&family=Lato:ital,wght@0,300;1,300&family=Lilita+One&family=Londrina+Solid&family=Luckiest+Guy&family=Mohave&family=Poppins:wght@400;800&family=Roboto+Serif:ital,opsz,wght@0,8..144,400;1,8..144,200&family=Sunflower:wght@700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    padding-top: 0;
    overflow-y: scroll;
}

.main-container{
    margin:0;
    width: 100%;
    height: fit-content;
    padding-top: 50px;
    background-color: white;
    padding-bottom: 100px;
    
}


:root {
    background-color: #ecf5ff;
    margin-top: 70px;
}


h1, h2, h3, h4 {
    font-family: Arial, Helvetica, sans-serif;
    margin-bottom: 1rem;
}

h1 {
    font-size: 5rem;
    color: #56a5eb;
    margin-bottom: 5rem;
    opacity: 0.7;
    text-transform: uppercase;
    }
    @keyframes textclip {
             to {
               background-position: 200% center;
             }
           }

h1 > span {
    font-weight: 500;
}

h2 {
    font-weight: 700;
    margin-bottom: 4rem;
}

h3 {
    font-weight: 500;
}
h4{
    color: #A81E1E;
    font-style: italic;
    margin-bottom: 2rem;
}
/* Utilities */

.container {
    width: 90%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 80rem;
    margin: 0;
    padding-top: 20px;
    background-color: transparent;
}

.container > * {
    width: 90%;
}

.flex-column {
    display: flex;
    flex-direction: column;
}

.flex-center {
    justify-content: center;
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.text-center {
    text-align: center;
}

.hidden {
    display: none;
}

/* BUTTONS */

.btn {
    padding: 1rem 0;
    width: 20rem;
    text-align: center;
    border: 0.1rem solid #56a5eb;
    margin-bottom: 1rem;
    text-decoration: none;
    color: #56a5eb;
    background-color: white;
    -webkit-transition: ease-out 0.4s;
    -moz-transition: ease-out 0.4s;
    transition: ease-out 0.4s;
}

.btn:hover {
    box-shadow: inset 400px 0 0 0 #D80286;
    color: #fff;
}

.btn[disabled]:hover {
    cursor: not-allowed;
    box-shadow: none;
    transition: none;
}

/* Forms */

form{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

input{
    margin-bottom: 1rem;
    width: 20rem;
    padding: 1.5rem;
    border: none;
    box-shadow: 0 0.1rem 1.4rem 0 rgb(86, 185,235, 0.5);
}

input::placeholder{
    color:#aaa;
}

::-webkit-scrollbar {
    width: 10px;
  }
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }
  ::-webkit-scrollbar-thumb {
    background: #888; 
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }




.choice-container-1 
{
    display: flex;
    margin-bottom: 0.5rem;
    width: 100%;
    margin: 20px;
    border: 0.1rem solid rgb(86, 165, 235, 0.25);
    background-color: #B2FFB0;
    border-radius: 3px;  
}

.choice-container-2
{
    display: flex;
    margin-bottom: 0.5rem;
    width: 100%;
    margin: 20px;
    border: 0.1rem solid rgb(86, 165, 235, 0.25);
    background-color: #B0D9FF;
    border-radius: 3px;  
}

.choice-container-3
{
    display: flex;
    margin-bottom: 0.5rem;
    width: 100%;
    margin: 20px;
    border: 0.1rem solid rgb(86, 165, 235, 0.25);
    background-color: #FFB0B0;
    border-radius: 3px;  
}

.choice-card
{
    display: flex;
    width: 70%;
    height: 100px;
    background-color: transparent;
}

.question-card
{
    background-color: transparent;
    width: 90%;
    height: 300px;
    margin-top: 20px;
    padding: 10px;
    text-align: center;

}

.choice-container:hover {
    cursor: pointer;
    box-shadow: 0 0.4rem 1.4rem 0 rgba(86, 185, 235, 05);
    transition: transform 150ms;
    transform: translateY(-0.1rem);
}

.choice-prefix-1 {
    padding: 10px 20px;
    background-color: #71CE6F;
    color: white;
    border-radius: 3px;
    font-size: 2.3vw;
    font-family: Rowdies;
}

.choice-prefix-2 {
    padding: 10px 20px;
    background-color: #6FA0CE;
    color: white;
    border-radius: 3px;
    font-size: 2.3vw;
    font-family: Rowdies;
}

.choice-prefix-3 {
    padding: 10px 20px;
    background-color: #CE6F6F;
    color: white;
    border-radius: 3px;
    font-size: 2.3vw;
    font-family: Rowdies;
}

.choice-text{
    padding: 10px;
    width: 100%;
    font-size: 1.5vw;
    text-align: center;
    font-family: Rowdies;
}

.correct {
    background-color: #28a745;
}

.incorrect{
    background-color: #dc3545;
}

/* HUD */
#question{
    font-size: 1.8vw;
    color: #367CBD;
    font-family: Rowdies;


}
#question.animating {
  
    white-space: nowrap;
    overflow: hidden;
    width: 100%;
    animation: type 4s steps(60, end);
}
  
  @keyframes type{ 
    from { width: 0; } 
  } 
#hud{
    display: flex;
    justify-content: justify;
    background-color: transparent;
    margin-top: 20px;
}

.hud-container-1
{
    width: 75%;
    height: fit-content;
    background-color: transparent;
    float: left;
    margin-right: 5%;
}

.hud-container-2
{
    width: 20%;
    height: fit-content;
    background-color: transparent;
    float: left;

}

.hud-prefix {
    text-align: left;
    color: #367CBD;
    font-size: 2.5vw;
    font-family: Rowdies;
    font-weight: bold;
}

.hud-prefix-score {
    text-align: center;
    color: #367CBD;
    font-size: 2.5vw;
    font-family: Rowdies;
    font-weight: bold;
}



.hud-main-text{
    text-align: center;
    color: #367CBD;
    font-size: 5vw;
    font-family: Rowdies;
    font-weight: bold;
   margin:0;
}

#progressBar{
    width: 35rem;
    height: 2.5rem;
    border: 0.3rem solid #54B452;
    margin-top: 1.5rem;
}

#progressBarFull{
    height: 2rem;
    background-color: #54B452;
    width: 0%;
    float:left;
    
}



/* Loader */

#loader{
    border: 1.6rem solid white;
    border-radius: 50%;
    border-top: 1.6rem solid #56a5eb;
    width: 12rem;
    height: 12rem;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(360deg);
    }
}
</style>

<body>
    <?php
    include "../../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <center>
        <div class="container">
            <div id="loader"></div>
            <div id="game" class="justify-center flex-column hidden">
                <div id="hud">
                    <div class="hud-container-1">
                        <div id="hud-item">
                            <p id="progressText" class="hud-prefix">
                                Question
                            </p>
                            
                            <div id="progressBar">
                                <div id="progressBarFull"></div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="hud-container-2">
                        <div id="hud-item">
                            <p class="hud-prefix-score">
                                Score
                            </p>
                            <h1 class="hud-main-text" id="score">0</h1>
                        </div>
                    </div>
                </div>
                <center>
                <div class="question-card">
                    <h2 id="question"></h2>
                    <center>
                    <div class="choice-card">
                        <div class="choice-container-1">
                            <p class="choice-prefix-1">A</p>
                            <p class="choice-text " data-number="1"></p>
                        </div>
                        <div class="choice-container-2">
                            <p class="choice-prefix-2">B</p>
                            <p class="choice-text"  data-number="2"></p>
                        </div>
                    </div>
                    
                    <div class="choice-card">
                        <div class="choice-container-2">
                            <p class="choice-prefix-2">C</p>
                            <p class="choice-text"  data-number="3"></p>
                        </div>
                        <div class="choice-container-3">
                            <p class="choice-prefix-3">D</p>
                            <p class="choice-text"  data-number="4"></p>
                        </div>
                    </div>

                    </center>
                </div>
                </center>

            </div>
        </div>
        </div>
    </div>
    <script src="js/game.js"></script>
</body>

</html>