<?php
@session_start();
include '../conn.php';
$applicant_id = $_SESSION["applicant_id"];
$query = "SELECT lastname, firstname FROM a_accounttb WHERE applicant_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $applicant_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$lastname = $row['lastname'];
$firstname = $row['firstname'];
?>
<link rel="stylesheet" href="..assets/css/applicant_sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<body>
<div class="topside-container">
    <div class="sidenav">
        <div class="profile_img">
        <a href="#" class="noHover">
            <img src="../assets/img/ojssw.png">
        </a>
        </div>
        <div class="col-side">
        <a href="homepage.php" <?php echo isActivePage("homepage.php"); ?>><i class="bi bi-house-door"></i>&nbsp;Home</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-file-post"></i>&nbsp;Find Jobs</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-search"></i>&nbsp;Urgent Hiring</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-bell" style="font-size:20px"></i>&nbsp;Applicant</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-person-lines-fill"></i>&nbsp;Settings</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-sliders2"></i>&nbsp;More Details</a>
        <a class="signout"href="signout.php" <?php echo isActivePage("signout.php"); ?>><i class="bi bi-box-arrow-left"></i>&nbsp;Log Out</a>
        </div>
</div>
    <div class="topnav">
            <h1>Home</h1>
            <div class="active-user">
            <button id="dropdown-button" class="link-button" onclick="toggleDropdown()">
                <span id="dropdown-text"><?php echo $lastname . ', ' . $firstname; ?></span>
                <i class="bi bi-caret-down-fill"></i>
            </button>
        </div>
        <div id="dropdown-menu" style="display: none;">
        <ul>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="signout.php">Logout</a></li>
            </ul>
        </div>
    </div>
<script>
    var isOpen = false;

function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    var dropdownButton = document.getElementById("dropdown-button");
    var dropdownIcon = dropdownButton.querySelector(".bi-caret-down-fill");

    if (isOpen) {
        dropdownMenu.style.display = "none";
        dropdownButton.style.border = "none";
        dropdownButton.style.background = "none";
        dropdownIcon.style.transform = "rotate(0deg)";
    } else {
        var rect = dropdownButton.getBoundingClientRect();
        dropdownMenu.style.position = "absolute";
        dropdownMenu.style.top = rect.bottom + "px";
        dropdownMenu.style.left = rect.left + "px";
        dropdownMenu.style.display = "block";
        dropdownMenu.style.zIndex = "2";
        dropdownButton.style.border = "1px solid #ccc";
        dropdownButton.style.background = "#f9f9f9";
        dropdownIcon.style.transform = "rotate(180deg)";
    }

    isOpen = !isOpen;
}
</script>
</body>
