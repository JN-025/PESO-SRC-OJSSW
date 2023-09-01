<?php
// Include config file
require_once "Wapplicant_config.php";
 
// Define variables and initialize with empty values
$W_lastName = $W_firstName = $W_midName = $W_suffix = $W_jobseekerType = $W_birthplace = $W_birthday = $W_age = $W_sex = $W_civilStatus = $W_citizenship = $W_email = $W_housenumPresent = $W_brgyPresent = $W_cityPresent = $W_provincePresent = $W_housenumPermanent = $W_brgyPermanent = $W_cityPermanent = $W_provincePermanent = $W_height = $W_weight = $W_landlineNum = $W_mobilePnum = $W_disability = $W_employmentStatus = $W_educLevel = $W_gradYear = $W_school = $W_course = $W_preferIndustry = $W_activelyLooking = $W_willinglyWork = $W_fourPsBeneficiary = "";


$W_lastName_err = $W_firstName_err = $W_midName_err = $W_suffix_err = $W_jobseekerType_err = $W_birthplace_err = $W_birthday_err = $W_age_err = $W_sex_err = $W_civilStatus_err = $W_citizenship_err = $W_email_err = $W_housenumPresent_err = $W_brgyPresent_err = $W_cityPresent_err = $W_provincePresent_err = $W_housenumPermanent_err = $W_brgyPermanent_err = $W_cityPermanent_err = $W_provincePermanent_err = $W_height_err = $W_weight_err = $W_landlineNum_err = $W_mobilePnum_err = $W_disability_err = $W_employmentStatus_err = $W_educLevel_err = $W_gradYear_err = $W_school_err = $W_course_err = $W_preferIndustry_err = $W_activelyLooking_err = $W_willinglyWork_err = $W_fourPsBeneficiary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["W_applicant_id"]) && !empty($_POST["W_applicant_id"])){
    // Get hidden input value
    $W_applicant_id = $_POST["W_applicant_id"];
    
   // Validate LAST NAME
   $input_W_lastName = trim($_POST["W_lastName"]);
   if(empty($input_W_lastName)){
       $W_lastName_err = "Please enter a name.";
   } elseif(!filter_var($input_W_lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       $W_lastName_err = "Please enter a valid name.";
   } else{
       $W_lastName = $input_W_lastName;
   }
    
    // Validate FIRST NAME
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
    
    // Validate JOBSEEKER TYPE
    $input_W_jobseekerType = trim($_POST["W_jobseekerType"]);
    if(empty($input_W_jobseekerType)){
        $W_jobseekerType_err = "Please enter an address.";     
    } else{
        $W_jobseekerType = $input_W_jobseekerType;
    }

        // Validate JOBSEEKER TYPE
        $input_W_birthplace = trim($_POST["W_birthplace"]);
        if(empty($input_W_birthplace)){
            $W_birthplace_err = "Please enter an address.";     
        } else{
            $W_birthplace = $input_W_birthplace;
        }

    // Validate JOBSEEKER TYPE
    $input_W_birthday = trim($_POST["W_birthday"]);
    if(empty($input_W_birthday)){
        $W_birthday_err = "Please enter an address.";     
    } else{
        $W_birthday = $input_W_birthday;
    }

    // Validate JOBSEEKER TYPE
    $input_W_age = trim($_POST["W_age"]);
    if(empty($input_W_age)){
        $W_age_err = "Please enter an address.";     
    } else{
        $W_age = $input_W_age;
    }

    // Validate JOBSEEKER TYPE
    $input_W_sex = trim($_POST["W_sex"]);
    if(empty($input_W_sex)){
        $W_sex_err = "Please enter an address.";     
    } else{
        $W_sex = $input_W_sex;
    }

    // Validate JOBSEEKER TYPE
    $input_W_civilStatus = trim($_POST["W_civilStatus"]);
    if(empty($input_W_civilStatus)){
        $W_civilStatus_err = "Please enter an address.";     
    } else{
        $W_civilStatus = $input_W_civilStatus;
    }

            // Validate JOBSEEKER TYPE
            $input_W_citizenship = trim($_POST["W_citizenship"]);
            if(empty($input_W_citizenship)){
                $W_citizenship_err = "Please enter an address.";     
            } else{
                $W_citizenship = $input_W_citizenship;
            }
        
                 // Validate JOBSEEKER TYPE
            $input_W_email = trim($_POST["W_email"]);
            if(empty($input_W_email)){
                $W_email_err = "Please enter an address.";     
            } else{
                $W_email = $input_W_email;
            }
        
            // Validate JOBSEEKER TYPE
            $input_W_housenumPresent = trim($_POST["W_housenumPresent"]);
            if(empty($input_W_housenumPresent)){
                $W_housenumPresent_err = "Please enter an address.";     
            } else{
                $W_housenumPresent = $input_W_housenumPresent;
            }

            // Validate JOBSEEKER TYPE
    $input_W_brgyPresent = trim($_POST["W_brgyPresent"]);
    if(empty($input_W_brgyPresent)){
        $W_brgyPresent_err = "Please enter an address.";     
    } else{
        $W_brgyPresent = $input_W_brgyPresent;
    }

    // Validate JOBSEEKER TYPE
    $input_W_cityPresent = trim($_POST["W_cityPresent"]);
    if(empty($input_W_cityPresent)){
        $W_cityPresent_err = "Please enter an address.";     
    } else{
        $W_cityPresent = $input_W_cityPresent;
    }

    // Validate JOBSEEKER TYPE
    $input_W_provincePresent = trim($_POST["W_provincePresent"]);
    if(empty($input_W_provincePresent)){
        $W_provincePresent_err = "Please enter an address.";     
    } else{
        $W_provincePresent = $input_W_provincePresent;
    }

        // Validate JOBSEEKER TYPE
        $input_W_housenumPermanent = trim($_POST["W_housenumPermanent"]);
        if(empty($input_W_housenumPermanent)){
            $W_housenumPermanent_err = "Please enter an address.";     
        } else{
            $W_housenumPermanent = $input_W_housenumPermanent;
        }
    
        // Validate JOBSEEKER TYPE
        $input_W_brgyPermanent = trim($_POST["W_brgyPermanent"]);
        if(empty($input_W_brgyPermanent)){
            $W_brgyPermanent_err = "Please enter an address.";     
        } else{
            $W_brgyPermanent = $input_W_brgyPermanent;
        }
    
        // Validate JOBSEEKER TYPE
        $input_W_cityPermanent = trim($_POST["W_cityPermanent"]);
        if(empty($input_W_cityPermanent)){
            $W_cityPermanent_err = "Please enter an address.";     
        } else{
            $W_cityPermanent = $input_W_cityPermanent;
        }

        // Validate JOBSEEKER TYPE
        $input_W_provincePermanent = trim($_POST["W_provincePermanent"]);
        if(empty($input_W_provincePermanent)){
            $W_provincePermanent_err = "Please enter an address.";     
        } else{
            $W_provincePermanent = $input_W_provincePermanent;
        }
    
        // Validate JOBSEEKER TYPE
        $input_W_height = trim($_POST["W_height"]);
        if(empty($input_W_height)){
            $W_height_err = "Please enter an address.";     
        } else{
            $W_height = $input_W_height;
        }
    
        // Validate JOBSEEKER TYPE
        $input_W_weight = trim($_POST["W_weight"]);
        if(empty($input_W_weight)){
            $W_weight_err = "Please enter an address.";     
        } else{
            $W_weight = $input_W_weight;
        }

    // Validate JOBSEEKER TYPE
    $input_W_landlineNum = trim($_POST["W_landlineNum"]);
    if(empty($input_W_landlineNum)){
        $W_landlineNum_err = "Please enter an address.";     
    } else{
        $W_landlineNum = $input_W_landlineNum;
    }

    // Validate JOBSEEKER TYPE
    $input_W_mobilePnum = trim($_POST["W_mobilePnum"]);
    if(empty($input_W_mobilePnum)){
        $W_mobilePnum_err = "Please enter an address.";     
    } else{
        $W_mobilePnum = $input_W_mobilePnum;
    }

    // Validate JOBSEEKER TYPE
    $input_W_disability = trim($_POST["W_disability"]);
    if(empty($input_W_disability)){
        $W_disability_err = "Please enter an address.";     
    } else{
        $W_disability = $input_W_disability;
    }

    // Validate JOBSEEKER TYPE
    $input_W_employmentStatus = trim($_POST["W_employmentStatus"]);
    if(empty($input_W_employmentStatus)){
        $W_employmentStatus_err = "Please enter an address.";     
    } else{
        $W_employmentStatus = $input_W_employmentStatus;
    }

    // Validate JOBSEEKER TYPE
    $input_W_educLevel = trim($_POST["W_educLevel"]);
    if(empty($input_W_educLevel)){
        $W_educLevel_err = "Please enter an address.";     
    } else{
        $W_educLevel = $input_W_educLevel;
    }

    // Validate JOBSEEKER TYPE
    $input_W_gradYear = trim($_POST["W_gradYear"]);
    if(empty($input_W_gradYear)){
        $W_gradYear_err = "Please enter an address.";     
    } else{
        $W_gradYear = $input_W_gradYear;
    }

        // Validate JOBSEEKER TYPE
    $input_W_school = trim($_POST["W_school"]);
    if(empty($input_W_school)){
        $W_school_err = "Please enter an address.";     
    } else{
        $W_school = $input_W_school;
    }

    // Validate JOBSEEKER TYPE
    $input_W_course = trim($_POST["W_course"]);
    if(empty($input_W_course)){
        $W_course_err = "Please enter an address.";     
    } else{
        $W_course = $input_W_course;
    }

    // Validate JOBSEEKER TYPE
    $input_W_preferIndustry = trim($_POST["W_preferIndustry"]);
    if(empty($input_W_preferIndustry)){
        $W_preferIndustry_err = "Please enter an address.";     
    } else{
        $W_preferIndustry = $input_W_preferIndustry;
    }

        // Validate JOBSEEKER TYPE
    $input_W_activelyLooking = trim($_POST["W_activelyLooking"]);
    if(empty($input_W_activelyLooking)){
        $W_activelyLooking_err = "Please enter an address.";     
    } else{
        $W_activelyLooking = $input_W_activelyLooking;
    }

    // Validate JOBSEEKER TYPE
    $input_W_willinglyWork = trim($_POST["W_willinglyWork"]);
    if(empty($input_W_willinglyWork)){
        $W_willinglyWork_err = "Please enter an address.";     
    } else{
        $W_willinglyWork = $input_W_willinglyWork;
    }

    // Validate JOBSEEKER TYPE
    $input_W_fourPsBeneficiary = trim($_POST["W_fourPsBeneficiary"]);
    if(empty($input_W_fourPsBeneficiary)){
        $W_fourPsBeneficiary_err = "Please enter an address.";     
    } else{
        $W_fourPsBeneficiary = $input_W_fourPsBeneficiary;
    }
     
    // Check input errors before inserting in database
    if(empty($W_lastName_err) && empty($W_firstName_err) && empty($W_midName_err) && empty($W_suffix_err) && empty($W_jobseekerType_err) && empty($W_birthplace_err) && empty($W_birthday_err) && empty($W_age_err) && empty($W_sex_err) && empty($W_civilStatus_err) && empty($W_citizenship_err) && empty($W_email_err) && empty($W_housenumPresent_err) && empty($W_brgyPresent_err) && empty($W_cityPresent_err) && empty($W_provincePresent_err) && empty($W_housenumPermanent_err) && empty($W_brgyPermanent_err) && empty($W_cityPermanent_err) && empty($W_provincePermanent_err) && empty($W_height_err) && empty($W_weight_err) && empty($W_landlineNum_err) && empty($W_mobilePnum_err) && empty($W_disability_err) && empty($W_employmentStatus_err) && empty($W_educLevel_err) && empty($W_gradYear_err) && empty($W_school_err) && empty($W_course_err) && empty($W_preferIndustry_err) && empty($W_activelyLooking_err) && empty($W_willinglyWork_err) && empty($W_fourPsBeneficiary_err)){
        // Prepare an update statement
        $sql = "UPDATE walkin_applicant SET W_lastName=?, W_firstName=?, W_midName=?, W_suffix=?, W_jobseekerType=?, W_birthplace=?, W_birthday=?, W_age=?, W_sex=?, W_civilStatus=?, W_citizenship=?, W_email=?, W_housenumPresent=?, W_brgyPresent=?, W_cityPresent=?, W_provincePresent=?, W_housenumPermanent=?, W_brgyPermanent=?, W_cityPermanent=?, W_provincePermanent=?, W_height=?, W_weight=?, W_landlineNum=?, W_mobilePnum=?, W_disability=?, W_employmentStatus=?, W_educLevel=?, W_gradYear=?, W_school=?, W_course=?, W_preferIndustry=?, W_activelyLooking=?, W_willinglyWork=?, W_fourPsBeneficiary=? WHERE W_applicant_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssi", $param_W_lastName, $param_W_firstName, $param_W_midName, $param_W_suffix, $param_W_jobseekerType, $param_W_birthplace, $param_W_birthday, $param_W_age, $param_W_sex, $param_W_civilStatus, $param_W_citizenship, $param_W_email, $param_W_housenumPresent, $param_W_brgyPresent, $param_W_cityPresent, $param_W_provincePresent, $param_W_housenumPermanent, $param_W_brgyPermanent, $param_W_cityPermanent, $param_W_provincePermanent, $param_W_height, $param_W_weight, $param_W_landlineNum, $param_W_mobilePnum, $param_W_disability, $param_W_employmentStatus, $param_W_educLevel, $param_W_gradYear, $param_W_school, $param_W_course, $param_W_preferIndustry, $param_W_activelyLooking, $param_W_willinglyWork, $param_W_fourPsBeneficiary, $param_W_applicant_id);
            
            // Set parameters
            $param_W_lastName = $W_lastName;
            $param_W_firstName = $W_firstName;
            $param_W_midName = $W_midName;
            $param_W_suffix = $W_suffix;
            $param_W_jobseekerType = $W_jobseekerType;
            $param_W_birthplace = $W_birthplace;
            $param_W_birthday = $W_birthday;
            $param_W_age = $W_age;
            $param_W_sex = $W_sex;
            $param_W_civilStatus = $W_civilStatus;
            $param_W_citizenship = $W_citizenship;
            $param_W_email = $W_email;
            $param_W_housenumPresent = $W_housenumPresent;
            $param_W_brgyPresent = $W_brgyPresent;
            $param_W_cityPresent = $W_cityPresent;
            $param_W_provincePresent = $W_provincePresent;
            $param_W_housenumPermanent = $W_housenumPermanent;
            $param_W_brgyPermanent = $W_brgyPermanent;
            $param_W_cityPermanent = $W_cityPermanent;
            $param_W_provincePermanent = $W_provincePermanent;
            $param_W_height = $W_height;
            $param_W_weight = $W_weight;
            $param_W_landlineNum = $W_landlineNum;
            $param_W_mobilePnum = $W_mobilePnum;
            $param_W_disability = $W_disability;
            $param_W_employmentStatus = $W_employmentStatus;
            $param_W_educLevel = $W_educLevel;
            $param_W_gradYear = $W_gradYear;
            $param_W_school = $W_school;
            $param_W_course = $W_course;
            $param_W_preferIndustry = $W_preferIndustry;
            $param_W_activelyLooking = $W_activelyLooking;
            $param_W_willinglyWork = $W_willinglyWork;
            $param_W_fourPsBeneficiary = $W_fourPsBeneficiary;
            $param_W_applicant_id = $W_applicant_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["W_applicant_id"]) && !empty(trim($_GET["W_applicant_id"]))){
        // Get URL parameter
        $W_applicant_id =  trim($_GET["W_applicant_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM walkin_applicant WHERE W_applicant_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_W_applicant_id);
            
            // Set parameters
            $param_W_applicant_id = $W_applicant_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $W_lastName = $row["W_lastName"];
                    $W_firstName = $row["W_firstName"];
                    $W_midName = $row["W_midName"];
                    $W_suffix = $row["W_suffix"];
                    $W_jobseekerType = $row["W_jobseekerType"];
                    $W_birthplace = $row["W_birthplace"];
                    $W_birthday = $row["W_birthday"];
                    $W_age = $row["W_age"];
                    $W_sex = $row["W_sex"];
                    $W_civilStatus = $row["W_civilStatus"];
                    $W_citizenship = $row["W_citizenship"];
                    $W_email = $row["W_email"];
                    $W_housenumPresent = $row["W_housenumPresent"];
                    $W_brgyPresent = $row["W_brgyPresent"];
                    $W_cityPresent = $row["W_cityPresent"];
                    $W_provincePresent = $row["W_provincePresent"];
                    $W_housenumPermanent = $row["W_housenumPermanent"];
                    $W_brgyPermanent = $row["W_brgyPermanent"];
                    $W_cityPermanent = $row["W_cityPermanent"];
                    $W_provincePermanent = $row["W_provincePermanent"];
                    $W_height = $row["W_height"];
                    $W_weight = $row["W_weight"];
                    $W_landlineNum = $row["W_landlineNum"];
                    $W_mobilePnum = $row["W_mobilePnum"];
                    $W_disability = $row["W_disability"];
                    $W_employmentStatus = $row["W_employmentStatus"];
                    $W_educLevel = $row["W_educLevel"];
                    $W_gradYear = $row["W_gradYear"];
                    $W_school = $row["W_school"];
                    $W_course = $row["W_course"];
                    $W_preferIndustry = $row["W_preferIndustry"];
                    $W_activelyLooking = $row["W_activelyLooking"];
                    $W_willinglyWork = $row["W_willinglyWork"];
                    $W_fourPsBeneficiary = $row["W_fourPsBeneficiary"];
                    


                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: W_APPLICANT_ERROR.php");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: W_APPLICANT_ERROR.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
    <link rel="stylesheet" href="../assets/css/peso_Wapplicant.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<?php 
    include "../function.php";
    include "sidenav.php";
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <div class="col1">
                                <label>Last Name</label>
                                <input type="text" name="W_lastName" class="form-control <?php echo (!empty($W_lastName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_lastName; ?>">
                                <span class="invalid-feedback"><?php echo $W_lastName_err;?></span>
                            </div>
                            <div class="col2">
                                <label>First Name</label>
                                <input type="text" name="W_firstName" class="form-control <?php echo (!empty($W_firstName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $W_firstName; ?>">
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

   
                    
                        <input type="hidden" name="W_applicant_id" value="<?php echo $W_applicant_id; ?>"/>
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