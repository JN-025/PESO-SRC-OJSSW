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
    $Woccupation1 = $_POST["Woccupation1"];
    $Windustry1 = $_POST["Windustry1"];
    $Woccupation2 = $_POST["Woccupation2"];
    $Windustry2 = $_POST["Windustry2"];
    $Woccupation3 = $_POST["Woccupation3"];
    $Windustry3 = $_POST["Windustry3"];
    $Wemployment_status = $_POST["Wemployment_status"];

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
    $WincluDate1 = $_POST["WincluDate1"];
    $WappointStat1 = $_POST["WappointStat1"];
    $Wposition2 = $_POST["Wposition2"];
    $WincluDate2 = $_POST["WincluDate2"];
    $WappointStat2 = $_POST["WappointStat2"];
    $Wposition3 = $_POST["Wposition3"];
    $WincluDate3 = $_POST["WincluDate3"];
    $WappointStat3 = $_POST["WappointStat3"];
    $Wposition4 = $_POST["Wposition4"];
    $WincluDate4 = $_POST["WincluDate4"];
    $WappointStat4 = $_POST["WappointStat4"];

    // Step 7 form data
    

    
    /*step 1*/

    $sql_table1 = "INSERT INTO wap_info (peso_id, WlastName, WfirstName, WmidName, Wsuffix, WjobseekerType, Wbirthplace, Wbirthday, Wage, Wsex, WcivilStatus, Wcitizenship, WhousenumPresent, WbrgyPresent, WcityPresent, WprovincePresent, WhousenumPermanent, WbrgyPermanent, WcityPermanent, WprovincePermanent, Wheight, Wweight, WmobilePnum, Wemail, Wdisability, WemploymentStatus, WactivelyLooking, WwillinglyWork, WfourpsBeneficiary, Wofw) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table1);
    $stmt->bind_param("isssssssssssssssssssssssssssss",$peso_id, $WlastName, $WfirstName, $WmidName, $Wsuffix, $WjobseekerType, $Wbirthplace, $Wbirthday, $Wage, $Wsex, $WcivilStatus, $Wcitizenship, $WhousenumPresent, $WbrgyPresent, $WcityPresent, $WprovincePresent, $WhousenumPermanent, $WbrgyPermanent, $WcityPermanent, $WprovincePermanent, $Wheight, $Wweight,  $WmobilePnum, $Wemail, $Wdisability, $WemploymentStatus, $WactivelyLooking, $WwillinglyWork, $WfourpsBeneficiary, $Wofw);

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
    $sql_table3 = "INSERT INTO wap_prefer (peso_id, Woccupation1, Windustry1, Woccupation2, Windustry2, Woccupation3, Windustry3, Wemployment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table3);
    $stmt->bind_param("isssssss", $peso_id, $Woccupation1, $Windustry1, $Woccupation2, $Windustry2, $Woccupation3, $Windustry3, $Wemployment_status);

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
    $sql_table6 = "INSERT INTO wap_exp (peso_id, Wcompany1, WcpAddress1, Wcompany2, WcpAddress2, Wcompany3, WcpAddress3, Wcompany4, WcpAddress4, Wposition1, WincluDate1, WappointStat1, Wposition2, WincluDate2, WappointStat2, Wposition3, WincluDate3, WappointStat3, Wposition4, WincluDate4, WappointStat4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table6);
    $stmt->bind_param("issssssssssssssssssss", $Wapplicant_id, $Wcompany1, $WcpAddress1, $Wcompany2, $WcpAddress2, $Wcompany3, $WcpAddress3, $Wcompany4, $WcpAddress4, $Wposition1, $WincluDate1, $WappointStat1, $Wposition2, $WincluDate2, $WappointStat2, $Wposition3, $WincluDate3, $WappointStat3, $Wposition4, $WincluDate4, $WappointStat4);

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
    <link rel="stylesheet" href="../assets/css/applicant_profile.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
</head>
<body>
    <?php
    include "../function.php";
    include "applicant_sidenav.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <h1></h1>
        
        <div id="multi-step-form-container" class="base-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <div class="label">Personal Information</div>
                    </a>
                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Educational Background</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Job Preference</div>
                    </a>
                </li>
                     <!-- Step 4 -->
                     <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>4</span>
                        </span>
                        <div class="label text-muted">Trainings</div>
                    </a>
                </li>
                <!-- Step 5 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="5">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>5</span>
                        </span>
                        <div class="label text-muted">Eligibility</div>
                    </a>
                </li>
                <!-- Step 6 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="6">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>6</span>
                        </span>
                        <div class="label text-muted">Work Experiences</div>
                    </a>
                </li>
                <!-- Step 7 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="7">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>7</span>
                        </span>
                        <div class="label text-muted">Skills</div>
                    </a>
                </li>
            <li class="form-stepper-unfinished text-center form-stepper-list" step="8">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>8</span>
                        </span>
                        <div class="label text-muted">Authorization</div>
                    </a>
                </li>
            </ul>
            <!--------------------------------- Step Wise Form Content --------------------------------------->
            <?php
            if (isset($_SESSION["peso_id"])){
                $query = "SELECT * FROM p_accounttb WHERE peso_id ='$peso_id'";
                $fetch = $conn->query($query);
                if ($fetch->num_rows > 0) {
                while ($row = $fetch->fetch_assoc()){

                
            ?>
            <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                <!-- Step 1 Content -->
                
            <div class="wrapper">
                <section id="step-1" class="form-step">
                    <h1 class="font-normal">I. PERSONAL INFORMATION</h1>
                     <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <!-- input field insert -->
                        <label for=""><h2>Name</h2></label>
                        <input type="text" placeholder="First Name" name="WfirstName" value="">
                        <input type="text" placeholder="Last Name" name="WlastName" value="">
                        <input type="text" placeholder="Middle Name" name="WmidName" value="">
                        <input style="width:30px;"type="text" placeholder="WJr." name="Wsuffix">
                    </div>
                    <div class="mt-3">
  
                        <label for=""><h2>Type of jobseeker</h2></label>
                        <select class="" name="WjobseekerType" required>
                                        <option value="" selected hidden>Select Type</option>
                                        <option value="first_time">FIRST TIME</option>
                                        <option value="jobseeker">JOBSEEKER</option>
                                        <option value="ofw">OFW</option>
                                    </select>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Birthplace</h2></label>
                        <input type="text" name="Wbirthplace"placeholder="BIRTHPLACE" required>
                    </div>
                    <div class="stick-object">
      
                        <label for="dateofbirth"><h2>Date of Birth</h2></label>
                        <input style="width:100%"type="date" placeholder="birthday" name="Wbirthday" id="birthday">
                    </div>
                    <div class="stick-object">
                        <label for="age"><h2>Age</h2></label>
                        <input type="number" id="age" name="Wage" placeholder="AGE"min="16" max="90"required value="">
                    </div>
                    <div class="stick-object">
                        <label for=""><h2>Sex</h2></label>
                        <select class="" name="Wsex" required>
                                            <option value="" selected hidden>Select Gender</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                    </div>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Civil Status</h2></label>
                        <select class="" name="WcivilStatus" required>
                                            <option value="" selected hidden>Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Single Parent">Single Parent</option>
                                            <option value="Widow">Widow</option>
                                        </select>
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Citizenship</h2></label>
                        <input type="text" name="Wcitizenship" placeholder="CITIZENSHIP" required maxlength="50">
                    </div>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Present Address</h2></label>
                        <input style="width:50px;"type="text" name="WhousenumPresent" placeholder="HOUSE NO." required maxlength="50">
                        <input style="width:90px;"type="text"name="WbrgyPresent" placeholder="BARANGAY" required maxlength="50">
                        <input type="text" name="WcityPresent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                        <input type="text" name="WprovincePresent" placeholder="PROVINCE" required maxlength="50">
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Permanent Address</h2></label>
                        <input style="width: 50px"type="text" name="WhousenumPermanent" placeholder="HOUSE NO." required maxlength="50">
                        <input style="width:90px;"type="text" name="WbrgyPermanent" placeholder="BARANGAY" required maxlength="50">
                        <input type="text" name="WcityPermanent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                         <input type="text" name="WprovincePermanent" placeholder="PROVINCE" required maxlength="50">
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Height</h2></label>
                        <input type="number" name="Wheight" id="body-size" placeholder="HEIGHT (cm)" min="0" required>
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Weight</h2></label>
                        <input type="text" name="Wweight" id="body-size" placeholder="WEIGHT (kg)" required>
                    </div>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Mobile Number</h2></label>
                        <input type="tel" name="WmobilePnum" placeholder="PRIMARY NUMBER" required value="">
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Email Address</h2></label>
                        <input type="email" name="Wemail" placeholder="EMAIL ADDRESS" required maxlength="50" value="">
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
                    <label for=""><h2>Disability</h2></label>
                        <select style="width: 120px;"class="" name="Wdisability" required>
                                            <option value="None" selected hidden>None</option>
                                            <option value="None">None</option>
                                            <option value="visual">Visual</option>
                                            <option value="hearing">Hearing</option>
                                            <option value="speech">Speech</option>
                                            <option value="physical">Physical</option>
                                        </select>   
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Employment Status</h2></label>
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
                    </div>
                    <div class="mt-3 text-align-right">
                        <label for="">ACTIVELY LOOKING FOR WORK?</label>
                        <select class="" name="WactivelyLooking" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>   
                    </div>
                    <div class="mt-3">
                        <label for="">WILLING TO WORK IMMEDIATELY?</label>
                        <select class="drop-down" name="WwillinglyWork" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>    
                    </div>
                    <div class="mt-3">
                        <label for="">ARE YOU A 4Ps BENEFICIARY?</label>
                        <select class="" name="WfourpsBeneficiary" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>     
                    </div>
                    <div class="mt-3">
                        <label for="">ARE YOU AN OFW?</label>
                        <select class="" name="Wofw" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>        
                    </div>
                
                    <!--next button-->
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h1 class="font-normal">II. EDUCATIONAL BACKGROUND</h1>
                    <!-- Step 2 input fields -->
                   
                    <div class="mt-3">
                        <label for=""><h2>Currently in School</h2></label>
                        <select style="width:20%;"class="" name="WschoolStatus" required>
                                                <option value="" selected hidden></option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>     
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Highest Educational Level</h2></label>
                        <select style="width:20%;" class="" name="WeducLevel" required>
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
                    <div class="mt-3">
                        <label for=""><h2>Year Graduated/Last Attended</h2></label>
                        <input type="date" name="WgradYear" placeholder="MM/YYYY" required>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>School/Unversity</h2></label>
                        <input type="text" name="Wschool" placeholder="SCHOOL NAME" required maxlength="50">
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Course/Program</h2></label>
                        <input type="text" name="Wcourse" placeholder="COURSE/PROGRAM NAME" required maxlength="50">
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Award/Honor Recieved</h2></label>
                        <input type="text" name="Waward" placeholder="AWARDS" required>
                    </div>
                
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                </section>
                
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                    <h1 class="font-normal">III. JOB PREFERENCE</h1>
                    <!-- Step 3 input fields -->
                    
                    <div class="mt-3">
                    <table>
                                            
                     <tr>
                        <th><h4>PREFERRED OCCUPATION</h4>
                                                    <h5>(e.g., clerk, call center agent, saleslady)</h5>
                        </th>
                         <th><h4><label for="">PREFERRED INDUSTRY</label></h4>
                                                    <h5><label for="">(e.g., IY-BPM, construction, manufacturing)</label></h5>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="Woccupation1" placeholder="PREFERRED OCCUPATION #1" required maxlength="50">
                         </td>
                         <td>
                            <input type="text" name="Windustry1" placeholder="PREFERRED INDUSTRY #1" required maxlength="50">
                          </td>
                     </tr>
                     <tr>
                           <td>
                            <input type="text" name="Woccupation2" placeholder="PREFERRED OCCUPATION #2" required maxlength="50">
                            </td>
                              <td>
                            <input type="text" name="Windustry2" placeholder="PREFERRED INDUSTRY #2" required maxlength="50">
                             </td>
                      </tr>
                    <tr>
                             <td>
                            <input type="text" name="Woccupation3" placeholder="PREFERRED OCCUPATION #3" required maxlength="50">
                            </td>
                             <td>
                            <input type="text" name="Windustry3" placeholder="PREFERRED INDUSTRY #3" required maxlength="50">
                             </td>
                      </tr>
                                           
        
                                            
        
                                        </table>
                            <div class="mt-3">
                        <label for=""><h2>PREFERRED WORK LOCATION</h2></label>
                        <select class="" name="Wemployment_status" required>
                                                <option value="none" selected hidden></option>
                                                <option value="none">none</option>
                                                <option value="local">LOCAL</option>
                                                <option value="abroad">ABROAD</option>
                                            </select>   
                    </div>
                    </div>
                
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="4">Next</button>
                    </div>
                </section>
                
                <!-- Step 4 Content, default hidden on page load. -->
                <section id="step-4" class="form-step d-none">
                    <h1 class="font-normal">IV. TECHNICAL/VOCATIONAL/OTHER TRAINING</h1>
                    <!-- Step 4 input fields -->
                    
                    <div class="mt-3">
                        <label for=""><h2>CURRENTLY IN TRAINING?</h2></label>
                        <select class="" name="WtrainingStatus" required>
                                                <option value="" selected hidden></option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2></h2></label>
                        <table >
                                            <tr>
                                              <th style="width: 45%">TRAINING</th>
                                              <th style="width: 45%">DURATION OF COURSES</th>
                                             
        
        
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="Wtraining1" placeholder="TRAINING #1" required maxlength="50"></td>
                                              <td>
                                                <input style=width:48%;float:left; type="date" name="WstartDuration1" placeholder="" required>
                                                <input style=width:48%;float:left; type="date" name="WendDuration1" placeholder="" required>
                                            </td>
                                              
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="Wtraining2" placeholder="TRAINING #2" required maxlength="50"></td>
                                                <td><input style=width:48%;float:left; type="date" name="WstartDuration2" placeholder="" required>
                                                <input style=width:48%;float:left; type="date" name="WendDuration2" placeholder="" required>
                                            </td>
                                                
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="Wtraining3" placeholder="TRAINING #3" required maxlength="50"></td>
                                                <td>
                                                <input style=width:48%;float:left; type="date" name="WstartDuration3" placeholder="" required>
                                                <input style=width:48%;float:left; type="date" name="WendDuration3" placeholder="" required>
                                                </td>
                                                <style>
                                                    input[type=date]{
                                                        width: 50%;
                                                        padding: 12px 20px;
                                                        margin: 5px 0;
                                                        display: inline-block;
                                                        border: 1px solid #ccc;
                                                        box-sizing: border-box;
                                                        border-radius: 10px;
                                                        font-size: 15px;
                                                        color:rgb(37, 32, 32);
                                                    }
                                                </style>
                                              </tr>
                                        </table>
                    </div>
                    <div class="mt-3">
                    <table>
                                            <tr>

                                              <th>TRAINING INSTITUTION</th>
                                              <th>CERTIFICATES RECEIVED</th>
                                              <th style="font-size: 15px;">COMPLETED</th>
        
        
                                            </tr>
                                            <tr>
                                            
                                              <td><input type="text" name="Winstitution1" placeholder="INSTITUTION #1" required maxlength="50"></td>
                                              <td><input type="text" name="Wcertificate1" placeholder="CERTIFICATE #1" required maxlength="50"></td>
                                              <td>
                                                <select class="" name="Wcompletion1" required>
                                                    <option value="" selected hidden></option>
                                                    <option value="yes">YES</option>
                                                    <option value="no">NO</option>
                                                </select> 
                                              </td>
                                            </tr>
                                            <tr>
                                              
                                                <td><input type="text" name="Winstitution2" placeholder="INSTITUTION #2" required maxlength="50"></td>
                                                <td><input type="text" name="Wcertificate2" placeholder="CERTIFICATE #2" required maxlength="50"></td>
                                                <td>
                                                  <select class="" name="Wcompletion2" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="yes">YES</option>
                                                      <option value="no">NO</option>
                                                  </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                                <td><input type="text" name="Winstitution3" placeholder="INSTITUTION #3" required maxlength="50"></td>
                                                <td><input type="text" name="Wcertificate3" placeholder="CERTIFICATE #3" required maxlength="50"></td>
                                                <td>
                                                  <select class="" name="Wcompletion3" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="yes">YES</option>
                                                      <option value="no">NO</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                        </table>
                    </div>
                    <?php
                        }
                    }}
                    ?>
                    
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="5">Next</button>
                    </div>
                </section>
                

                 <!-- Step 5 Content, default hidden on page load. -->
                 
                 <section id="step-5" class="form-step d-none">
                    <h1 class="font-normal">Eligibility</h1>
                     <!-- Step 5 input fields -->
                     <!--
                    <div class="mt-3">
                    <table>
                                            <tr>
                                              <th>CAREER SERVICE/BOARD/BAR</th>
                                              <th>LICENCE NUMBER</th>
                                              <th>EXPIRY DATE</th>
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="WcareerServ1" placeholder="" required maxlength="50"></td>
                                              <td><input type="text" name="WlicenceNum1" placeholder="" required maxlength="50"></td>
                                              <td><input type="date" name="WexpiryDate1" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="WcareerServ2" placeholder="" required maxlength="50"></td>
                                                <td><input type="text" name="WlicenceNum2" placeholder="" required maxlength="50"></td>
                                                <td><input type="date" name="WexpiryDate2" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="WcareerServ3" placeholder="" required maxlength="50"></td>
                                                <td><input type="text" name="WlicenceNum3" placeholder="" required maxlength="50"></td>
                                                <td><input type="date" name="WexpiryDate3" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                        </table>
                    </div>
                    <div class="mt-3">
                    <div style="text-align: left;" class="col1">
                                        <h4><label for="">LANGUAGE PROFECIENCY CERTIFICATION</label></h4>
                                        <input type="checkbox" id="cert_1" name="WlanguageCertifications[]" value="IELTS">
                                        <label for="cert_1">International English Language Testing System (IELTS)</label><br>
                                        <input type="checkbox" id="cert_2" name="WlanguageCertifications[]" value="TOEFL">
                                        <label for="cert_2">Test of English as a Foreign Language (TOEFL)</label><br>
                                        <input type="checkbox" id="cert_3" name="WlanguageCertifications[]" value="TOCFL">
                                        <label for="cert_3">Test of Chinese as a Foreign Language (TOCFL)</label><br>
                                        <input type="checkbox" id="cert_4" name="WlanguageCertifications[]" value="JLPT">
                                        <label for="cert_4">Japanese Language Proficiency Test (JLPT)</label><br>
                                        <input type="checkbox" id="cert_5" name="WlanguageCertifications[]" value="TOPIC">
                                        <label for="cert_5">Test of Proficiency in Korea (TOPIC)</label><br>
                                        <input type="checkbox" id="cert_other" name="Wcert_other" value="">
                                        <label for="otherCertification">Other:</label>
                                        <input type="text" id="otherCertification" name="WotherCertification" value="" maxlength="50">
                                    </div>
                    </div>
                    <div class="mt-3">
                    <h4><label for="">VALIDITY DATE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="date" id="valid_date" name="WvalidDate"  placeholder="MM/DD/YYYY" value="">
                                            <style>
                                            input[type=date]{
                                                        width: 50%;
                                                        padding: 12px 20px;
                                                        margin: 5px 0;
                                                        display: inline-block;
                                                        border: 1px solid #ccc;
                                                        box-sizing: border-box;
                                                        border-radius: 10px;
                                                        font-size: 15px;
                                                        color:rgb(37, 32, 32);
                                                    }</style>
        
                                        </label></h4>
                    </div>
                    <div class="mt-3">
                    <h4><label for="WdialectsSpoken">DIALECTS SPOKEN</label></h4>
                                        <input type="checkbox" id="Tagalog" name="WdialectsSpoken[]" value="Tagalog">
                                        <label for="dialect_1">Tagalog</label><br>
                                        <input type="checkbox" id="Ilocano" name="WdialectsSpoken[]" value="Ilocano">
                                        <label for="dialect_2">Ilocano</label><br>
                                        <input type="checkbox" id="Ilonggo" name="WdialectsSpoken[]" value="Ilonggo">
                                        <label for="dialect_3">Ilonggo</label><br>
                                        <input type="checkbox" id="Bikol" name="WdialectsSpoken[]" value="Bikol">
                                        <label for="dialect_4">Bikol</label><br>
                                        <input type="checkbox" id="dialect_other" name="WdialectsSpoken[]r" value="">
                                        <label for="dialect_other">Other:</label>
                                        <input style="width: 20%; height: 15px;" type="text" id="dialect_other" name="WotherDialect" value="" maxlength="50">
                    </div>
                                                -->
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="4">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="6">Next</button>
                    </div>
                </section>

                    
                <!-- Step 6 Content, default hidden on page load. -->
                <section id="step-6" class="form-step d-none">
                    <h1 class="font-normal">VI. WORK EXPERIENCES</h1>
                    <!-- Step 6 input fields -->
                    <div class="mt-3">
                    <h4 style="padding-left: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Limit the occupation for the last 10 years. Start with the most recent employment)</h4>
                    <table>
                                            <tr>
                                              <th style="width: 25%">NAME OF OFFICE/COMPANY</th>
                                              <th style="width: 23%">ADDRESS</th>
                                            
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="Wcompany1" placeholder="COMPANY #1" required maxlength="50"></td>
                                              <td><input type="text" name="WcpAddress1" placeholder="ADDRESS #1" required maxlength="50"></td>
                                              
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="Wcompany2" placeholder="COMPANY #2" required maxlength="50"></td>
                                                <td><input type="text" name="WcpAddress2" placeholder="ADDRESS #2" required maxlength="50"></td>
                                               
                                              </tr>
                                              <tr>
                                                <td><input type="text" name="Wcompany3" placeholder="COMPANY #3" required maxlength="50"></td>
                                                <td><input type="text" name="WcpAddress3" placeholder="ADDRESS #3" required maxlength="50"></td>
                                                
                                              </tr>
                                              <tr>
                                                <td><input type="text" name="Wcompany4" placeholder="COMPANY #4" required maxlength="50"></td>
                                                <td><input type="text" name="WcpAddress4" placeholder="ADDRESS #4" required maxlength="50"></td>
                                               
                                              </tr>
                                        </table>
                    </div>
                    <div class="mt-3">
                    <table>
                                            <tr>
                                              
                                              <th style="width: 20%">POSITION HELD</th>
                                              <th style="width: 30%">INCLUSIVE DATES</th>
                                              <th style="width: 15%">STATUS OF APPOINTMENT</th>
        
        
                                            </tr>
                                            <tr>
                                              
                                              <td><input type="text" name="Wposition1" placeholder="POSITION #1" required maxlength="50"></td>
                                              <td><input type="text" name="WincluDate1" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                              <td>
                                                <select class="" name="WappointStat1" required>
                                                    <option value="" selected hidden></option>
                                                    <option value="permanent">PERMANENT</option>
                                                    <option value="contractual">CONTRACTUAL</option>
                                                    <option value="part_time">PART-TIME</option>
                                                    <option value="probitionary">PROBITIONARY</option>
                                                </select> 
                                              </td>
                                            </tr>
                                            <tr>
                                                
                                                <td><input type="text" name="Wposition2" placeholder="POSITION #2" required maxlength="50"></td>
                                                <td><input type="text" name="WincluDate2" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="WappointStat2" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                              <tr>
            

                                                <td><input type="text" name="Wposition3" placeholder="POSITION #3" required maxlength="50"></td>
                                                <td><input type="text" name="WincluDate3" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="WappointStat3" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                              <tr>
                                               
                                                <td><input type="text" name="Wposition4" placeholder="POSITION #4" required maxlength="50"></td>
                                                <td><input type="text" name="WincluDate4" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="WappointStat4" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                        </table>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="5">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="7">Next</button>
                    </div>
                </section>
                <!-- Step 7 Content, default hidden on page load. -->
                <section id="step-7" class="form-step d-none">
                    <h1 class="font-normal">VII. SKILLS</h1>
                    <!-- Step 7 input fields -->
                    <!--
                    <div class="mt-3 form-row">
                    <div class="stick-object">
                    <h4><label for="">21ST CENTURY SKILLS</label></h4>
                                    <h5><label for="">(Check five skills you possess[self assessment])</label></h5>
                                    <div style="text-align: left;" class="col2">
        
                                        <input type="checkbox" id="Innovation" name="Wskill[]" value="Innovation">
                                        <label for="skill_1">Innovation</label><br>
        
                                        <input type="checkbox" id="Team-Work" name="Wskill[]" value="Team Work">
                                        <label for="skill_2">Team Work</label><br>
        
                                        <input type="checkbox" id="Multitasking" name="Wskill[]" value="Multitasking">
                                        <label for="skill_3">Multitasking</label><br>
        
                                        <input type="checkbox" id="Work-Ethics" name="Wskill[]" value="Work Ethics">
                                        <label for="skill_4">Work Ethics</label><br>
        
                                        <input type="checkbox" id="Self-Motivation" name="Wskill[]" value="Self Motivation">
                                        <label for="skill_5">Self Motivation</label><br>
        
                                        <input type="checkbox" id="Creative-Problem-Solving" name="Wskill[]" value="Creative Problem Solving">
                                        <label for="skill_6">Creative Problem Solving</label><br>
        
                                        <input type="checkbox" id="Problem-Solving" name="Wskill[]" value="Problem Solving">
                                        <label for="skill_7">Problem Solving</label><br>
        
                                        <input type="checkbox" id="Critical-Thinking" name="Wskill[]" value="Critical Thinking">
                                        <label for="skill_8">Critical Thinking</label><br>
                                    </div>

                                    <div style="text-align: left;" class="col3">

                                        <input type="checkbox" id="Decision-Making" name="Wskill[]" value="Decision Making">
                                        <label for="skill_9">Decision Making</label><br>
        
                                        <input type="checkbox" id="Stress-Tolerance" name="Wskill[]" value="Stress Tolerance">
                                        <label for="skill_10">Stress Tolerance</label><br>
        
                                        <input type="checkbox" id="Planning-and-Organizing" name="Wskill[]" value="Planning and Organizing">
                                        <label for="skill_11">Planning and Organizing</label><br>
        
                                        <input type="checkbox" id="Social-Perceptiveness" name="Wskill[]" value="Social Perceptiveness">
                                        <label for="skill_12">Social Perceptiveness</label><br>
        
                                        <input type="checkbox" id="English-Functional-Skills" name="Wskill[]" value="English Functional Skills">
                                        <label for="skill_13">English Functional Skills</label><br>
        
                                        <input type="checkbox" id="English-Comprehension" name="Wskill[]" value="English Comprehension">
                                        <label for="skill_14">English Comprehension</label><br>
        
                                        <input type="checkbox" id="Math-Functional-Skill" name="Wskill[]" value="Math Functional Skill">
                                        <label for="skill_15">Math Functional Skill</label><br>
                    </div>
                    <div class="stick-object">
                    <h4><label for="">TECHNICAL SKILLS ACQUIRED WITHOUT FORMAL TRAINING</label></h4>
                                    <div style="text-align: left;" class="col2">
        
                                        <input type="checkbox" id="Carpentry" name="WtechSkill[]" value="Carpentry">
                                        <label for="Techskill_1">Carpentry</label><br>
        
                                        <input type="checkbox" id="Masonry" name="WtechSkill[]" value="Masonry">
                                        <label for="Techskill_2">Masonry</label><br>
        
                                        <input type="checkbox" id="Welding" name="WtechSkill[]" value="Welding">
                                        <label for="Techskill_3">Welding</label><br>
        
                                        <input type="checkbox" id="Auto-Mechanic" name="WtechSkill[]" value="Auto Mechanic">
                                        <label for="Techskill_4">Auto Mechanic</label><br>
        
                                        <input type="checkbox" id="Plumbing" name="WtechSkill[]" value="Plumbing">
                                        <label for="Techskill_5">Plumbing</label><br>
        
                                        <input type="checkbox" id="Driving" name="WtechSkill[]" value="Driving">
                                        <label for="Techskill_6">Driving</label><br>
        
                                        <input type="checkbox" id="Gardening" name="WtechSkill[]" value="Gardening">
                                        <label for="Techskill_7">Gardening</label><br>
                                    </div>

                                    <div style="text-align: left;" class="col3">

                                        <input type="checkbox" id="Tailoring" name="WtechSkill[]" value="Tailoring">
                                        <label for="Techskill_8">Tailoring</label><br>
        
                                        <input type="checkbox" id="Photograph" name="WtechSkill[]" value="Photograph">
                                        <label for="Techskill_9">Photograph</label><br>
        
                                        <input type="checkbox" id="Hairdressing" name="WtechSkill[]" value="Hairdressing">
                                        <label for="Techskill_10">Hairdressing</label><br>
        
                                        <input type="checkbox" id="Cooking" name="WtechSkill[]" value="Cooking">
                                        <label for="Techskill_11">Cooking</label><br>
        
                                        <input type="checkbox" id="Baking" name="WtechSkill[]" value="Baking">
                                        <label for="Techskill_12">Baking</label><br>
        
                                        <input type="checkbox" id="Other" name="WtechSkill[]" value="">
                                        <label for="Techskill_13">Other:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input style="width: 40%; height: 15px;" type="text" id="Techskill_13" name="WotherTechskill" value="">
                    </div>
                  </div>
                                                -->
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="6">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="8">Next</button>
                    </div>
                </section>
                <!--Step 8-->
                <section id="step-8" class="form-step d-none">
                    <h1 class="font-normal">VIII. Authorization</h1>
                    <!-- Step 8 input fields -->
 
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="7">Prev</button>
                        <button class="button submit-btn" type="submit" name="submit">Submit</button>
                    </div>
                </section>
                </div>
            </form>
        </div>
    </div>
        <script src="../assets/js/applicant/applicant_profile.js"></script>
</body>
</html>