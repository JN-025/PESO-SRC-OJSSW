<?php
// Check existence of id parameter before processing further
if(isset($_GET["jobpost_id"]) && !empty(trim($_GET["jobpost_id"]))){
    // Include config file
    require_once "connect_draft.php";

    // Prepare a select statement
    $sql = "SELECT * FROM jobpost WHERE jobpost_id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_jobpost_id);
        
        // Set parameters
        $param_jobpost_id = trim($_GET["jobpost_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $companyName = $row["companyName"];
                $jobTitle = $row["jobTitle"];
                $slot = $row["slot"];
                $salary = $row["salary"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: jobpost_draft.php");
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
     header("location: error_draft.php");
     exit();
 }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
    <link rel="stylesheet" href="../CSS/W_APPLICANT.CSS">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card{
            width: 50%;
            background-color: pink;
            height: 50px;
            color: black;
        }

        .card h1
        {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
    <h1><?php echo $row["companyName"]; ?></h1>
    <h1><?php echo $row["jobTitle"]; ?></h1>
    <h1><?php echo $row["slot"]; ?></h1>
    <h1><?php echo $row["salary"]; ?></h1>

    </div>
</body>
</html>