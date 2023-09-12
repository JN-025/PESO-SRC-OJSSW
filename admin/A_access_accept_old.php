<?php
    include('../peso_function.php');
    $access_id = $_GET['access_id'];
    $peso_id = $_GET['peso_id'];
    $query = "select * from `access_requests` where `access_id` = '$access_id' ;";
    
    
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $peso_id = $_row['peso_id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `access_account` (`access_id`, `peso_id`, `name`, `email`, `type`, `password`) VALUES (NULL, '$peso_id', '$name', '$email', 'Applicant', '$password');";
        }
        $query .= "DELETE FROM `access_requests` WHERE `access_requests`.`access_id` = '$access_id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="homepage.php">Back</a>