<?php

require '../conn.php';

$page_title = "Walk-in";
session_start();
// Include config file

$alert = ""; 
if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: homepage.php");
    exit();
}


if(isset($_POST['save_company']))
{
    $peso_id = mysqli_real_escape_string($conn, $_SESSION['peso_id']);

    $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $profileName = mysqli_real_escape_string($conn, $_POST['profileName']);
    $companyWeb = mysqli_real_escape_string($conn, $_POST['companyWeb']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $companyType = mysqli_real_escape_string($conn, $_POST['companyType']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $companySize = mysqli_real_escape_string($conn, $_POST['companySize']);
    $regNum = mysqli_real_escape_string($conn, $_POST['regNum']);
    $workingHrs = mysqli_real_escape_string($conn, $_POST['workingHrs']);
    $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
    $dressCode = mysqli_real_escape_string($conn, $_POST['dressCode']);
    $contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
    $spokenLanguage = mysqli_real_escape_string($conn, $_POST['spokenLanguage']);

    if($peso_id == NULL || $companyName == NULL || $email == NULL || $profileName == NULL || $companyWeb == NULL || $industry == NULL || $companyType == NULL || $address == NULL || $companySize == NULL || $regNum == NULL || $workingHrs == NULL || $contactNum == NULL || $dressCode == NULL || $contactPerson == NULL || $spokenLanguage == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }


    $query = "INSERT INTO wcompany (peso_id,companyName,email,profileName,companyWeb,industry,companyType,address,companySize,regNum,workingHrs,contactNum,dressCode,contactPerson,spokenLanguage) VALUES ('$peso_id', '$companyName','$email','$profileName','$companyWeb','$industry','$companyType','$address','$companySize','$regNum','$workingHrs','$contactNum','$dressCode','$contactPerson','$spokenLanguage')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Company Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Company Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_company']))
{
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);

    $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $profileName = mysqli_real_escape_string($conn, $_POST['profileName']);
    $companyWeb = mysqli_real_escape_string($conn, $_POST['companyWeb']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $companyType = mysqli_real_escape_string($conn, $_POST['companyType']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $companySize = mysqli_real_escape_string($conn, $_POST['companySize']);
    $regNum = mysqli_real_escape_string($conn, $_POST['regNum']);
    $workingHrs = mysqli_real_escape_string($conn, $_POST['workingHrs']);
    $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
    $dressCode = mysqli_real_escape_string($conn, $_POST['dressCode']);
    $contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
    $spokenLanguage = mysqli_real_escape_string($conn, $_POST['spokenLanguage']);

    

    if($companyName == NULL || $email == NULL || $profileName == NULL || $companyWeb == NULL || $industry == NULL || $companyType == NULL || $address == NULL || $companySize == NULL || $regNum == NULL || $workingHrs == NULL || $contactNum == NULL || $dressCode == NULL || $contactPerson == NULL || $spokenLanguage == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE wcompany SET companyName='$companyName', email='$email', profileName='$profileName', companyWeb='$companyWeb', industry='$industry', companyType='$companyType', address='$address', companySize='$companySize', regNum='$regNum', workingHrs='$workingHrs', contactNum='$contactNum', dressCode='$dressCode', contactPerson='$contactPerson', spokenLanguage='$spokenLanguage' 
                WHERE id='$company_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Company Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Company Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['company_id']))
{
    $company_id = mysqli_real_escape_string($conn, $_GET['company_id']);

    $query = "SELECT * FROM wcompany WHERE id='$company_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $company = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Company Fetch Successfully by id',
            'data' => $company
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Company Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_company']))
{
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);

    $query = "DELETE FROM wcompany WHERE id='$company_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Company Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Company Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
