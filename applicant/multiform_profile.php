<?php
$page_title = "NSRS Form";
include '../conn.php';
session_start();
if(!isset($_SESSION["applicant_id"])){
    header("location: index.php");
}
$applicant_id = $_SESSION['applicant_id'];
$check = "SELECT * FROM applicant_profile WHERE applicant_id = $applicant_id";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    header("Location: find_jobs.php");
    exit();
}

if (isset($_POST["submit"])) {
    // Step 1 form data
    $applicant_id = $_SESSION['applicant_id'];
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
    $subdPresent = $_POST["subdPresent"];
    $brgyPresent = $_POST['brgyPresent'];
    $cityPresent = $_POST['cityPresent'];
    $provincePresent = $_POST['provincePresent'];
    $housenumPermanent = $_POST['housenumPermanent'];
    $subdPermanent = $_POST["subdPermanent"];
    $brgyPermanent = $_POST['brgyPermanent'];
    $cityPermanent = $_POST['cityPermanent'];
    $provincePermanent = $_POST['provincePermanent'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $mobilePnum = $_POST['mobilePnum'];
    $email = $_POST['email'];
    $selectedDisability = $_POST['disability'];
    $otherDisability = $_POST['other_disability'];
    if ($selectedDisability === 'other') {
        $disability = $otherDisability;
    } else {
        $disability = $selectedDisability;
    }
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
    $employment_status = $_POST["employment_status"];

    // Step 4 form data
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
    $validDate = $_POST["validDate"];
    $languageCertifications = $_POST["languageCertifications"];
    $dialectsSpoken = $_POST["dialectsSpoken"];
/*
    $languageCertifications = isset($_POST["languageCertifications"]) ? implode(', ', $_POST["languageCertifications"]) : "";
    $otherCertification = isset($_POST["otherCertification"]) ? $_POST["otherCertification"] : "";
    $dialectsSpoken = isset($_POST["dialectsSpoken"]) ? implode(', ', $_POST["dialectsSpoken"]) : "";
    $otherDialect = isset($_POST["otherDialect"]) ? $_POST["otherDialect"] : "";*/

    // Step 6 form data
    for ($i = 1; $i <= 3; $i++) {
        $company = $_POST["company"];
        $cpAddress = $_POST["cpAddress"];
        $position = $_POST["position"];
        $startincluDate = $_POST["startincluDate"];
        $endincluDate = $_POST["endincluDate"];
        $appointStat = $_POST["appointStat"];

        // Insert the data into the database
        $sql_table6 = "INSERT INTO ap_exp (applicant_id, company, cpAddress, position, startincluDate, endincluDate, appointStat) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql_table6);
        $stmt->bind_param("issssss", $applicant_id, $company, $cpAddress, $position, $startincluDate, $endincluDate, $appointStat);

        if ($stmt->execute()) {
            $stmt->reset();
            $ap_exp_id = $conn->insert_id;
        } else {
            echo "Error inserting data into work_experience: " . $conn->error;
        }
    }
    // Step 7 form data
    $skill = isset($_POST["skill"]) ? implode(', ', $_POST["skill"]) : "";
    $techSkill = isset($_POST["techSkill"]) ? implode(', ', $_POST["techSkill"]) : "";
    $otherTechskill = isset($_POST["otherTechskill"]) ? $_POST["otherTechskill"] : "";

    // Step 8 form data
    $date_submitted_at = $_POST["date_submitted_at"];
    $target_dir = "../assets/img/applicant/signature_img/";
    $target_file = $target_dir . basename($_FILES["sign_img"]["name"]);

    if (move_uploaded_file($_FILES["sign_img"]["tmp_name"], $target_file)) {
        $signatureFilePath = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

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

    $sql_table1 = "INSERT INTO ap_info (applicant_id, lastName, firstName, midName, suffix, jobseekerType, birthplace, birthday, age, sex, civilStatus, citizenship, housenumPresent, subdPresent, brgyPresent, cityPresent, provincePresent, housenumPermanent,subdPermanent, brgyPermanent, cityPermanent, provincePermanent, height, weight, mobilePnum, email, disability, employmentStatus, activelyLooking, willinglyWork, fourpsBeneficiary, ofw) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table1);
    $stmt->bind_param("isssssssssssssssssssssssssssssss",$applicant_id, $lastName, $firstName, $midName, $suffix, $jobseekerType, $birthplace, $birthday, $age, $sex, $civilStatus, $citizenship, $housenumPresent, $subdPresent, $brgyPresent, $cityPresent, $provincePresent, $housenumPermanent, $subdPermanent, $brgyPermanent, $cityPermanent, $provincePermanent, $height, $weight,  $mobilePnum, $email, $disability, $employmentStatus, $activelyLooking, $willinglyWork, $fourpsBeneficiary, $ofw);

    if ($stmt->execute()) {
        $ap_info_id = $conn->insert_id;
    } else {
        echo "Error inserting data into table1: " . $conn->error;
    }

    /*step 2*/
    $sql_table2 = "INSERT INTO ap_educ (applicant_id, schoolStatus, educLevel, gradYear, school, course, award) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table2);
    $stmt->bind_param("issssss", $applicant_id, $schoolStatus, $educLevel, $gradYear, $school, $course, $award);

    if ($stmt->execute()) {
        $ap_educ_id = $conn->insert_id;
    } else {
        echo "Error inserting data into education_info: " . $conn->error;
    }

    /*step 3*/
    $sql_table3 = "INSERT INTO ap_prefer (applicant_id, occupation1, industry1, occupation2, industry2, occupation3, industry3, employment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table3);
    $stmt->bind_param("isssssss", $applicant_id, $occupation1, $industry1, $occupation2, $industry2, $occupation3, $industry3, $employment_status);

    if ($stmt->execute()) {
        $ap_prefer_id = $conn->insert_id;
    } else {
        echo "Error inserting data into employment_info: " . $conn->error;
    }
    /*step 4*/
    $sql_table4 = "INSERT INTO ap_tvo (applicant_id, training1, startDuration1, endDuration1, training2, startDuration2, endDuration2, training3, startDuration3, endDuration3, institution1, certificate1, completion1, institution2, certificate2, completion2, institution3, certificate3, completion3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table4);
    $stmt->bind_param("issssssssssssssssss", $applicant_id, $training1, $startDuration1, $endDuration1, $training2, $startDuration2, $endDuration2, $training3, $startDuration3, $endDuration3, $institution1, $certificate1, $completion1, $institution2, $certificate2, $completion2, $institution3, $certificate3, $completion3);

    if ($stmt->execute()) {
        $ap_tvo_id = $conn->insert_id;
    } else {
        echo "Error inserting data into training_info: " . $conn->error;
    }
    /*step 5*/
    $sql_table5 = "INSERT INTO ap_elig (applicant_id, careerServ1, licenceNum1, expiryDate1, validDate, languageCertifications, dialectsSpoken) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table5);
    $stmt->bind_param("issssss", $applicant_id, $careerServ1, $licenceNum1, $expiryDate1, $validDate, $languageCertifications, $dialectsSpoken);

    if ($stmt->execute()) {
        $ap_elig_id = $conn->insert_id;
    } else {
        echo "Error inserting data into career_info: " . $conn->error;
    }
    /*step 7*/
    $sql_table7 = "INSERT INTO ap_skills (applicant_id, skill, techSkill, otherTechskill) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_table7);
    $stmt->bind_param("isss", $applicant_id, $skill, $techSkill, $otherTechskill);

    if ($stmt->execute()) {
        $ap_skills_id = $conn->insert_id;
    } else {
        echo "Error inserting data into skills_info: " . $conn->error;

    }
    /*step 7*/
    $sql_table8 = "INSERT INTO ap_auth (applicant_id, sign_img, date_submitted_at) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql_table8);
    $stmt->bind_param("iss", $applicant_id, $target_file, $date_submitted_at);

    if ($stmt->execute()) {
        $ap_auth_id = $conn->insert_id;
    } else {
        echo "Error inserting data into skills_info: " . $conn->error;

    }

        // Insert into the applicant_profile table
        $sql_applicant_profile = "INSERT INTO applicant_profile (applicant_id, peso_id, ap_info_id, ap_educ_id, ap_prefer_id, ap_tvo_id, ap_elig_id, ap_exp_id, ap_skills_id, ap_auth_id, date_created_at, type) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Online')";

        $stmt = $conn->prepare($sql_applicant_profile);
        $stmt->bind_param("iiiiiiiiiis", $applicant_id,$peso_id, $ap_info_id, $ap_educ_id, $ap_prefer_id, $ap_tvo_id, $ap_elig_id, $ap_exp_id, $ap_skills_id,$ap_auth_id, $date_create_at);

        if ($stmt->execute()) {
        $_SESSION["form_submitted"] = "<h2>You have successfully submitted your form!</h2>";
        header("location:find_jobs.php");
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
    <link rel="stylesheet" href="../assets/css/applicant_profile.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">
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
            if (isset($_SESSION["applicant_id"])){
                $query = "SELECT * FROM a_accounttb WHERE applicant_id ='$applicant_id'";
                $fetch = $conn->query($query);
                if ($fetch->num_rows > 0) {
                while ($row = $fetch->fetch_assoc()){   
            ?>
            <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                <!-- Step 1 Content -->
            <div class="wrapper">
                <section id="step-1" class="form-step">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button id="nextButton" class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">I. PERSONAL INFORMATION</h1>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <!--input field insert-->
                        <label for=""><h2>Name<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="text" onkeydown="restrictName(event)"name="firstName" placeholder="First Name" value="<?php echo $row["firstname"];?>" required maxlength="50">
                        <input type="text" onkeydown="restrictName(event)" name="lastName" placeholder="Last Name" value="<?php echo $row["lastname"];?>" required maxlength="50">
                        <input type="text" onkeydown="restrictName(event)" name="midName" placeholder="Middle Name" required maxlength="50">
                        <input style="width:30px;" onkeydown="restrictName(event)" type="text" placeholder="Jr." name="suffix" maxlength="10">
                    </div>
                    <div class="mt-3">
  
                        <label for=""><h2>Type of jobseeker<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <select class="" name="jobseekerType" required>
                                        <option value="" selected hidden>Select Type</option>
                                        <option value="first time">First Time</option>
                                        <option value="ofw">OFW</option>
                                    </select>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Birthplace<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="text" name="birthplace"placeholder="Birthplace" required maxlength="50">
                    </div>
                    <div class="stick-object">
      
                        <label for="dateofbirth"><h2>Date of Birth<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input style="width:100%"type="date" placeholder="birthday" name="birthday" id="birthday" required oninput="calculateAge()">
                    </div>
                    <div class="stick-object">
                        <label for="age"><h2>Age<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="number" id="age"name="age" placeholder="age" min="18" max="99" required value="">
                    </div>
                    <script>
                        var today = new Date();
                        var maxDate = today.toISOString().split('T')[0];
                        document.getElementById("birthday").setAttribute("max", maxDate);

                        function calculateAge() {
                            var dob = document.getElementById("birthday").value;
                            var dobDate = new Date(dob);

                            var age = today.getFullYear() - dobDate.getFullYear();

                            if (today.getMonth() < dobDate.getMonth() ||
                                (today.getMonth() === dobDate.getMonth() && today.getDate() < dobDate.getDate())) {
                                age--;
                            }

                            document.getElementById("age").value = age;
                        }
                    </script>
                    <div class="stick-object">
                        <label for=""><h2>Sex<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <select class="" name="sex" required>
                                            <option value="" selected hidden>Select Sex</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                    </div>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Civil Status<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <select class="" name="civilStatus" required>
                                            <option value="" selected hidden>Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Single Parent">Single Parent</option>
                                            <option value="Widow">Widow</option>
                                        </select>
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Citizenship<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="text" name="citizenship" placeholder="Citizenship" required maxlength="50" required>
                    </div>
                    </div>
                    <div class="mt-3">
                    <label for=""><h2>Permanent Address<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input style="width: 100px"type="text" name="housenumPermanent" placeholder="House #" required maxlength="10">
                        <input style="width: 100px"type="text" name="subdPermanent" placeholder="St./Subd." required maxlength="20">
                        <input style="width:90px;"type="text" name="brgyPermanent" placeholder="Barangay" required maxlength="50">
                        <input type="text" name="cityPermanent" placeholder="City" required maxlength="50" required>
                        <input type="text" name="provincePermanent" placeholder="Province" required maxlength="50" required>
                    </div>
                    <div class="mt-3">
                    <label for=""><h2>Present Address<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input style="width: 100px;"type="text" name="housenumPresent" placeholder="House #" required maxlength="10">
                        <input style="width: 100px"type="text" name="subdPresent" placeholder="St./Subd." required maxlength="20">
                        <input style="width:90px;"type="text"name="brgyPresent" placeholder="Barangay" required maxlength="50">
                        <input type="text" name="cityPresent" placeholder="City" required maxlength="50" required>
                        <input type="text" name="provincePresent" placeholder="Province" required maxlength="50" required>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
       
                        <label for=""><h2>Height<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="number" name="height" id="bodySize" placeholder="(cm)" min="0" max="999" required maxlength="3">
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Weight <span class="required-asterisk">*</span></h2></label>
                        <input type="number" name="weight" id="bodySize2" placeholder="(kg)" min="0" max="999" required>
                    </div>
                    <script>
                        document.getElementById('bodySize').addEventListener('input', restrictInput);
                        document.getElementById('bodySize2').addEventListener('input', restrictInput);

                        function restrictInput() {
                            // Get the current value of the input
                            let inputValue = this.value;

                            // Remove any non-digit characters
                            inputValue = inputValue.replace(/\D/g, '');

                            // Limit the length to 3 digits
                            inputValue = inputValue.slice(0, 3);

                            // Update the input value
                            this.value = inputValue;
                        }
                    </script>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Mobile Number<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="tel" name="mobilePnum" placeholder="PRIMARY NUMBER" pattern="\d{4}-\d{3}-\d{4}"title="Phone Number format eg 0912-345-6789" required maxlength="13" oninput="formatPhoneNumber(this)" value="0<?php echo htmlspecialchars($row["Pnum"]);?>" required>
                        <script>
                    function formatPhoneNumber(input) {
                        var phoneNumber = input.value.replace(/\D/g, '');

                        if (phoneNumber.length === 10) {
                            input.value = phoneNumber.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
                        }
                    }
                    window.onload = function () {
                        var input = document.querySelector('[name="mobilePnum"]');
                        formatPhoneNumber(input);
                    };
                </script>
                    </div>
                    <div class="mt-3">
                        <label for=""><h2>Email Address<span class="required-asterisk">&nbsp;*</span></h2></label>
                        <input type="email" name="email" placeholder="EMAIL ADDRESS" required maxlength="50" value="<?php echo $row["email"];?>" required>
                    </div>
                    <div class="mt-3 form-row">
                    <div class="stick-object">
                    <label for=""><h2>Disability<span class="required-asterisk">&nbsp;*</span></h2></label>
                    <select style="width: 120px;" class="other-select" name="disability" required>
                        <option value="None" selected hidden>None</option>
                        <option value="None">None</option>
                        <option value="visual">Visual</option>
                        <option value="hearing">Hearing</option>
                        <option value="speech">Speech</option>
                        <option value="physical">Physical</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" class="other-input" style="margin: 5px" name="other_disability" placeholder="Enter other disability" style="display: none;">
                    </div>
                    <div class="stick-object">
      
                        <label for=""><h2>Employment Status<span class="required-asterisk">&nbsp;*</span></h2></label>
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
                    </div>
                    <div class="mt-3">
                        <div class="qna display-line">
                            <div class="qna-select">
                        <label for="">ACTIVELY LOOKING FOR WORK?<span class="required-asterisk">&nbsp;*</span></label>
                        </div>
                        <div class="qna-select edit-dropdown">
                        <select class="" name="activelyLooking" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>  
                                        </div>
                        </div> 
                    </div>
                    <div class="mt-3">
                    <div class="qna display-line">
                            <div class="qna-select">
                        <label for="">WILLING TO WORK IMMEDIATELY?<span class="required-asterisk">&nbsp;*</span></label>
                        </div>
                        <div class="qna-select edit-dropdown">
                        <select class="drop-down" name="willinglyWork" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>    
                                        </div>
                        </div> 
                    </div>
                    <div class="mt-3">
                    <div class="qna display-line">
                            <div class="qna-select">
                        <label for="">ARE YOU A 4Ps BENEFICIARY?<span class="required-asterisk">&nbsp;*</span></label>
                        </div>
                        <div class="qna-select edit-dropdown">
                        <select class="" name="fourpsBeneficiary" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>    
                                        </div>
                        </div>  
                    </div>
                    <div class="mt-3">
                    <div class="qna display-line">
                            <div class="qna-select">
                        <label for="">ARE YOU AN OFW?<span class="required-asterisk">&nbsp;*</span></label>
                        </div>
                        <div class="qna-select edit-dropdown">
                        <select class="" name="ofw" required>
                                            <option value="" selected hidden></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>    
                                        </div>
                        </div>     
                    </div>
                    <!--next button-->
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">II. EDUCATIONAL BACKGROUND</h1>
                    <!-- Step 2 input fields -->
                    <div class="step-container">
                        <div class="mt-3 flex-column">
                            <div class="display-spacebetween">
                            <th><h2>Are you currently in School?<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <tr>
                                <td><select name="schoolStatus" id="" required>
                                    <option value="" selected hidden></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select></td>
                            </tr>
                            </div>
                            <th><h2>Highest Educational Level<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <tr>
                                <td><select name="educLevel" id="" required>
                                        <option value="" selected hidden>Highest Educational Level</option>
                                        <option value="NO FORMAL EDUCATION">NO FORMAL EDUCATION</option>
                                        <option value="ELEMENTARY LEVEL">ELEMENTARY LEVEL</option>
                                        <option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
                                        <option value="HIGH SCHOOL LEVEL">HIGH SCHOOL LEVEL</option>
                                        <option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
                                        <option value="COLLEGE LEVEL">COLLEGE LEVEL</option>
                                        <option value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
                                        <option value="TECH-VOC GRADUATE">TECH-VOC GRADUATE</option>
                                        <option value="POST GRADUATE">POST GRADUATE</option>
                                </select></td>
                            </tr>
                            <th><h2>Year Graduated/Last Attended<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <tr>
                                <td><input type="date" name="gradYear" placeholder="Year Graduated/Last Year Attended" required></td>
                            </tr>
                            <th><h2>School/University<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <tr>
                                <td><input type="text" name="school" placeholder="School/University" required maxlength="50"></td>
                            </tr>
                            <th><h2>Course/Program<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <td>
                                <tr><input type="text" name="course" placeholder="Course/Program" required maxlength="50"></tr>
                            </td>
                            <th><h2>Awards/Honors Received<span class="required-asterisk">&nbsp;*</span></h2></th>
                            <td>
                                <tr><input type="text" name="award" placeholder="Awards/Honors Received" required></tr>
                            </td>
                        </div>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                <button class="button btn-navigate-form-step" type="button" step_number="4">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">III. JOB PREFERENCE</h1>
                    <!-- Step 3 input fields -->
                    <div class="step-container">
                    <div class="mt-3">
                    <table>
                        <th><h2>Preferred Occupation #1<span class="required-asterisk">&nbsp;*</span></h2></th>
                        <tr>
                            <td><input type="text" onkeydown="restrictName(event)" name="occupation1" placeholder="Occupation" required></td>
                            <td><input type="text" onkeydown="restrictName(event)" name="industry1" placeholder="Industry" required></td>
                        </tr>
                        <th><h2>Preferred Occupation #2<span class="required-asterisk">&nbsp;*</span></h2></th>
                        <tr>
                            <td><input type="text" onkeydown="restrictName(event)" name="occupation2" placeholder="Occupation" required></td>
                            <td><input type="text" onkeydown="restrictName(event)" name="industry2" placeholder="Industry" required></td>
                        </tr>
                        <th><h2>Preferred Occupation #3<span class="required-asterisk">&nbsp;*</span></h2></th>
                        <tr>
                            <td><input type="text" onkeydown="restrictName(event)" name="occupation3" placeholder="Occupation" required></td>
                            <td><input type="text" onkeydown="restrictName(event)" name="industry3" placeholder="Industry" required></td>
                        </tr>
                        <th><h2>Preferred Location<span class="required-asterisk">&nbsp;*</span></h2></th>
                        <td><div class="mt-3">
                        <select class="" name="employment_status" required>
                                                <option value="none" selected hidden>None</option>
                                                <option value="none">None</option>
                                                <option value="local">Local</option>
                                                <option value="abroad">Abroad</option>
                                            </select>   
                        </div></td>
                        <tr>
                            <td><input type="text" onkeydown="restrictName(event)" placeholder="Location #1" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" onkeydown="restrictName(event)" placeholder="Location #2" required></td>
                        </tr>
                    </table>
                    </div>
                    </div>
                </section>
                <!-- Step 4 Content, default hidden on page load. -->
                <section id="step-4" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button class="button btn-navigate-form-step" type="button" step_number="3">Prev</button>
                <button class="button btn-navigate-form-step" type="button" step_number="5">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">IV. TECHNICAL/VOCATIONAL/OTHER TRAINING</h1>
                    <!-- Step 4 input fields -->
                    <div class="step-container">
                    <div class="mt-3 flex-column">
                        <th><h2>Training #1</h2></th>
                        <tr>
                            <td><input type="text" name="training1" placeholder="Training Program" required></td>
                            <td><input type="text" name="institution1" placeholder="Training Instution" required></td>
                            <div class="display-spacebetween" style="align-items: center;">
                                <tr>
                                    <td><input type="date" name="startDuration1" placeholder="Started" required>TO</td>
                                    <td><input type="date" name="endDuration1" placeholder="Ended" required></td>
                                </tr>
                            </div>
                            <td><input type="text" name="certificate1" placeholder="Certificate Recieved" required></td>
                            <td><select name="completion1" id="" required>
                                <option value="" selected hidden>Completion</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select></td>
                        </tr>
                    </div>
                    <div class="mt-3 flex-column">
                        <th><h2>Training #2</h2></th>
                        <tr>
                            <td><input type="text" name="training2" placeholder="Training Program" required></td>
                            <td><input type="text" name="institution2" placeholder="Training Instution" required></td>
                            <div class="display-spacebetween" style="align-items: center;">
                                <tr>
                                    <td><input type="date" name="startDuration2" placeholder="Started" required>TO</td>
                                    <td><input type="date" name="endDuration2" placeholder="Ended" required></td>
                                </tr>
                            </div>
                            <td><input type="text" name="certificate2" placeholder="Certificate Recieved" required></td>
                            <td><select name="completion2" id="" required>
                                <option value="" selected hidden>Completion</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select></td>
                        </tr>
                    </div>
                    <div class="mt-3 flex-column">
                        <th><h2>Training #3</h2></th>
                        <tr>
                            <td><input type="text" name="training3" placeholder="Training Program" required></td>
                            <td><input type="text" name="institution3" placeholder="Training Instution" required></td>
                            <div class="display-spacebetween" style="align-items: center;">
                                <tr>
                                    <td><input type="date" name="startDuration3" placeholder="Started" required>TO</td>
                                    <td><input type="date" name="endDuration3" placeholder="Ended" required></td>
                                </tr>
                            </div>
                            <td><input type="text" name="certificate3" placeholder="Certificate Recieved" required></td>
                            <td><select name="completion3" id="" required>
                                <option value="" selected hidden>Completion</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select></td>
                        </tr>
                    </div>
                    <?php
                        }
                    }}
                    ?>
                    </div>
                </section>
                 <!-- Step 5 Content, default hidden on page load. -->
                 <section id="step-5" class="form-step d-none">
                 <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                 <div class="button-selection">
                 <button class="button btn-navigate-form-step" type="button" step_number="4">Prev</button>
                 <button class="button btn-navigate-form-step" type="button" step_number="6">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">V. Eligibility</h1>
                    <!-- Step 5 input fields -->
                    <div class="table-container" id="eligibility-container">
                    <div class="step-container">
                    <div class="mt-3">
                        <div class="flex-column">
                            <th><h2>Carreer Service/Board/Bar</h2></th>
                            <tr>
                                <td><input type="text" name="careerServ1" placeholder="Career Service/Board/Bar" required></td>
                                <td><input type="text" name="licenceNum1" placeholder="License Number" required></td>
                                <td><input type="text" name="expiryDate1" placeholder="Expiry Date" required></td>
                                <button class="button" onclick="addSection('eligibility-container')">Add</button>
                            </tr>
                            </div>
                            <th><h2>Language Proficiency Certification</h2></th>
                            <tr>
                                <td>
                                    <select class="other-select" name="languageCertifications" id="" required>
                                        <option value="" selected hidden>Language Proficiency Certification</option>
                                        <option value="IELTS">International English Language Testing System (IELTS)</option>
                                        <option value="TOEFL">Test of English as a Foreign Language (TOEFL)</option>
                                        <option value="TOCFL">Test of Chinese as a Foreign Language (TOCFL)</option>
                                        <option value="JLPT">Japanese Language Proficiency Test (JLPT)</option>
                                        <option value="TOPIC">Test of Proficiency in Korea (TOPIC)</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <input type="text" class="other-input" placeholder="Other Language">
                                </td>
                                <td><input type="text" name="validDate" placeholder="Validity Date" required></td>
                            </tr>
                            <div class="flex-column">
                            <th><h2>Dialects Spoken</h2></th>
                            <td><select style="width: 50%;" name="dialectsSpoken" id="" required>
                                <option value="tagalog">Tagalog</option>
                                <option value="ilocano">Ilocano</option>
                                <option value="ilonggo">Ilonggo</option>
                                <option value="bikol">Bikol</option>
                                <option value="">Other</option>
                            </select></td>
                            </div>
                    </div>
                    </div>
                    </div>
                </section>
                <!-- Step 6 Content, default hidden on page load. -->
                <section id="step-6" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                 <div class="button-selection">
                 <button class="button btn-navigate-form-step" type="button" step_number="5">Prev</button>
                 <button class="button btn-navigate-form-step" type="button" step_number="7">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">VI. WORK EXPERIENCES</h1>
                    <!-- Step 6 input fields -->
                    <div class="table-container" id="work-experience-container">
                    <div class="step-container">
                        <div class="mt-3 flex-column">
                            <th><h2>Work Experience</h2></th>
                            <div class="note-reminder">
                                <label>Note: Limit the occupation for the last 10 years.<br>Start with the most recent employment</label>
                            </div>
                            <tr>
                                <td><input type="text" name="company" placeholder="Name of Office/Company" required></td>
                                <td><input type="text" name="cpAddress" placeholder="Address" required></td>
                            </tr>
                            <div class="display-spacebetween" style="align-items: center;">
                                <tr>
                                    <td><input type="date" name="startincluDate" required>TO</td>
                                    <td><input type="date" name="endincluDate" required></td>
                                </tr>
                            </div>
                            <tr>
                                <td><input type="text" name="position" placeholder="Position Held Received" required></td>
                                <td><select name="appointStat" id="" required>
                                    <option value="" selected hidden>Status of Appointment</option>
                                    <option value="permanent">Permanent</option>
                                    <option value="contractual">Contractual</option>
                                    <option value="part_time">Part-Time</option>
                                    <option value="probitionary">Probitionary</option>
                                </select></td>
                            </tr>
                            <button class="button" onclick="addSection('work-experience-container')">Add</button>
                        </div>
                    </div>
                    </div>
                </section>
                <!-- Step 7 Content, default hidden on page load. -->
                <section id="step-7" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button class="button btn-navigate-form-step" type="button" step_number="6">Prev</button>
                <button class="button btn-navigate-form-step" type="button" step_number="8">Next</button>
                    </div>
                    <h1 class="mt-3 font-normal">VII. SKILLS</h1>
                    <!-- Step 7 input fields -->
                    <div class="step-container">
                        <div class="mt-3">
                            <th><h2>21st Century Skills</h2></th>
                            <div class="note-reminder">
                                <label for="">Note: Check five (5) skills you possess (Self-Assesment)</label>
                            </div>
                        <div class="skills-container">
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="innovation" name="skill[]" value="Innovation">
                                <label for="innovation">Innovation</label></div>
                                <div><input type="checkbox" id="team_work" name="skill[]" value="Team Work">
                                <label for="team_work">Team Work</label></div>
                                <div><input type="checkbox" id="multitasking" name="skill[]" value="Multitasking">
                                <label for="multitasking">Multitasking</label></div>
                                <div><input type="checkbox" id="workethics" name="skill[]" value="Work Ethics">
                                <label for="workethics">Work Ethics</label></div>
                                <div><input type="checkbox" id="selfmotivation" name="skill[]" value="Self Motivation">
                                <label for="selfmotivation">Self Motivation</label></div>
                            </div>
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="cproblemsolving" name="skill[]" value="Creative Problem Solving">
                                <label for="cproblemsolving">Creative Problem Solving</label></div>
                                <div><input type="checkbox" id="problemsolving" name="skill[]" value="Problem Solving">
                                <label for="problemsolving">Problem Solving</label></div>
                                <div><input type="checkbox" id="criticalthinking" name="skill[]" value="Critical Thinking">
                                <label for="criticalthinking">Critical Thinking</label></div>
                                <div><input type="checkbox" id="decisionmaking" name="skill[]" value="Decision Making">
                                <label for="decisionmaking">Decision Making</label></div>
                                <div><input type="checkbox" id="stresstolerance" name="skill[]" value="Stress Tolerance">
                                <label for="stresstolerance">Stress Tolerance</label></div>
                            </div>
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="planningorg" name="skill[]" value="Planning and Organizing">
                                <label for="planningorg">Planning and Organizing</label></div>
                                <div><input type="checkbox" id="socialperceptiveness" name="skill[]" value="Social Perceptiveness">
                                <label for="socialperceptiveness">Social Perceptiveness</label></div>
                                <div><input type="checkbox" id="engfuncskills" name="skill[]" value="English Functional Skills">
                                <label for="engfuncskills">English Functional Skills</label></div>
                                <div><input type="checkbox" id="engcomprehension" name="skill[]" value="English Comprehension">
                                <label for="engcomprehension">English Comprehension</label></div>
                                <div><input type="checkbox" id="mathskill" name="skill[]" value="Math Functional Skill">
                                <label for="mathskill">Math Functional Skill</label></div>
                            </div>
                        </div>

                        <th><h2>Technical Skills Acquired without Formal Training</h2></th>
                        <div class="skills-container">
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="carpentry" name="techSkill[]" value="Carpentry">
                                <label for="carpentry">Carpentry</label></div>
                                <div><input type="checkbox" id="masonry" name="techSkill[]" value="Masonry">
                                <label for="masonry">Masonry</label></div>
                                <div><input type="checkbox" id="welding" name="techSkill[]" value="Welding">
                                <label for="welding">Welding</label></div>
                                <div><input type="checkbox" id="automechanic" name="techSkill[]" value="Auto Mechanic">
                                <label for="automechanic">Auto Mechanic</label></div>
                            </div>
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="plumbing" name="techSkill[]" value="Plumbing">
                                <label for="plumbing">Plumbing</label></div>
                                <div><input type="checkbox" id="driving" name="techSkill[]" value="Driving">
                                <label for="driving">Driving</label></div>
                                <div><input type="checkbox" id="gardening" name="techSkill[]" value="Gardening">
                                <label for="gardening">Gardening</label></div>
                                <div><input type="checkbox" id="tailoring" name="techSkill[]" value="Tailoring">
                                <label for="tailoring">Tailoring</label></div>
                            </div>
                            <div class="skills-checkbox">
                                <div><input type="checkbox" id="photograph" name="techSkill[]" value="Photograph">
                                <label for="photograph">Photograph</label></div>
                                <div><input type="checkbox" id="hairdressing" name="techSkill[]" value="Hairdressing">
                                <label for="hairdressing">Hairdressing</label></div>
                                <div><input type="checkbox" id="cooking" name="techSkill[]" value="Cooking">
                                <label for="cooking">Cooking</label></div>
                                <div><input type="checkbox" id="baking" name="techSkill[]" value="Baking">
                                <label for="baking">Baking</label></div>
                            </div>
                        </div>
                        <script>
                            // Function to handle checkbox click event
                            function handleCheckboxClick() {
                                var otherChoicesCheckbox = document.getElementById('otherchoices');
                                var skillInput = document.getElementById('skillInput');

                                // Check if the "Other Choices" checkbox is checked
                                if (otherChoicesCheckbox.checked) {
                                    // Prompt the user for input
                                    var newSkill = prompt('Enter other skill:');
                                    
                                    // Update the input field value
                                    skillInput.value = newSkill;
                                } else {
                                    // If the checkbox is unchecked, clear the input field
                                    skillInput.value = '';
                                }
                            }
                        </script>
                        <div><input type="checkbox" id="otherchoices" onclick="handleCheckboxClick()">
                        <label for="otherchoices">Other:</label></div>
                    </div>
                    </div>
                </section>
                <!--Step 8-->
                <section id="step-8" class="form-step d-none">
                <!--<button class="button btn-navigate-form-step save-btn" type="button">Save</button>-->
                <div class="button-selection">
                <button class="button btn-navigate-form-step" type="button" step_number="7">Prev</button>
                <button class="button submit-btn" type="submit" name="submit">Submit</button>
                    </div>
                    <h1 class="mt-3 font-normal">VIII. Authorization</h1>
                    <div class="mt-3">
                        <div class ="cert-cons">
                            <h1>Certification/Authorization</h1>
                            <p>This is to certify that all data/information that I have provided in this form are true to the best of my knowledge. This is also to authorize the DOLE to include my profile in the Skills Registry System, which is maintained in PhilJobNet. It is understood hat my name shall be made available to employers who have access to the Registry. I am also aware that DOLE is not obliged to seek employment on my behalf</p>
                            <div class="ca-inputbox">
                                <div class ="inputbox">
                                    <label for="">
                                        <input type="file" name="sign_img">
                                        <p style="text-align:center;">Signature of Applicant</p>
                                    </label>
                                </div>
                                <div class ="inputbox">
                                    <input type="date" name="date_submitted_at">
                                    <p style="text-align:center;">Date</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="cert-cons">
                            <h1>Consent Form</h1>
                            <p>1. For legitimate purposes including but not limited to employment facilitation, labor market profiling, and other administration.</p>
                            <p>2. To provide services to me in relation to job matching activity; and</p>
                            <p>3. to comply with PESOCSRL’s reporting obligation in accordance with applicable law, internal policies or procedures, or to respond to any demand and/or request from any governmental authority for purposes of reporting, regulatory measures, disclosures or other obligations under the applicable law</p>
                        </div>
                    </div>
                </section>
                </div>
            </form>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
    <script src="../assets/js/applicant/applicant_profile.js"></script>
    <!--<script src="test_applicant_profile.js"></script>-->
</body>
</html>
<script>
    function toggleOtherInput() {
            var otherInput = document.querySelector('.other-input');
            var selectInput = document.querySelector('.other-select');
                            
            if (selectInput.value.toLowerCase() === 'other') {
                otherInput.style.display = 'block';
                otherInput.setAttribute('required', 'required');
                } else {
                otherInput.style.display = 'none';
                otherInput.removeAttribute('required');
                }
                }
                document.querySelector('.other-select').addEventListener('change', toggleOtherInput);
                toggleOtherInput();
</script>
<script>
    function addSection(containerId) {
        // Clone the existing table-container
        var originalContainer = document.getElementById(containerId);
        var cloneContainer = originalContainer.cloneNode(true);

        var noteReminderClone = cloneContainer.querySelector('.note-reminder');
        if (noteReminderClone) {
            noteReminderClone.style.display = 'none';
        }

        // Clear input values in the cloned container (optional)
        clearInputValues(cloneContainer);

        // Append the cloned container to the parent
        originalContainer.parentNode.appendChild(cloneContainer);

        // Add a "Remove" button to the cloned container
        addRemoveButton(cloneContainer, containerId);

        event.preventDefault();
    }

    function clearInputValues(container) {
        // Clear input values within the cloned container
        var inputFields = container.querySelectorAll('input, select');
        inputFields.forEach(function (input) {
            input.value = '';
        });
    }

    function addRemoveButton(container, containerId) {
        // Create a "Remove" button
        var removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.className = 'button';
        removeButton.onclick = function () {
            // Remove the container when the "Remove" button is clicked
            container.parentNode.removeChild(container);
        };

        // Append the "Remove" button to the container
        container.appendChild(removeButton);
    }
</script>

