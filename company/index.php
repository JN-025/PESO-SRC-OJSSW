<?php
    session_start(); //we need session for the log in thingy XD 
    include("../peso_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPANY LOGIN</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/company_login.css">
    <script src="../assets/js/applicant/loader.js"></script>
</head>



<body>

<?php
      
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $companyName = $_POST['companyName'];
            $contactPerson = $_POST['contactPerson'];

            $query = "SELECT * from `c_accounttb`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                  foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password&&$row['companyName']==$companyName&&$row['contactPerson']==$contactPerson){
                        $_SESSION['login'] = true;
                        $_SESSION['type'] = $row['type'];
                        header('location:homepage.php');
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }else{
                echo "<script>alert('Error.')</script>";
            }

        }
      
      ?>


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
            <div class="field-space"></div>
                <h1>Welcome Back,</h1>
                <h1>Partner!</h1>
                <br>
                <h2>Login back to your account</h2>
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
                    
                    <button name="signin" type="submit">Log In</button>
                    <br><br>
                    <h5>Don't have an Account?&nbsp;&nbsp;<a href="register.php"><span style="color: #B0368E;">SIGN UP</span></a></h5>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>