<?php
session_start();
include "../conn.php";

$msg="";

if (isset($_POST["submit"])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $contactNum = $_POST['contactNum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $appForm_frontImg = $_FILES['appForm_front_img'];
        $appForm_backImg = $_FILES['appForm_back_img'];
        $birthCertImg = $_FILES['birthCert_img'];
        $voterIDImg = $_FILES['voterID_img'];
        $indigencyCertImg = $_FILES['indigencyCert_img'];
        $regCardImg = $_FILES['regCard_img'];
        $classCardImg = $_FILES['classCard_img'];

        $uploadFolder = "requirement_storage/";

        if ($appForm_frontImg['error'] === 0 &&
            $appForm_backImg['error'] === 0 &&
            $birthCertImg['error'] === 0 &&
            $voterIDImg['error'] === 0 &&
            $indigencyCertImg['error'] === 0 &&
            $regCardImg['error'] === 0 &&
            $classCardImg['error'] === 0) {

            move_uploaded_file($appForm_frontImg['tmp_name'], $uploadFolder . $appForm_frontImg['name']);
            move_uploaded_file($appForm_backImg['tmp_name'], $uploadFolder . $appForm_backImg['name']);
            move_uploaded_file($birthCertImg['tmp_name'], $uploadFolder . $birthCertImg['name']);
            move_uploaded_file($voterIDImg['tmp_name'], $uploadFolder . $voterIDImg['name']);
            move_uploaded_file($indigencyCertImg['tmp_name'], $uploadFolder . $indigencyCertImg['name']);
            move_uploaded_file($regCardImg['tmp_name'], $uploadFolder . $regCardImg['name']);
            move_uploaded_file($classCardImg['tmp_name'], $uploadFolder . $classCardImg['name']);

            $appForm_frontPath = $uploadFolder . $appForm_frontImg['name'];
            $appForm_backPath = $uploadFolder . $appForm_backImg['name'];
            $birthCertPath = $uploadFolder . $birthCertImg['name'];
            $voterIDPath = $uploadFolder . $voterIDImg['name'];
            $indigencyCertPath = $uploadFolder . $indigencyCertImg['name'];
            $regCardPath = $uploadFolder . $regCardImg['name'];
            $classCardPath = $uploadFolder . $classCardImg['name'];


            $sql = "INSERT INTO s_accounttb (firstname, lastname, age, sex, contactNum, email, password, appForm_front_img, appForm_back_img, birthCert_img, voterID_img, indigencyCert_img, regCard_img, classCard_img, type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Student' ,'Pending')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssssss", $firstname, $lastname, $age, $sex, $contactNum, $email, $password, $appForm_frontPath, $appForm_backPath, $birthCertPath, $voterIDPath, $indigencyCertPath, $regCardPath, $classCardPath);

            if ($stmt->execute()) {
                $_SESSION["form_submitted"] = "<h2>You have successfully submitted your form!</h2><h4>Admin will check the account if eligable to access. We will email you when the account is ready</h4>";
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
    <title>Register - Student</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/spes_register.css">
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
                <h3>CONNECTING DREAMS TO CAREERS:</h3>
                <h3>WHERE YOUR FUTURE BEGINS TODAY!</h3>
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
                                <input type="text" onkeydown="restrictName(event)"name="firstname" placeholder="First Name" required maxlength="50">
                            </div>
                            <div class="form-col-1">
                                <input type="text" onkeydown="restrictName(event)" name="lastname" placeholder="Last Name" required maxlength="50">
                            </div>
                            <div class="form-col-2">
                                <input type="number" name="age" id="age"placeholder="Age" min="18" max="90" required>
                                <div class="field-space"></div>
                                <select class="dropdown" name="sex" required>
                                    <option value="" selected disabled>Sex</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
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
                            <div class="form-col-3">
                                <button class="btn-nav prev" step_number="0">Previous</button>
                            </div>
                            <div class="form-col-1" style="margin-top: 0;">
                                <h2>Requirements</h2>
                            </div>

                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Application Form (front):</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="appForm_front_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Application Form (back):</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="appForm_back_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Birth Certificate:</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="birthCert_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Voter's ID:</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="voterID_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Indigency Certificate:</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="indigencyCert_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Latest Registration Card:</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="regCard_img" placeholder="">
                                </div>
                            </div>
                            <div class="form-col-3">
                                <div class="col-left">
                                    <h3>Class Card:</h3>
                                </div>
                                <div class="col-right">
                                    <input type="file" name="classCard_img" placeholder="">
                                </div>
                            </div>
                        
                        <div class="form-col-1">
                        <h4 style="color:red; font-size: 1vw;"><b>NOTE:</b> All files must be in PNG or JPEG. Must not exceed 3MB</h4>
                        </div>
                        <div class="form-col-1">
                            <button name="submit">SIGN UP</button>
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
    <script src="../company/job_posting.js"></script>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>