<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Educational Background</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_educ_bg.css">
    </head>
    <body>
        <?php 
        include "../function.php";
        include "sidenav.php";
        ?>
        
        <div class="card1">
            <?php 
            include "topnav.php";
            ?>
            <center>
            <div class="card2">
                <?php
                include "profilenav.php";
                ?>

                <div class="card3">
                    <div class="card4">
                                    
                        <form action="" method="post">
                            <div class="form-card">
                                <div class="form-col-1">
                                    <h2>Educational Background</h2>
                                    <a href="educ_bg_update.php" class="edit">Edit</a>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <h5>Are you currently in school?</h5>
                                    <select style="width: 30%;" class="" name="schoolStatus" required>
                                            <option value="" style="color:gray;"selected disabled>Choose</option>
                                            <option value="Yes" disabled>Yes</option>
                                            <option value="No" disabled>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-card">
                                <h3>Highest Educational Level</h3>
                                <div class="form-col-2">
                                <input type="text" name="educLevel" placeholder="Highest Educational Level" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <h3>Year Graduated/Last Year Attended</h3>
                                <div class="form-col-2">
                                <input type="text" name="gradYear" placeholder="Year Graduated/Last Year Attended" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <h3>School/University</h3>
                                <div class="form-col-2">
                                <input type="text" name="school" placeholder="School/University" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <h3>Course/Program</h3>
                                <div class="form-col-2">
                                <input type="text" name="course" placeholder="Course/Program" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <h3>Awards/Honors Received</h3>
                                <div class="form-col-2">
                                <input type="text" name="award" placeholder="Awards/Honors Received" required min="" max="" disabled>
                                </div>
                            </div>


                            
                        </form>
                    </div>
                                
                </div>

            </div>
            </center>
        </div>

                
    </body>
</html>