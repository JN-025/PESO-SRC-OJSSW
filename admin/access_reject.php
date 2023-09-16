<?php
    include('../peso_function.php');
    $access_id = $_GET['access_id'];
    
    $query = "DELETE FROM `access_requests` WHERE `access_requests`.`access_id` = '$access_id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="homepage.php">Back</a>