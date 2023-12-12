<?php
// Include config file
require_once "Wapplicant_config.php";
 
// Define variables and initialize with empty values
$WcompanyName = $Windustry = $WcontactPerson = $WcontactNum = $Wemail = $Wlocation = $WregNum = "";

$WcompanyName_err = $Windustry_err = $WcontactPerson_err = $WcontactNum_err = $Wemail_err = $Wlocation_err = $WregNum_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    // Validate JOBSEEKER TYPE
    $input_WcompanyName = trim($_POST["WcompanyName"]);
    if(empty($input_WcompanyName)){
        $WcompanyName_err = "Please enter an address.";     
    } else{
        $WcompanyName = $input_WcompanyName;
    }

        // Validate JOBSEEKER TYPE
        $input_Windustry = trim($_POST["Windustry"]);
        if(empty($input_W_industry)){
            $Windustry_err = "Please enter an address.";     
        } else{
            $Windustry = $input_Windustry;
        }

    // Validate JOBSEEKER TYPE
    $input_WcontactPerson = trim($_POST["WcontactPerson"]);
    if(empty($input_WcontactPerson)){
        $WcontactPerson_err = "Please enter an address.";     
    } else{
        $WcontactPerson = $input_WcontactPerson;
    }

    // Validate JOBSEEKER TYPE
    $input_WcontactNum = trim($_POST["WcontactNum"]);
    if(empty($input_WcontactNum)){
        $WcontactNum_err = "Please enter an address.";     
    } else{
        $WcontactNum = $input_WcontactNum;
    }

    // Validate JOBSEEKER TYPE
    $input_Wemail = trim($_POST["Wemail"]);
    if(empty($input_Wemail)){
        $Wemail_err = "Please enter an address.";     
    } else{
        $Wemail = $input_Wemail;
    }

    // Validate JOBSEEKER TYPE
    $input_Wlocation = trim($_POST["Wlocation"]);
    if(empty($input_Wlocation)){
        $Wlocation_err = "Please enter an address.";     
    } else{
        $Wlocation = $input_Wlocation;
    }

        // Validate JOBSEEKER TYPE
    $input_WregNum = trim($_POST["WregNum"]);
    if(empty($input_WregNum)){
        $WregNum_err = "Please enter an address.";     
    } else{
        $WregNum = $input_WregNum;
    }

    
  
    
    // Check input errors before inserting in database
    if(empty($WcompanyName_err) && empty($Windustry_err) && empty($WcontactPerson_err) && empty($WcontactNum_err) && empty($Wemail_err) && empty($Wlocation_err) && empty($WregNum_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO walkin_company (WcompanyName, Windustry, WcontactPerson, WcontactNum, Wemail, Wlocation, WregNum) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_WcompanyName, $param_Windustry, $param_WcontactPerson, $param_WcontactNum, $param_Wemail, $param_Wlocation, $param_WregNum);
            
            // Set parameters
            $param_WcompanyName = $WcompanyName;
            $param_Windustry = $Windustry;
            $param_WcontactPerson = $WcontactPerson;
            $param_WcontactNum = $WcontactNum;
            $param_Wemail = $Wemail;
            $param_Wlocation = $Wlocation;
            $param_WregNum = $WregNum;
           
            
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Applicant Profile</title>
        <link rel="stylesheet" href="../assets/css/peso_Wapplicant.css">
        <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
        
        
    </head>

    <body>
        <?php
        include "../function.php";
        include "company_sidenav.php";
        include "topnav.php";
        ?>

        <div class="main-container">
            <center>
                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h1>WALK-IN COMPANY</h1>
                    
                    <div class="form-box">
                            <div class="row">
                                <div class="col-33">
                                    <h2>Company Name</h2>
                                    <input type="text" name="WcompanyName" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Industry</h2>
                                    <input type="text" name="Windustry" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Contact Person</h2>
                                    <input type="text" name="WcontactPerson" placeholder="" required>
                                </div>
                        
                                
                                
                            </div>
                        </div>
                    

                        <div class="form-box">
                            <div class="row">
                                <div class="col-33">
                                    <h2>Contact Number</h2>
                                    <input type="text" name="WcontactNum" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Email</h2>
                                    <input type="text" name="Wemail" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Location</h2>
                                    <input type="text" name="Wlocation" placeholder="" required>
                                </div>
                                
                                
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                            <div class="col-33">
                                    <h2>Registration Number</h2>
                                    <input type="text" name="WregNum" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Website</h2>
                                    <input type="text" name="WcompanyWeb" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Size</h2>
                                    <input type="number" name="WcompanySize" placeholder="" required>
                                </div>

                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-33">
                                    <h2>Working Hours</h2>
                                    <input type="number" name="WworkingHrs" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Dress Code</h2>
                                    <input type="text" name="WdressCode" placeholder="" required>
                                </div>
                                <div class="col-33">
                                    <h2>Company Spoken Language</h2>
                                    <input type="text" name="WspokenLanguage" placeholder="" required>
                                </div>
                               
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                    
                </form>
               
                   
            </center>
        
        </div>

    </body>
</html>