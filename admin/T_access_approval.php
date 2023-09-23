<?php
    session_start(); //we need session for the log in thingy XD 
    include("../peso_function.php");
    if($_SESSION['login']!==true){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESO COMPANY Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/applicant_homepage.css">
    <link rel="stylesheet" href="../assets/css/admin_approval.css">
</head>
<body>
    <?php 
    include "../function.php";
    include "sidenav.php";
    include "topnav.php";
    ?>
    
    
    <div class="card1">
        
        <center>
        
        <?php
            
            $query = "select * from `access_requests` where accessType = 'Training';";
            if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $row){
                    ?>
                <div class="card2">
                <h2><?php echo $row['name'] ?></h2>
                <h3><?php echo $row['email'] ?></h3>

                <br> <br>
                  <h4><?php echo $row['message'] ?></h4>
                  <p>
                  <a href="T_access_accept.php?access_id=<?php echo $row['access_id'] ?>" class="btn btn-primary my-2">Accept</a>
                        <a href="access_reject.php?access_id=<?php echo $row['access_id'] ?>" class="btn btn-secondary my-2">Reject</a>
                  </p>
                <small><i><?php echo $row['date'] ?></i></small>
                </div>
        <?php
                }
            }else{
                echo "No Pending Requests.";
            }
        ?>

        </div>
        </center>
    </div>
   



</body>
</html>