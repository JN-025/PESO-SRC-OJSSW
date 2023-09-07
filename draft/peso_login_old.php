<?php
include "../conn.php";
session_start();
$error = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM p_accounttb_draft WHERE email = '$email' AND name = '$name' AND position = '$position' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['peso_id'] = $row['peso_id'];
        if(isset($_REQUEST['remember'])){
            setcookie('emailid',$_REQUEST['email'],time()+20);
            setcookie('pwd',$_REQUEST['password'],time()+20);
        }
        header("location:homepage.php");
        exit();
    } else {
        $error = "Invalid email or password!";
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
                
                </div>
            </div>
            <div class="col-2">
                <h1 for="">WELCOME BACK</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <label for="">LOG IN</label>
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Name" name="name" required maxlength="20">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="Position" name="position" required maxlength="20">
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