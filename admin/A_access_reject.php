<?php
    include('../peso_function.php');
    $A_access_id = $_GET['A_access_id'];
    
    $query = "DELETE FROM `a_access_requests` WHERE `a_access_requests`.`A_access_id` = '$A_access_id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="homepage.php">Back</a>