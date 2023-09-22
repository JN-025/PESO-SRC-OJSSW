<?php
    session_start();
    include("../conn.php");

    $msg = "";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $companyName = $_POST['companyName'];
        $contactPerson = $_POST['contactPerson'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM c_accounttb WHERE email='$email' AND companyName = '$companyName' AND contactPerson = '$contactPerson' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['company_id'] = $row['company_id'];
            header('location: homepage.php');
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
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
    <link rel="stylesheet" href="../assets/css/company_login.css">
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
            <?php echo $msg;?>
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
                <h1>Welcome Back</h1>
                <h2>Log in back your account</h2>
                <form action="" method="post">

                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>

                    <div class="form-col-1">
                    <input type="text" placeholder="Company Name" name="companyName" required maxlength="50">
                    </div>

                    <div class="form-col-1">
                    <input type="text" placeholder="Contact Person" name="contactPerson" required maxlength="50">
                    </div>
                    
                    
          
                    
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="Password" name="password" id="" oninput="" required maxlength="20">
                    </div>
                    
                    <div class="form-col-1">
                        <br>
                    <a href="#">Forgot Password</a>
                    <br>
                    <button name="submit" type="submit">Log In</button>
                    <br><br>
                    <h5>Create an Account?&nbsp;&nbsp;<a href="../company_register.php">SIGN UP</a></h5>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>