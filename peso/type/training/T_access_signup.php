<?php
$page_title = "Applicant Access Register";
session_start();
// Include config file
include "../../../conn.php";
include "../../../sanitize_function.php";
$msg = ""; 

if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: index.php");
    exit();
}
if (isset($_POST["submit"])) {
    $peso_id = $_SESSION['peso_id'];
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $type = sanitizeInput($_POST['type']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO access_account (peso_id, name, email, type, password, status) VALUES (?, ?, ?, 'Training' , ?, 'Pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $peso_id, $name, $email, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION["form_submitted"] = "<h2>You have successfully request an access!</h2>";
            header("location:t_access_login.php");
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
    <link rel="shortcut icon" href="../../../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/peso_access_signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../../../assets/js/applicant/loader.js"></script>
</head>
<body>
<div class="loader"><div></div><div></div><div></div><div></div></div>
<div class="main-container">
        <div class="main-row">
            <div class="col-1">
                <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <br> <br>
                <center>
                <div class="col-2">
            
                <style>
                .alert {  
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
                    <button class="access" name="submit" type="submit">REGISTER</button>
                    <br><br>
                    <h5>Already have an Account?&nbsp;&nbsp;<a href="T_access_login.php">LOG IN</a></h5>
                    </div>
                    
                
                </form>
            </div>
                </center>

            </div>
           
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>