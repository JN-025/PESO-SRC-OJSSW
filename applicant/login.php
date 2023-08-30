<?php
include "../conn.php";
session_start();
$error = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM a_accounttb WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['applicant_id'] = $row['applicant_id'];
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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>APPLICANT LOG IN</title>
		<link rel="icon" type="image/x-icon" href="../assets/img/peso.png">
		<link rel="stylesheet" href="../assets/css/applicant_login.css">
	</head>

	<body>
	
		<div class="column1">
		<div class="header" id="myHeader">
			<a href="#"><img src="../assets/img/ojssw.png"  style="width:250px;height:50px; float: left; margin-left: 30px;"></a>
		</div>
			<center>
            <div class="card1">
                <h1>PUBLIC EMPLOYMENT SERVICE OFFICE (PESO)</h1>
                <h2>SANTA ROSA, LAGUNA</h2>
                <br>
                <h3>YOU PARTNER IN FINDING A BETTER JOB!</h3>
            </div>
            </center>
		</div>

		<div class="column2">
			<center>
			<div class="card2">
                <div class="card3">
                <h4>WELCOME BACK PARTNER</h4>
                </div>
                
                
				<h5>LOG IN</h5>
				<div class="container">
                <form id="" class="" action="" method="post" autocomplete="off">
                  
                    <div class="card4">
                        <div class="col1">
                        
                        <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                        </div>
                    </div>
                  
                    <div class="card4">
                        <div class="col1">
                            <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                        </div>
                    </div>

                    <div class="card5">
                        <br> <br>
                        <center><button type="submit" class="login" name="submit">LOG IN</button></center>
                       
                        <h6>Create an Account?&nbsp;&nbsp;<a href="register.php">SIGN UP</a></h6>
                    </div>

                    
                    
                </form>
            </div>


			</div>
			</center>
		</div>

	</body>
</html>


