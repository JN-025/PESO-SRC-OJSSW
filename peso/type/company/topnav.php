<?php
include '../../../conn.php';

if (!isset($_SESSION['access_id'])) {
    header("Location: index.php");
    die();
}
$access_id = $_SESSION["access_id"];

$unreadNotificationQuery = "SELECT COUNT(*) as unread_count FROM notifications WHERE access_id = $access_id AND is_read = 0";
$unreadNotificationResult = mysqli_query($conn, $unreadNotificationQuery);
$unreadNotificationData = mysqli_fetch_assoc($unreadNotificationResult);
$unreadCount = $unreadNotificationData['unread_count'];

$notification_query = "SELECT * FROM notifications WHERE access_id = $access_id ORDER BY date_added_at DESC LIMIT 4";
$notification_result = mysqli_query($conn, $notification_query);
$notifications = mysqli_fetch_all($notification_result, MYSQLI_ASSOC);

$notification_query = "SELECT * FROM notifications WHERE access_id = $access_id ORDER BY date_added_at DESC LIMIT 4";
$notification_result = mysqli_query($conn, $notification_query);
$notifications = mysqli_fetch_all($notification_result, MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="../../../assets/css/font.css">
<link rel="stylesheet" href="../../../assets/css/applicant_topnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .hidden {
        display: none;
    }
</style>
<div class="topnav">
    <div class="peso-logo">
        <img src="../../../assets/img/ojssw.png" alt="PESO-Logo" srcset="">
    </div>
    <div class="list-dropdown">
                <a href="poststatus.php" <?php echo isActivePage("poststatus.php"); ?>>Job Posted Status</a>
                 <a href="job_posting.php" <?php echo isActivePage("about_peso.php"); ?>>Job Posting</a>
    </div>
    <div class="list-dropdown-sublist d-none">
        <a href="" class="sub-active"> <?php echo $page_title?> <i class="bi bi-caret-down-fill"></i></a>
        <div class="sub-list" id="nav_title">
                <a href="poststatus.php"><i class="bi bi-controller"></i>&nbsp;Job Posted Status</a>
                 <a href="job_posting.php"><i class="bi bi-exclamation-circle"></i>&nbsp;Job Posting</a>
                 </div>
    </div>
    <div class="right-corner">
        <div class="notification-icon">
            <div class="field-space"></div>
            <?php if ($unreadCount > 0) : ?>
            <span class="badge"><?php echo $unreadCount; ?></span>
            <?php endif; ?>
            <i class="bi bi-bell icon" id="bell-icon">
            </i>
            <div class="notification-dropdown" id="notification-dropdown">
                <div class="topnav-col-1">
                    <span style="color: green;">Notification</span>
                    <a href="#">See All</a>
                </div>
                <div class="topnav-col-2">
                <?php if (count($notifications) > 0) : ?>
                    <ul>
                        <?php foreach ($notifications as $notification) : ?>
                        <li><?php $formattedDate = date("F j, Y | g:i A", strtotime($notification['date_added_at']));
                            echo '<span class="highlight-title">'.$notification['title'] . '</span>' .':<br> ' . $notification['description']. '<div>' .$formattedDate . '</div>'; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <i class="bi bi-x-circle"></i>
                    <p id="notification-message">No notifications available</p>
                <?php endif; ?>
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

