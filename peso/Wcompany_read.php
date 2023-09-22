<?php
// Check existence of id parameter before processing further
if(isset($_GET["Wcompany_id"]) && !empty(trim($_GET["Wcompany_id"]))){
    // Include config file
    require_once "Wapplicant_config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM walkin_company WHERE Wcompany_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_Wcompany_id);
        
        // Set parameters
        $param_Wcompany_id = trim($_GET["Wcompany_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $WcompanyName = $row["WcompanyName"];
                $Windustry = $row["Windustry"];
                $WcontactPerson = $row["WcontactPerson"];
                $WcontactNum = $row["WcontactNum"];
                $Wemail = $row["Wemail"];
                $Wlocation = $row["Wlocation"];
                $WregNum = $row["WregNum"];
                $WcompanyWeb = $row["WcompanyWeb"];
                $WcompanySize = $row["WcompanySize"];
                $WworkingHrs = $row["WworkingHrs"];
                $WdressCode = $row["WdressCode"];
                $WspokenLanguage = $row["WspokenLanguage"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: Wapplicant_error.php");
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
    header("location: Wapplicant_error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="../assets/css/peso_Wcompany.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    
    <?php
        include "../function.php";
        include "company_sidenav.php";
        include "topnav.php";
    ?>
    <div class="main-container">
    <div class="wrapper" style="width:85%">
        <div class="container-fluid-read">
        <p><a href="Wcompany.php" class="exit">X</a></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-read">
                        <h3><b>Company Name:  </b><?php echo $row["WcompanyName"]; ?></h3>
                        <h3><b>Company Industry:  </b><?php echo $row["Windustry"]; ?></h3>
                        <h3><b>Contact Person:  </b><?php echo $row["WcontactPerson"]; ?></h3>
                        <h3><b>Contact Number:  </b><?php echo $row["WcontactNum"]; ?></h3>
                        <h3><b>Email Address:  </b><?php echo $row["Wemail"]; ?></h3>
                        <h3><b>Location:  </b><?php echo $row["Wlocation"]; ?></h3>
                        <h3><b>Registration Number:  </b><?php echo $row["WregNum"]; ?></h3>
                        <h3><b>Company Website:  </b><?php echo $row["WcompanyWeb"]; ?></h3>
                        <h3><b>Company Size:  </b><?php echo $row["WcompanySize"]; ?></h3>
                    </div>
                    <div class="form-group-read">
                        <h3><b>Working Hours:  </b><?php echo $row["WworkingHrs"]; ?></h3>
                        <h3><b>Company Dresscode:  </b><?php echo $row["WdressCode"]; ?></h3>
                        <h3><b>Spoken Language:  </b><?php echo $row["WspokenLanguage"]; ?></h3>
                    </div>
                    
                    
                    
                </div>
            </div>        
        </div>
    </div>
    </div>
</body>
</html>