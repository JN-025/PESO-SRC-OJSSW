<?php
$page_title = "Job";
?>
<?php
// Check existence of id parameter before processing further
if(isset($_GET["c_jobpost_id"]) && !empty(trim($_GET["c_jobpost_id"]))){
    // Include config file
    require_once "../conn_jobpost.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM c_jobpost WHERE c_jobpost_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_c_jobpost_id);
        
        // Set parameters
        $param_c_jobpost_id = trim($_GET["c_jobpost_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $jobTitle = $row["jobTitle"];
                $companyName = $row["companyName"];
                $industry = $row["industry"];
                $position = $row["position"];
                $educBg = $row["educBg"];
                $yrsExperience = $row["yrsExperience"];
                $workLocation = $row["workLocation"];
                $slot = $row["slot"];
                $salary = $row["salary"];
                $skills = $row["skills"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: jobpost.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

     // Close statement
     mysqli_stmt_close($stmt);
    
     // Close connection
     mysqli_close($link);
 } else{
     // URL doesn't contain id parameter. Redirect to error page
     header("location: homepage.php");
     exit();
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/company_sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/company_job.css">
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

       
                    <h1><?php echo $row["jobTitle"]; ?></h2>
                    <h2>Company Name:  <?php echo $row["companyName"]; ?></h2>
                    <h2>Company Industry:  <?php echo $row["industry"]; ?></h2>
                    <h2>Position:  <?php echo $row["position"]; ?></h2>
                    <h2>Educational Background:  <?php echo $row["educBg"]; ?></h2>
                    <h2>Years of Experience:  <?php echo $row["yrsExperience"]; ?></h2>
                    <h2>Work Location: <?php echo $row["workLocation"]; ?></h2>
                    <h2>Number of Slots:  <?php echo $row["slot"]; ?></h2>
                    <h2>Salary:  <?php echo $row["salary"]; ?></h2>
                    <h2>Skills:  <?php echo $row["skills"]; ?></h2>



                </div>

            



            </div>
            </center>
        </div>

        
</body>
</html>