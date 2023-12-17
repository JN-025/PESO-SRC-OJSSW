<?php

require '../../../conn.php';

session_start();
// Include config file
include "../../../conn.php";
$alert = ""; 
if (!isset($_SESSION['access_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: homepage.php");
    exit();
}



if(isset($_POST['save_applicant']))
{

    $access_id = mysqli_real_escape_string($conn, $_SESSION['access_id']);
    

    $nsrsNum = mysqli_real_escape_string($conn, $_POST['nsrsNum']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
    $jobseekerType = mysqli_real_escape_string($conn, $_POST['jobseekerType']);
    $employmentStatus = mysqli_real_escape_string($conn, $_POST['employmentStatus']);
    $educLevel = mysqli_real_escape_string($conn, $_POST['educLevel']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $preferWork = mysqli_real_escape_string($conn, $_POST['preferWork']);
    $preferIndustry = mysqli_real_escape_string($conn, $_POST['preferIndustry']);
    $preferLocation = mysqli_real_escape_string($conn, $_POST['preferLocation']);


    if($access_id == NULL || $nsrsNum == NULL || $firstname == NULL || $lastname == NULL || $address == NULL || $contactNum == NULL || $jobseekerType == NULL || $employmentStatus == NULL || $educLevel == NULL || $preferWork == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM wapplicant WHERE nsrsNum='$nsrsNum'")) > 0) {
        $res = [
            'status' => 200,
            'message' => 'Applicant Created Existed'
        ];
        echo json_encode($res);
        return;
    }

    

    $query = "INSERT INTO wapplicant (access_id,nsrsNum,firstname,middlename,lastname,suffix,address,email,contactNum,jobseekerType,employmentStatus,educLevel,course,preferWork,preferIndustry,preferLocation) VALUES ('$access_id','$nsrsNum','$firstname','$middlename','$lastname','$suffix','$address','$email','$contactNum','$jobseekerType','$employmentStatus','$educLevel','$course','$preferWork','$preferIndustry','$preferLocation')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Applicant Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Applicant Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_applicant']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    $nsrsNum = mysqli_real_escape_string($conn, $_POST['nsrsNum']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
    $jobseekerType = mysqli_real_escape_string($conn, $_POST['jobseekerType']);
    $employmentStatus = mysqli_real_escape_string($conn, $_POST['employmentStatus']);
    $educLevel = mysqli_real_escape_string($conn, $_POST['educLevel']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $preferWork = mysqli_real_escape_string($conn, $_POST['preferWork']);
    $preferIndustry = mysqli_real_escape_string($conn, $_POST['preferIndustry']);
    $preferLocation = mysqli_real_escape_string($conn, $_POST['preferLocation']);

    if($nsrsNum == NULL || $firstname == NULL || $lastname == NULL || $address == NULL || $contactNum == NULL || $jobseekerType == NULL || $employmentStatus == NULL || $educLevel == NULL || $preferWork == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

   

    $query = "UPDATE wapplicant SET nsrsNum='$nsrsNum', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', address='$address', email='$email', contactNum='$contactNum', jobseekerType='$jobseekerType', employmentStatus='$employmentStatus', educLevel='$educLevel', course='$course', preferWork='$preferWork', preferIndustry='$preferIndustry', preferLocation='$preferLocation' 
                WHERE wapplicant_id='$applicant_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Applicant Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Applicant Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['applicant_id']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_GET['applicant_id']);

    $query = "SELECT * FROM wapplicant WHERE wapplicant_id='$applicant_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $applicant = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Applicant Fetch Successfully by id',
            'data' => $applicant
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Applicant Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_applicant']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    $query = "DELETE FROM wapplicant WHERE wapplicant_id='$applicant_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Applicant Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Applicant Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
