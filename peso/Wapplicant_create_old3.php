<?php
include '../conn.php';
session_start();
$peso_id = $_SESSION['peso_id'];
$sql_check = "SELECT peso_id FROM wap_info WHERE peso_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $peso_id);
$stmt_check->execute();
$stmt_check->store_result();


if (isset($_POST["submit"])) {
    // Step 1 form data
    $peso_id = $_SESSION['peso_id'];
    $WlastName = $_POST['WlastName'];
    $WfirstName = $_POST['WfirstName'];
    $WmidName = $_POST['WmidName'];
    $Wsuffix = $_POST['Wsuffix'];
    $WjobseekerType = $_POST['WjobseekerType'];
    $Wbirthplace = $_POST['Wbirthplace'];
    $Wbirthday = $_POST['Wbirthday'];
    $Wage = $_POST['Wage'];
    $Wsex = $_POST['Wsex'];
    $WcivilStatus = $_POST['WcivilStatus'];
    $Wcitizenship = $_POST['Wcitizenship'];
    $WhousenumPresent = $_POST['WhousenumPresent'];
    $WbrgyPresent = $_POST['WbrgyPresent'];
    $WcityPresent = $_POST['WcityPresent'];
    $WprovincePresent = $_POST['WprovincePresent'];
    $WhousenumPermanent = $_POST['WhousenumPermanent'];
    $WbrgyPermanent = $_POST['WbrgyPermanent'];
    $WcityPermanent = $_POST['WcityPermanent'];
    $WprovincePermanent = $_POST['WprovincePermanent'];
    $Wheight = $_POST['Wheight'];
    $Wweight = $_POST['Wweight'];
    $WlandlineNum = $_POST['WlandlineNum'];
    $WmobilePnum = $_POST['WmobilePnum'];
    $Wemail = $_POST['Wemail'];
    $Wdisability = $_POST['Wdisability'];
    $WemploymentStatus = $_POST['WemploymentStatus'];
    $WactivelyLooking = $_POST['WactivelyLooking'];
    $WwillinglyWork = $_POST['WwillinglyWork'];
    $WfourpsBeneficiary = $_POST['WfourpsBeneficiary'];
    $Wofw = $_POST['Wofw'];

    // Step 2 form data
    $WschoolStatus = $_POST["WschoolStatus"];
    $WeducLevel = $_POST["WeducLevel"];
    $WgradYear = $_POST["WgradYear"];
    $Wschool = $_POST["Wschool"];
    $Wcourse = $_POST["Wcourse"];
    $Waward = $_POST["Waward"];

    // Step 3 form data
    $Wpoccupation1 = $_POST["Wpoccupation1"];
    $Wpindustry1 = $_POST["Windustry1"];
    $Wpoccupation2 = $_POST["Woccupation2"];
    $Wpindustry2 = $_POST["Windustry2"];
    $Wpoccupation3 = $_POST["Woccupation3"];
    $Wpindustry3 = $_POST["Windustry3"];
    $WplocationType = $_POST["WplocationType"];
    $Wplocation1 = $_POST["Wplocation2"];

    // Step 4 form data
    $WtrainingStatus = $_POST["WtrainingStatus"];
    $Wtraining1 = $_POST["Wtraining1"];
    $WstartDuration1 = $_POST["WstartDuration1"];
    $WendDuration1 = $_POST["WendDuration1"];
    $Wtraining2 = $_POST["Wtraining2"];
    $WstartDuration2 = $_POST["WstartDuration2"];
    $WendDuration2 = $_POST["WendDuration2"];
    $Wtraining3 = $_POST["Wtraining3"];
    $WstartDuration3 = $_POST["WstartDuration3"];
    $WendDuration3 = $_POST["WendDuration3"];
    $Winstitution1 = $_POST["Winstitution1"];
    $Wcertificate1 = $_POST["Wcertificate1"];
    $Wcompletion1 = $_POST["Wcompletion1"];
    $Winstitution2 = $_POST["Winstitution2"];
    $Wcertificate2 = $_POST["Wcertificate2"];
    $Wcompletion2 = $_POST["Wcompletion2"];
    $Winstitution3 = $_POST["Winstitution3"];
    $Wcertificate3 = $_POST["Wcertificate3"];
    $Wcompletion3 = $_POST["Wcompletion3"];

    // Step 5 form data
    

    // Step 6 form data
    $Wcompany1 = $_POST["Wcompany1"];
    $WcpAddress1 = $_POST["WcpAddress1"];
    $Wcompany2 = $_POST["Wcompany2"];
    $WcpAddress2 = $_POST["WcpAddress2"];
    $Wcompany3 = $_POST["Wcompany3"];
    $WcpAddress3 = $_POST["WcpAddress3"];
    $Wcompany4 = $_POST["Wcompany4"];
    $WcpAddress4 = $_POST["WcpAddress4"];
    $Wposition1 = $_POST["Wposition1"];
    $WincluSDate1 = $_POST["WincluSDate1"];
    $WincluEDate1 = $_POST["WincluEDate1"];
    $WappointStat1 = $_POST["WappointStat1"];
    $Wposition2 = $_POST["Wposition2"];
    $WincluSDate2 = $_POST["WincluSDate2"];
    $WincluEDate2 = $_POST["WincluEDate2"];
    $WappointStat2 = $_POST["WappointStat2"];
    $Wposition3 = $_POST["Wposition3"];
    $WincluSDate3 = $_POST["WincluSDate3"];
    $WincluEDate3 = $_POST["WincluEDate3"];
    $WappointStat3 = $_POST["WappointStat3"];
    $Wposition4 = $_POST["Wposition4"];
    $WincluSDate4 = $_POST["WincluSDate4"];
    $WincluEDate4 = $_POST["WincluEDate4"];
    $WappointStat4 = $_POST["WappointStat4"];

    // Step 7 form data
    

    /*step 1*/

    $sql_table1 = "INSERT INTO wap_info (peso_id, WlastName, WfirstName, WmidName, Wsuffix, WjobseekerType, Wbirthplace, Wbirthday, Wage, Wsex, WcivilStatus, Wcitizenship, WhousenumPresent, WbrgyPresent, WcityPresent, WprovincePresent, WhousenumPermanent, WbrgyPermanent, WcityPermanent, WprovincePermanent, Wheight, Wweight, WlandlineNum, WmobilePnum, Wemail, Wdisability, WemploymentStatus, WactivelyLooking, WwillinglyWork, WfourpsBeneficiary, Wofw) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table1);
    $stmt->bind_param("issssssssssssssssssssssssssssss",$peso_id, $WlastName, $WfirstName, $WmidName, $Wsuffix, $WjobseekerType, $Wbirthplace, $Wbirthday, $Wage, $Wsex, $WcivilStatus, $Wcitizenship, $WhousenumPresent, $WbrgyPresent, $WcityPresent, $WprovincePresent, $WhousenumPermanent, $WbrgyPermanent, $WcityPermanent, $WprovincePermanent, $Wheight, $Wweight, $WlandlineNum, $WmobilePnum, $Wemail, $Wdisability, $WemploymentStatus, $WactivelyLooking, $WwillinglyWork, $WfourpsBeneficiary, $Wofw);

    if ($stmt->execute()) {
        
    } else {
        echo "Error inserting data into table1: " . $conn->error;
    }

    /*step 2*/
    $sql_table2 = "INSERT INTO wap_educ (peso_id, WschoolStatus, WeducLevel, WgradYear, Wschool, Wcourse, Waward) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table2);
    $stmt->bind_param("issssss", $peso_id, $WschoolStatus, $WeducLevel, $WgradYear, $Wschool, $Wcourse, $Waward);

    if ($stmt->execute()) {
        
    } else {
        echo "Error inserting data into education_info: " . $conn->error;
    }

    /*step 3*/
    $sql_table3 = "INSERT INTO wap_prefer (peso_id, Wpoccupation1, Wpindustry1, Wpoccupation2, Wpindustry2, Wpoccupation3, Wpindustry3, WplocationType, Wplocation1, Wplocation2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table3);
    $stmt->bind_param("isssssssss", $peso_id, $Wpoccupation1, $Wpindustry1, $Wpoccupation2, $Wpindustry2, $Wpoccupation3, $Wpindustry3, $WplocationType, $Wplocation1, $Wplocation2);

    if ($stmt->execute()) {
        
    } else {
        echo "Error inserting data into employment_info: " . $conn->error;
    }
    /*step 4*/
    $sql_table4 = "INSERT INTO wap_tvo (peso_id, WtrainingStatus, Wtraining1, WstartDuration1, WendDuration1, Wtraining2, WstartDuration2, WendDuration2, Wtraining3, WstartDuration3, WendDuration3, Winstitution1, Wcertificate1, Wcompletion1, Winstitution2, Wcertificate2, Wcompletion2, Winstitution3, Wcertificate3, Wcompletion3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table4);
    $stmt->bind_param("isssssssssssssssssss", $peso_id, $WtrainingStatus, $Wtraining1, $WstartDuration1, $WendDuration1, $Wtraining2, $WstartDuration2, $WendDuration2, $Wtraining3, $WstartDuration3, $WendDuration3, $Winstitution1, $Wcertificate1, $Wcompletion1, $Winstitution2, $Wcertificate2, $Wcompletion2, $Winstitution3, $Wcertificate3, $Wcompletion3);

    if ($stmt->execute()) {
        
    } else {
        echo "Error inserting data into training_info: " . $conn->error;
    }
    /*step 5*/
    



    /*step 6*/
    $sql_table6 = "INSERT INTO wap_exp (peso_id, Wcompany1, WcpAddress1, Wcompany2, WcpAddress2, Wcompany3, WcpAddress3, Wcompany4, WcpAddress4, Wposition1, WincluSDate1, WincluEDate1, WappointStat1, Wposition2, WincluSDate2, WincluEDate2, WappointStat2, Wposition3, WincluSDate3, WincluEDate3, WappointStat3, Wposition4, WincluSDate4, WincluEDate4, WappointStat4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table6);
    $stmt->bind_param("issssssssssssssssssssssss", $Wapplicant_id, $Wcompany1, $WcpAddress1, $Wcompany2, $WcpAddress2, $Wcompany3, $WcpAddress3, $Wcompany4, $WcpAddress4, $Wposition1, $WincluSDate1, $WincluEDate1, $WappointStat1, $Wposition2, $WincluSDate2, $WincluEDate2, $WappointStat2, $Wposition3, $WincluSDate3, $WincluEDate3, $WappointStat3, $Wposition4, $WincluSDate4, $WincluEDate4, $WappointStat4);

    if ($stmt->execute()) {
        
    } else {
        echo "Error inserting data into work_experience: " . $conn->error;
    }
    /*step 7*/
   



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
        include "applicant_sidenav.php";
        include "topnav.php";
        ?>

        <div class="main-container">
            <center>
                <form id="regForm" action="" method="post">
                    <h1>WALK-IN APPLICANT</h1>
                    
                    <!-- One "tab" for each step in the form: -->
                    
                    <div class="tab">

                        <h3>Personal Information</h3>
                        
                        <br>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-30">
                                    <h2>First Name</h2>
                                    <input type="text" placeholder="First Name" name="firstName" value="">

                                </div>
                                <div class="col-30">
                                    <h2>Last Name</h2>
                                    <input type="text" placeholder="Last Name" name="lastName" value="">

                                </div>
                                <div class="col-30">
                                    <h2>Middle Name</h2>
                                    <input type="text" placeholder="Middle Name" name="midName" oninput="noNumber(event); validateForm()" value="">

                                </div>
                                <div class="col-10">
                                    <h2>Suffix</h2>
                                    <input style=""type="text" placeholder="Jr." name="suffix" oninput="noNumber(event); validateForm()">

                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-30">
                                    <h2>Type of Jobseeker</h2>
                                    <select class="" name="WjobseekerType" required>
                                        <option value="" selected hidden>Select Type</option>
                                        <option value="first_time">FIRST TIME</option>
                                        <option value="jobseeker">JOBSEEKER</option>
                                        <option value="ofw">OFW</option>
                                    </select>
                                    
                                </div>
                                <div class="col-30">
                                    <h2>Birthplace</h2>
                                    <input type="text" name="Wbirthplace"placeholder="BIRTHPLACE" required>
                                   
                                </div>
                                <div class="col-30">
                                    <h2>Birthday</h2>
                                    <input type="date" placeholder="birthday" name="Wbirthday" id="birthday">
                                </div>
                                <div class="col-10">
                                    <h2>Age</h2>
                                    <input type="number" id="age" name="Wage" placeholder="AGE"min="16" max="90"required value="">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-15">
                                    <h2>Sex</h2>
                                    <select class="" name="Wsex" required>
                                        <option value="" selected hidden>Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="col-25">
                                    <h2>Civil Status</h2>
                                    <select class="" name="WcivilStatus" required>
                                        <option value="" selected hidden>Select Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Single Parent">Single Parent</option>
                                        <option value="Widow">Widow</option>
                                    </select>
                                </div>
                                <div class="col-25">
                                    <h2>Citizenship</h2>
                                    <input type="text" name="Wcitizenship" placeholder="CITIZENSHIP" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Email Address</h2>
                                    <input type="email" name="Wemail" placeholder="EMAIL ADDRESS" required maxlength="50" value="">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-25">
                                    <h2>Present House No.</h2>
                                    <input type="text" name="WhousenumPresent" placeholder="HOUSE NO." required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Present Barangay</h2>
                                    <input type="text"name="WbrgyPresent" placeholder="BARANGAY" required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Present City</h2>
                                    <input type="text" name="WcityPresent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Present Province</h2>
                                    <input type="text" name="WprovincePresent" placeholder="PROVINCE" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-25">
                                    <h2>Permanent House No.</h2>
                                    <input type="text" name="WhousenumPermanent" placeholder="HOUSE NO." required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Permanent Barangay</h2>
                                    <input type="text" name="WbrgyPermanent" placeholder="BARANGAY" required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Permanent City</h2>
                                    <input type="text" name="WcityPermanent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                                </div>
                                <div class="col-25">
                                    <h2>Permanent Province</h2>
                                    <input type="text" name="WprovincePermanent" placeholder="PROVINCE" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-20">
                                    <h2>Height</h2>
                                    <input type="number" name="Wheight" id="body-size" placeholder="HEIGHT (cm)" min="0" required>
                                </div>
                                <div class="col-20">
                                    <h2>Weight</h2>
                                    <input type="text" name="Wweight" id="body-size" placeholder="WEIGHT (kg)" required>
                                </div>
                                <div class="col-30">
                                    <h2>Landline Number</h2>
                                    <input type="tel" name="WlandlineNum" placeholder="LANDLINE NUMBER" required value="">
                                </div>
                                <div class="col-30">
                                    <h2>Mobile Number</h2>
                                    <input type="tel" name="WmobilePnum" placeholder="MOBILE NUMBER" required value="">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-20">
                                    <h2>Disability</h2>
                                    <select class="" name="Wdisability" required>
                                        <option value="None" selected hidden>None</option>
                                        <option value="None">None</option>
                                        <option value="visual">Visual</option>
                                        <option value="hearing">Hearing</option>
                                        <option value="speech">Speech</option>
                                        <option value="physical">Physical</option>
                                    </select> 
                                </div>
                                <div class="col-20">
                                    <h2>Employment Status</h2>
                                    <select class="" name="WemploymentStatus" required>
                                        <option value="" selected hidden>Status</option>
                                        <option value="wage_employed">Wage Employed</option>
                                        <option value="self_employed">Self Employed</option>
                                        <option value="fresh_grad">Fresh Graduate</option>
                                        <option value="finished_contract">Finished Contract</option>
                                        <option value="resigned">Resigned</option>
                                        <option value="retired">Retired</option>
                                        <option value="terminated">Terminated</option>
                                        <option value="laidoff_local">Laidoff(local)</option>
                                        <option value="laidoff_abroad">Laidoff(abroad)</option>
                                    </select>  
                                </div>
                                <div class="col-30">
                                    <h2>Actively Looking for Work?</h2>
                                    <select class="" name="WactivelyLooking" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select> 
                                </div>
                                <div class="col-30">
                                    <h2>Willing to Work Immediately?</h2>
                                    <select class="" name="WwillinglyWork" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select> 
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                            <div class="col-30">
                                    <h2>Are you an OFW?</h2>
                                    <select class="" name="Wofw" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>  
                                </div>
                                <div class="col-30">
                                    <h2>4ps Beneficaiary?</h2>
                                    <select class="" name="WfourpsBeneficiary" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select> 
                                </div>
                               
                                
                            </div>
                        </div>
                    



                    </div>


                    <div class="tab">
                        <h3>Educational Background</h3>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-30">
                                    <h2>Are you currently in School?</h2>
                                    <select class="" name="WschoolStatus" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select> 
                                </div>
                                <div class="col-30">
                                    <h2>Highest Educational Level</h2>
                                    <select class="" name="WeducLevel" required>
                                        <option value="" selected hidden></option>
                                        <option value="NO FORMAL EDUCATION">NO FORMAL EDUCATION</option>
                                        <option value="ELEMENTARY LEVEL">ELEMENTARY LEVEL</option>
                                        <option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
                                        <option value="HIGH SCHOOL LEVEL">HIGH SCHOOL LEVEL</option>
                                        <option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
                                        <option value="COLLEGE LEVEL">COLLEGE LEVEL</option>
                                        <option value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
                                        <option value="TECH-VOC GRADUATE">TECH-VOC GRADUATE</option>
                                        <option value="POST GRADUATE">POST GRADUATE</option>
                                    </select> 
                                </div>
                                <div class="col-40">
                                    <h2>Year Graduated/Last Year Attended</h2>
                                    <input type="date" name="WgradYear" placeholder="MM/YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-30">
                                    <h2>School/University</h2>
                                    <input type="text" name="Wschool" placeholder="SCHOOL NAME" required maxlength="50">
                                </div>
                                <div class="col-30">
                                    <h2>Course/Program</h2>
                                    <input type="text" name="Wcourse" placeholder="COURSE/PROGRAM NAME" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Award/Honors Received</h2>
                                    <input type="text" name="Waward" placeholder="AWARDS" required>
                                </div>
                            </div>
                        </div>
                      
                        <br> <br>
                        <h3>Job Preferences</h3>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Preferred Occupation #1</h2>
                                    <input type="text" name="Wpoccupation1" placeholder="PREFERRED OCCUPATION #1" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Preferred Industry #1</h2>
                                    <input type="text" name="Wpindustry1" placeholder="PREFERRED INDUSTRY #1" required maxlength="50">
                                </div>

                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Preferred Occupation #2</h2>
                                    <input type="text" name="Wpoccupation2" placeholder="PREFERRED OCCUPATION #2" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Preferred Industry #2</h2>
                                    <input type="text" name="Wpindustry2" placeholder="PREFERRED INDUSTRY #2" required maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Preferred Occupation #3</h2>
                                    <input type="text" name="Wpoccupation3" placeholder="PREFERRED OCCUPATION #3" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Preferred Industry #3</h2>
                                    <input type="text" name="Wpindustry3" placeholder="PREFERRED INDUSTRY #3" required maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Preferred Location</h2>
                                    <select class="" name="WplocationType" required>
                                        <option value="none" selected hidden></option>
                                        <option value="none">none</option>
                                        <option value="local">LOCAL</option>
                                        <option value="abroad">ABROAD</option>
                                    </select>  
                                </div>
                                
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Preferred Location #1</h2>
                                    <input type="text" name="Wplocation1" placeholder="PREFERRED LOCATION #1" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Preferred Location #2</h2>
                                    <input type="text" name="Wplocation2" placeholder="PREFERRED LOCATION #2" required maxlength="50">
                                   
                                </div>
                                
                                
                            </div>
                        </div>

                    </div>

                    <div class="tab">
                        <h3>Training</h3>
                        
                        <div class="form-box">
                            <div class="row">
                                <div class="col-35">
                                    <h2>Training Program #1</h2>
                                    <input type="text" name="Wtraining1" placeholder="TRAINING #1" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Training Institution #2</h2>
                                    <input type="text" name="Winstitution1" placeholder="INSTITUTION #1" required maxlength="50">
                                </div>
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="date" name="WstartDuration1" placeholder="" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="date" name="WendDuration1" placeholder="" required>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Certificate Received #1</h2>
                                    <input type="text" name="Wcertificate1" placeholder="CERTIFICATE #1" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Completion #1</h2>
                                    <select class="" name="Wcompletion1" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select> 
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-35">
                                    <h2>Training Program #2</h2>
                                    <input type="text" name="Wtraining2" placeholder="TRAINING #2" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Training Institution #2</h2>
                                    <input type="text" name="Winstitution2" placeholder="INSTITUTION #2" required maxlength="50">
                                </div>
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="date" name="WstartDuration2" placeholder="" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="date" name="WendDuration2" placeholder="" required>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Certificate Received #2</h2>
                                    <input type="text" name="Wcertificate2" placeholder="CERTIFICATE #2" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Completion #2</h2>
                                    <select class="" name="Wcompletion2" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select> 
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-35">
                                    <h2>Training Program #3</h2>
                                    <input type="text" name="Wtraining3" placeholder="TRAINING #3" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Training Institution #3</h2>
                                    <input type="text" name="Winstitution3" placeholder="INSTITUTION #3" required maxlength="50">
                                </div>
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="date" name="WstartDuration3" placeholder="" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="date" name="WendDuration3" placeholder="" required>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Certificate Received #3</h2>
                                    <input type="text" name="Wcertificate3" placeholder="CERTIFICATE #3" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Completion #3</h2>
                                    <select class="" name="Wcompletion3" required>
                                        <option value="" selected hidden></option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select> 
                                </div>
                                
                            </div>
                        </div>

                        <br> <br>
                        <h3>Eligibility</h3>
                        <!--
                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Career Service/Board/Bar #1</h2>
                                    <input type="text" name="WcareerServ1" placeholder="" required maxlength="50">
                                </div>
                                <div class="col-30">
                                    <h2>Licence Number #1</h2>
                                    <input type="text" name="WlicenceNum1" placeholder="" required maxlength="50">
                                </div>
                                <div class="col-30">
                                    <h2>Expiry Date #1</h2>
                                    <input type="date" name="WexpiryDate1" placeholder="MM/DD/YYYY" required>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Career Service/Board/Bar #2</h2>
                                    <input type="text" name="WcareerServ2" placeholder="" required maxlength="50">
                                </div>
                                <div class="col-30">
                                    <h2>Licence Number #2</h2>
                                    <input type="text" name="WlicenceNum2" placeholder="" required maxlength="50">
                                </div>
                                <div class="col-30">
                                    <h2>Expiry Date #2</h2>
                                    <input type="date" name="WexpiryDate2" placeholder="MM/DD/YYYY" required>
                                </div>
                                
                            </div>
                        </div>
-->


                    </div>


                    <div class="tab">
                        <h3>Work Experiences</h3>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Name of Office/Company #1</h2>
                                    <input type="text" name="Wcompany1" placeholder="COMPANY #1" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Address</h2>
                                    <input type="text" name="WcpAddress1" placeholder="ADDRESS #1" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="text" name="WincluSDate1" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="text" name="WincluEDate1" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-35">
                                    <h2>Position Held Received</h2>
                                    <input type="text" name="Wposition1" placeholder="POSITION #1" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Status of Appointment</h2>
                                    <select class="" name="WappointStat1" required>
                                        <option value="" selected hidden></option>
                                        <option value="permanent">PERMANENT</option>
                                        <option value="contractual">CONTRACTUAL</option>
                                        <option value="part_time">PART-TIME</option>
                                        <option value="probitionary">PROBITIONARY</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Name of Office/Company #2</h2>
                                    <input type="text" name="Wcompany2" placeholder="COMPANY #2" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Address</h2>
                                    <input type="text" name="WcpAddress2" placeholder="ADDRESS #2" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="text" name="WincluSDate2" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="text" name="WincluEDate2" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-35">
                                    <h2>Position Held Received</h2>
                                    <input type="text" name="Wposition2" placeholder="POSITION #2" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Status of Appointment</h2>
                                    <select class="" name="WappointStat2" required>
                                        <option value="" selected hidden></option>
                                        <option value="permanent">PERMANENT</option>
                                        <option value="contractual">CONTRACTUAL</option>
                                        <option value="part_time">PART-TIME</option>
                                        <option value="probitionary">PROBITIONARY</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Name of Office/Company #3</h2>
                                    <input type="text" name="Wcompany3" placeholder="COMPANY #3" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Address</h2>
                                    <input type="text" name="WcpAddress3" placeholder="ADDRESS #3" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="text" name="WincluSDate3" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="text" name="WincluEDate3" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-35">
                                    <h2>Position Held Received</h2>
                                    <input type="text" name="Wposition3" placeholder="POSITION #3" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Status of Appointment</h2>
                                    <select class="" name="WappointStat3" required>
                                        <option value="" selected hidden></option>
                                        <option value="permanent">PERMANENT</option>
                                        <option value="contractual">CONTRACTUAL</option>
                                        <option value="part_time">PART-TIME</option>
                                        <option value="probitionary">PROBITIONARY</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-40">
                                    <h2>Name of Office/Company #4</h2>
                                    <input type="text" name="Wcompany4" placeholder="COMPANY #4" required maxlength="50">
                                </div>
                                <div class="col-40">
                                    <h2>Address</h2>
                                    <input type="text" name="WcpAddress4" placeholder="ADDRESS #4" required maxlength="50">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="row">
                                <div class="col-15">
                                    <h2>Started</h2>
                                    <input type="text" name="WincluSDate4" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-15">
                                    <h2>Ended</h2>
                                    <input type="text" name="WincluEDate4" placeholder="MM/YYYY" required>
                                </div>
                                <div class="col-35">
                                    <h2>Position Held Received</h2>
                                    <input type="text" name="Wposition4" placeholder="POSITION #4" required maxlength="50">
                                </div>
                                <div class="col-35">
                                    <h2>Status of Appointment</h2>
                                    <select class="" name="WappointStat4" required>
                                        <option value="" selected hidden></option>
                                        <option value="permanent">PERMANENT</option>
                                        <option value="contractual">CONTRACTUAL</option>
                                        <option value="part_time">PART-TIME</option>
                                        <option value="probitionary">PROBITIONARY</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>





                    </div>
                    
                    <div style="overflow:auto;">
                        <div style="float:center;">
                        <button class="prev" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:10px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:center;">
                        
                        <button class="next" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    
                    
                </form>
               
                   
            </center>
        
        </div>

        <script src="../assets/js/peso/Wapplicant.js"></script>
       
    </body>
</html>