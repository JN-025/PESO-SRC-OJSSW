<?php
@session_start();
include '../conn.php';
$peso_id = $_SESSION["peso_id"];
$query = "SELECT name FROM p_accounttb WHERE peso_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $peso_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$name = $row['name'];
?>

<link rel="stylesheet" href="../assets/css/company_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<div class="topnav">
<?php
        echo "<h1>$page_title</h1>";
    ?>
    <div class="notification">
        <i class="bi bi-bell-fill"></i>
        </div>
            <div class="active-user">
            <button id="dropdown-button" class="link-button" onclick="toggleDropdown()">
                <span id="dropdown-text"><?php echo $name; ?></span>
                <i class="bi bi-caret-down-fill"></i>
            </button>
            </div>
        <div id="dropdown-menu" style="display: none;">
            <ul>
            <li><a href="personal_info.php">Profile</a></li>
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
        dropdownMenu.style.right = window.innerWidth - rect.left - dropdownButton.offsetWidth + "px";
        dropdownMenu.style.display = "block";
        dropdownMenu.style.zIndex = "2";
        dropdownButton.style.border = "1px solid #ccc";
        dropdownButton.style.background = "#f9f9f9";
        dropdownIcon.style.transform = "rotate(180deg)";
    }

    isOpen = !isOpen;
}
</script>