<link rel="stylesheet" href="../assets/css/applicant_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="topnav">
    <div class="peso-logo"></div>
    <div class="right-corner">
        <div class="notification-icon">
            <div class="field-space"></div>
            <i class="bi bi-bell" id="bell-icon"></i>
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
            <i class="bi bi-person" id="person-icon"></i>
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
    let notifications = [];

    function updateNotificationDropdown() {
        if (notifications.length === 0) {
            notificationMessage.textContent = "No notifications available";
        } else {
        }
    }

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
</script>

