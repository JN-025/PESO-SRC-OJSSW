<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: homepage.php");
        die();
    }

    include '../conn.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM a_accounttb WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE a_accounttb SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM a_accounttb WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['applicant_id'] = $row['applicant_id'];
            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: homepage.php");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
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
    <title>Login Account</title>
    <link rel="stylesheet" href="../assets/css/applicant_login.css">
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
                <h1 for="">WELCOME BACK<br> PARTNER!</h1>
                <form action="" method="post">
                    <div class="form-col-1">
                    <label for="">LOG IN</label>
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
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