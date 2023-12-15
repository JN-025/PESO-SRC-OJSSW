<?php

require '../conn.php';

session_start();
// Include config file
include "../conn.php";
$alert = ""; 
if (!isset($_SESSION['spes_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: homepage.php");
    exit();
}



if(isset($_POST['save_profile']))
{

    $spes_id = mysqli_real_escape_string($conn, $_SESSION['spes_id']);
    

    $householdNum = mysqli_real_escape_string($conn, $_POST['householdNum']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $civilStatus = mysqli_real_escape_string($conn, $_POST['civilStatus']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $educAttainment = mysqli_real_escape_string($conn, $_POST['educAttainment']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $employmentStatus = mysqli_real_escape_string($conn, $_POST['employmentStatus']);
    $employmentType = mysqli_real_escape_string($conn, $_POST['employmentType']);
    $arrivalDate = mysqli_real_escape_string($conn, $_POST['arrivalDate']);
    $disabilityType = mysqli_real_escape_string($conn, $_POST['disabilityType']);
    $encodedBy = mysqli_real_escape_string($conn, $_POST['encodedBy']);


    if($spes_id == NULL || $householdNum == NULL || $lastname == NULL || $firstname == NULL || $birthday == NULL || $age == NULL || $sex == NULL || $civilStatus == NULL || $address == NULL || $brgy == NULL || $educAttainment == NULL || $status == NULL || $employmentStatus == NULL || $encodedBy == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM profiling_task WHERE householdNum='$householdNum' && lastname='$lastname' && firstname='$firstname' && middlename='$middlename' && suffix='$suffix' && birthday='$birthday' && age='$age' && sex='$sex' && civilStatus='$civilStatus' && address='$address' && brgy='$brgy' && educAttainment='$educAttainment' && status='$status' && employmentStatus='$employmentStatus' && employmentType='$employmentType' && arrivalDate='$arrivalDate' && disabilityType='$disabilityType'")) > 0) {
        $res = [
            'status' => 200,
            'message' => 'Profile Created Existed'
        ];
        echo json_encode($res);
        return;
    }

    

    $query = "INSERT INTO profiling_task (spes_id,householdNum,lastname,firstname,middlename,suffix,birthday,age,sex,civilStatus,address,brgy,educAttainment,status,employmentStatus,employmentType,arrivalDate,disabilityType,encodedBy) VALUES ('$spes_id','$householdNum','$lastname','$firstname','$middlename','$suffix','$birthday','$age','$sex','$civilStatus','$address','$brgy','$educAttainment','$status','$employmentStatus','$employmentType','$arrivalDate','$disabilityType','$encodedBy')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Profile Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Profile Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_profile']))
{
    $profile_id = mysqli_real_escape_string($conn, $_POST['profile_id']);

    $householdNum = mysqli_real_escape_string($conn, $_POST['householdNum']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $employmentStatus = mysqli_real_escape_string($conn, $_POST['employmentStatus']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $civilStatus = mysqli_real_escape_string($conn, $_POST['civilStatus']);
    $employmentType = mysqli_real_escape_string($conn, $_POST['employmentType']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $arrivalDate = mysqli_real_escape_string($conn, $_POST['arrivalDate']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $disabilityType = mysqli_real_escape_string($conn, $_POST['disabilityType']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $educAttainment = mysqli_real_escape_string($conn, $_POST['educAttainment']);
    $encodedBy = mysqli_real_escape_string($conn, $_POST['encodedBy']);

    if($householdNum == NULL || $lastname == NULL || $firstname == NULL || $birthday == NULL || $age == NULL || $sex == NULL || $civilStatus == NULL || $address == NULL || $brgy == NULL || $educAttainment == NULL || $status == NULL || $employmentStatus == NULL|| $encodedBy == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

   

    $query = "UPDATE profiling_task SET householdNum='$householdNum', lastname='$lastname', firstname='$firstname', middlename='$middlename', suffix='$suffix', birthday='$birthday', age='$age', sex='$sex', civilStatus='$civilStatus', address='$address', brgy='$brgy', educAttainment='$educAttainment', status='$status', employmentStatus='$employmentStatus', employmentType='$employmentType', arrivalDate='$arrivalDate', disabilityType='$disabilityType', encodedBy='$encodedBy' 
                WHERE profiling_id='$profile_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Profile Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Profile Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['profile_id']))
{
    $profile_id = mysqli_real_escape_string($conn, $_GET['profile_id']);

    $query = "SELECT * FROM profiling_task WHERE profiling_id='$profile_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $profile = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Profile Fetch Successfully by id',
            'data' => $profile
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Profile Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_profile']))
{
    $profile_id = mysqli_real_escape_string($conn, $_POST['profile_id']);

    $query = "DELETE FROM profiling_task WHERE profiling_id='$profile_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Profile Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Profile Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
