<?php
$page_title = "Access";
include "../conn.php";
session_start();

$limit = 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $access_id = $_POST['access_id'];
    $new_status = $_POST['new_status'];

    $update_sql = "UPDATE access_account SET status = '$new_status' WHERE access_id = $access_id";
    $conn->query($update_sql);

    $_SESSION["success_popup"] = "Status Update Successfully";
    header("Location: #");
    exit();
}

$sql = "SELECT * FROM access_account ORDER BY date_added_at DESC LIMIT $offset, $limit";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Page</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
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

                if (index === 1 || index === 2 || index === 3 || index === 5) {
                    if (sortOrder * (x.innerHTML.toLowerCase().localeCompare(y.innerHTML.toLowerCase())) > 0) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (index === 4) {
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
</head>
<body>
<?php
include "../function.php";
include "topnav.php";
?>
<?php
    if(isset($_SESSION["success_popup"])){
    echo "<div class='form-modal' id='formModal'>
            <div class='form-modal-content'>
                    <div class='modal-col'>
                        <p>{$_SESSION['success_popup']}</p>
                    </div>
            </div>
        </div>";
    unset($_SESSION["success_popup"]);

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var formModal = document.getElementById('formModal');

            function hideModal() {
                formModal.style.display = 'none';
            }
            setTimeout(hideModal, 5000);

            formModal.addEventListener('click', hideModal);
        });
    </script>";
    }
?>
        <style>
            .form-modal{
                margin: 5px;
                cursor: pointer;
                right: 0;
                font-family: 'Poppins', sans-serif;
                position: fixed;
                width: 20%;
                opacity: 1;
                animation: fadeIn 0.5s ease-in-out forwards;
            }
            .form-modal-content{
                text-align: center;
                border-radius: 6px;
                right: 0;
                position: relative;
                background-color: #D9570E;
                padding: 20px;
                color: #fff;
                opacity: 0;
                animation: dropDown 0.5s ease-in-out 0.5s forwards;
            }
            .modal-end p{
                margin: 0;
                margin-bottom: 44px;
                text-align: center;
                color: #FAC819;
                font-family: Poppins;
                font-size: 36px;
                font-style: normal;
                font-weight: 900;
                line-height: normal;
            }
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @keyframes dropDown {
                0% {
                    transform: translateY(-50%);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            .close {
                position:absolute;
                color: #fff;
                top: 0;
                right: 0;
                margin: 20px;
                font-size: 28px;
                font-weight: bold;
                text-decoration: none;
            }

            .close:hover,
            .close:focus {
                color: black;
                cursor: pointer;
            }
            .pagination{
                transition: 0.4s;
            }
            .pagination a{
                padding: 10px;
                box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
                color: #000;
                text-decoration: none;
                font-size: 24px;
                margin: 0 5px;
                border-radius: 6px;
            }
            .pagination a:hover{
                color: #fff;
                padding: 10px;
                background-color: #B22623;
            }
            .pagination a.active{
                color: #fff;
                background-color: #B22623;
            }
            </style>
<div class="main-container">
<div class="table-content">
<h1>Approval Section</h1>
<h4>This list contains all of the user requesting for an access</h4>
<h4>Toggle the <span class="highlight-text">action buttons</span> to instantly update the <span class="highlight-text">Status</span></h4>

<table border="1" class="styled-table">
    <thead>
        <tr>
        <th onclick="sortTable(0)">ID No#<span id="arrow0"></span></th>
        <th onclick="sortTable(1)">Name <span id="arrow1"></span></th>
        <th onclick="sortTable(2)">Email <span id="arrow2"></span></th>
        <th onclick="sortTable(3)">Access Type <span id="arrow3"></span></th>
        <th onclick="sortTable(4)">Date Added <span id="arrow4"></span></th>
        <th onclick="sortTable(5)">Status <span id="arrow5"></span></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['access_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td>{$row['date_added_at']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='access_id' value='{$row['access_id']}'>";
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
<?php
$sql = "SELECT COUNT(*) AS total FROM access_account";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row['total'] / $limit);

echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='access.php?page=" . ($page - 1) . "'>&laquo; Prev</a>";
}
for ($i = 1; $i <= $total_pages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    echo "<a class='$activeClass' href='access.php?page=$i'>$i</a>";
}
if ($page < $total_pages) {
    echo "<a href='access.php?page=" . ($page + 1) . "'>Next &raquo;</a>";
}
    echo "</div>";
?>
</div>
</div>
</div>
</body>
</html>
