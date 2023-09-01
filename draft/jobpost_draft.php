<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WALK-IN APPLICANT</title>
        <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
        <link rel="stylesheet" href="../CSS/W_APPLICANT.CSS">
        <style>
            .card {
                background-color: blue;
                margin-bottom: 10px;
            }

            .card2 {
                background-color: pink;
                margin-bottom: 10px;
            }

            .card2 h1 {
                font-size: 20px;
                color: black;
            }
        </style>
        
    </head>
    <body>
        <div class="card">
        <?php
            // Include config file
            require_once "connect_draft.php";
            // Attempt select query execution
            $sql = "SELECT * FROM c_jobpost";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 1){
                    echo "<h1>JOB POST</h1>";
                    while($row = mysqli_fetch_array($result)){
                        ?>

                        <div class="card4">
                            <h2><?php echo $row['jobTitle']; ?></h2>
                            <h1><?php echo $row['companyName']; ?></h1>
                            <h1><?php echo $row['jobTitle']; ?></h1>
                            <h1><?php echo $row['slot']; ?></h1>
                            <h1><?php echo $row['salary']; ?></h1>
                            <h1><a href="job_draft.php?c_jobpost_id=<?php echo $row['c_jobpost_id']; ?>">apply</a></h1>

                        </div>

                        <?php

                    }

                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close connection
            mysqli_close($link);
        ?>
        </div>

    </body>
</html>
