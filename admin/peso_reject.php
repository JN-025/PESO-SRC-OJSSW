<?php
    include('../peso_function.php');
    $id = $_GET['peso_id'];
    
    $query = "DELETE FROM `p_requests` WHERE `p_requests`.`peso_id` = '$peso_id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="homepage.php">Back</a>