<?php
    include('../peso_function.php');
    $access_id = $_GET['access_id'];
    $peso_id = $_GET['peso_id'];
    $query = "SELECT * FROM `access_requests` WHERE `access_id` = '$access_id';";
    
    
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $peso_id = $row['peso_id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $insertQuery = "INSERT INTO `access_account` (`access_id`, `peso_id`, `name`, `email`, `type`, `password`) VALUES (NULL, '$peso_id', '$name', '$email', 'Training', '$password');";
        }
        $insertQuery .= "DELETE FROM `access_requests` WHERE `access_requests`.`access_id` = '$access_id';";
        if(performQuery($insertQuery)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occurred. Please try again.";
        }
    }else{
        echo "Error occurred.";
    }
    
?>
<br/><br/>
<a href="homepage.php">Back</a>
