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
    <link rel="stylesheet" href="../assets/css/company_approval.css">
    
</head>
<body>
    <?php 
    include "../function.php";
    include "company_sidenav.php";
    include "topnav.php";
    ?>
    
    
    <div class="card1">
        <center>
        
        <?php
            
            $query = "select * from `c_requests` where companyType = 'Direct Company';";
            if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $row){
                    ?>
                <div class="card2">
                    <div class="card3">
                        <h3><b>Company Name:  </b><?php echo $row["companyName"]; ?></h3>
                        <h3><b>Company Industry:  </b><?php echo $row["industry"]; ?></h3>
                        <h3><b>Contact Person:  </b><?php echo $row["contactPerson"]; ?></h3>
                        <h3><b>Contact Number:  </b><?php echo $row["contactNum"]; ?></h3>
                        <h3><b>Email Address:  </b><?php echo $row["email"]; ?></h3>
                        <h3><b>Type of Company:  </b><?php echo $row["companyType"]; ?></h3>
                        <h3><b>Registration Date:  </b><?php echo $row["date"]; ?></h3>
                        
                    </div>
                    <br>
                  <a href="company_accept.php?company_id=<?php echo $row['company_id'] ?>" class="approve">Approve</a>
                        <a href="company_reject.php?company_id=<?php echo $row['company_id'] ?>" class="reject">Reject</a>
                  </p>
                  
                </div>
        <?php
                }
            }else{
                echo "No Pending Requests.";
            }
        ?>


<?php
            
            $query = "select * from `c_requests` where companyType = 'Local Manpower Agency';";
            if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $row){
                    ?>
                <div class="card2">
                <h2><?php echo $row['companyName'] ?> </h2>
                <h3><?php echo $row['email'] ?></h3>
                <h3>Local Power Agency</h3>

                <br> <br>
                  <h4><?php echo $row['message'] ?></h4>
                  <p>
                    <br>
                  <a href="company_accept.php?company_id=<?php echo $row['company_id'] ?>" class="approve">Approve</a>
                        <a href="company_reject.php?company_id=<?php echo $row['company_id'] ?>" class="reject">Reject</a>
                  </p>
                  <br>
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