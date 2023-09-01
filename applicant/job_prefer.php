<?php
$page_title = "Applicant Profile / Job Preference";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Preference</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_job_prefer.css">
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
                                    <h2>Job Preference</h2>
                                    <a href="job_prefer_update.php" class="edit">Edit</a>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="column">
                                        <h4>Preferred Occupation #1</h4>
                                        <input type="text" name="occupation1" placeholder="Occupation" required min="" max="" disabled>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="column">
                                        <h4>&nbsp;</h4>
                                        <input type="text" style="padding-left: 0;" name="industry1" placeholder="Industry" required min="" max="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="column">
                                        <h4>Preferred Occupation #2</h4>
                                        <input type="text" name="occupation2" placeholder="Occupation" required min="" max="" disabled>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="column">
                                        <h4>&nbsp;</h4>
                                        <input type="text" style="padding-left: 0;" name="industry2" placeholder="Industry" required min="" max="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="column">
                                        <h4>Preferred Occupation #3</h4>
                                        <input type="text" name="occupation3" placeholder="Occupation" required min="" max="" disabled>
                                        
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="column">
                                        <h4>&nbsp;</h4>
                                        <input type="text" style="padding-left: 0;" name="industry3" placeholder="Industry" required min="" max="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <h5>Preferred Location</h5>
                                    <select style="width: 30%;" class="" name="preferredLocation" required>
                                            <option value="" style="color:gray;"selected disabled>Choose</option>
                                            <option value="Abroad" disabled>Abroad</option>
                                            <option value="Local" disabled>Local</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="location1" placeholder="Location #1" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" style="margin: 0px;" name="location2" placeholder="Location #2" required min="" max="" disabled>
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