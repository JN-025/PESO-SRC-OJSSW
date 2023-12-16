<?php
include '../conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    die();
}
?>
<link rel="stylesheet" href="../assets/css/font.css">
<link rel="stylesheet" href="../assets/css/applicant_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="topnav">
    <div class="peso-logo">
        <img src="../assets/img/ojssw.png" alt="PESO-Logo" srcset="">
    </div>
    <div class="list-dropdown">
                <a href="homepage.php" <?php echo isActivePage("homepage.php"); ?>>PESO</a>
                <a href="access.php" <?php echo isActivePage("access.php"); ?>>Access</a>
                 <a href="company.php" <?php echo isActivePage("company.php"); ?>>Company</a>
    </div>
    <div class="list-dropdown-sublist d-none">
        <a href="" class="sub-active"> <?php echo $page_title?> <i class="bi bi-caret-down-fill"></i></a>
        <div class="sub-list" id="nav_title">
                <a href="homepage.php"><i class="bi bi-search"></i>&nbsp;PESO</a>
                <a href="access.php"><i class="bi bi-bookmark"></i>&nbsp;Access</a>
                <a href="company.php"><i class="bi bi-controller"></i>&nbsp;Company</a>
                 </div>
    </div>
    <div class="right-corner">
        <div class="notification-icon">
            <div class="field-space"></div>
            <i class="bi bi-bell icon" id="bell-icon"></i>
            <div class="notification-dropdown" id="notification-dropdown">
                <div class="topnav-col-1">
                    <span>Notification</span>
                    <a href="">See All</a>
                </div>
                <div class="topnav-col-2">
                <i class="bi bi-x-circle"></i>
                <p id="notification-message">No notifications available</p>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <i class="bi bi-person-fill icon" id="person-icon"></i>
            <div class="dropdown-content" id="person-dropdown">
                <a href="signout.php"><i class="bi bi-box-arrow-in-right" style="margin-left: 18px;left: 0; position:absolute;"></i>Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    const bellIcon = document.getElementById("bell-icon");
    const notificationDropdown = document.getElementById("notification-dropdown");
    const notificationMessage = document.getElementById("notification-message");
    const personIcon = document.getElementById("person-icon");
    const personDropdown = document.getElementById("person-dropdown");
    let notifications = [];

    function updateNotificationDropdown() {
        if (notifications.length === 0) {
            notificationMessage.textContent = "No notifications available";
        } else {
        }
    }
            notificationDropdown.style.display = "none";
            bellIcon.style.display = "none";
    personIcon.addEventListener("click", () => {
        if (personDropdown.style.display === "block") {
            personDropdown.style.display = "none";
        } else {
            personDropdown.style.display = "block";
        }
    });
    document.addEventListener("click", (event) => {
        if (event.target !== bellIcon && !notificationDropdown.contains(event.target)) {
            notificationDropdown.style.display = "none";
        }
        if (event.target !== personIcon && !personDropdown.contains(event.target)) {
            personDropdown.style.display = "none";
        }
    });

    updateNotificationDropdown();



    bellIcon.addEventListener("click", function(event) {
    if (bellIcon.classList.contains("clicked")) {
      bellIcon.classList.remove("clicked");
    } else {
      bellIcon.classList.add("clicked");
    }
    event.stopPropagation();
  });
  personIcon.addEventListener("click", function(event) {
    if (personIcon.classList.contains("clicked")) {
        personIcon.classList.remove("clicked");
    } else {
        personIcon.classList.add("clicked");
    }
    event.stopPropagation();
  });
  document.body.addEventListener("click", function() {
    bellIcon.classList.remove("clicked");
    personIcon.classList.remove("clicked");
  });
</script>

