<?php
    include('../peso_function.php');
    $peso_id = $_GET['peso_id'];
    $query = "select * from `p_requests` where `peso_id` = '$peso_id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['name'];
            $position = $row['position'];
            $contactNum = $row['contactNum'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `p_accounttb` (`peso_id`, `name`, `position`, `contactNum`, `email`, `type`, `password`) VALUES (NULL, '$name', '$position', '$contactNum', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `p_requests` WHERE `p_requests`.`peso_id` = '$peso_id';";
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