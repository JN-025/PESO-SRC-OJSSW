<?php
// Check existence of id parameter before processing further
if(isset($_GET["W_applicant_id"]) && !empty(trim($_GET["W_applicant_id"]))){
    // Include config file
    require_once "Wapplicant_config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM walkin_applicant WHERE W_applicant_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_W_applicant_id);
        
        // Set parameters
        $param_W_applicant_id = trim($_GET["W_applicant_id"]);
        
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
    <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
    <link rel="stylesheet" href="../assets/css/Wapplicant.css">
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card5">
                        <h1>PUBLIC EMPLOYMENT SERVICE OFFICE (PESO)</h1>
                        <h2>Santa Rosa City, Laguna</h2>

                        <br> <br> <br>
                        <div class="col3">
                            <h3><b>APPLICANT NO.:</b> <?php echo $row["W_applicant_id"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>NAME: </b> <?php echo $row["W_firstName"]; ?>   <?php echo $row["W_midName"]; ?>   <?php echo $row["W_lastName"]; ?>   <?php echo $row["W_suffix"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>TYPE OF JOBSEEKER:</b> <?php echo $row["W_jobseekerType"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>BIRTHPLACE: </b> <?php echo $row["W_birthplace"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>BIRTHDAY: </b> <?php echo $row["W_birthday"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>AGE: </b> <?php echo $row["W_age"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>SEX: </b> <?php echo $row["W_sex"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>CIVIL STATUS: </b> <?php echo $row["W_civilStatus"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>EMAIL:</b> <?php echo $row["W_email"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>PRESENT ADDRESS: </b> <?php echo $row["W_housenumPresent"]; ?>   <?php echo $row["W_brgyPresent"]; ?>,   <?php echo $row["W_cityPresent"]; ?>,   <?php echo $row["W_provincePresent"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>PERMANENT ADDRESS: </b> <?php echo $row["W_housenumPermanent"]; ?>   <?php echo $row["W_brgyPermanent"]; ?>,   <?php echo $row["W_cityPermanent"]; ?>,   <?php echo $row["W_provincePermanent"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>HEIGHT: </b> <?php echo $row["W_height"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>WEIGHT:</b> <?php echo $row["W_weight"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>LANDLINE NUMBER: </b> <?php echo $row["W_landlineNum"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>MOBILE NUMBER: </b> <?php echo $row["W_mobilePnum"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>EMPLOYMENT STATUS: </b> <?php echo $row["W_employmentStatus"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>EDUCATIONAL LEVEL: </b> <?php echo $row["W_educLevel"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>YEAR GRADUATE: </b> <?php echo $row["W_gradYear"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>SCHOOL: </b> <?php echo $row["W_school"]; ?></3>
                        </div>
                        <div class="col4">
                            <h3><b>COURSE: </b> <?php echo $row["W_course"]; ?></3>
                        </div>
                        <div class="col5">
                            <h3><b>PREFERRED INDUSTRY: </b> <?php echo $row["W_preferIndustry"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>ACTIVELY LOOKING FOR WORK? </b> <?php echo $row["W_activelyLooking"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>WILLINGLY TO WORK IMMEDIATELY? </b> <?php echo $row["W_willinglyWork"]; ?></3>
                        </div>
                        <div class="col3">
                            <h3><b>4Ps BENEFICIARY? </b> <?php echo $row["W_fourPsBeneficiary"]; ?></3>
                        </div>


                        

                    
                    
                    </div>

                    <br> <br>
                    
                    <center><a href="Wapplicant.php" style="width: 150px; height: 50px; font-size: 25px; background: #7A0042" class="btn btn-primary">Back</a></center>
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