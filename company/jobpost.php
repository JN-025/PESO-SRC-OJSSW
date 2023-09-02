<?php
$page_title = "Job Post";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/company_sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/company_jobpost.css">
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
                <div class="card3">
                <?php
                    // Include config file
                    require_once "../conn_jobpost.php";
                    // Attempt select query execution
                    $sql = "SELECT * FROM c_jobpost";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 1){
                            echo "<h1>JOB POST</h1>";
                            while($row = mysqli_fetch_array($result)){
                                ?>

                        <div class="card4">
                            <h2><?php echo $row['jobTitle']; ?></h2>
                            <h3>Company Name:  <?php echo $row['companyName']; ?></h3>
                            <h3>Company Industry:  <?php echo $row['industry']; ?></h3>
                            <h3>Work Location:  <?php echo $row['workLocation']; ?></h3>
                            <h3>Slots:  <?php echo $row['slot']; ?></h3>
                            <h3>Salary:  <?php echo $row['salary']; ?></h3>
                            <h3>Skills:  <?php echo $row['skills']; ?></h3>
                            <button class="apply"><a href="job.php?c_jobpost_id=<?php echo $row['c_jobpost_id']; ?>" style="text-decoration: none;">Apply</a></button>

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



            </div>
            </center>
        </div>

        
</body>
</html>