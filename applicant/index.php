<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: find_jobs.php");
        die();
    }

    include '../conn.php';
    include "../sanitize_function.php";
    $msg = "";

    if (isset($_GET['verification'])) {
        $verificationCode = $_GET['verification'];
        $currentTimestamp = time();
    
        $query = "SELECT * FROM a_accounttb WHERE code='$verificationCode'";
        $result = mysqli_query($conn, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            $codeCreatedAt = strtotime($row['code_created_at']);
            $expirationTime = 30 * 60;
    

            if ($currentTimestamp - $codeCreatedAt <= $expirationTime) {
                $updateQuery = "UPDATE a_accounttb SET code='' WHERE code='$verificationCode'";
                if (mysqli_query($conn, $updateQuery)) {
                    $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Error updating code status.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Verification code has expired.</div>";
            }
        } else {
            header("Location: index.php");
            exit();
        }
    }

    if (isset($_POST['submit'])) {
        $email = sanitizeInput($_POST['email']);
        $password = $_POST['password'];
    
        if (isset($_POST["remember"])) {
            $remember = $_POST["remember"];
        }
    
        $sql = "SELECT * FROM a_accounttb WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPasswordFromDB = $row['password'];
    
            if (password_verify($password, $hashedPasswordFromDB)) {
                $_SESSION['applicant_id'] = $row['applicant_id'];
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
    
                if (isset($_POST["remember"])) {
                    $remember = $_POST["remember"];
                    setcookie("remember_email", $email, time() + 3600 * 24 * 365);
                    setcookie("remember", $remember, time() + 3600 * 24 * 365);
                } else {
                    setcookie("remember_email", $email, time() - 3600 * 24 * 365);
                    setcookie("remember", $remember, time() - 3600 * 24 * 365);
                }
    
                if (empty($row['code'])) {
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: find_jobs.php");
                    exit();
                } else {
                    $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    
        $stmt->close();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/applicant_login.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
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
            <?php
    if (isset($_SESSION['success_message'])) {
        echo "<div class='alert alert-success'>{$_SESSION['success_message']}</div>";
        unset($_SESSION['success_message']);
    }
    ?>
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
                <h1 for="">Welcome Back,<br> Partner!</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <label for="">Login back to your account</label>
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    <div class="form-col-1 no-text-align">
                    <input id="check-box" type="checkbox" name="remember">
                    <label for="check-box">&nbsp;Remember Me</label>
                    </div>
                    <div class="form-col-1 display-flex">
                    <a href="forgot_password.php">Forgot Password</a>
                    <button name="submit">LOGIN</button>
                    <h5>Don’t have an Account?&nbsp;<a href="register.php">SIGN UP</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>