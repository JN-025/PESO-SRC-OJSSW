<?php
include '../conn.php';

if (isset($_GET['jobPostId'])) {
    $jobPostId = $_GET['jobPostId'];

    $sql = "SELECT * FROM c_jobpost WHERE c_jobpost_id = $jobPostId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $jobDetails = '<div class="col-2-content" style="display="flex"">'.'<div class="description"style="position:relative;max-height: calc(100vh - 20px); ">' .
            '<div class="desc-col-1" style="padding: 10px; margin: 0; border: 2px solid none; border-radius: 10px; flex: 1;">' .
            '<h2 style="margin-bottom: 10px;font-size: 30px; font-weight: bold;">' . $row['jobTitle'] . '</h2>' .
            '<h3 style="font-size: 14px;">Company Name: <span style="font-weight:400">' . $row['companyName'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Company Industry: <span style="font-weight:400">' . $row['industry'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Work Location: <span style="font-weight:400">' . $row['workLocation'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Slots: <span style="font-weight:400">' . $row['slot'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Salary: <span style="font-weight:400">' . $row['salary'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Skills: <span style="font-weight:400">' . $row['skills'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Description: <span style="font-weight:400">' . '<p style="text-align: justify;">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mi purus, aliquam in ipsum sit amet, tristique molestie orci. Proin fermentum turpis vitae varius viverra. Mauris placerat sodales sollicitudin. Sed scelerisque velit accumsan dui imperdiet mollis id fermentum orci. Donec vehicula neque ut orci posuere, ac tempus lacus viverra. Suspendisse in magna at risus mattis egestas ut et mi. In accumsan pellentesque cursus. Nam sollicitudin pulvinar arcu. Pellentesque volutpat ipsum nulla, quis venenatis erat dapibus laoreet.
            <br><br>
            &nbsp;&nbsp;Duis egestas, diam a tincidunt lobortis, libero sapien tempus eros, ac pulvinar libero augue eget arcu. Etiam risus odio, auctor ac convallis sit amet, rutrum et risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin at accumsan leo, eget placerat ipsum. Duis tellus diam, congue eget risus sed, pharetra sollicitudin augue. In posuere felis quis semper scelerisque. Fusce nec sem non arcu tincidunt varius.</p>' . '</span></h3>' .
            '</div>' .
            '<div class="desc-col-2" style="position:relative;flex: 0 0 30%;">' .
            '<div>' .
            '<img style="width:150px;height: 150px;border-radius:10px;"src="' . $row['img'] . '" alt="">' .
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
