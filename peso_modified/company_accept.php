<?php
    include('../peso_function.php');
    $company_id = $_GET['company_id'];
    $query = "select * from `c_requests` where `company_id` = '$company_id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $companyName = $row['companyName'];
            $industry = $row['industry'];
            $contactPerson = $row['contactPerson'];
            $contactNum = $row['contactNum'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `c_accounttb` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `type`, `password`) VALUES (NULL, '$companyName', '$industry', '$contactPerson', '$contactNum', '$email', 'user', '$password');";
        }
        $query .= "DELETE FROM `c_requests` WHERE `c_requests`.`company_id` = '$company_id';";
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