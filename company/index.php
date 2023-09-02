<?php
include "../conn.php";
session_start();
$error = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
    $contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM c_accounttb WHERE email = '$email' AND companyName = '$companyName' AND contactPerson = '$contactPerson' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['company_id'] = $row['company_id'];
        if(isset($_REQUEST['remember'])){
            setcookie('emailid',$_REQUEST['email'],time()+20);
            setcookie('pwd',$_REQUEST['password'],time()+20);
        }
        header("location:homepage.php");
        exit();
    } else {
        $error = "<div class='alert alert-danger'>Invalid entry, Please try again</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link rel="stylesheet" href="../assets/css/company_login.css">
</head>
<body>
    <div class="main-container">
        <div class="main-row">
            <div class="col-1">
            <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <div class="wordbox">
            <h1>PUBLIC EMPLOYMENT SERVICE OFFICE (PESO)</h1>
                <h2>SANTA ROSA, LAGUNA</h2>
                <h3>YOU PARTNER IN FINDING THE BEST EMPLOYEE!</h3>
                </div>
            </div>
            <div class="col-2">
            <?php echo $error; ?>
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
                <h1 for="">WELCOME BACK<br> PARTNER!</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <label for="">LOG IN</label>
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Company Name" name="companyName" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Contact Person" name="contactPerson" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <button name="submit">LOG IN</button>
                    <br><br>
                    <h5>Create an Account?&nbsp;&nbsp;<a href="register.php">SIGN UP</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>