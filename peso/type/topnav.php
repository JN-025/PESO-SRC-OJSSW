<?php
include '../../../conn.php';
?>
<link rel="stylesheet" href="../../../assets/css/applicant_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="topnav">
    <div class="peso-logo">
        <img src="../../../assets/img/ojssw.png" alt="PESO-Logo" srcset="">
    </div>
    <div class="page-name">
        <?php
        echo "$page_title"; 
        ?>
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
                <a href="multiform_profile.php"><i class="bi bi-person-lines-fill"style="margin-left: 18px;left: 0; position:absolute;"></i>Profile</a>
                <a href="user_settings.php"><i class="bi bi-gear" style="margin-left: 18px;left: 0; position:absolute;"></i>Settings</a>
                <a href="../../signout.php"><i class="bi bi-box-arrow-in-right" style="margin-left: 18px;left: 0; position:absolute;"></i>Logout</a>
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
    /*const navTitle = document.querySelector(".list-dropdown-sublist .sub-active");
    const subList = document.querySelector(".list-dropdown-sublist .sub-list");*/
    let notifications = [];

    function updateNotificationDropdown() {
        if (notifications.length === 0) {
            notificationMessage.textContent = "No notifications available";
        } else {
        }
    }
    /*navTitle.addEventListener("click", () => {
    if (subList.style.display === "block") {
        subList.style.display = "none";
    } else {
        subList.style.display = "block";
    }
    });*/
    bellIcon.addEventListener("click", () => {
        if (notificationDropdown.style.display === "block") {
            notificationDropdown.style.display = "none";
        } else {
            notificationDropdown.style.display = "block";
            updateNotificationDropdown();
        }
    });

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

