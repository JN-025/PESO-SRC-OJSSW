<?php
include "../conn.php";
session_start();
if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $Pnum = $_POST["Pnum"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if($password !== $confirm_password){
        echo "password not match";
    }

    $insert = "INSERT INTO a_accounttb (firstname, lastname, age, sex, Pnum, email, password) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $insert)){
        echo "error database";
    } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $age, $sex, $Pnum, $email, $password);
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
    <link rel="stylesheet" href="../assets/css/applicant_register.css">
</head>
<body>
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
                    <h5>Already have an Account?&nbsp;&nbsp;<a href="login.php">LOG IN</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>