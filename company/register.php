<?php
include "../conn.php";
session_start();
if(isset($_POST["submit"])){
    $companyName = $_POST["companyName"];
    $industry = $_POST["industry"];
    $contactPerson = $_POST["contactPerson"];
    $contactNum = $_POST["contactNum"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if($password !== $confirm_password){
        echo "password not match";
    }

    $insert = "INSERT INTO c_accounttb (companyName, industry, contactPerson, contactNum, email, password) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $insert)){
        echo "error database";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $companyName, $industry, $contactPerson, $contactNum, $email, $password);
        mysqli_stmt_execute($stmt);
        header("location: login.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/company_register.css">
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
                <h1>CREATE YOUR ACCOUNT</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <input type="text" placeholder="Company Name" name="companyName" required maxlength="50">
                    </div>

                    <div class="form-col-1">
                    <input type="text" placeholder="Industry" name="industry" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Contact Person" name="contactPerson" required maxlength="50">
                    </div>

                    <div class="form-col-1">
                    <input type="text" placeholder="Contact Number" name="contactNum" required maxlength="50">
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
                    <h5>Already have an Account?&nbsp;&nbsp;<a href="login.php">LOG IN</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>