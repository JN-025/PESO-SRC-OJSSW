<?php
    include('../peso_function.php');
    $C_access_id = $_GET['C_access_id'];
    $query = "select * from `c_access_requests` where `C_access_id` = '$C_access_id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `c_access_account` (`C_access_id`, `name`, `email`, `type`, `password`) VALUES (NULL, '$name', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `c_access_requests` WHERE `c_access_requests`.`C_access_id` = '$C_access_id';";
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