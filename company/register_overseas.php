<?php
session_start();
include "../conn.php";
include "../sanitize_function.php";

$msg="";

if (isset($_POST["submit"])) {
    $companyName = sanitizeInput($_POST['companyName']);
    $industry = sanitizeInput($_POST['industry']);
    $contactPerson = sanitizeInput($_POST['contactPerson']);
    $contactNum = sanitizeInput($_POST['contactNum']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $profileImg = $_FILES['profile_img'];
        $poeapermit_img = $_FILES['poeapermit_img'];
        $joborder_img = $_FILES['joborder_img'];
        $jobOpeningImg = $_FILES['jobopening_img'];

        $uploadFolder = "requirement_storage/";

        if ($profileImg['error'] === 0 &&
            $poeapermit_img['error'] === 0 &&
            $joborder_img['error'] === 0 &&
            $jobOpeningImg['error'] === 0) {

            move_uploaded_file($profileImg['tmp_name'], $uploadFolder . $profileImg['name']);
            move_uploaded_file($poeapermit_img['tmp_name'], $uploadFolder . $dolePermitImg['name']);
            move_uploaded_file($joborder_img['tmp_name'], $uploadFolder . $listClientsImg['name']);
            move_uploaded_file($jobOpeningImg['tmp_name'], $uploadFolder . $jobOpeningImg['name']);

            $profilePath = $uploadFolder . $profileImg['name'];
            $poeaPermitPath = $uploadFolder . $poeapermit_img['name'];
            $jobOrderPath = $uploadFolder . $joborder_img['name'];
            $jobOpeningPath = $uploadFolder . $jobOpeningImg['name'];

            $sql = "INSERT INTO c_accounttb (companyName, industry, contactPerson, contactNum, email, password, profile_img, poeapermit_img, joborder_img, jobopening_img, type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Overseas', 'Pending')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssss", $companyName, $industry, $contactPerson, $contactNum, $email, $hashed_password, $profilePath, $poeaPermitPath, $jobOrderPath, $jobOpeningPath);

            if ($stmt->execute()) {
                $_SESSION["form_submitted"] = "<h2>You have successfully submitted your form!</h2><h4>Admin will check the account if eligible to access. We will email you when the account is ready</h4>";
                header("location:index.php");
            } else {
                echo "Error: Database insertion";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Something went wrong uploading images, please try again</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>The password do not match, please try again</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Overseas</title>
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/company_register.css">
    <script src="../assets/js/applicant/loader.js"></script>

</head>
<body>
<div class="loader"><div></div><div></div><div></div><div></div></div>
<div class="main-container">
        <div class="main-row">
            <div class="col-1">
            <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <div class="wordbox">
            <h1>PUBLIC EMPLOYMENT SERVICE OFFICE (PESO)</h1>
                <h2>SANTA ROSA, LAGUNA</h2>
                <div class="field-space"></div>
                <h3>EMPOWERING CAREER JOURNEYS TOGETHER:</h3>
                <h3>BRIDGING DREAMS AND OPPORTUNITIES.</h3>
                </div>
            </div>
            <div class="col-2">
            <?php echo $msg; ?>
            <style>
                .alert {  
                    top:0;
                    position: fixed;  
                    padding: 1rem;
                    border-radius: 5px;
                    color: white;
                    margin: 1rem 0;
                }

                .alert-success {
                    background-color: #42ba96;
                }

                .alert-danger {
                    background-color: #fc5555;
                }

                .alert-info {
                    background-color: #2E9AFE;
                }

                .alert-warning {
                    background-color: #ff9966;
                }
            </style>
            <div class="field-space"></div>
                <h1>CREATE ACCOUNT</h1>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="wrapper">
                        <section id="step-0" class="form-step">
                        <div class="form-col-1">
                                <input type="text" id="" placeholder="Company Name" name="companyName" required  maxlength="50">
                            </div>
                            <div class="form-col-1">
                                <input type="text" id="" placeholder="Industry" name="industry" required  maxlength="50">
                            </div>
                            <div class="form-col-1">
                                <input type="text" onkeydown="restrictName(event)" name="contactPerson" placeholder="Contact Person" required maxlength="50">
                            </div>
                            <div class="form-col-1">
                                <input type="tel" placeholder="Contact Number. eg 0901-***-**89" name="contactNum" pattern="\d{4}-\d{3}-\d{4}"title="Contact Number format eg 0912-345-6789" required maxlength="13" oninput="formatPhoneNumber(this)">
                            </div>
                            <div class="form-col-1">
                                <input type="email" id="" placeholder="Email Address" name="email" required>
                            </div>
                            <div class="form-col-1">
                                <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                            </div>
                            <div class="form-col-1">
                                <input type="password" placeholder="Confirm Password" name="confirm_password" id="myInput2" required maxlength="20">
                            </div>
                            <div class="form-col-1">
                                <button class="btn-nav" step_number="1">Next</button>
                                <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
                                <h5>Already have an Account?&nbsp;&nbsp;<a href="index.php">LOG IN</a></h5>
                            </div>
                        </section>
                        <!--section 2-->
                        <section id="step-1" class="form-step d-none">
                            <div class="form-col-2">
                            <button class="btn-nav prev" step_number="0">Previous</button>
                            </div>
                            <div class="form-col-1">
                            <h2>Requirements</h2>
                            </div>
                            <div class="form-col-2">
                            <div class="col-left">
                                <h3>Company Profile:</h3>
                            </div>
                            <div class="col-right">
                                <input type="file" name="profile_img" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-col-2">
                            <div class="col-left">
                                <h3>POEA Permit:</h3>
                            </div>
                            <div class="col-right">
                                <input type="file" name="poeapermit_img" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-col-2">
                            <div class="col-left">
                                <h3>Job Order:</h3>
                            </div>
                            <div class="col-right">
                                <input type="file" name="joborder_img" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-col-2">
                            <div class="col-left">
                                <h3>Job Openings:</h3>
                            </div>
                            <div class="col-right">
                                <input type="file" name="jobopening_img" placeholder="" required>
                            </div>
                        </div>
                            
                        <div class="form-col-1">
                        <h4 style="color:red"><b>NOTE:</b> All files must be in PDF or JPEG. Must not exceed 3MB</h4>
                        </div>
                        <div class="form-col-1">
                            <button name="submit">Submit</button>
                            <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
                            <h5>Already have an Account?&nbsp;&nbsp;<a href="index.php">LOG IN</a></h5>
                        </div>
                        
                        </section>
                    </div>
                    <div id="myModal" class="modal">
                    <div class="modal-box">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Terms & Agreement</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis nisl eget pharetra ultricies. Donec lacinia, ante vel commodo fringilla, elit dolor ornare ante, et placerat risus mauris et tellus. Vestibulum a orci ac mauris auctor semper. Pellentesque pulvinar magna sit amet eleifend sollicitudin. Duis sem nulla, viverra ut varius nec, ullamcorper sit amet ex. Proin id sagittis neque. Nullam venenatis ligula id est cursus dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>
                        Maecenas magna nisi, cursus sit amet tempor mattis, vehicula vel ex. Fusce molestie elit eget mattis molestie. Nam odio metus, varius at enim vitae, tincidunt rhoncus urna. Quisque viverra porttitor hendrerit. Quisque semper, sem in eleifend viverra, leo tellus interdum justo, vitae interdum odio diam vitae erat. Proin ornare ornare pulvinar. Maecenas a volutpat orci, eu fermentum augue. Cras dictum metus ut lorem aliquam auctor. Pellentesque sit amet elementum lectus. Aliquam ultricies, lectus quis volutpat facilisis, urna nibh molestie dui, dapibus luctus ex eros ut dui.</p>
                        <p>
                        Nullam in ante augue. Nulla lacinia augue ut nunc aliquet luctus. Quisque vitae semper nulla. Mauris ac ullamcorper metus. Mauris ultricies eros a mauris tincidunt, dapibus iaculis elit faucibus. Donec sed ipsum a sem dignissim sagittis. Nunc placerat ex id interdum condimentum. Pellentesque eu eros sit amet velit hendrerit auctor vitae vel mi. Duis iaculis, arcu eu congue auctor, enim purus cursus augue, non sollicitudin quam velit et metus. Morbi tristique ipsum sit amet ipsum sollicitudin, eget vulputate enim convallis. Quisque finibus blandit arcu quis ornare. In sodales eros facilisis, interdum elit at, iaculis nibh. Aliquam sed tincidunt nisl.</p>
                        <p>
                        Mauris tempor, justo vitae blandit pharetra, odio eros vulputate risus, vitae molestie justo turpis sed nibh. Donec suscipit tristique eleifend. Curabitur vitae sodales lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris eget tristique nisl. Integer sit amet arcu neque. Mauris lacus nisi, venenatis et congue sit amet, faucibus eget urna.</p>
                        <p>
                        In hac habitasse platea dictumst. Cras orci nunc, volutpat quis finibus ut, fringilla non magna. Sed pharetra, est eget euismod bibendum, leo lectus scelerisque urna, vitae vestibulum justo urna a lacus. Mauris viverra tortor ac lacus commodo bibendum. Aliquam id magna eu urna fermentum molestie. Donec aliquam et est eu ullamcorper. Aenean faucibus vehicula massa a mattis. Curabitur gravida mi ut sagittis lacinia. Quisque ut luctus elit.</p>
                    </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/company/job_posting.js"></script>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>