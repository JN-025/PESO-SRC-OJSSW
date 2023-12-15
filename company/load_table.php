<?php
include "../conn.php"; // Include your database connection file

if (isset($_GET['jobpost_id']) && isset($_GET['company_id'])) {
    $jobpost_id = $_GET['jobpost_id'];
    $company_id = $_GET['company_id'];

    // Fetch data for the applicant table based on the selected jobpost_id and company_id
    $sql = "SELECT 
                application_log.application_log_id,
                c_jobpost.companyName,
                CONCAT(a_accounttb.lastname, ', ', a_accounttb.firstname, ' ', a_accounttb.middlename) AS fullname,
                application_log.date_added_at,
                application_log.status
            FROM 
                application_log
            INNER JOIN 
                c_jobpost ON application_log.c_jobpost_id = c_jobpost.c_jobpost_id
            INNER JOIN 
                a_accounttb ON application_log.applicant_id = a_accounttb.applicant_id
            INNER JOIN
                applicant_profile ON application_log.applicant_id = applicant_profile.applicant_id
            WHERE 
                c_jobpost.company_id = $company_id
                AND c_jobpost.c_jobpost_id = $jobpost_id
            ORDER BY 
                application_log.date_added_at DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' class='styled-table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID No#</th>";
        echo "<th>Name</th>";
        echo "<th>Date Added</th>";
        echo "<th>Status</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            $formattedDate = date("F j, Y | g:i A", strtotime($row['date_added_at']));
            echo "<tr>";
            echo "<td>{$row['application_log_id']}</td>";
            echo "<td>{$row['fullname']}</td>";
            echo "<td>{$formattedDate}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='application_log_id' value='{$row['application_log_id']}'>";
            echo "<select name='new_status'>";
            echo "<option value='{$row['status']}' selected hidden>{$row['status']}</option>";
            echo "<option value='Approved'>Approved</option>";
            echo "<option value='Rejected'>Rejected</option>";
            echo "</select>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No records found</p>";
    }
} else {
    echo "<p>Invalid request. Missing jobpost_id parameter.</p>";
}

$conn->close();
?>