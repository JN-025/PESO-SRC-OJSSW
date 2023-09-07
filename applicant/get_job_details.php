<?php
include '../conn.php';

if (isset($_GET['jobPostId'])) {
    $jobPostId = $_GET['jobPostId'];

    $sql = "SELECT * FROM c_jobpost WHERE c_jobpost_id = $jobPostId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $jobDetails = '<div class="col-2-content" style="display="flex"">'.'<div class="description"style="position:relative;height: 40vh;">' .
            '<div class="desc-col-1" style="height: 20vh; background-color: #FFC47C; padding: 10px; margin: 5%; border: 2px solid none; border-radius: 10px; flex: 1;">' .
            '<h2 style="margin-bottom: 10px;font-size: 30px; font-weight: bold;">' . $row['jobTitle'] . '</h2>' .
            '<h3 style="font-size: 14px;">Company Name: <span style="font-weight:400">' . $row['companyName'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Company Industry: <span style="font-weight:400">' . $row['industry'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Work Location: <span style="font-weight:400">' . $row['workLocation'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Slots: <span style="font-weight:400">' . $row['slot'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Salary: <span style="font-weight:400">' . $row['salary'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Skills: <span style="font-weight:400">' . $row['skills'] . '</span></h3>' .
            '</div>' .
            '<div class="desc-col-2" style="position:relative;flex: 0 0 30%;">' .
            '<div>' .
            '<img src="' . $row['img'] . '" alt="" srcset="../assets/img/default-img.jpg" style="border-radius:10px;">' .
            '</div>' .

            '<button style="position:absolute;bottom:0;">Apply</button>' .
            '</div>' .
            '</div>';

        echo $jobDetails;
    } else {
        echo "Job details not found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
