<?php
    include('../peso_function.php');
    $A_access_id = $_GET['A_access_id'];
    $query = "select * from `a_access_requests` where `A_access_id` = '$A_access_id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `a_access_account` (`A_access_id`, `name`, `email`, `type`, `password`) VALUES (NULL, '$name', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `a_access_requests` WHERE `a_access_requests`.`A_access_id` = '$A_access_id';";
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