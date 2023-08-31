<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Preference</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_training.css">
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
                                    <h2>Training</h2>
                                    <a href="training_update.php" class="edit">Edit</a>
                                </div>
                            </div>
                            <br>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <h5>Are you currently in training?</h5>
                                    <select style="width: 30%;" class="" name="trainingStatus" required>
                                            <option value="" style="color:gray;"selected disabled>Choose</option>
                                            <option value="Yes" disabled>Yes</option>
                                            <option value="No" disabled>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-card">
                                <h5>Training #1</h5>
                                <div class="form-col-2">
                                <input type="text" name="training1" placeholder="Training Program" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="institution1" placeholder="Training Institution" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                
                                <div class="form-col-3">
                                    <input type="text" name="startDuration1" placeholder="Started" required maxlength="" disabled>
                                    <div class="field-space-1"></div>
                                    <h4>TO</h4>
                                    <div class="field-space-1"></div>
                                    <input type="text" name="endDuration1" placeholder="Ended" required maxlength="" disabled>
                                    </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="certificate1" placeholder="Certificates Received" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2" style="margin-right: 20%;">
                                    <select class="" name="completion" required>
                                        <option value="" style="color:gray;"selected disabled>Completion</option>
                                        <option value="Completed" disabled>Completed</option>
                                        <option value="Not Completed" disabled>Not Completed</option>
                                    </select>                                
                                </div>
                            </div>

                            <br>

                            <div class="form-card">
                                <h5>Training #2</h5>
                                <div class="form-col-2">
                                <input type="text" name="training2" placeholder="Training Program" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="institution2" placeholder="Training Institution" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                
                                <div class="form-col-3">
                                    <input type="text" name="startDuration2" placeholder="Started" required maxlength="" disabled>
                                    <div class="field-space-1"></div>
                                    <h4>TO</h4>
                                    <div class="field-space-1"></div>
                                    <input type="text" name="endDuration2" placeholder="Ended" required maxlength="" disabled>
                                    </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="certificate2" placeholder="Certificates Received" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2" style="margin-right: 20%;">
                                    <select class="" name="completion2" required>
                                        <option value="" style="color:gray;"selected disabled>Completion</option>
                                        <option value="Completed" disabled>Completed</option>
                                        <option value="Not Completed" disabled>Not Completed</option>
                                    </select>                                
                                </div>
                            </div>

                            <br>

                            <div class="form-card">
                                <h5>Training #3</h5>
                                <div class="form-col-2">
                                <input type="text" name="training3" placeholder="Training Program" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="institution3" placeholder="Training Institution" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                
                                <div class="form-col-3">
                                    <input type="text" name="startDuration3" placeholder="Started" required maxlength="" disabled>
                                    <div class="field-space-1"></div>
                                    <h4>TO</h4>
                                    <div class="field-space-1"></div>
                                    <input type="text" name="endDuration3" placeholder="Ended" required maxlength="" disabled>
                                    </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <input type="text" name="certificate3" placeholder="Certificates Received" required min="" max="" disabled>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2" style="margin-right: 20%;">
                                    <select class="" name="completion3" required>
                                        <option value="" style="color:gray;"selected disabled>Completion</option>
                                        <option value="Completed" disabled>Completed</option>
                                        <option value="Not Completed" disabled>Not Completed</option>
                                    </select>                                
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