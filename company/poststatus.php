<?php
include "../conn.php";
session_start();
$company_id = $_SESSION['company_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Status</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/company_status.css">
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="company-container">
        <div class="status">
        <?php
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
            echo "<h1>List of Applicant</h1>";
            echo "<h3>All of the applicants that applied are being recorded</h3>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Job Title</th>";
            echo "<th>Total Applicants</th>";
            echo "<th>Load Table</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['companyName']}</td>";
                echo "<td>{$row['total_applicants']}</td>";
                echo "<th><a>Load</a></th>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No job posts or applicants found for this company.</p>";
        }

        $conn->close();
        ?>
        </div>
        <!---------------------------------Request Table----------------------------->
        <?php
include "../conn.php";
$limit = 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_log_id = $_POST['application_log_id'];
    $new_status = $_POST['new_status'];

    $update_sql = "UPDATE application_log SET status = '$new_status' WHERE application_log_id = $application_log_id";
    $conn->query($update_sql);

    $notification_sql = "INSERT INTO notifications (applicant_id, title, description, date_added_at)
                         SELECT applicant_id, 'Application Status Update', 'Your job application request has been $new_status', NOW()
                         FROM application_log
                         WHERE application_log_id = $application_log_id";
    $conn->query($notification_sql);


    $_SESSION["success_popup"] = "Status Update Successfully";
    header("Location: #");
    exit();
}

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
        ORDER BY 
            application_log.date_added_at DESC
        LIMIT 
            $offset, $limit";
$result = $conn->query($sql);

$conn->close();
?>
        <script>
$(document).ready(function () {
    var sortOrder = 1;

    $("table").on("click", "th", function () {
        var index = $(this).index();
        sortTable(index);

        for (var i = 0; i < 7; i++) {
            $("#arrow" + i).html("");
        }

        var arrowIcon = sortOrder === 1 ? "&#9650;" : "&#9660;";
        $("#arrow" + index).html(arrowIcon);
    });

    function sortTable(index) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector("table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[index];
                y = rows[i + 1].getElementsByTagName("td")[index];

                if (index === 1 || index === 2 || index === 3 || index === 4 || index === 5 || index === 6) {
                    if (sortOrder * (x.innerHTML.toLowerCase().localeCompare(y.innerHTML.toLowerCase())) > 0) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (index === 7) {
                    var dateX = new Date(x.innerHTML);
                    var dateY = new Date(y.innerHTML);
                    if (sortOrder * (dateX - dateY) > 0) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (sortOrder * (parseFloat(x.innerHTML) - parseFloat(y.innerHTML)) > 0) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }

        sortOrder *= -1;
    }
});

    </script>
        <table border="1" class="styled-table">
    <thead>
        <tr>
        <th onclick="sortTable(0)">ID No#<span id="arrow0"></span></th>
        <th onclick="sortTable(2)">Name <span id="arrow2"></span></th>
        <th onclick="sortTable(3)">Date Added <span id="arrow3"></span></th>
        <th onclick="sortTable(4)">Status <span id="arrow4"></span></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
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
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>
