<?php
    include('../peso_function.php');
    $C_access_id = $_GET['C_access_id'];
    
    $query = "DELETE FROM `c_access_requests` WHERE `c_access_requests`.`C_access_id` = '$C_access_id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="homepage.php">Back</a>