<?php
// Include config file
require_once "Wapplicant_config.php";
 
// Define variables and initialize with empty values
$W_lastName = $W_firstName = $W_midName = $W_suffix = "";
$W_lastName_err = $W_firstName_err = $W_midName_err = $W_suffix_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_W_lastName = trim($_POST["W_lastName"]);
    if(empty($input_W_lastName)){
        $W_lastName_err = "Please enter a name.";
    } elseif(!filter_var($input_W_lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $W_lastName_err = "Please enter a valid name.";
    } else{
        $W_lastName = $input_W_lastName;
    }

    // Validate name
    $input_W_firstName = trim($_POST["W_firstName"]);
    if(empty($input_W_firstName)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_W_firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $W_firstName_err = "Please enter a valid name.";
    } else{
        $W_firstName = $input_W_firstName;
    }

    // Validate name
    $input_W_midName = trim($_POST["W_midName"]);
    if(empty($input_W_midName)){
        $W_midName_err = "Please enter a name.";
    } elseif(!filter_var($input_W_midName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $W_midName_err = "Please enter a valid name.";
    } else{
        $W_midName = $input_W_midName;
    }

    // Validate name
    $input_W_suffix = trim($_POST["W_suffix"]);
    if(empty($input_W_suffix)){
        $W_suffix_err = "Please enter a name.";
    } elseif(!filter_var($input_W_suffix, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $W_suffix_err = "Please enter a valid name.";
    } else{
        $W_suffix = $input_W_suffix;
    }

    
    
    
  
    
    // Check input errors before inserting in database
    if(empty($W_lastName_err) && empty($W_firstName_err) && empty($W_midName_err) && empty($W_suffix_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO walkin_applicant (W_lastName, W_firstName, W_midName, W_suffix) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_W_lastName, $param_W_firstName, $param_W_midName, $param_W_suffix);
            
            // Set parameters
            $param_W_lastName = $W_lastName;
            $param_W_firstName = $W_firstName;
            $param_W_midName = $W_midName;
            $param_W_suffix = $W_suffix;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: W_APPLICANT.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="W_lastName" class="form-control <?php echo (!empty($W_lastName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_lastName; ?>">
                            <span class="invalid-feedback"><?php echo $W_lastName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="W_firstName" class="form-control <?php echo (!empty($W_firstName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_firstName; ?>">
                            <span class="invalid-feedback"><?php echo $W_firstName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="W_midName" class="form-control <?php echo (!empty($W_midName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_midName; ?>">
                            <span class="invalid-feedback"><?php echo $W_midName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Suffix</label>
                            <input type="text" name="W_suffix" class="form-control <?php echo (!empty($W_suffix_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_suffix; ?>">
                            <span class="invalid-feedback"><?php echo $W_suffix_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="W_APPLICANT.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>