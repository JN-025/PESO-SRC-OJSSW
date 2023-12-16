<?php
    session_start();
    include "../conn.php";
    $msg = "";
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $position = $_POST['position'];

        $sql = "SELECT * FROM p_accounttb WHERE email='$email' AND position = '$position' AND password='$password' AND status = 'Approved'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['peso_id'] = $row['peso_id'];
            header('location: homepage.php');
        } else {
            $msg = "<div class='alert alert-danger'>Email, Position or Password do not match.</div>";
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
<?php
    if(isset($_SESSION["form_submitted"])){
    echo "<div class='form-modal' id='formModal'>
            <div class='form-modal-content'>
                <div class='modal-row'>
                <div>
                    <div class='modal-img'></div>
                    </div>
                    <div>
                    <div class='modal-col'>
                        <h2>{$_SESSION['form_submitted']}</h2>
                    </div>
                
                <div class='modal-end'><h2>Pending!</h2>
                <a href='index.php'>Close</a>
                </div>
                </div>
                </div>
            </div>
        </div>";
    unset($_SESSION["form_submitted"]);
    }

?>
        <style>
            .form-modal{
                font-family: 'Poppins', sans-serif;
                z-index: 9999;
                position: fixed;
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                height: 100%;
                left: 0;
                top: 0;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items:center; 
                opacity: 1;
                animation: fadeIn 0.5s ease-in-out forwards;
            }
            .form-modal-content{
                width: 400px;
                position: relative;
                border-radius: 32px;
                background-color: #D9570E;
                padding: 30px;
                color: #fff;
                opacity: 0;
                animation: dropDown 0.5s ease-in-out 0.5s forwards;
            }
            .modal-row{
                display: flex;
            }
            .modal-img{
                margin-right: 20px;
                width: 30%;
                background-image: url(../assets/img/findjobmodal_success.png);
                background-repeat: no-repeat;
            }
            .modal-end h2{
                margin: 0;
                margin-bottom: 44px;
                text-align: center;
                color: #FAC819;
                font-family: Poppins;
                font-size: 36px;
                font-style: normal;
                font-weight: 900;
                line-height: normal;
            }
            .modal-end a{
                padding: 10px 40px;
                border-radius: 10px;
                background-color: #D9D9D9;
                color: #A81E1E;
                text-decoration: none;
                font-weight: 900;
                box-shadow: 0px 4px 4px 0px #00000040;
                cursor: pointer;
                display: flex;
                justify-content: center;
                margin: 0 30%;
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
            .close {
                position:absolute;
                color: #fff;
                top: 0;
                right: 0;
                margin: 20px;
                font-size: 28px;
                font-weight: bold;
                text-decoration: none;
            }

            .close:hover,
            .close:focus {
                color: black;
                cursor: pointer;
            }
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
<div class="main-container">
        <div class="main-row">
            <div class="col-1">
            <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <div class="wordbox">
            <h1>PUBLIC EMPLOYMENT SERVICE OFFICE (PESO)</h1>
                <h2>SANTA ROSA, LAGUNA</h2>
                <div class="field-space"></div>
                <h3>Connecting Dreams to Careers:</h3>
                <h3>You're the Bridge.</h3>
                </div>
            </div>
            <div class="col-2">
            <div class="field-space"></div>
            <?php echo $msg; ?>
                <h1>LOG IN</h1>
                <form action="" method="post">

                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
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
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="Password" name="password" id="" oninput="" required maxlength="20">
                    </div>
                    
                    <div class="form-col-1">
                    
                    <button name="submit" type="submit">Log In</button>
                    <br><br>
                    <h5>Create an Account?&nbsp;&nbsp;<a href="register.php">SIGN UP</a></h5>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>