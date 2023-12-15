<?php
include "../conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Status</title>
    <link rel="stylesheet" href="../assets/css/company_jobpost.css">
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <?php
    $company_id = $_SESSION['company_id'];
    $sql = "SELECT 
                c_jobpost.c_jobpost_id,
                c_jobpost.companyName,
                COUNT(application_log.application_log_id) AS total_applicants
            FROM 
                c_jobpost
            LEFT JOIN 
                application_log ON c_jobpost.c_jobpost_id = application_log.c_jobpost_id
            WHERE 
                c_jobpost.company_id = $company_id
            GROUP BY 
                c_jobpost.c_jobpost_id, c_jobpost.companyName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Job Post Progress</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Job Title</th><th>Total Applicants</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['companyName']}</td>";
            echo "<td>{$row['total_applicants']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No job posts or applicants found for this company.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
