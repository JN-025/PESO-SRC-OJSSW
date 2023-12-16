<?php
session_start();
$msg = "";
include "../conn.php";
if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM c_accounttb WHERE code='{$_GET['reset']}'")) > 0) {
        $msg = "<div class='alert alert-success' id='popup'>You can now change password</div>";
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password === $confirm_password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($conn, "UPDATE c_accounttb SET password='{$hashed_password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    $_SESSION['success_message'] = "Password successfully changed.";
                    header("Location: index.php");
                    exit();
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Process failed, please try again</div>";
    }
} else {
    header("Location: forgot_password.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/applicant_login.css">
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
                <h1 for="">Change Password</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="New Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon2" class="eyeicon" data-target="myInput2">-->
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="myInput2" required maxlength="20">
                    </div>
                    <div class="form-col-1 display-flex">
                    <a href="index.php">Return to Login</a>
                    <button name="submit">Change</button>
                    <h5>Don’t have an Account?&nbsp;<a href="../company_register.php">SIGN UP</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
    <script>
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";

            // Hide the popup after 5 seconds
            setTimeout(function() {
                popup.style.display = "none";
            }, 5000);
        }
        window.onload = showPopup;
    </script>
</body>
</html>