<?php
include '../conn.php';
session_start();
if (isset($_POST['submit'])) {
    $applicant_id = $_SESSION['applicant_id']; 
    $midName = $_POST['midName'];
    $suffix = $_POST['suffix'];
    $birthplace = $_POST['birthplace'];
    $birthday = $_POST['birthday'];
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
    $mobileSnum = $_POST['mobileSnum'];
    $disability = $_POST['disability'];
    $educLevel = $_POST['educLevel'];
    $gradYear = $_POST['gradYear'];
    $school = $_POST['school'];
    $course = $_POST['course'];
    $preferIndustry = $_POST['preferIndustry'];
    $employmentStatus = $_POST['employmentStatus'];
    $activelyLooking = $_POST['activelyLooking'];
    $willinglyWork = $_POST['willinglyWork'];
    $fourPsBeneficiary = $_POST['fourPsBeneficiary'];
    $ofw = $_POST['ofw'];
    // Check
    $check_query = "SELECT * FROM applicant_profile WHERE applicant_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $check_query)) {
        echo "Error connecting to database";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $applicant_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $update_query_profile = "UPDATE applicant_profile SET 
                midName = ?, 
                suffix = ?, 
                birthplace = ?, 
                birthday = ?, 
                civilStatus = ?, 
                citizenship = ?, 
                housenumPresent = ?, 
                brgyPresent = ?, 
                cityPresent = ?, 
                provincePresent = ?, 
                housenumPermanent = ?, 
                brgyPermanent = ?, 
                cityPermanent = ?, 
                provincePermanent = ?, 
                height = ?, 
                weight = ?, 
                mobilePnum = ?, 
                mobileSnum = ?, 
                disability = ?, 
                educLevel = ?,
                gradYear = ?,
                school = ?,   
                course = ?, 
                preferIndustry = ?, 
                employmentStatus = ?, 
                activelyLooking = ?, 
                willinglyWork = ?, 
                fourPsBeneficiary = ?, 
                ofw = ?
                WHERE applicant_id = ?";
            $stmt_profile = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt_profile, $update_query_profile)) {
                echo "Error connecting to database";
            } else {
                mysqli_stmt_bind_param($stmt_profile, "sssssssssssssssssssssssssssssi", 
                $midName, $suffix,$birthplace, $birthday,$civilStatus, $citizenship, $housenumPresent, $brgyPresent, $cityPresent, $provincePresent, $housenumPermanent, $brgyPermanent, $cityPermanent, $provincePermanent, $height, $weight, $mobilePnum, $mobileSnum, $disability, $educLevel, $gradYear, $school, $course, $preferIndustry, $employmentStatus, $activelyLooking, $willinglyWork, $fourPsBeneficiary, $ofw, $applicant_id);
                mysqli_stmt_execute($stmt_profile);
                }
                $update_query_account = "UPDATE a_accounttb SET 
                lastname = ?, 
                firstname = ?, 
                jobseekerType = ?, 
                age = ?, 
                sex = ?
                WHERE applicant_id = ?";
            $stmt_account = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt_account, $update_query_account)) {
                echo "Error connecting to database";
            } else {
                $lastname = $_POST['lastname'];
                $firstname = $_POST['firstname'];
                $jobseekerType = $_POST['jobseekerType'];
                $age = $_POST['age'];
                $sex = $_POST['sex'];
                mysqli_stmt_bind_param($stmt_account, "sssssi", 
                    $lastname, $firstname, $jobseekerType, $age, $sex, $applicant_id);
                mysqli_stmt_execute($stmt_account);
            }
            } else {
            $insert_query = "INSERT INTO applicant_profile (applicant_id, midName, suffix, birthplace, birthday,civilStatus, citizenship, housenumPresent, brgyPresent, cityPresent, provincePresent, housenumPermanent, brgyPermanent, cityPermanent, provincePermanent, height, weight, mobilePnum, mobileSnum, disability, educLevel, gradYear, school, course, preferIndustry, employmentStatus, activelyLooking, willinglyWork, fourPsBeneficiary, ofw)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $insert_query)) {
                echo "Error connecting to database";
            } else {
                mysqli_stmt_bind_param($stmt, "isssssssssssssssssssssssssssss", 
                    $applicant_id, $midName, $suffix, $birthplace, $birthday, $civilStatus, $citizenship, $housenumPresent, $brgyPresent, $cityPresent, $provincePresent, $housenumPermanent, $brgyPermanent, $cityPermanent, $provincePermanent, $height, $weight, $mobilePnum, $mobileSnum,$disability, $educLevel, $gradYear, $school, $course, $preferIndustry, $employmentStatus, $activelyLooking, $willinglyWork, $fourPsBeneficiary, $ofw);
                mysqli_stmt_execute($stmt);
                echo "Data successfully stored";
                header("Location: #");
                exit();
            }
            // INSERT query for a_accounttb
                $insert_query_account = "INSERT INTO a_accounttb (applicant_id, lastname, firstname, jobseekerType, age, sex)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_account = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt_account, $insert_query_account)) {
                    echo "Error connecting to database";
                } else {
                    mysqli_stmt_bind_param($stmt_account, "issssss", 
                        $applicant_id, $lastname, $firstname, $jobseekerType, $age, $sex);
                    mysqli_stmt_execute($stmt_account);
                }
        }
        
    }
}
                // Fetch data for the specified applicant_id from the a_accounttb table
                $applicant_id = $_SESSION['applicant_id'];
                $selectQuery2 = "SELECT lastname, firstname, jobseekerType, age, sex FROM a_accounttb WHERE applicant_id = ?";
                $stmt2 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt2, $selectQuery2)) {
                    echo "Error connecting to database";
                    exit();
                }
                mysqli_stmt_bind_param($stmt2, "i", $applicant_id);
                mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);
                $fetch2 = mysqli_fetch_assoc($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
    <link rel="stylesheet" href="../css/af_personal_information.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/af_personal_information.js"></script>
</head>
<body>
    <?php
    include 'function.php';
    include 'sidebar.php';
    ?>
      <div class="fetch-data">
        <?php
        $applicant_id = $_SESSION["applicant_id"];
                    $select = mysqli_query($conn, "SELECT * FROM applicant_profile WHERE applicant_id = '$applicant_id'") or die ('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
        ?>
    </div>
    <div class="main-container">

 
    <div style="background: transaparent;" class="mini-sidebar">
        <div class="content-sidebar">
            
        
            <div class="col-center">
                
            </div>
        </div>
    </div>

    <div class="container-profile">
    <h1>Personal Information</h1>
   
    
    
        <form action="" method="post" enctype="multipart/form-data">
        <div class="wrapper">
        <div class="profile-picture">
        <?php
        $allowed_formats = array('png', 'jpg');
        $upload_directory = "upload_img/";
        $select = mysqli_query($conn, "SELECT * FROM a_accounttb WHERE applicant_id = '$applicant_id'") or die ('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
        $profile_img_src = '';
        if (!empty($_FILES['profile_img']['name'])) {
            // If a new file is uploaded, use the uploaded image
            $file_name = $_FILES['profile_img']['name'];
            $file_tmp = $_FILES['profile_img']['tmp_name'];
            $file_path = $upload_directory . $file_name;
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            move_uploaded_file($file_tmp, $file_path);

            $profile_img_src = $file_path;
        } elseif (!empty($fetch['profile_img'])) {
            $profile_img_src = 'upload_img/' . $fetch['profile_img'];
        } else {
            $profile_img_src = 'profile-img/default.jpg';
        }
        echo '<img src="' . $profile_img_src . '">';
        $file_name = !empty($_FILES['profile_img']['name']) ? $_FILES['profile_img']['name'] : $fetch['profile_img'];
        $file_path = $upload_directory . $file_name;

        ?>
        <input type="file" name="profile_img" id="profile-image-input" accept=".jpg, .jpeg, .png" style="display: none;" onchange="uploadProfilePicture()">
        <center><label for="profile-image-input" class="change-profile-button">Change Profile</label></center>
    </div>
                    <div class="mt-3">
                        <div class="col3" onkeypress="restrictName(event)">
                        <label for=""><h2>Name<code>*</code></h2></label>
                        <input style="width:170px;" type="text" placeholder="First Name" name="firstname" required maxlength="50" value="<?php echo isset($fetch2['firstname']) ? $fetch2['firstname'] : ''; ?>">
                        <input style="width:170px;" type="text" placeholder="Last Name" name="lastname" required maxlength="50" value="<?php echo isset($fetch2['lastname']) ? $fetch2['lastname'] : ''; ?>">
                        <input style="width:170px;" type="text" placeholder="Middle Name" name="midName" required maxlength="50" value="<?php echo isset($fetch['midName']) ? $fetch['midName'] : ''; ?>">
                        <input style="width:80px;" type="text" placeholder="suffix" name="suffix" required maxlength="50"value="<?php echo isset($fetch['suffix']) ? $fetch['suffix'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                    <div class="col3">
                    <label for=""><h2>Type of jobseeker<code>*</code></h2></label>
                    <select style="width:200px;" class="" name="jobseekerType" required>
                        <option value="" <?php echo empty($fetch2['jobseekerType']) ? 'selected' : ''; ?>>Select Type</option>
                        <option value="First Time" <?php echo (isset($fetch2['jobseekerType']) && $fetch2['jobseekerType'] === 'First Time') ? 'selected' : ''; ?>>FIRST TIME</option>
                        <option value="Jobseeker" <?php echo (isset($fetch2['jobseekerType']) && $fetch2['jobseekerType'] === 'Jobseeker') ? 'selected' : ''; ?>>JOBSEEKER</option>
                        <option value="OFW" <?php echo (isset($fetch2['jobseekerType']) && $fetch2['jobseekerType'] === 'OFW') ? 'selected' : ''; ?>>OFW</option>
                    </select>
                </div>
                    </div>
                    <div class="mt-3">
                    <div class="stick-object">
                        <div class="col1">
                        <label for=""><h2>Birthplace<code>*</code></h2></label>
                        <input type="text" name="birthplace"placeholder="BIRTHPLACE" required maxlength="50" value="<?php echo isset($fetch['birthplace']) ? $fetch['birthplace'] : ''; ?>">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Date of Birth<code>*</code></h2></label>
                        <input type="date" placeholder="birthday" name="birthday" required value="<?php echo isset($fetch['birthday']) ? $fetch['birthday'] : ''; ?>">
                        </div>
                    </div>
                    </div>
                    <div class="mt-3">
                    <div class="stick-object">
                       
                        <div class="col1">
                        <label for=""><h2>Age<code>*</code></h2></label>
                        <input type="number" id="age"name="age" placeholder="AGE"min="18" max="90"required value="<?php echo isset($fetch2['age']) ? $fetch2['age'] : ''; ?>"oninput="checkInputLength(this, 3)">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Sex<code>*</code></h2></label>
                        <select class="" name="sex" required>
                            <option value="" <?php echo empty($fetch2['sex']) ? 'selected' : ''; ?>>Select Gender</option>
                            <option value="Female" <?php echo (isset($fetch2['sex']) && $fetch2['sex'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Male" <?php echo (isset($fetch2['sex']) && $fetch2['sex'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                        </select>
                    </div>

                    </div>
                    </div>
                    
                    <div class="mt-3">
                    <div class="stick-object">
                    <div class="col1">
                    <label for=""><h2>Civil Status<code>*</code></h2></label>
                    <select class="" name="civilStatus" required>
                        <option value="" <?php echo empty($fetch['civilStatus']) ? 'selected' : ''; ?>>Select Status</option>
                        <option value="Single" <?php echo (isset($fetch['civilStatus']) && $fetch['civilStatus'] === 'Single') ? 'selected' : ''; ?>>Single</option>
                        <option value="Married" <?php echo (isset($fetch['civilStatus']) && $fetch['civilStatus'] === 'Married') ? 'selected' : ''; ?>>Married</option>
                        <option value="Single Parent" <?php echo (isset($fetch['civilStatus']) && $fetch['civilStatus'] === 'Single Parent') ? 'selected' : ''; ?>>Single Parent</option>
                        <option value="Widow" <?php echo (isset($fetch['civilStatus']) && $fetch['civilStatus'] === 'Widow') ? 'selected' : ''; ?>>Widow</option>
                    </select>
                </div>
                        <div class="col2">
                        <label for=""><h2>Citizenship<code>*</code></h2></label>
                        <input type="text" name="citizenship" placeholder="CITIZENSHIP" required maxlength="50" value="<?php echo isset($fetch['citizenship']) ? $fetch['citizenship'] : ''; ?>">
                        </div>
                    </div>
                    </div>
                    <div class="mt-3">
                        <div class="col3">
                        <label for=""><h2>Present Address<code>*</code></h2></label>
                        <input style="width:100px;" type="text" name="housenumPresent" placeholder="HOUSE NO." required maxlength="50" value="<?php echo isset($fetch['housenumPresent']) ? $fetch['housenumPresent'] : ''; ?>">
                        <input style="width:170px;" type="text"name="brgyPresent" placeholder="BARANGAY" required maxlength="50" value="<?php echo isset($fetch['brgyPresent']) ? $fetch['brgyPresent'] : ''; ?>">
                        <input style="width:170px;" type="text" name="cityPresent" placeholder="MUNICIPALITY/CITY" required maxlength="50" value="<?php echo isset($fetch['cityPresent']) ? $fetch['cityPresent'] : ''; ?>">
                        <input style="width:170px;" type="text" name="provincePresent" placeholder="PROVINCE" required maxlength="50" value="<?php echo isset($fetch['provincePresent']) ? $fetch['provincePresent'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="col3">
                        <label for=""><h2>Permanent Address<code>*</code></h2></label>
                        <input style="width:100px;" type="text" name="housenumPermanent" placeholder="HOUSE NO." required maxlength="50" value="<?php echo isset($fetch['housenumPermanent']) ? $fetch['housenumPermanent'] : ''; ?>">
                        <input style="width:170px;" type="text" name="brgyPermanent" placeholder="BARANGAY" required maxlength="50" value="<?php echo isset($fetch['brgyPermanent']) ? $fetch['brgyPermanent'] : ''; ?>">
                        <input style="width:170px;" type="text" name="cityPermanent" placeholder="MUNICIPALITY/CITY" required maxlength="50" value="<?php echo isset($fetch['cityPermanent']) ? $fetch['cityPermanent'] : ''; ?>">
                        <input style="width:170px;" type="text" name="provincePermanent" placeholder="PROVINCE" required maxlength="50" value="<?php echo isset($fetch['provincePermanent']) ? $fetch['provincePermanent'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                    <div class="stick-object">
                        <div class="col1">
                        <label for="height"><h2>Height<code>*</code></h2></label>
                        <input type="number" name="height" id="height" placeholder="HEIGHT (cm)" min="0" required value="<?php echo isset($fetch['height']) ? $fetch['height'] : ''; ?>"oninput="checkInputLength(this, 3)">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Weight<code>*</code></h2></label>
                        <input type="text" name="weight" id="body-size" placeholder="WEIGHT (kg)" required value="<?php echo isset($fetch['weight']) ? $fetch['weight'] : ''; ?>"oninput="checkInputLength(this, 3)">
                        </div>
                    </div>
                    </div>
                    <div class="mt-3">
                        <div class="col1">
                        <label for=""><h2>Mobile Number<code>*</code></h2></label>
                        <h4>(09xxxxxxxxx)</h4>
                        <input type="tel" name="mobilePnum" placeholder="PRIMARY NUMBER" pattern="[0-9]{11}" required value="<?php echo isset($fetch['mobilePnum']) ? $fetch['mobilePnum'] : ''; ?>">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Mobile Number<code>*</code></h2></label>
                        <h4>(09xxxxxxxxx)</h4>
                        <input type="tel" name="mobileSnum" placeholder="SECONDARY NUMBER" pattern="[0-9]{11}" required value="<?php echo isset($fetch['mobileSnum']) ? $fetch['mobileSnum'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="col3">
                        <label for=""><h2>Email Address<code>*</code></h2></label>
                        <input type="email" name="email" placeholder="EMAIL ADDRESS" required maxlength="50" value="<?php echo isset($fetch['email']) ? $fetch['email'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                    <div class="stick-object">
                    <div class="col1">
                    <label for=""><h2>Disability<code>*</code></h2></label>
                    <select style="width: 120px;" class="" name="disability" required>
                        <option value="None" <?php echo (isset($fetch['disability']) && $fetch['disability'] === 'None') ? 'selected' : ''; ?>>None</option>
                        <option value="Visual" <?php echo (isset($fetch['disability']) && $fetch['disability'] === 'visual') ? 'selected' : ''; ?>>Visual</option>
                        <option value="Hearing" <?php echo (isset($fetch['disability']) && $fetch['disability'] === 'hearing') ? 'selected' : ''; ?>>Hearing</option>
                        <option value="Speech" <?php echo (isset($fetch['disability']) && $fetch['disability'] === 'speech') ? 'selected' : ''; ?>>Speech</option>
                        <option value="Physical" <?php echo (isset($fetch['disability']) && $fetch['disability'] === 'physical') ? 'selected' : ''; ?>>Physical</option>
                    </select>
                </div>

                <div class="col2">
                <label for=""><h2>Employment Status<code>*</code></h2></label>
                <select class="" name="employmentStatus" required>
                    <option value="" <?php echo empty($fetch['employmentStatus']) ? 'selected' : ''; ?>>Status</option>
                    <option value="Wage Employed" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Wage Employed') ? 'selected' : ''; ?>>Wage Employed</option>
                    <option value="Self Employed" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Self Employed') ? 'selected' : ''; ?>>Self Employed</option>
                    <option value="Fresh Graduate" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Fresh Graduate') ? 'selected' : ''; ?>>Fresh Graduate</option>
                    <option value="Finished Contract" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Finished Contract') ? 'selected' : ''; ?>>Finished Contract</option>
                    <option value="Resigned" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Resigned') ? 'selected' : ''; ?>>Resigned</option>
                    <option value="Retired" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Retired') ? 'selected' : ''; ?>>Retired</option>
                    <option value="Terminated" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Terminated') ? 'selected' : ''; ?>>Terminated</option>
                    <option value="Laidoff(local)" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Laidoff(local)') ? 'selected' : ''; ?>>Laidoff(local)</option>
                    <option value="Laidoff(abroad)" <?php echo (isset($fetch['employmentStatus']) && $fetch['employmentStatus'] === 'Laidoff(abroad)') ? 'selected' : ''; ?>>Laidoff(abroad)</option>
                </select>
            </div>

                    </div>

                    
                    <div class="mt-3">
                        <div class="col1">
                        <label for=""><h2>Educational Level<code>*</code></h2></label>
                        <input type="text" name="educLevel" placeholder="EDUC LEVEL" required maxlength="50" value="<?php echo isset($fetch['educLevel']) ? $fetch['educLevel'] : ''; ?>">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Year Graduated<code>*</code></h2></label>
                        <input type="text" name="gradYear" placeholder="GRAD YEAR" required maxlength="50" value="<?php echo isset($fetch['gradYear']) ? $fetch['gradYear'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="col3">
                        <label for=""><h2>School<code>*</code></h2></label>
                        <input type="text" name="school" placeholder="SCHOOL" required maxlength="50" value="<?php echo isset($fetch['school']) ? $fetch['school'] : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="col1">
                        <label for=""><h2>Course<code>*</code></h2></label>
                        <input type="text" name="course" placeholder="COURSE" required maxlength="50" value="<?php echo isset($fetch['course']) ? $fetch['course'] : ''; ?>">
                        </div>
                        <div class="col2">
                        <label for=""><h2>Preferred Industry<code>*</code></h2></label>
                        <input type="text" name="preferIndustry" placeholder="PREFERRED INDUSTRY" required maxlength="50" value="<?php echo isset($fetch['preferIndustry']) ? $fetch['preferIndustry'] : ''; ?>">
                        </div>
                    </div>
                    



                    </div>
                    <div class="mt-3">
                    <div style="height: 40px;" class="col1">
                        <label for="">ACTIVELY LOOKING FOR WORK?<code>*</code></label>
                    </div>
                    <div class="col2">
                        <select class="" name="activelyLooking" required>
                            <option value="" <?php echo empty($fetch['activelyLooking']) ? 'selected' : ''; ?> hidden>Select an option</option>
                            <option value="Yes" <?php echo (isset($fetch['activelyLooking']) && $fetch['activelyLooking'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?php echo (isset($fetch['activelyLooking']) && $fetch['activelyLooking'] === 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div> 
                </div>
                <div class="mt-3">
                    <div style="height: 40px;" class="col1">
                        <label for="">WILLING TO WORK IMMEDIATELY?<code>*</code></label>
                    </div>
                    <div class="col2">
                        <select class="drop-down" name="willinglyWork" required>
                            <option value="" <?php echo empty($fetch['willinglyWork']) ? 'selected' : ''; ?> hidden>Select an option</option>
                            <option value="Yes" <?php echo (isset($fetch['willinglyWork']) && $fetch['willinglyWork'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?php echo (isset($fetch['willinglyWork']) && $fetch['willinglyWork'] === 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>     
                </div>
                <div class="mt-3">
                    <div style="height: 40px;" class="col1">
                        <label for="">ARE YOU A 4Ps BENEFICIARY?<code>*</code></label>
                    </div>
                    <div class="col2">
                        <select class="" name="fourPsBeneficiary" required>
                            <option value="" <?php echo empty($fetch['fourPsBeneficiary']) ? 'selected' : ''; ?> hidden>Select an option</option>
                            <option value="Yes" <?php echo (isset($fetch['fourPsBeneficiary']) && $fetch['fourPsBeneficiary'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?php echo (isset($fetch['fourPsBeneficiary']) && $fetch['fourPsBeneficiary'] === 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>     
                </div>
                <div class="mt-3">
                    <div style="height: 40px;" class="col1">
                        <label for="">ARE YOU AN OFW?<code>*</code></label>
                    </div>
                    <div class="col2">
                        <select class="" name="ofw" required>
                            <option value="" <?php echo empty($fetch['ofw']) ? 'selected' : ''; ?> hidden>Select an option</option>
                            <option value="Yes" <?php echo (isset($fetch['ofw']) && $fetch['ofw'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="No" <?php echo (isset($fetch['ofw']) && $fetch['ofw'] === 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>    
                </div>
                    
                </div>
                <button type="submit" name="submit">Submit</button>
                </div>
                    
        </form>
    </div>
    </div>
    <script src="../JS/NAVBAR.JS"></script>
</body>
</html>