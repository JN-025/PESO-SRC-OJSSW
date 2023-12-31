<?php
    session_start();
    include "../conn.php";
    $msg = "";
    if (isset($_POST["submit"])) {
        $name = sanitizeInput($_POST['name']);
        $position = sanitizeInput($_POST['position']);
        $contactNum = sanitizeInput($_POST['contactNum']);
        $password = $_POST['password'];
        $email = $_POST['email'];
        $confirm_password = $_POST['confirm_password'];
    
        if ($password == $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO p_accounttb (name, position, email, contactNum, password, status) VALUES (?, ?, ?, ? , ?, 'Pending')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $position, $email, $contactNum, $hashed_password);
    
            if ($stmt->execute()) {
                $_SESSION["form_submitted"] = "<h2>You have successfully request an access!</h2>";
                header("location:index.php");
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password do not match</div>";
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/applicant_register.css">
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
                <h3>YOU PARTNER IN FINDING A BETTER</h3>
                <h3>JOB!</h3>
                </div>
            </div>
            <div class="col-2">
            <style>
                .alert {  
                    top: 0;
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
            <?php echo $msg; ?>
                <h1>CREATE ACCOUNT</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <input type="text" onkeydown="restrictName(event)"name="name" placeholder="Name" required maxlength="50">
                    </div>
                    
                    <div class="form-col-1">
                        <select class="dropdown" name="position" required>
                            <option value="" selected disabled>Position</option>
                            <option value="admin">Admin</option>
                            <option value="head">Head</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-col-1">
                    <input type="tel" placeholder="Contact Number. eg 0901-***-**89" name="contactNum" pattern="\d{4}-\d{3}-\d{4}"title="Phone Number format eg 0912-345-6789" required maxlength="13" oninput="formatPhoneNumber(this)">
                    </div>
                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon2" class="eyeicon" data-target="myInput2">-->
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="myInput2" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
                    <button name="submit" type="submit">REGISTER</button>
                    <br><br>
                    <h5>Already have an Account?&nbsp;&nbsp;<a href="index.php">LOG IN</a></h5>
                    </div>
                    <div id="myModal" class="modal">
                    <div class="modal-box">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Terms & Agreement</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis nisl eget pharetra ultricies. Donec lacinia, ante vel commodo fringilla, elit dolor ornare ante, et placerat risus mauris et tellus. Vestibulum a orci ac mauris auctor semper. Pellentesque pulvinar magna sit amet eleifend sollicitudin. Duis sem nulla, viverra ut varius nec, ullamcorper sit amet ex. Proin id sagittis neque. Nullam venenatis ligula id est cursus dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                        Maecenas magna nisi, cursus sit amet tempor mattis, vehicula vel ex. Fusce molestie elit eget mattis molestie. Nam odio metus, varius at enim vitae, tincidunt rhoncus urna. Quisque viverra porttitor hendrerit. Quisque semper, sem in eleifend viverra, leo tellus interdum justo, vitae interdum odio diam vitae erat. Proin ornare ornare pulvinar. Maecenas a volutpat orci, eu fermentum augue. Cras dictum metus ut lorem aliquam auctor. Pellentesque sit amet elementum lectus. Aliquam ultricies, lectus quis volutpat facilisis, urna nibh molestie dui, dapibus luctus ex eros ut dui.

                        Nullam in ante augue. Nulla lacinia augue ut nunc aliquet luctus. Quisque vitae semper nulla. Mauris ac ullamcorper metus. Mauris ultricies eros a mauris tincidunt, dapibus iaculis elit faucibus. Donec sed ipsum a sem dignissim sagittis. Nunc placerat ex id interdum condimentum. Pellentesque eu eros sit amet velit hendrerit auctor vitae vel mi. Duis iaculis, arcu eu congue auctor, enim purus cursus augue, non sollicitudin quam velit et metus. Morbi tristique ipsum sit amet ipsum sollicitudin, eget vulputate enim convallis. Quisque finibus blandit arcu quis ornare. In sodales eros facilisis, interdum elit at, iaculis nibh. Aliquam sed tincidunt nisl.

                        Mauris tempor, justo vitae blandit pharetra, odio eros vulputate risus, vitae molestie justo turpis sed nibh. Donec suscipit tristique eleifend. Curabitur vitae sodales lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris eget tristique nisl. Integer sit amet arcu neque. Mauris lacus nisi, venenatis et congue sit amet, faucibus eget urna.

                        In hac habitasse platea dictumst. Cras orci nunc, volutpat quis finibus ut, fringilla non magna. Sed pharetra, est eget euismod bibendum, leo lectus scelerisque urna, vitae vestibulum justo urna a lacus. Mauris viverra tortor ac lacus commodo bibendum. Aliquam id magna eu urna fermentum molestie. Donec aliquam et est eu ullamcorper. Aenean faucibus vehicula massa a mattis. Curabitur gravida mi ut sagittis lacinia. Quisque ut luctus elit.</p>
                    </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>