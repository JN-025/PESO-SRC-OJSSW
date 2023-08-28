
 <?php
// Include config file
require_once "connect_draft.php";
 
// Define variables and initialize with empty values
$companyName = $jobTitle = $slot = $salary = "";
$companyName_err = $jobTitle_err = $slot_err = $salary_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 // Validate 
 $input_companyName = trim($_POST["companyName"]);
 if(empty($input_companyName)){
     $companyName_err = "Please enter an address.";     
 } else{
     $companyName = $input_companyName;
 }

 $input_jobTitle = trim($_POST["jobTitle"]);
 if(empty($input_jobTitle)){
     $jobTitle_err = "Please enter an address.";     
 } else{
     $jobTitle = $input_jobTitle;
 }

 $input_slot = trim($_POST["slot"]);
 if(empty($input_slot)){
     $slot_err = "Please enter an address.";     
 } else{
     $slot = $input_slot;
 }

 $input_salary = trim($_POST["salary"]);
 if(empty($input_salary)){
     $salary_err = "Please enter an address.";     
 } else{
     $salary = $input_salary;
 }


 // Check input errors before inserting in database
 if(empty($companyName_err) && empty($jobTitle_err) && empty($slot_err) && empty($salary_err)){

    $sql = "INSERT INTO jobpost (companyName, jobTitle, slot, salary) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $param_companyName, $param_jobTitle, $param_slot, $param_salary);
        
        // Set parameters
        $param_companyName = $companyName;
        $param_jobTitle = $jobTitle;
        $param_slot = $slot;
        $param_salary = $salary;

         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
            // Records created successfully. Redirect to landing page
            header("location: jobpost_draft.php");
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
        <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
        <link rel="stylesheet" href="../CSS/W_APPLICANT.CSS">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>
    <body style="color:black;">
        <p>Please fill this form and submit to add employee record to the database.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Company Name</label>
            <input type="text" name="companyName" class="form-control <?php echo (!empty($companyName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $companyName; ?>">
            <span class="invalid-feedback"><?php echo $companyName_err;?></span>
            
            <br>

            <label>Job Title</label>
            <input type="text" name="jobTitle" class="form-control <?php echo (!empty($jobTitle_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $jobTitle; ?>">
            <span class="invalid-feedback"><?php echo $jobTitle_err;?></span>
            
            <br>

            <label>Slot</label>
            <input type="number" name="slot" class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $slot; ?>">
            <span class="invalid-feedback"><?php echo $slot_err;?></span>
            
            <br>

            <label>Salary</label>
            <input type="number" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
            <span class="invalid-feedback"><?php echo $salary_err;?></span>
            
            <br>

            <input type="submit" class="btn btn-primary" value="Submit">


        </form>
    </body>
</html>
