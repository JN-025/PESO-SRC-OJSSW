<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }

require '../vendor/autoload.php';

include "../conn.php";
$msg = "";
if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $Pnum = $_POST["Pnum"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM a_accounttb WHERE email='$email'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
    } else {
        if ($password === $confirm_password) {
            $stmt = $conn->prepare("INSERT INTO a_accounttb (firstname, lastname, age, Pnum, sex, email, password, code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiissss", $firstname, $lastname, $age, $Pnum, $sex, $email, $password, $code);
        
            $result = $stmt->execute();

            if($result){
                echo "<div style='display: none;'>";

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'rebladen@gmail.com';                   
                    $mail->Password   = 'oyqexvmbrljpvwuf';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    

                    $mail->setFrom('from@example.com');
                    $mail->addAddress($email);

                    $mail->isHTML(true);                                 
                    $mail->Subject = 'no-reply';
                    $mail->Body    = 'Para ma-verify po ang iyong email ay paclick po ng link nato->&nbsp;<b><a href="http://localhost/peso-src-ojssw/applicant/?verification='.$code.'">http://localhost/peso-src-ojssw/applicant/?verification='.$code.'</a></b>';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'>We've send a verification on your email address</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                <h3>YOU PARTNER IN FINDING A BETTER JOB!</h3>
                </div>
            </div>
            <div class="col-2">
            <?php echo $msg; ?>
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
                <h1>CREATE YOUR ACCOUNT</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <input type="text" onkeydown="restrictName(event)"name="firstname" placeholder="First Name" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="text" onkeydown="restrictName(event)" name="lastname" placeholder="Last Name" required maxlength="50">
                    </div>
                    <div class="form-col-2">
                    <input type="number" name="age" placeholder="Age" required min="18" max="90">
                        <div class="field-space"></div>
                    <select class="" name="sex" required>
                            <option value="" style="color:gray;"selected disabled>Sex</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            </select>
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Mobile Number" name="Pnum" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="myInput2" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
                    <button name="submit">REGISTER</button>
                    <br><br>
                    <h5>Already have an Account?&nbsp;&nbsp;<a href="index.php">LOG IN</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>