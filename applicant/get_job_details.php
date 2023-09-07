<?php
// Include your database connection and necessary setup here
include '../conn.php';

if (isset($_GET['jobPostId'])) {
    $jobPostId = $_GET['jobPostId'];

    // Query to retrieve job details based on the job post ID
    $sql = "SELECT * FROM c_jobpost WHERE c_jobpost_id = $jobPostId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Apply styles to match the .col-2-content style
        $jobDetails = '<div class="col-2-content" style="display="flex"">'.'<div class="description">' .
            '<div class="desc-col-1" style="height: 40vh; background-color: #FFC47C; padding: 10px; margin: 5%; border: 2px solid #FFC47C; border-radius: 10px; flex: 1;">' .
            '<h2 style="font-size: 16px; font-weight: bold;">' . $row['jobTitle'] . '</h2>' .
            '<h3 style="font-size: 14px;">Company Name: ' . $row['companyName'] . '</h3>' .
            '<h3 style="font-size: 14px;">Company Industry: ' . $row['industry'] . '</h3>' .
            '<h3 style="font-size: 14px;">Work Location: ' . $row['workLocation'] . '</h3>' .
            '<h3 style="font-size: 14px;">Slots: ' . $row['slot'] . '</h3>' .
            '<h3 style="font-size: 14px;">Salary: ' . $row['salary'] . '</h3>' .
            '<h3 style="font-size: 14px;">Skills: ' . $row['skills'] . '</h3>' .
            '</div>' .
            '<div class="desc-col-2" style="flex: 0 0 30%;">' .
            '<div>' .
            '<img src="../assets/img/cityhall.png" alt="No image" srcset="" style="width: 100%;">' .
            '</div>' .
            '<a href="homepage.php" style="font-size: 12px; height: 1vh; position:absolute; margin: 10.9% 0;background-color: #9D1477; color: #fff; text-decoration: none; padding: 10px; border-radius: 10px; width: 50px;">Return</a>' .
            '<button style="margin-top: 90%; margin-left: 50%; margin-bottom: 5px; font-size: 10px; cursor: pointer; border: none; height: 4vh; width: 50%; background-color: #9D1477; color: #fff; border-radius: 10px; box-shadow: 0px 4px 4px 0px #BA3A96F7 inset; box-shadow: 0px 4px 4px 0px #00000040;">Apply</button>' .
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
