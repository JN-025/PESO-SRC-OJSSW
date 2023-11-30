<?php

require 'C_dbcon.php';

if(isset($_POST['save_company']))
{
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $profileName = mysqli_real_escape_string($con, $_POST['profileName']);
    $companyWeb = mysqli_real_escape_string($con, $_POST['companyWeb']);
    $industry = mysqli_real_escape_string($con, $_POST['industry']);
    $companyType = mysqli_real_escape_string($con, $_POST['companyType']);
    $regNum = mysqli_real_escape_string($con, $_POST['regNum']);
    $workingHrs = mysqli_real_escape_string($con, $_POST['workingHrs']);
    $contactNum = mysqli_real_escape_string($con, $_POST['contactNum']);
    $dressCode = mysqli_real_escape_string($con, $_POST['dressCode']);
    $contactPerson = mysqli_real_escape_string($con, $_POST['contactPerson']);
    $companySize = mysqli_real_escape_string($con, $_POST['companySize']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $spokenLanguage = mysqli_real_escape_string($con, $_POST['spokenLanguage']);

    if($companyName == NULL || $email == NULL || $profileName == NULL || $companyWeb == NULL || $industry == NULL || $companyType == NULL || $regNum == NULL || $workingHrs == NULL || $contactNum == NULL || $dressCode == NULL || $contactPerson == NULL || $companySize == NULL || $address == NULL || $spokenLanguage == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO wcompany (companyName,email,profileName,companyWeb,industry,companyType,regNum,workingHrs,contactNum,dressCode,contactPerson,companySize,address,spokenLanguage) VALUES ('$companyName','$email','$profileName','$companyWeb','$industry','$companyType','$regNum','$workigHrs','$contactNum','$dressCode','$contactPerson','$companySize','$address','$spokenLanguage')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Company Added Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Company Not Added'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_company']))
{
    $company_id = mysqli_real_escape_string($con, $_POST['company_id']);

    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $profileName = mysqli_real_escape_string($con, $_POST['profileName']);
    $companyWeb = mysqli_real_escape_string($con, $_POST['companyWeb']);
    $industry = mysqli_real_escape_string($con, $_POST['industry']);
    $companyType = mysqli_real_escape_string($con, $_POST['companyType']);
    $regNum = mysqli_real_escape_string($con, $_POST['regNum']);
    $workingHrs = mysqli_real_escape_string($con, $_POST['workingHrs']);
    $contactNum = mysqli_real_escape_string($con, $_POST['contactNum']);
    $dressCode = mysqli_real_escape_string($con, $_POST['dressCode']);
    $contactPerson = mysqli_real_escape_string($con, $_POST['contactPerson']);
    $companySize = mysqli_real_escape_string($con, $_POST['companySize']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $spokenLanguage = mysqli_real_escape_string($con, $_POST['spokenLanguage']);

    if($companyName == NULL || $email == NULL || $profileName == NULL || $companyWeb == NULL || $industry == NULL || $companyType == NULL || $regNum == NULL || $workingHrs == NULL || $contactNum == NULL || $dressCode == NULL || $contactPerson == NULL || $companySize == NULL || $address == NULL || $spokenLanguage == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE wcompany SET companyName='$companyName', email='$email', profileName='$profileName', companyWeb='$companyWeb', industry='$industry', companyType='$companyType', regNum='$regNum', workingHrs='$workingHrs', contactNum='$contactNum', dressCode='$dressCode', contactPerson='$contactPerson', companySize='$companySize', address='$address', spokenLanguage='$spokenLanguage' 
                WHERE id='$company_id'";
    $query_run = mysqli_query($con, $query);

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
    $company_id = mysqli_real_escape_string($con, $_GET['company_id']);

    $query = "SELECT * FROM wcompany WHERE id='$company_id'";
    $query_run = mysqli_query($con, $query);

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
    $company_id = mysqli_real_escape_string($con, $_POST['company_id']);

    $query = "DELETE FROM wcompany WHERE id='$company_id'";
    $query_run = mysqli_query($con, $query);

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
