<?php
include '../conn.php';
$applicant_id = $_SESSION["applicant_id"];
$check = "SELECT * FROM applicant_profile WHERE applicant_id = $applicant_id";
$result = mysqli_query($conn, $check);

$formSubmitted = mysqli_num_rows($result) > 0;
?>
<link rel="stylesheet" href="../assets/css/applicant_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="topnav">
    <div class="peso-logo">
        <img src="../assets/img/ojssw.png" alt="PESO-Logo" srcset="">
    </div>
    <div class="list-dropdown">
                <a href="#">Home</a>
                <a href="find_jobs.php" <?php echo isActivePage("find_jobs.php"); ?>>Find Jobs</a>
                <?php if (!$formSubmitted) : ?>
                <a href="multiform_profile.php" <?php echo isActivePage("multiform_profile.php"); ?>>NSRS FORM</a>
                <?php endif; ?>
                <a href="quiz/index.php" <?php echo isActivePage("quiz/index.php"); ?>>Training</a>
                 <a href="#" <?php echo isActivePage("#"); ?>>More Details</a>
    </div>
    <div class="list-dropdown-sublist d-none">
        <a href="" class="sub-active"> <?php echo $page_title?> <i class="bi bi-caret-down-fill"></i></a>
        <div class="sub-list" id="nav_title">
                <a href="homepage.php"><i class="bi bi-house-door-fill"></i>&nbsp;Home</a>
                <a href="find_jobs.php"><i class="bi bi-search"></i>&nbsp;Find Jobs</a>
                <a href="multiform_profile.php"><i class="bi bi-bookmark"></i>&nbsp;NSRS FORM</a>
                <a href="quiz/index.php"><i class="bi bi-controller"></i>&nbsp;Training</a>
                 <a href="#"><i class="bi bi-exclamation-circle"></i>&nbsp;More Details</a>
                 </div>
    </div>
    <div class="right-corner">
        <div class="notification-icon">
            <div class="field-space"></div>
            <i class="bi bi-bell icon" id="bell-icon"></i>
            <div class="notification-dropdown" id="notification-dropdown">
                <div class="col-1">
                    <a href="">Notification</a>
                    <a href="">See All</a>
                </div>
                <div class="col-2">
                <i class="bi bi-x-circle"></i>
                <p id="notification-message">No notifications available</p>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <i class="bi bi-person-fill icon" id="person-icon"></i>
            <div class="dropdown-content" id="person-dropdown">
                <a href="multiform_profile.php"><i class="bi bi-person-lines-fill"style="margin-left: 18px;left: 0; position:absolute;"></i>Profile</a>
                <a href="#"><i class="bi bi-gear" style="margin-left: 18px;left: 0; position:absolute;"></i>Settings</a>
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

