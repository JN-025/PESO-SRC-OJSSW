<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions_draft.php");
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

<?php
        if(isset($_POST['signup'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
           
            $message = "$lastname $firstname would like to request an account.";
            
            $query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$message', CURRENT_TIMESTAMP)";
            if(password === confirm_password){
            (performQuery($query))
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
        }
    
    
    
    ?>


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
                    <input type="text" placeholder="first name" name="firstname" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="text" placeholder="last name" name="lastname" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                    <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                    </div>
                    
                    
                    <div class="form-col-1">
                    <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
                    <button name="signup" type="submit">REGISTER</button>
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