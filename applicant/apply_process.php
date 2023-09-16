<?php
include '../conn.php';

session_start();
$alertmsg = "";
if (isset($_SESSION['applicant_id'])) {
    $applicantId = $_SESSION['applicant_id'];
} else {
    $alertmsg = "<div class='popup popup-danger'><h1>Process Error, please try again</h1></div>";
    exit;
}

if (isset($_POST['applyButton'])) {
    $jobPostId = $_POST['jobPostId'];

    $insertSql = "INSERT INTO application_log (c_jobpost_id, applicant_id, date_requested, status)
                 VALUES ('$jobPostId', '$applicantId', NOW(), 'Pending')";

    if (mysqli_query($conn, $insertSql)) {
        $alertmsg = "<div class='popup popup-success'><h1>Your Request has been sent!</h1><h4>An email will be sent to you quickly once your request has been approved or rejected.</h4><h5>Please be patient.</h5></div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form submission error.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio&family=Lato:ital,wght@0,300;1,300&family=Lilita+One&family=Luckiest+Guy&family=Mohave&family=Roboto+Serif:ital,opsz,wght@0,8..144,400;1,8..144,200&display=swap');
    body {
        margin: 0;
        padding: 0;
    }

    .popup-container {
        font-family: 'Mohave', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
    }
    .popup {
        text-align: center;
    }
    .popup a{
        border-radius: 14px; 
        font-size: 22px; 
        padding: 5px 50px; 
        text-decoration: none; 
        background-color: #A81E1E; 
        color:#fff;
    }
    .popup h1{
        color: #A81E1E;
    }
    .popup .bi{
        font-size: 150px;
        color: #42ba96;
    }
    </style>
</head>
<body>
    <?php
    include "topnav.php";
    ?>
    <div class="popup-container">
        <div class="popup">
        <i class="bi bi-check-circle"></i>
            <?php echo $alertmsg; ?>
            <a href="find_jobs.php">Return</a>
        </div>
    </div>
</body>
</html>