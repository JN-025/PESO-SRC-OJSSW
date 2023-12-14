<?php
$page_title = "Events";
    
?>

<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/events.css">
        <title>Laws</title>
    </head>
    <body>
        
        <div class="main-container">
            <center>
            <div class="container">
                <h1>LEARN MORE ABOUT OUR EVENTS!</h1>
                <h2>JUST CLICK TO LEARN MORE</h2>
                <div class="card">
                    <!-- Trigger/Open The Modal -->
                    <button class="modal-btn" id="myBtn">
                        <h3>Job Fairs</h3>
                        <img src="../assets/img/event_jobfair.png" alt="Job Fair" class="images">
                    </button>
                    <button class="modal-btn" id="myBtn2">
                        <h4>Special Program for Employment of Students</h4>
                        <img src="../assets/img/event_spes.png" alt="SPES" class="images2">
                    </button>
                    <button class="modal-btn" id="myBtn3">
                        <h5>Career Guidance Seminar</h5>
                        <img src="../assets/img/event_careerguidance.png" alt="Career Guidance" class="images3">
                    </button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="content">
                            <img src="../assets/img/info_jobfair.png" alt="Job Fair" class="images4">
                            </div>
                        </div>
                    </div>

                    <div id="myModal2" class="modal2">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close2">&times;</span>
                            <div class="content">
                            <img src="../assets/img/info_spes.png" alt="SPES" class="images4">
                            </div>
                        </div>
                    </div>

                    <div id="myModal3" class="modal3">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close3">&times;</span>
                            <div class="content">
                            <img src="../assets/img/info_careerguidance.png" alt="Career Guidance" class="images4">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            </center>



        </div>

        <script src="../assets/js/events.js"></script>
    </body>
</html>