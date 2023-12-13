<?php
$page_title = "Approval";
include "../conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso_id = $_POST['peso_id'];
    $new_status = $_POST['new_status'];

    $update_sql = "UPDATE p_accounttb SET status = '$new_status' WHERE peso_id = $peso_id";
    $conn->query($update_sql);

    $_SESSION["success_popup"] = "Status Update Successfully";
    header("Location: homepage.php");
    exit();
}

$sql = "SELECT * FROM p_accounttb";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script>
        $(document).ready(function () {
            var sortOrder = 1;

            $("table").on("click", "th", function () {
                var index = $(this).index();
                sortTable(index);
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

                        if (index === 1 || index === 3) {
                            if (sortOrder * (parseFloat(x.innerHTML) - parseFloat(y.innerHTML)) > 0) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (index === 6) {
                            var dateX = new Date(x.innerHTML);
                            var dateY = new Date(y.innerHTML);
                            if (sortOrder * (dateX - dateY) > 0) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (index === 2 || index === 4) {
                            if (sortOrder * (x.innerHTML.toLowerCase().localeCompare(y.innerHTML.toLowerCase())) > 0) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (sortOrder * (x.innerHTML.localeCompare(y.innerHTML)) > 0) {
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
</head>
<body>
<?php
include "../function.php";
include "sidenav.php";
include "topnav.php";
?>
<div class="main-container">
<div class="table-content">
<h1>Approval Section</h1>
<h4>This list contains all of the user requesting for an access</h4>
<h4>Toggle the <span class="highlight-text">action buttons</span> to instantly update the <span class="highlight-text">Status</span></h4>

<table border="1" class="styled-table">
    <thead>
        <tr>
            <th>Peso ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['peso_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['position']}</td>";
                echo "<td>{$row['contactNum']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['date_added_at']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='peso_id' value='{$row['peso_id']}'>";
                echo "<select name='new_status'>";
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
</div>
</body>
</html>
