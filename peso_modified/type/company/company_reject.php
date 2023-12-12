<?php
    include('../peso_function.php');
    $company_id = $_GET['company_id'];
    
    $query = "DELETE FROM `c_requests` WHERE `c_requests`.`company_id` = '$company_id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="homepage.php">Back</a>