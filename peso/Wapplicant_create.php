<?php
include '../conn.php';
session_start();
if(!isset($_SESSION["peso_id"])){
    header("location: login.php");
}
$peso_id = $_SESSION['peso_id'];
$sql_check = "SELECT peso_id FROM wap_info WHERE peso_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $peso_id);
$stmt_check->execute();
$stmt_check->store_result();

if (isset($_POST["submit"])) {
    // Step 1 form data
    $peso_id = $_SESSION['peso_id'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $midName = $_POST['midName'];
    $suffix = $_POST['suffix'];
    $jobseekerType = $_POST['jobseekerType'];
    $birthplace = $_POST['birthplace'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civilStatus = $_POST['civilStatus'];
    $citizenship = $_POST['citizenship'];
    $housenumPresent = $_POST['housenumPresent'];
    $brgyPresent = $_POST['brgyPresent'];
    $cityPresent = $_POST['cityPresent'];
    $provincePresent = $_POST['provincePresent'];
    $housenumPermanent = $_POST['housenumPermanent'];
    $brgyPermanent = $_POST['brgyPermanent'];
    $cityPermanent = $_POST['cityPermanent'];
    $provincePermanent = $_POST['provincePermanent'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $mobilePnum = $_POST['mobilePnum'];
    $landlineNum = $_POST['landlineNum'];
    $email = $_POST['email'];
    $disability = $_POST['disability'];
    $employmentStatus = $_POST['employmentStatus'];
    $activelyLooking = $_POST['activelyLooking'];
    $willinglyWork = $_POST['willinglyWork'];
    $fourpsBeneficiary = $_POST['fourpsBeneficiary'];
    $ofw = $_POST['ofw'];

    // Step 2 form data
    $schoolStatus = $_POST["schoolStatus"];
    $educLevel = $_POST["educLevel"];
    $gradYear = $_POST["gradYear"];
    $school = $_POST["school"];
    $course = $_POST["course"];
    $award = $_POST["award"];

    // Step 3 form data
    $occupation1 = $_POST["occupation1"];
    $industry1 = $_POST["industry1"];
    $occupation2 = $_POST["occupation2"];
    $industry2 = $_POST["industry2"];
    $occupation3 = $_POST["occupation3"];
    $industry3 = $_POST["industry3"];
    $locationType = $_POST["locationType"];
    $location1 = $_POST["location2"];
    $location2 = $_POST["location2"];

    // Step 4 form data
    //$trainingStatus = $_POST["trainingStatus"];
    $training1 = $_POST["training1"];
    $startDuration1 = $_POST["startDuration1"];
    $endDuration1 = $_POST["endDuration1"];
    $training2 = $_POST["training2"];
    $startDuration2 = $_POST["startDuration2"];
    $endDuration2 = $_POST["endDuration2"];
    $training3 = $_POST["training3"];
    $startDuration3 = $_POST["startDuration3"];
    $endDuration3 = $_POST["endDuration3"];
    $institution1 = $_POST["institution1"];
    $certificate1 = $_POST["certificate1"];
    $completion1 = $_POST["completion1"];
    $institution2 = $_POST["institution2"];
    $certificate2 = $_POST["certificate2"];
    $completion2 = $_POST["completion2"];
    $institution3 = $_POST["institution3"];
    $certificate3 = $_POST["certificate3"];
    $completion3 = $_POST["completion3"];

    // Step 5 form data
    $careerServ1 = $_POST["careerServ1"];
    $licenceNum1 = $_POST["licenceNum1"];
    $expiryDate1 = $_POST["expiryDate1"];
    $careerServ2 = $_POST["careerServ2"];
    $licenceNum2 = $_POST["licenceNum2"];
    $expiryDate2 = $_POST["expiryDate2"];
    //$careerServ3 = $_POST["careerServ3"];
    //$licenceNum3 = $_POST["licenceNum3"];
    //$expiryDate3 = $_POST["expiryDate3"];
    $validDate = $_POST["validDate"];
    $languageCertifications = isset($_POST["languageCertifications"]) ? implode(', ', $_POST["languageCertifications"]) : "";
    $otherCertification = isset($_POST["otherCertification"]) ? $_POST["otherCertification"] : "";
    $dialectsSpoken = isset($_POST["dialectsSpoken"]) ? implode(', ', $_POST["dialectsSpoken"]) : "";
    $otherDialect = isset($_POST["otherDialect"]) ? $_POST["otherDialect"] : "";

    // Step 6 form data
    $company1 = $_POST["company1"];
    $cpAddress1 = $_POST["cpAddress1"];
    $company2 = $_POST["company2"];
    $cpAddress2 = $_POST["cpAddress2"];
    $company3 = $_POST["company3"];
    $cpAddress3 = $_POST["cpAddress3"];
    $company4 = $_POST["company4"];
    $cpAddress4 = $_POST["cpAddress4"];
    $position1 = $_POST["position1"];
    $incluSDate1 = $_POST["incluSDate1"];
    $incluEDate1 = $_POST["incluEDate1"];
    $appointStat1 = $_POST["appointStat1"];
    $position2 = $_POST["position2"];
    $incluSDate2 = $_POST["incluSDate2"];
    $incluEDate2 = $_POST["incluEDate2"];
    $appointStat2 = $_POST["appointStat2"];
    $position3 = $_POST["position3"];
    $incluSDate3 = $_POST["incluSDate3"];
    $incluEDate3 = $_POST["incluEDate3"];
    $appointStat3 = $_POST["appointStat3"];
    $position4 = $_POST["position4"];
    $incluSDate4 = $_POST["incluSDate4"];
    $incluEDate4 = $_POST["incluEDate4"];
    $appointStat4 = $_POST["appointStat4"];

    // Step 7 form data
    $skill = isset($_POST["skill"]) ? implode(', ', $_POST["skill"]) : "";
    $techSkill = isset($_POST["techSkill"]) ? implode(', ', $_POST["techSkill"]) : "";
    $otherTechskill = isset($_POST["otherTechskill"]) ? $_POST["otherTechskill"] : "";

   /* //check if the input already exist
    $check_query="SELECT * FROM applicant_profile WHERE applicant_id = $applicant_id";
    $check_result = mysqli_query($conn, $check_query);
    if(!$check_result){
        echo "database error";
    }
    $checkrow = mysqli_num_rows($check_result);
    if($checkrow > 0){
        echo '<script>alert("woops"); window.location.href = "homepage.php";</script>';
    } else {*/
    /*step 1*/

    $sql_table1 = "INSERT INTO wap_info (peso_id, lastName, firstName, midName, suffix, jobseekerType, birthplace, birthday, age, sex, civilStatus, citizenship, housenumPresent, brgyPresent, cityPresent, provincePresent, housenumPermanent, brgyPermanent, cityPermanent, provincePermanent, height, weight, landlineNum, mobilePnum, email, disability, employmentStatus, activelyLooking, willinglyWork, fourpsBeneficiary, ofw) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table1);
    $stmt->bind_param("issssssssssssssssssssssssssssss",$peso_id, $lastName, $firstName, $midName, $suffix, $jobseekerType, $birthplace, $birthday, $age, $sex, $civilStatus, $citizenship, $housenumPresent, $brgyPresent, $cityPresent, $provincePresent, $housenumPermanent, $brgyPermanent, $cityPermanent, $provincePermanent, $height, $weight, $landlineNum, $mobilePnum, $email, $disability, $employmentStatus, $activelyLooking, $willinglyWork, $fourpsBeneficiary, $ofw);

    if ($stmt->execute()) {
        $ap_info_id = $conn->insert_id;
    } else {
        echo "Error inserting data into table1: " . $conn->error;
    }

    /*step 2*/
    $sql_table2 = "INSERT INTO wap_educ (peso_id, schoolStatus, educLevel, gradYear, school, course, award) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table2);
    $stmt->bind_param("issssss", $peso_id, $schoolStatus, $educLevel, $gradYear, $school, $course, $award);

    if ($stmt->execute()) {
        $ap_educ_id = $conn->insert_id;
    } else {
        echo "Error inserting data into education_info: " . $conn->error;
    }

    /*step 3*/
    $sql_table3 = "INSERT INTO wap_prefer (peso_id, occupation1, industry1, occupation2, industry2, occupation3, industry3, locationType, location1, location2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table3);
    $stmt->bind_param("isssssssss", $peso_id, $occupation1, $industry1, $occupation2, $industry2, $occupation3, $industry3, $locationType, $location1, $location2);

    if ($stmt->execute()) {
        $ap_prefer_id = $conn->insert_id;
    } else {
        echo "Error inserting data into employment_info: " . $conn->error;
    }
    /*step 4*/
    $sql_table4 = "INSERT INTO wap_tvo (peso_id, training1, startDuration1, endDuration1, training2, startDuration2, endDuration2, training3, startDuration3, endDuration3, institution1, certificate1, completion1, institution2, certificate2, completion2, institution3, certificate3, completion3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table4);
    $stmt->bind_param("issssssssssssssssss", $peso_id, $training1, $startDuration1, $endDuration1, $training2, $startDuration2, $endDuration2, $training3, $startDuration3, $endDuration3, $institution1, $certificate1, $completion1, $institution2, $certificate2, $completion2, $institution3, $certificate3, $completion3);

    if ($stmt->execute()) {
        $ap_tvo_id = $conn->insert_id;
    } else {
        echo "Error inserting data into training_info: " . $conn->error;
    }
    /*step 5*/
    $sql_table5 = "INSERT INTO wap_elig (peso_id, careerServ1, licenceNum1, expiryDate1, careerServ2, licenceNum2, expiryDate2, validDate, languageCertifications, otherCertification, dialectsSpoken, otherDialect) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table5);
    $stmt->bind_param("isssssssssss", $peso_id, $careerServ1, $licenceNum1, $expiryDate1, $careerServ2, $licenceNum2, $expiryDate2, $validDate, $languageCertifications, $otherCertification, $dialectsSpoken, $otherDialect);

if ($stmt->execute()) {
    $ap_elig_id = $conn->insert_id;
} else {
    echo "Error inserting data into career_info: " . $conn->error;
}
    /*step 6*/
    $sql_table6 = "INSERT INTO wap_exp (peso_id, company1, cpAddress1, company2, cpAddress2, company3, cpAddress3, company4, cpAddress4, position1, incluSDate1, incluEDate1, appointStat1, position2, incluSDate2, incluEDate2, appointStat2, position3, incluSDate3, incluEDate3, appointStat3, position4, incluSDate4, incluEDate4, appointStat4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table6);
    $stmt->bind_param("issssssssssssssssssssssss", $peso_id, $company1, $cpAddress1, $company2, $cpAddress2, $company3, $cpAddress3, $company4, $cpAddress4, $position1, $incluSDate1, $incluEDate1, $appointStat1, $position2, $incluSDate2, $incluEDate2, $appointStat2, $position3, $incluSDate3, $incluEDate3, $appointStat3, $position4, $incluSDate4, $incluEDate4, $appointStat4);

    if ($stmt->execute()) {
        $ap_exp_id = $conn->insert_id;
    } else {
        echo "Error inserting data into work_experience: " . $conn->error;
    }
    /*step 7*/
    $sql_table7 = "INSERT INTO wap_skills (peso_id, skill, techSkill, otherTechskill) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table7);
    $stmt->bind_param("isss", $peso_id, $skill, $techSkill, $otherTechskill);

    if ($stmt->execute()) {
        $ap_skills_id = $conn->insert_id;
    } else {
        echo "Error inserting data into skills_info: " . $conn->error;

    }
        

if ($stmt->execute()) {
header("location:Wapplicant.php");
} else {
echo "Error inserting data into applicant_profile: " . $conn->error;
}

}
/*}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile</title>
    <link rel="stylesheet" href="../assets/css/Wapplicant_profile.css">
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
            <!--
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                 Step 1 
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <div class="label">Personal Information</div>
                    </a>
                </li>
                 Step 2 
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Educational Background</div>
                    </a>
                </li>
                 Step 3 
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Job Preference</div>
                    </a>
                </li>
                      Step 4 
                     <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>4</span>
                        </span>
                        <div class="label text-muted">Trainings</div>
                    </a>
                </li>
                Step 5
                <li class="form-stepper-unfinished text-center form-stepper-list" step="5">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>5</span>
                        </span>
                        <div class="label text-muted">Eligibility</div>
                    </a>
                </li>
                 Step 6 
                <li class="form-stepper-unfinished text-center form-stepper-list" step="6">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>6</span>
                        </span>
                        <div class="label text-muted">Work Experiences</div>
                    </a>
                </li>
                 Step 7 
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
-->
            <!--------------------------------- Step Wise Form Content --------------------------------------->
            <style>
                .is-invalid {
                        border-color: #dc3545;
                    }
            </style>
            <?php
            if (isset($_SESSION["peso_id"])){
                $query = "SELECT * FROM p_accounttb WHERE peso_id ='$peso_id'";
                $fetch = $conn->query($query);
                if ($fetch->num_rows > 0) {
                while ($row = $fetch->fetch_assoc()){

                
            ?>
            <center>
            <form id="userAccountSetupForm" class="form" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" novalidate>
                <h1 style="font-size: 35px;">WALK-IN APPLICANT<h1>
                <!-- Step 1 Content -->
            <div class="wrapper">
                <section id="step-1" class="form-step">
                
                
                    <h1 class="mt-3 font-normal">Personal Information</h1>
                    <!-- Step 1 input fields -->
                    <div class="mt-3 form-row">
                        <!--input field insert-->
                        <div class="stick-object-30">
                            <label for=""><h2>First Name</h2></label>
                            <input type="text" placeholder="First Name" name="firstName" value="">
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Last Name</h2></label>
                            <input type="text" placeholder="Last Name" name="lastName" value="">
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Middle Name</h2></label>
                            <input type="text" placeholder="Middle Name" name="midName" oninput="noNumber(event); validateForm()" value="">
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Suffix</h2></label>
                            <input type="text" placeholder="Jr." name="suffix" oninput="noNumber(event); validateForm()">
                        </div>
                    </div>
                    
                    <div class="mt-3 form-row">
                        <div class="stick-object-30">
                            <label for=""><h2>Type of jobseeker</h2></label>
                            <select class="" name="jobseekerType" required>
                                        <option value="" selected hidden>Select Type</option>
                                        <option value="first_time">FIRST TIME</option>
                                        <option value="jobseeker">JOBSEEKER</option>
                                        <option value="ofw">OFW</option>
                                    </select>
                        </div>
                        <div class="stick-object-30">
        
                            <label for=""><h2>Birthplace</h2></label>
                            <input type="text" name="birthplace"placeholder="BIRTHPLACE" required>
                        </div>
                        <div class="stick-object-30">
        
                            <label for=""><h2>Date of Birth</h2></label>
                            <input type="date" placeholder="birthday" name="birthday" id="birthday">
                        </div>
                        <div class="stick-object-15">
                            <label for="age"><h2>Age</h2></label>
                            <input type="number" id="age"name="age" placeholder="AGE"min="16" max="90"required value="">
                        </div>
                               
                    </div>
                   
                    <div class="mt-3 form-row">
                        <div class="stick-object-20">
                            <label for=""><h2>Sex</h2></label>
                            <select class="" name="sex" required>
                                                <option value="" selected hidden>Select Gender</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                            </select>
                        </div>
                        
                        <div class="stick-object-25">
       
                            <label for=""><h2>Civil Status</h2></label>
                            <select class="" name="civilStatus" required>
                                                <option value="" selected hidden>Select Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Single Parent">Single Parent</option>
                                                <option value="Widow">Widow</option>
                                            </select>
                        </div>
                        <div class="stick-object-25">
      
                            <label for=""><h2>Citizenship</h2></label>
                            <input type="text" name="citizenship" placeholder="CITIZENSHIP" required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Email Address</h2></label>
                            <input type="email" name="email" placeholder="EMAIL ADDRESS" required maxlength="50" value="">
                        </div>
                    </div>
                    <div class="mt-3 form-row">
                   
                        <div class="stick-object-25">
                            <label for=""><h2>Present House No.</h2></label>
                            <input type="text" name="housenumPresent" placeholder="HOUSE NO." required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Present Baranggay</h2></label>
                            <input type="text"name="brgyPresent" placeholder="BARANGAY" required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Present City</h2></label>
                            <input type="text" name="cityPresent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Present Province</h2></label>
                            <input type="text" name="provincePresent" placeholder="PROVINCE" required maxlength="50">
                        </div>
                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-25">
                            <label for=""><h2>Permanent House No.</h2></label>
                            <input type="text" name="housenumPermanent" placeholder="HOUSE NO." required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Permanent Barangay</h2></label>
                            <input type="text" name="brgyPermanent" placeholder="BARANGAY" required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Permanent City</h2></label>
                            <input type="text" name="cityPermanent" placeholder="MUNICIPALITY/CITY" required maxlength="50">
                        </div>
                        <div class="stick-object-25">
                            <label for=""><h2>Permanent Province</h2></label>
                            <input type="text" name="provincePermanent" placeholder="PROVINCE" required maxlength="50">
                        </div>
                    </div>
                    <div class="mt-3 form-row">
                        <div class="stick-object-20">
        
                            <label for=""><h2>Height</h2></label>
                            <input type="number" name="height" id="body-size" placeholder="HEIGHT (cm)" min="0" required>
                        </div>
                        <div class="stick-object-20">
        
                            <label for=""><h2>Weight</h2></label>
                            <input type="number" name="weight" id="body-size" placeholder="WEIGHT (kg)" required>
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Mobile Number</h2></label>
                            <input type="tel" name="mobilePnum" placeholder="PRIMARY NUMBER" required value="">
                        </div>
                        <div class="stick-object-30">
        
                            <label for=""><h2>Mobile Number</h2></label>
                            <input type="tel" name="landlineNum" placeholder="PRIMARY NUMBER" required value="">
                        </div>
                    </div>
                    
                   
                    <div class="mt-3 form-row">
                        <div class="stick-object-20">
                            <label for=""><h2>Disability</h2></label>
                            <select class="" name="disability" required>
                                                <option value="None" selected hidden>None</option>
                                                <option value="None">None</option>
                                                <option value="visual">Visual</option>
                                                <option value="hearing">Hearing</option>
                                                <option value="speech">Speech</option>
                                                <option value="physical">Physical</option>
                            </select>   
                        </div>
                        <div class="stick-object-20">
        
                            <label for=""><h2>Employment Status</h2></label>
                            <select class="" name="employmentStatus" required>
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
                        <div class="stick-object-30">
                            
                            <label for=""><h2>Actively Looking for Work?</h2></label>
                            <select class="" name="activelyLooking" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                            </select>  
                                       
                            
                        </div>
                        <div class="stick-object-30">
                            
                            <label for=""><h2>Willing to work immediately?</h2></label>
                            <select class="" name="willinglyWork" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                            </select>  
                                       
                        </div> 
                        
                        
                    </div>

                    <div class="mt-3 form-row">
                        <div class="stick-object-30">
                            
                            <label for=""><h2>4ps beneficiary?</h2></label>
                            <select class="" name="fourpsBeneficiary" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                            </select>  
                                        
                        </div>
                        <div class="stick-object-30">
                            
                            <label for=""><h2>Are you an OFW?</h2></label>
                            <select class="" name="ofw" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                            </select>  
                            
                        </div>
                    </div>
                
                <div class="button-selection">
                    <button id="nextButton" class="button btn-navigate-form-step" type="button" step_number="2">NEXT</button>
                </div>                    
                    <!--next button-->
                    </div>
                </section>


                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                
                    <h1 class="mt-3 font-normal">Educational Background</h1>
                    <!-- Step 2 input fields -->
                    <div class="mt-3 form-row">
                   
                        <div class="stick-object-30">
                            <label for=""><h2>Currently in School</h2></label>
                            <select class="" name="schoolStatus" required>
                                                <option value="" selected hidden></option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                            </select>     
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Highest Educational Level</h2></label>
                            <select class="" name="educLevel" required>
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
                        <div class="stick-object-40">
                            <label for=""><h2>Year Graduated/Last Attended</h2></label>
                            <input type="date" name="gradYear" placeholder="MM/YYYY" required>
                        </div>
                    </div>
                   
                    
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-30">
                            <label for=""><h2>School/Unversity</h2></label>
                            <input type="text" name="school" placeholder="SCHOOL NAME" required maxlength="50">
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Course/Program</h2></label>
                            <input type="text" name="course" placeholder="COURSE/PROGRAM NAME" required maxlength="50">
                        </div>
                        <div class="stick-object-30">
                            <label for=""><h2>Award/Honor Recieved</h2></label>
                            <input type="text" name="award" placeholder="AWARDS" required>
                        </div>
                       
                    </div>

                    <br> <br>

                    <h1 class="mt-3 font-normal">Job Preferences</h1>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Occupation #1</h2></label>
                            <input type="text" name="occupation1" placeholder="PREFERRED OCCUPATION #1" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Industry #1</h2></label>
                            <input type="text" name="industry1" placeholder="PREFERRED INDUSTRY #1" required maxlength="50">
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Occupation #2</h2></label>
                            <input type="text" name="occupation2" placeholder="PREFERRED OCCUPATION #2" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Industry #2</h2></label>
                            <input type="text" name="industry2" placeholder="PREFERRED INDUSTRY #2" required maxlength="50">
                        </div>
                        
                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Occupation #3</h2></label>
                            <input type="text" name="occupation3" placeholder="PREFERRED OCCUPATION #3" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Industry #3</h2></label>
                            <input type="text" name="industry3" placeholder="PREFERRED INDUSTRY #3" required maxlength="50">
                        </div>
                        
                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Location</h2></label>
                            <select class="" name="locationType" required>
                                                <option value="none" selected hidden></option>
                                                <option value="none">none</option>
                                                <option value="local">LOCAL</option>
                                                <option value="abroad">ABROAD</option>
                            </select> 
                        </div>
                        
                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Location #1</h2></label>
                            <input type="text" name="location1" placeholder="PREFERRED LOCATION #1" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Preferred Location #2</h2></label>
                            <input type="text" name="location2" placeholder="PREFERRED LOCATION #2" required maxlength="50">
                        </div>
                        
                    </div>

                <div class="button-selection">
                    <button class="button btn-navigate-form-step" type="button" step_number="1">PREVIOUS</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="3">NEXT</button>
                </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                
                
                    <h1 class="mt-3 font-normal">Training</h1>
                    <!-- Step 3 input fields -->
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-35">
                            <label for=""><h2>Training Program #1</h2></label>
                            <input type="text" name="training1" placeholder="TRAINING #1" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Training Institution #1</h2></label>
                            <input type="text" name="institution1" placeholder="INSTITUTION #1" required maxlength="50">
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="date" name="startDuration1" placeholder="" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="date" name="endDuration1" placeholder="" required>
                        </div>

                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Certificates Received #1</h2></label>
                            <input type="text" name="certificate1" placeholder="CERTIFICATE #1" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Completion #1</h2></label>
                            <select class="" name="completion1" required>
                                <option value="" selected hidden></option>
                                <option value="Completed">Completed</option>
                                <option value="Not Completed">Not Completed</option>
                            </select> 
                        </div>
                       
                        
                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-35">
                            <label for=""><h2>Training Program #2</h2></label>
                            <input type="text" name="training2" placeholder="TRAINING #2" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Training Institution #2</h2></label>
                            <input type="text" name="institution2" placeholder="INSTITUTION #2" required maxlength="50">
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="date" name="startDuration2" placeholder="" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="date" name="endDuration2" placeholder="" required>
                        </div>

                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Certificates Received #2</h2></label>
                            <input type="text" name="certificate2" placeholder="CERTIFICATE #2" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Completion #2</h2></label>
                            <select class="" name="completion2" required>
                                <option value="" selected hidden></option>
                                <option value="Completed">Completed</option>
                                <option value="Not Completed">Not Completed</option>
                            </select> 
                        </div>
                       
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-35">
                            <label for=""><h2>Training Program #3</h2></label>
                            <input type="text" name="training3" placeholder="TRAINING #3" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Training Institution #3</h2></label>
                            <input type="text" name="institution3" placeholder="INSTITUTION #3" required maxlength="50">
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="date" name="startDuration3" placeholder="" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="date" name="endDuration3" placeholder="" required>
                        </div>

                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Certificates Received #3</h2></label>
                            <input type="text" name="certificate3" placeholder="CERTIFICATE #3" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Completion #3</h2></label>
                            <select class="" name="completion3" required>
                                <option value="" selected hidden></option>
                                <option value="Completed">Completed</option>
                                <option value="Not Completed">Not Completed</option>
                            </select> 
                        </div>
                       
                        
                    </div>

                    <br> <br>
                    <h1 class="mt-3 font-normal">Eligibility</h1>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-40">
                            <label for=""><h2>Career Service/Board/Bar #1</h2></label>
                            <input type="text" name="careerServ1" placeholder="" required maxlength="50">
                        </div>
                        <div class="stick-object-40">
                            <label for=""><h2>Licence Number #1</h2></label>
                            <input type="text" name="licenceNum1" placeholder="" required maxlength="50">
                        </div>
                        <div class="stick-object-20">
                            <label for=""><h2>Expiry Date #1</h2></label>
                            <input type="date" name="expiryDate1" placeholder="MM/DD/YYYY" required>
                        </div>
                        

                    </div>
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-40">
                            <label for=""><h2>Career Service/Board/Bar #2</h2></label>
                            <input type="text" name="careerServ2" placeholder="" required maxlength="50">
                        </div>
                        <div class="stick-object-40">
                            <label for=""><h2>Licence Number #2</h2></label>
                            <input type="text" name="licenceNum2" placeholder="" required maxlength="50">
                        </div>
                        <div class="stick-object-20">
                            <label for=""><h2>Expiry Date #2</h2></label>
                            <input type="date" name="expiryDate2" placeholder="MM/DD/YYYY" required>
                        </div>
                        

                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-60">
                            <label for=""><h2>Language Profeciency Examination</h2></label>
                            <h3>
                            <input type="checkbox" id="cert_1" name="languageCertifications[]" value="IELTS">
                            <label for="cert_1">International English Language Testing System (IELTS)</label><br>
                            <input type="checkbox" id="cert_2" name="languageCertifications[]" value="TOEFL">
                            <label for="cert_2">Test of English as a Foreign Language (TOEFL)</label><br>
                            <input type="checkbox" id="cert_3" name="languageCertifications[]" value="TOCFL">
                            <label for="cert_3">Test of Chinese as a Foreign Language (TOCFL)</label><br>
                            <input type="checkbox" id="cert_4" name="languageCertifications[]" value="JLPT">
                            <label for="cert_4">Japanese Language Proficiency Test (JLPT)</label><br>
                            <input type="checkbox" id="cert_5" name="languageCertifications[]" value="TOPIC">
                            <label for="cert_5">Test of Proficiency in Korea (TOPIC)</label><br>
                            <input type="checkbox" id="cert_other" name="cert_other" value="">
                            <label for="otherCertification">Other:</label><br>
                            <input style="width: 80px;" type="text" id="otherCertification" name="otherCertification" placeholder="Other" value="" maxlength="50">
                            </h3>
                            
                            <br> <br>
                            <label style="text-align: left;" for=""><h2>Validity Date</h2></label>
                            <input type="date" id="valid_date" name="validDate"  placeholder="Validity Date" value="">
                        </div>
                        <div style="text-align: left;" class="stick-object-40">
                            <label for=""><h2>Spoken Dialects</h2></label>
                            <h3>
                                <input type="checkbox" id="Tagalog" name="dialectsSpoken[]" value="Tagalog">
                                <label for="dialect_1">Tagalog</label><br>
                                <input type="checkbox" id="Ilocano" name="dialectsSpoken[]" value="Ilocano">
                                <label for="dialect_2">Ilocano</label><br>
                                <input type="checkbox" id="Ilonggo" name="dialectsSpoken[]" value="Ilonggo">
                                <label for="dialect_3">Ilonggo</label><br>
                                <input type="checkbox" id="Bikol" name="dialectsSpoken[]" value="Bikol">
                                <label for="dialect_4">Bikol</label><br>
                                <input type="checkbox" id="dialect_other" name="dialectsSpoken[]r" value="">
                                <label for="dialect_other">Other:</label><br>
                                <input style="width: 80px;" type="text" id="dialect_other" name="otherDialect" value="" maxlength="50">
                            </h3>
                        </div>
                        
                        

                    </div>
                    <div class="button-selection">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">PREVIOUS</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="4">NEXT</button>
                    </div>
                </section>
                <!-- Step 4 Content, default hidden on page load. -->
                <section id="step-4" class="form-step d-none">
                
                
                    <h1 class="mt-3 font-normal">Work Experience</h1>
                    <!-- Step 4 input fields -->
                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Name of Office/Company #1</h2></label>
                            <input type="text" name="company1" placeholder="COMPANY #1" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Address</h2></label>
                            <input type="text" name="cpAddress1" placeholder="ADDRESS #1" required maxlength="50">
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="text" name="incluSDate1" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="text" name="incluEDate1" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Position Held Received</h2></label>
                            <input type="text" name="position1" placeholder="POSITION #1" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Status of Appointment</h2></label>
                            <select class="" name="appointStat1" required>
                                <option value="" selected hidden></option>
                                <option value="permanent">PERMANENT</option>
                                <option value="contractual">CONTRACTUAL</option>
                                <option value="part_time">PART-TIME</option>
                                <option value="probitionary">PROBITIONARY</option>
                            </select> 
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-50">
                            <label for=""><h2>Name of Office/Company #2</h2></label>
                            <input type="text" name="company2" placeholder="COMPANY #2" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Address</h2></label>
                            <input type="text" name="cpAddress2" placeholder="ADDRESS #2" required maxlength="50">
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="text" name="incluSDate2" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="text" name="incluEDate2" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Position Held Received</h2></label>
                            <input type="text" name="position2" placeholder="POSITION #1" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Status of Appointment</h2></label>
                            <select class="" name="appointStat2" required>
                                <option value="" selected hidden></option>
                                <option value="permanent">PERMANENT</option>
                                <option value="contractual">CONTRACTUAL</option>
                                <option value="part_time">PART-TIME</option>
                                <option value="probitionary">PROBITIONARY</option>
                            </select> 
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                        
                        <div class="stick-object-50">
                            <label for=""><h2>Name of Office/Company #3</h2></label>
                            <input type="text" name="company3" placeholder="COMPANY #3" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Address</h2></label>
                            <input type="text" name="cpAddress3" placeholder="ADDRESS #3" required maxlength="50">
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="text" name="incluSDate3" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="text" name="incluEDate3" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Position Held Received</h2></label>
                            <input type="text" name="position3" placeholder="POSITION #3" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Status of Appointment</h2></label>
                            <select class="" name="appointStat3" required>
                                <option value="" selected hidden></option>
                                <option value="permanent">PERMANENT</option>
                                <option value="contractual">CONTRACTUAL</option>
                                <option value="part_time">PART-TIME</option>
                                <option value="probitionary">PROBITIONARY</option>
                            </select> 
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                        
                        <div class="stick-object-50">
                            <label for=""><h2>Name of Office/Company #4</h2></label>
                            <input type="text" name="company4" placeholder="COMPANY #4" required maxlength="50">
                        </div>
                        <div class="stick-object-50">
                            <label for=""><h2>Address</h2></label>
                            <input type="text" name="cpAddress4" placeholder="ADDRESS #4" required maxlength="50">
                        </div>
                        
                    </div>

                    <div class="mt-3 form-row">
                    
                        <div class="stick-object-15">
                            <label for=""><h2>Started</h2></label>
                            <input type="text" name="incluSDate4" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-15">
                            <label for=""><h2>Ended</h2></label>
                            <input type="text" name="incluEDate4" placeholder="MM/YYYY" required>
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Position Held Received</h2></label>
                            <input type="text" name="position4" placeholder="POSITION #4" required maxlength="50">
                        </div>
                        <div class="stick-object-35">
                            <label for=""><h2>Status of Appointment</h2></label>
                            <select class="" name="appointStat4" required>
                                <option value="" selected hidden></option>
                                <option value="permanent">PERMANENT</option>
                                <option value="contractual">CONTRACTUAL</option>
                                <option value="part_time">PART-TIME</option>
                                <option value="probitionary">PROBITIONARY</option>
                            </select> 
                        </div>
                        
                    </div>

                    <br> <br>
                    <h1 class="mt-3 font-normal">Skills</h1>
                    
                    <div class="mt-3 form-row">
                        
                        <div style="text-align: left;" class="stick-object-50">
                            <label for=""><h2>21st Century Skills</h2></label>
                            
                            <div style="float: left; width: 50%; background: transparent;">
                                <h3>
                                <input type="checkbox" id="Innovation" name="skill[]" value="Innovation">
                                <label for="skill_1">Innovation</label><br>
                                <input type="checkbox" id="Team-Work" name="skill[]" value="Team Work">
                                <label for="skill_2">Team Work</label><br>
                                <input type="checkbox" id="Multitasking" name="skill[]" value="Multitasking">
                                <label for="skill_3">Multitasking</label><br>
                                <input type="checkbox" id="Work-Ethics" name="skill[]" value="Work Ethics">
                                <label for="skill_4">Work Ethics</label><br>
                                <input type="checkbox" id="Self-Motivation" name="skill[]" value="Self Motivation">
                                <label for="skill_5">Self Motivation</label><br>
                                <input type="checkbox" id="Creative-Problem-Solving" name="skill[]" value="Creative Problem Solving">
                                <label for="skill_6">Creative Problem Solving</label><br>
                                <input type="checkbox" id="Problem-Solving" name="skill[]" value="Problem Solving">
                                <label for="skill_7">Problem Solving</label><br>
                                <input type="checkbox" id="Critical-Thinking" name="skill[]" value="Critical Thinking">
                                <label for="skill_8">Critical Thinking</label><br>
                                </h3>
                            
                            </div>
                            <div style="float: left; width: 50%; background: transparent;">
                                <h3>
                                <input type="checkbox" id="Decision-Making" name="skill[]" value="Decision Making">
                                <label for="skill_9">Decision Making</label><br>    
                                <input type="checkbox" id="Stress-Tolerance" name="skill[]" value="Stress Tolerance">
                                <label for="skill_10">Stress Tolerance</label><br>
                                <input type="checkbox" id="Planning-and-Organizing" name="skill[]" value="Planning and Organizing">
                                <label for="skill_11">Planning and Organizing</label><br>
                                <input type="checkbox" id="Social-Perceptiveness" name="skill[]" value="Social Perceptiveness">
                                <label for="skill_12">Social Perceptiveness</label><br>
                                <input type="checkbox" id="English-Functional-Skills" name="skill[]" value="English Functional Skills">
                                <label for="skill_13">English Functional Skills</label><br>
                                <input type="checkbox" id="English-Comprehension" name="skill[]" value="English Comprehension">
                                <label for="skill_14">English Comprehension</label><br>
                                <input type="checkbox" id="Math-Functional-Skill" name="skill[]" value="Math Functional Skill">
                                <label for="skill_15">Math Functional Skill</label><br>
                                </h3>
                            </div>
                        </div>
                        <div style="text-align: left;" class="stick-object-50">
                            <label for=""><h2>Technical Skills Acquired without Training</h2></label>
                            <div style="float: left; width: 50%; background: transparent;">
                                <h3>
                                <input type="checkbox" id="Carpentry" name="techSkill[]" value="Carpentry">
                                <label for="Techskill_1">Carpentry</label><br>
                                <input type="checkbox" id="Masonry" name="techSkill[]" value="Masonry">
                                <label for="Techskill_2">Masonry</label><br>
                                <input type="checkbox" id="Welding" name="techSkill[]" value="Welding">
                                <label for="Techskill_3">Welding</label><br>
                                <input type="checkbox" id="Auto-Mechanic" name="techSkill[]" value="Auto Mechanic">
                                <label for="Techskill_4">Auto Mechanic</label><br>
                                <input type="checkbox" id="Plumbing" name="techSkill[]" value="Plumbing">
                                <label for="Techskill_5">Plumbing</label><br>
                                <input type="checkbox" id="Driving" name="techSkill[]" value="Driving">
                                <label for="Techskill_6">Driving</label><br>
                                <input type="checkbox" id="Gardening" name="techSkill[]" value="Gardening">
                                <label for="Techskill_7">Gardening</label><br>
                                </h3>
                            </div>

                            <div style="float: left; width: 50%; background: transparent;">
                                <h3>
                                <input type="checkbox" id="Tailoring" name="techSkill[]" value="Tailoring">
                                <label for="Techskill_8">Tailoring</label><br>    
                                <input type="checkbox" id="Photograph" name="techSkill[]" value="Photograph">
                                <label for="Techskill_9">Photograph</label><br>
                                <input type="checkbox" id="Hairdressing" name="techSkill[]" value="Hairdressing">
                                <label for="Techskill_10">Hairdressing</label><br>
                                <input type="checkbox" id="Cooking" name="techSkill[]" value="Cooking">
                                <label for="Techskill_11">Cooking</label><br>
                                <input type="checkbox" id="Baking" name="techSkill[]" value="Baking">
                                <label for="Techskill_12">Baking</label><br>
                                <input type="checkbox" id="Other" name="techSkill[]" value="">
                                <label for="Techskill_13">Other:</label><br>
                                <input style="width: 80px;" type="text" id="Techskill_13" name="otherTechskill" value="">
                            </h3>
                            </div>
                            
                        </div>
                       
                    </div>
                    
                    <?php
                        }
                    }}
                    ?>

                        <div class="button-selection">
                            <button class="button btn-navigate-form-step" type="button" step_number="3">PREVIOUS</button>
                            <button class="button submit-btn" type="submit" name="submit">Submit</button>
                        </div>
                </section>
                 <!-- Step 5 Content, default hidden on page load. -->
                 
                <!-- Step 6 Content, default hidden on page load. -->
                
                <!-- Step 7 Content, default hidden on page load. -->
                
                <!--Step 8-->
                
                </div>
            </form>
                                                </center>
        </div>
    </div>
        <script src="../assets/js/applicant/applicant_profile.js"></script>
</body>
</html>