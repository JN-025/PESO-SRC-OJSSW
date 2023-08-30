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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>APPLICANT REGISTER</title>
		<link rel="icon" type="image/x-icon" href="../assets/img/peso.png">
		<link rel="stylesheet" href="../assets/css/applicant_register.css">
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
				<h4>CREATE YOUR ACCOUNT</h4>
				<div class="container">
                <form id="" class="" action="" method="post" autocomplete="off">
                   
                   
                    <div class="card3">
                        <div class="col1">
                        
                            <input type="text" onkeydown="restrictName(event)"name="firstname" placeholder="First Name" required maxlength="50">
                            
                        </div>
                    
                    </div>

					<div class="card3">
                        
                        <div class="col1">
                           
                            <input type="text" onkeydown="restrictName(event)" name="lastname" placeholder="Last Name" required maxlength="50">
                        </div>
                    </div>
                    
                    <div class="card3">
                        <div class="col2">
                            
                            <input style="width: 80%;" type="number" name="age" placeholder="Age" required min="18" max="90">
                            
                        </div>
                        <div class="col3">
                           
                            <select style="float:left;width:90%;margin-left:13px;height: 4.5vh;" class="" name="sex" required>
                            <option value="" style="color:gray;"selected disabled>Sex</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            </select>
                        </div>
                    </div>

					<div class="card3">
                        <div class="col1">
                        
                        <input type="text" placeholder="Mobile Number" name="Pnum" required maxlength="50">
                        </div>
                    </div>
                    

                    <div class="card3">
                        <div class="col1">
                        
                        <input type="email" placeholder="Email Address" name="email" required maxlength="50">
                        </div>
                    </div>
                  

                    
                    <div class="card3">
                        <div class="col1">
                            <input type="password" placeholder="Password" name="password" id="myInput1" oninput="validatePassword()" required maxlength="20">
                        </div>
                    </div>

                    <div class="card3">
                        <div class="col1">
                            
                            <input type="password" placeholder="Confirm Password" name="confirm_password" id="myInput2" required maxlength="20">
                        </div>
                    </div>
                    

                    <div class="card4">
                        <h5>By clicking register you agree in our&nbsp;&nbsp;<a href="#" id="myBtn">Terms & Agreement</a></h5>
						<!--
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                              <span class="close">&times;</span>
                              <p>Some text in the Modal..</p>
                            </div>                            
                        </div>
						-->
                        <br>
                        <center><button type="submit" class="register" name="submit">REGISTER</button></center>
                        <br>
                        <h5>Already have an Account?&nbsp;&nbsp;<a href="login.php">LOG IN</a></h5>
                    </div>
                    

                    
                    
                </form>
            </div>


			</div>
			</center>
		</div>

	</body>
</html>


