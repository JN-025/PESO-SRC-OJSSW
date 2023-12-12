<?php
$page_title = "Applicant Access Register";
session_start();
// Include config file
include "../peso_function.php";
$alert = ""; 

if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: index.php");
    exit();
}


?>

<?php
   

    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        

        $sql = "SELECT * FROM access_account WHERE email='$email' AND type = 'Report' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['access_id'] = $row['access_id'];
            header('location: report_homepage.php');
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
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/peso_access_login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../assets/js/applicant/loader.js"></script>
</head>
<?php
      
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
           

            $query = "SELECT * from `access_account`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                  foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password&&$row['type']=='Report'){
                        $_SESSION['login'] = true;
                        $_SESSION['type'] = $row['type'];
                        header('location: report_homepage.php');
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }else{
                echo "<script>alert('Error.')</script>";
            }

        }
      
      ?>


<body>



<div class="loader"><div></div><div></div><div></div><div></div></div>
<div class="main-container">
        <div class="main-row">
            <div class="col-1">
                <a href=""><img src="../assets/img/ojssw.png" alt="" srcset=""></a>
                <br> <br>
                <center>
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
                <h1>Log in to Access</h1>
                <form action="" method="post">

                    <div class="form-col-1">
                    <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                    </div>

                    
                    
                    
                    <div class="form-col-1">
                    <!--<img src="../assets/img/eye-close.png" alt="" id="eyeicon1" class="eyeicon" data-target="myInput1">-->
                    <input type="password" placeholder="Password" name="password" id="" oninput="" required maxlength="20">
                    </div>
                    
                    <div class="form-col-1">
                    
                    <button name="signin" type="submit">Log In</button>
                    <br><br>
                    <h5>Create an Account?&nbsp;&nbsp;<a href="R_access_signup.php">SIGN UP</a></h5>
                    </div>
                    
                </form>
            </div>
                </center>

            </div>
           
        </div>
    </div>
    <script src="../assets/js/applicant/script.js"></script>
</body>
</html>