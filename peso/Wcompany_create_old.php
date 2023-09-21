<?php
// Include config file
require_once "Wapplicant_config.php";
 
// Define variables and initialize with empty values
$W_companyName = $W_industry = $W_contactPerson = $W_contactNum = $W_email = $W_location = $W_regNum = "";

$W_companyName_err = $W_industry_err = $W_contactPerson_err = $W_contactNum_err = $W_email_err = $W_location_err = $W_regNum_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Validate JOBSEEKER TYPE
    $input_W_companyName = trim($_POST["W_companyName"]);
    if(empty($input_W_companyName)){
        $W_companyName_err = "Please enter an address.";     
    } else{
        $W_companyName = $input_W_companyName;
    }

        // Validate JOBSEEKER TYPE
        $input_W_industry = trim($_POST["W_industry"]);
        if(empty($input_W_industry)){
            $W_industry_err = "Please enter an address.";     
        } else{
            $W_industry = $input_W_industry;
        }

    // Validate JOBSEEKER TYPE
    $input_W_contactPerson = trim($_POST["W_contactPerson"]);
    if(empty($input_W_contactPerson)){
        $W_contactPerson_err = "Please enter an address.";     
    } else{
        $W_contactPerson = $input_W_contactPerson;
    }

    // Validate JOBSEEKER TYPE
    $input_W_contactNum = trim($_POST["W_contactNum"]);
    if(empty($input_W_contactNum)){
        $W_contactNum_err = "Please enter an address.";     
    } else{
        $W_contactNum = $input_W_contactNum;
    }

    // Validate JOBSEEKER TYPE
    $input_W_email = trim($_POST["W_email"]);
    if(empty($input_W_email)){
        $W_email_err = "Please enter an address.";     
    } else{
        $W_email = $input_W_email;
    }

    // Validate JOBSEEKER TYPE
    $input_W_location = trim($_POST["W_location"]);
    if(empty($input_W_location)){
        $W_location_err = "Please enter an address.";     
    } else{
        $W_location = $input_W_location;
    }

        // Validate JOBSEEKER TYPE
    $input_W_regNum = trim($_POST["W_regNum"]);
    if(empty($input_W_regNum)){
        $W_regNum_err = "Please enter an address.";     
    } else{
        $W_regNum = $input_W_regNum;
    }

    
  
    
    // Check input errors before inserting in database
    if(empty($W_companyName_err) && empty($W_industry_err) && empty($W_contactPerson_err) && empty($W_contactNum_err) && empty($W_email_err) && empty($W_location_err) && empty($W_regNum_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO walkin_company (W_companyName, W_industry, W_contactPerson, W_contactNum, W_email, W_location, W_regNum) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_W_companyName, $param_W_industry, $param_W_contactPerson, $param_W_contactNum, $param_W_email, $param_W_location, $param_W_regNum);
            
            // Set parameters
            $param_W_companyName = $W_companyName;
            $param_W_industry = $W_industry;
            $param_W_contactPerson = $W_contactPerson;
            $param_W_contactNum = $W_contactNum;
            $param_W_email = $W_email;
            $param_W_location = $W_location;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: Wcompany.php");
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
    <link rel="stylesheet" href="../assets/css/peso_Wapplicant.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<?php 
    include "../function.php";
    include "applicant_sidenav.php";
    ?>

    <div class="cardA">
            <?php 
                include "topnav.php";
            ?>
            <center>
            <div class="cardB">
                <div class="cardC">


    <div class="card1">
        <div class="card4">
        <div class="wrapper">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                        <h2 class="mt-5">Create Record</h2>
                        <p>Please fill this form and submit to add employee record to the database.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <div class="col1">
                                <label>Last Name</label>
                                <input type="text" name="W_companyName" class="form-control <?php echo (!empty($W_companyName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_companyName; ?>">
                                <span class="invalid-feedback"><?php echo $W_companyName_err;?></span>
                                </div>
                                <div class="col2">
                                <label>First Name</label>
                                <input type="text" name="W_industry" class="form-control <?php echo (!empty($W_industry_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_industry; ?>">
                                <span class="invalid-feedback"><?php echo $W_firstName_err;?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col1">
                                <label>Middle Name</label>
                                <input type="text" name="W_midName" class="form-control <?php echo (!empty($W_midName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_midName; ?>">
                                <span class="invalid-feedback"><?php echo $W_midName_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Suffix</label>
                                <input type="text" name="W_suffix" class="form-control <?php echo (!empty($W_suffix_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_suffix; ?>">
                                <span class="invalid-feedback"><?php echo $W_suffix_err;?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col1">
                                <label>Jobseeker Type</label>
                                <select class="form-control <?php echo (!empty($W_jobseekerType_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_jobseekerType; ?>" name="W_jobseekerType" required>
                                    <option value="" >Select Type</option>
                                    <option value="first_time">FIRST TIME</option>
                                    <option value="jobseeker">JOBSEEKER</option>
                                    <option value="ofw">OFW</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_jobseekerType_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Birthplace</label>
                                <input type="text" name="W_birthplace" class="form-control <?php echo (!empty($W_birthplace_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_birthplace; ?>">
                                <span class="invalid-feedback"><?php echo $W_birthplace_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Birthday</label>
                                <input type="date" name="W_birthday" class="form-control <?php echo (!empty($W_birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_birthday; ?>">
                                <span class="invalid-feedback"><?php echo $W_birthday_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Age</label>
                                <input type="number" name="W_age" class="form-control <?php echo (!empty($W_age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_age; ?>">
                                <span class="invalid-feedback"><?php echo $W_age_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Sex</label>
                                <select class="form-control <?php echo (!empty($W_sex_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_sex; ?>" name="W_sex" required>
                                    <option value="" disabled>Select Sex</option>
                                    <option value="Female">FEMALE</option>
                                    <option value="Male">MALE</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_sex_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Civil Status</label>
                                <select class="form-control <?php echo (!empty($W_civilStatus_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_civilStatus; ?>" name="W_civilStatus" required>
                                    <option value="" disabled>Select Status</option>
                                    <option value="Single">FIRST TIME</option>
                                    <option value="Married">JOBSEEKER</option>
                                    <option value="Single Parent">SINGLE PARENT</option>
                                    <option value="Widow">WIDOW</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_civilStatus_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Citizenship</label>
                                <input type="text" name="W_citizenship" class="form-control <?php echo (!empty($W_citizenship_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_citizenship; ?>">
                                <span class="invalid-feedback"><?php echo $W_citizenship_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Email</label>
                                <input type="text" name="W_email" class="form-control <?php echo (!empty($W_email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_email; ?>">
                                <span class="invalid-feedback"><?php echo $W_email_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Present House No.</label>
                                <input type="text" name="W_housenumPresent" class="form-control <?php echo (!empty($W_housenumPresent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_housenumPresent; ?>">
                                <span class="invalid-feedback"><?php echo $W_housenumPresent_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Present Baranggay</label>
                                <input type="text" name="W_brgyPresent" class="form-control <?php echo (!empty($W_brgyPresent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_brgyPresent; ?>">
                                <span class="invalid-feedback"><?php echo $W_brgyPresent_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Present City</label>
                                <input type="text" name="W_cityPresent" class="form-control <?php echo (!empty($W_cityPresent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_cityPresent; ?>">
                                <span class="invalid-feedback"><?php echo $W_cityPresent_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Present Province</label>
                                <input type="text" name="W_provincePresent" class="form-control <?php echo (!empty($W_provincePresent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_provincePresent; ?>">
                                <span class="invalid-feedback"><?php echo $W_provincePresent_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Permanent House No.</label>
                                <input type="text" name="W_housenumPermanent" class="form-control <?php echo (!empty($W_housenumPermanent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_housenumPermanent; ?>">
                                <span class="invalid-feedback"><?php echo $W_housenumPermanent_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Permanent Baranggay</label>
                                <input type="text" name="W_brgyPermanent" class="form-control <?php echo (!empty($W_brgyPermanent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_brgyPermanent; ?>">
                                <span class="invalid-feedback"><?php echo $W_brgyPermanent_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Permanent City</label>
                                <input type="text" name="W_cityPermanent" class="form-control <?php echo (!empty($W_cityPermanent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_cityPermanent; ?>">
                                <span class="invalid-feedback"><?php echo $W_cityPermanent_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Permanent Province</label>
                                <input type="text" name="W_provincePermanent" class="form-control <?php echo (!empty($W_provincePermanent_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_provincePermanent; ?>">
                                <span class="invalid-feedback"><?php echo $W_provincePermanent_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Height</label>
                                <input type="number" name="W_height" class="form-control <?php echo (!empty($W_height_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_height; ?>">
                                <span class="invalid-feedback"><?php echo $W_height_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Weight</label>
                                <input type="number" name="W_weight" class="form-control <?php echo (!empty($W_weight_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_weight; ?>">
                                <span class="invalid-feedback"><?php echo $W_weight_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Landline Number</label>
                                <input type="number" name="W_landlineNum" class="form-control <?php echo (!empty($W_landlineNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_landlineNum; ?>">
                                <span class="invalid-feedback"><?php echo $W_landlineNum_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Mobile Number</label>
                                <input type="number" name="W_mobilePnum" class="form-control <?php echo (!empty($W_mobilePnum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_mobilePnum; ?>">
                                <span class="invalid-feedback"><?php echo $W_mobilePnum_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Disability</label>
                                <select class="form-control <?php echo (!empty($W_disability_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_disability; ?>" name="W_disability" required>
                                    <option value="" disabled>Select Disability</option>
                                    <option value="none">NONE</option>
                                    <option value="visual">VISUAL</option>
                                    <option value="hearing">HEARING</option>
                                    <option value="speech">SPEECH</option>
                                    <option value="physical">PHYSICAL</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_disabity_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Employment Status</label>
                                <select class="form-control <?php echo (!empty($W_employmentStatus_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_employmentStatus; ?>" name="W_employmentStatus" required>
                                    <option value="" disabled>Select Status</option>
                                    <option value="wage_employed">WAGE EMPLOYED</option>
                                    <option value="self_employed">SELF EMPLOYED</option>
                                    <option value="fresh_grad">FRESH GRADUATE</option>
                                    <option value="finish_contract">FINISH CONTRACT</option>
                                    <option value="resigned">RESIGNED</option>
                                    <option value="retired">RETIRED</option>
                                    <option value="terminated">TERMINATED</option>
                                    <option value="laidoff_local">LAID OFF LOCAL</option>
                                    <option value="laidoff_abroad">LAID OFF ABROAD</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_employmentStatus_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Educational Level</label>
                                <input type="text" name="W_educLevel" class="form-control <?php echo (!empty($W_educLevel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_educLevel; ?>">
                                <span class="invalid-feedback"><?php echo $W_educLevel_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Year Graduated</label>
                                <input type="number" name="W_gradYear" class="form-control <?php echo (!empty($W_gradYear_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_gradYear; ?>">
                                <span class="invalid-feedback"><?php echo $W_gradYear_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>School</label>
                                <input type="text" name="W_school" class="form-control <?php echo (!empty($W_school_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_school; ?>">
                                <span class="invalid-feedback"><?php echo $W_school_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Course</label>
                                <input type="text" name="W_course" class="form-control <?php echo (!empty($W_course_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_course; ?>">
                                <span class="invalid-feedback"><?php echo $W_course_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Preferred Industry</label>
                                <input type="text" name="W_preferIndustry" class="form-control <?php echo (!empty($W_preferIndustry_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_preferIndustry; ?>">
                                <span class="invalid-feedback"><?php echo $W_preferIndustry_err;?></span>
                                </div>
                                <div class="col2">
                                <label>Actively Looking?</label>
                                <select class="form-control <?php echo (!empty($W_activelyLooking_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_activelyLooking; ?>" name="W_activelyLooking" required>
                                    <option value="" disabled>Select Answer</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_activelyLooking_err;?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col1">
                                <label>Willingly Work?</label>
                                <select class="form-control <?php echo (!empty($W_willinglyWork_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_willinglyWork; ?>" name="W_willinglyWork" required>
                                    <option value="" disabled>Select Answer</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_willinglyWork_err;?></span>
                                </div>
                                <div class="col2">
                                <label>4Ps Beneficiary?</label>
                                <select class="form-control <?php echo (!empty($W_fourPsBeneficiary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_fourPsBeneficiary; ?>" name="W_fourPsBeneficiary" required>
                                    <option value="" disabled>Select Answer</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $W_fourPsBeneficiary_err;?></span>
                                </div>
                            </div>

                            


                            

                            
                            
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="Wapplicant.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                        
                    </div>
                </div>        
            </div>
        </div>
        </div>
    </div>


    
    </div>
    </div>
    </center>
    </div>



</body>
</html>