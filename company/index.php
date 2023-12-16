<?php
session_start();
include("../conn.php");

$msg = "";

if (isset($_POST['submit'])) {
    $email = sanitizeInput($_POST['email']);
    $companyName = sanitizeInput($_POST['companyName']);
    $contactPerson = sanitizeInput($_POST['contactPerson']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM c_accounttb WHERE email='$email' AND companyName = '$companyName' AND contactPerson = '$contactPerson' AND status = 'Approved'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedHashedPassword = $row['password'];

            if (password_verify($password, $storedHashedPassword)) {
                $_SESSION['company_id'] = $row['company_id'];
                header('location: poststatus.php');
            } else {
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Error in database query.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/company_login.css">
    <script src="../assets/js/applicant/loader.js"></script>
</head>
<body>
<div class="loader"><div></div><div></div><div></div><div></div></div>
<?php
    if(isset($_SESSION["form_submitted"])){
    echo "<div class='form-modal' id='formModal'><div class='form-modal-content'><a href='#' class='closebtn' id='closeModal'>&times;</a>{$_SESSION['form_submitted']}</div></div>";
    unset($_SESSION["form_submitted"]);
    }

?>
<style>
            .form-modal{
                font-family: 'Poppins', sans-serif;
                text-align: center;
                z-index: 1;
                position: fixed;
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items:center; 
                opacity: 1;
                animation: fadeIn 0.5s ease-in-out forwards;
            }
            .form-modal-content{
                position: relative;
                border-radius: 11px;
                background-color: #D9570E;
                padding: 100px;
                color: #fff;
                opacity: 0;
                animation: dropDown 0.5s ease-in-out 0.5s forwards;
            }
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @keyframes dropDown {
                0% {
                    transform: translateY(-50%);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            .closebtn {
                position:absolute;
                color: #fff;
                top: 0;
                right: 0;
                margin: 20px;
                font-size: 28px;
                font-weight: bold;
                text-decoration: none;
            }

            .closebtn:hover,
            .closebtn:focus {
                color: black;
                cursor: pointer;
            }

        </style>
        <script>
    var formModal = document.getElementById('formModal');
    var closeModal = document.getElementById('closeModal');
    
    function closeModalHandler() {
        formModal.style.display = 'none';
    }
    closeModal.addEventListener('click', closeModalHandler);
</script>
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
                    <input type="text" placeholder="Company Name" name="companyName" onkeydown="restrictName(event)" required maxlength="50">
                    </div>

                    <div class="form-col-1">
                    <input type="text" placeholder="Contact Person" name="contactPerson" onkeydown="restrictName(event)" required maxlength="50">
                    </div>
                    
                    
          
                    
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="Password" name="password" required maxlength="20">
                    </div>
                    
                    <div class="form-col-1">
                        <br>
                    <a href="forgot_password.php">Forgot Password</a>
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