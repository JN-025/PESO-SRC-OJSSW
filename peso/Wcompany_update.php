<?php
// Include config file
require_once "Wapplicant_config.php";
 
// Define variables and initialize with empty values
$WcompanyName = $Windustry = $WcontactPerson = $WcontactNum = $Wemail = $Wlocation = $WregNum = $WcompanyWeb = $WcompanySize = $WworkingHrs = $WdressCode = $WspokenLanguage = "";
$WcompanyName_err = $Windustry_err = $WcontactPerson_err = $WcontactNum_err = $Wemail_err = $Wlocation_err = $WregNum_err = $WcompanyWeb_err = $WcompanySize_err = $WworkingHrs_err = $WdressCode_err = $WspokenLanguage_err = "";

// Processing form data when form is submitted
if(isset($_POST["Wcompany_id"]) && !empty($_POST["Wcompany_id"])){
    // Get hidden input value
    $Wcompany_id = $_POST["Wcompany_id"];


    // Validate name
    $input_WcompanyName = trim($_POST["WcompanyName"]);
    if(empty($input_WcompanyName)){
        $WcompanyName_err = "Please enter a name.";
    } else{
        $WcompanyName = $input_WcompanyName;
    }

    // Validate name
    $input_Windustry = trim($_POST["Windustry"]);
    if(empty($input_Windustry)){
        $Windustry_err = "Please enter a name.";
    } else{
        $Windustry = $input_Windustry;
    }

    // Validate name
    $input_WcontactNum = trim($_POST["WcontactNum"]);
    if(empty($input_WcontactNum)){
        $WcontactNum_err = "Please enter a name.";
    } else{
        $WcontactNum = $input_WcontactNum;
    }

    // Validate name
    $input_Wemail = trim($_POST["Wemail"]);
    if(empty($input_Wemail)){
        $Wemail_err = "Please enter a name.";
    } else{
        $Wemail = $input_Wemail;
    }

    // Validate name
    $input_Wlocation = trim($_POST["Wlocation"]);
    if(empty($input_Wlocation)){
        $Wlocation_err = "Please enter a name.";
    } else{
        $Wlocation = $input_Wlocation;
    }

    // Validate name
    $input_WregNum = trim($_POST["WregNum"]);
    if(empty($input_WregNum)){
        $WregNum_err = "Please enter a name.";
    } else{
        $WregNum = $input_WregNum;
    }

    // Validate name
    $input_WcompanyWeb = trim($_POST["WcompanyWeb"]);
    if(empty($input_WcompanyWeb)){
        $WcompanyWeb_err = "Please enter a name.";
    } else{
        $WcompanyWeb = $input_WcompanyWeb;
    }


    // Validate name
    $input_WcompanySize = trim($_POST["WcompanySize"]);
    if(empty($input_WcompanySize)){
        $WcompanySize_err = "Please enter a name.";
    } else{
        $WcompanySize = $input_WcompanySize;
    }

    // Validate name
    $input_WworkingHrs = trim($_POST["WworkingHrs"]);
    if(empty($input_WworkingHrs)){
        $WworkingHrs_err = "Please enter a name.";
    } else{
        $WworkingHrs = $input_WworkingHrs;
    }

    // Validate name
    $input_WdressCode = trim($_POST["WdressCode"]);
    if(empty($input_WdressCode)){
        $WdressCode_err = "Please enter a name.";
    } else{
        $WdressCode = $input_WdressCode;
    }

    // Validate name
    $input_WspokenLanguage = trim($_POST["WspokenLanguage"]);
    if(empty($input_WspokenLanguage)){
        $WspokenLanguage_err = "Please enter a name.";
    } else{
        $WspokenLanguage = $input_WspokenLanguage;
    }

    



    
    
    
  
    
    // Check input errors before inserting in database
    if(empty($WcompanyName_err) && empty($Windustry_err) && empty($WcompanyPerson_err) && empty($WcontactNum_err) && empty($Wemail_err) && empty($Wlocation_err) && empty($WregNum_err) && empty($WcompanyWeb_err) && empty($WcompanySize_err) && empty($WworkingHrs_err) && empty($WdressCode_err) && empty($WspokenLanguage_err)){

        // Prepare an update statement
        $sql = "UPDATE walkin_company SET WcompanyName=?, Windustry=?, WcontactPerson=?, WcontactNum=?, Wemail=?, Wlocation=?, WregNum=?, WcompanyWeb=?, WcompanySize=?, WworkingHrs=?, WdressCode=?, WspokenLanguage=?) WHERE Wcompany_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssi", $param_WcompanyName, $param_Windustry, $param_WcontactPerson, $param_WcontactNum, $param_Wemail, $param_Wlocation, $param_WregNum, $param_WcompanyWeb, $param_WcompanySize, $param_WworkingHrs, $param_WdressCode, $param_WspokenLanguage, $param_Wcompany_id);
            
            // Set parameters
            $param_WcompanyName = $WcompanyName;
            $param_Windustry = $Windustry;
            $param_WcontactPerson = $WcontactPerson;
            $param_WcontactNum = $WcontactNum;
            $param_Wemail = $Wemail;
            $param_Wlocation = $Wlocation;
            $param_WregNum = $WregNum;
            $param_WcompanyWeb = $WcompanyWeb;
            $param_WcompanySize = $WcompanySize;
            $param_WworkingHrs = $WworkingHrs;
            $param_WdressCode = $WdressCode;
            $param_WspokenLanguage = $WspokenLanguage;
            $param_Wcompany_id = $Wcompany_id;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: Wapplicant.php");
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
    if(isset($_GET["Wcompany_id"]) && !empty(trim($_GET["Wcompany_id"]))){
        // Get URL parameter
        $Wcompany_id =  trim($_GET["Wcompany_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM walkin_company WHERE Wcompany_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_Wcompany_id);
            
            // Set parameters
            $param_Wcompany_id = $Wcompany_id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: Wapplicant_error.php");
        exit();
    }
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
    <div class="main-container">
    <div class="wrapper" style="width:85%">
        
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5">WALK-IN COMPANY</h1>
                    <br>
                    <center>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       
                        <div class="form-group">
                            <label><h2>Company Name</h2></label>
                            <input type="text" name="WcompanyName" class="form-control <?php echo (!empty($WcompanyName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WcompanyName; ?>">
                            <span class="invalid-feedback"><?php echo $WcompanyName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Company Industry</h2></label>
                            <input type="text" name="Windustry" class="form-control <?php echo (!empty($Windustry_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Windustry; ?>">
                            <span class="invalid-feedback"><?php echo $Windustry_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Contact Person</h2></label>
                            <input type="text" name="WcontactPerson" class="form-control <?php echo (!empty($WcontactPerson_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WcontactPerson; ?>">
                            <span class="invalid-feedback"><?php echo $WcontactPerson_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Contact Number</h2></label>
                            <input type="text" name="WcontactNum" class="form-control <?php echo (!empty($WcontactNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WcontactNum; ?>">
                            <span class="invalid-feedback"><?php echo $WcontactNum_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Email Address</h2></label>
                            <input type="text" name="Wemail" class="form-control <?php echo (!empty($Wemail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Wemail; ?>">
                            <span class="invalid-feedback"><?php echo $Wemail_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Location</h2></label>
                            <input type="text" name="Wlocation" class="form-control <?php echo (!empty($Wlocation_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Wlocation; ?>">
                            <span class="invalid-feedback"><?php echo $Wlocation_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Registration Number</h2></label>
                            <input type="text" name="WregNum" class="form-control <?php echo (!empty($WregNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WregNum; ?>">
                            <span class="invalid-feedback"><?php echo $WregNum_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Company Website</h2></label>
                            <input type="text" name="WcompanyWeb" class="form-control <?php echo (!empty($WcompanyWeb_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WcompanyWeb; ?>">
                            <span class="invalid-feedback"><?php echo $WcompanyWeb_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Company Size</h2></label>
                            <input type="text" name="WcompanySize" class="form-control <?php echo (!empty($WcompanySize_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WcompanySize; ?>">
                            <span class="invalid-feedback"><?php echo $WcompanySize_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Working Hours</h2></label>
                            <input type="text" name="WworkingHrs" class="form-control <?php echo (!empty($WworkingHrs_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WworkingHrs; ?>">
                            <span class="invalid-feedback"><?php echo $WworkingHrs_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Dress Code</h2></label>
                            <input type="text" name="WdressCode" class="form-control <?php echo (!empty($WdressCode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WdressCode; ?>">
                            <span class="invalid-feedback"><?php echo $WdressCode_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><h2>Spoken Language</h2></label>
                            <input type="text" name="WspokenLanguage" class="form-control <?php echo (!empty($WspokenLanguage_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $WspokenLanguage; ?>">
                            <span class="invalid-feedback"><?php echo $WspokenLanguage_err;?></span>
                        </div>
                        
                        
                        <input type="hidden" name="Wcompany_id" value="<?php echo $Wcompany_id; ?>"/>
                        <input type="submit" style="background: #A81E1E; box-shadow: 0px 4px 4px 0px #D72121 inset; filter: drop-shadow(0px 4px 4px rgba(119, 11, 11, 0.25)); border: none; border-radius: 20px; margin: 10px;" class="btn btn-primary" value="Submit">
                        <a href="Wcompany.php" style="background: #A81E1E; box-shadow: 0px 4px 4px 0px #D72121 inset; filter: drop-shadow(0px 4px 4px rgba(119, 11, 11, 0.25)); border: none; border-radius: 20px; margin: 10px;" class="btn btn-secondary ml-2">Cancel</a>
                        
                    </form>
                    </center>
                </div>
            </div>        
        </div>
        
    </div>
    </div>

</body>
</html>