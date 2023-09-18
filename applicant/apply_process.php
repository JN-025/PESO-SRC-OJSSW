<?php
include '../conn.php';

session_start();
$alertmsg = "";
if (isset($_SESSION['applicant_id'])) {
    $applicantId = $_SESSION['applicant_id'];
} else {
    header("location: index.php");
    exit();
}

if (isset($_POST['applyButton'])) {
    $jobPostId = $_POST['jobPostId'];
    $answer_1 = $_POST["answer_1"];
    $answer_2 = $_POST["answer_2"];
    $answer_3 = $_POST["answer_3"];
    $answer_4 = $_POST["answer_4"];
    $answer_5 = $_POST["answer_5"];

    $insertSql = "INSERT INTO application_log (c_jobpost_id, applicant_id, date_requested, status, answer_1, answer_2, answer_3, answer_4, answer_5)
                 VALUES (?, ?, NOW(), 'Pending', ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertSql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iisssss", $jobPostId, $applicantId, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5);

        if (mysqli_stmt_execute($stmt)) {
            $alertmsg = "<div class='popup popup-success'><i class='bi bi-check-circle'></i><h1>Your Request has been sent!</h1><h4>An email will be sent to you quickly once your request has been approved or rejected.</h4><h5>Please be patient.</h5></div>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    header("location: find_jobs.php");
    exit();
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
            <?php echo $alertmsg; ?>
            <a href="find_jobs.php">Return</a>
        </div>
    </div>
</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>