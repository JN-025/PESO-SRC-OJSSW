<?php
$page_title = "Settings";
include "../conn.php";
session_start();

if (!isset($_SESSION['applicant_id'])) {
    header("Location: index.php");
    die();
}

$applicant_id = $_SESSION["applicant_id"];
$result = "SELECT * FROM a_accounttb  WHERE applicant_id = '$applicant_id'";
if($result = mysqli_query($conn, $result)){
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/applicant_settings.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/font.css">
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="settings-main-container">
        <div class="settings-main-row">
            <div class="setting_nav">
                <div class="card">
                    <img src="../assets/img/default-pfp.jpg" alt="" id="profile-pic">
                    <h2><?php echo $row["lastname"] ?></h2>
                    <label for="input-file">update image</label>
                    <input id="input-file" type="file" accept="image/jpeg, image/png, image/jpg" value="<?php echo $row["profile_img"]?>" hidden>
                </div>
                <script>
                    let profilePic = document.getElementById("profile-pic");
                    let inputFile = document.getElementById("input-file");

                    inputFile.onchange = function() {
                        profilePic.src = URL.createObjectURL(inputFile.files[0]);
                    }
                </script>
                <div class="sublist-nav">
                    <a href="user_settings.php">Profile</a>
                </div>
            </div>
            <div class="col-1">
                <div class="flex-col">
                <h1>PROFILE</h1>
                <button class="edit-btn"><i class="gg-pen"></i></button>
            </div>
                <div class="input-col">
                    <label for="">Name</label>
                    <div class="input-flex-col flex-col-1">
                    <div class="input-tag">
                    <input name="firstname" type="text" placeholder="Juan" value="<?php echo $row["firstname"]?>" disabled>
                    <label for="">First Name</label>
                    </div>
                    <div class="input-tag">
                    <input name="middlename" type="text" placeholder="Ignacio" value="<?php echo $row["middlename"]?>" disabled>
                    <label for="">Middle Name</label>
                    </div>
                    <div class="input-tag">
                    <input name="lastname" type="text" placeholder="Dela Cruz" value="<?php echo $row["lastname"]?>" disabled>
                    <label for="">Last Name</label>
                    </div>
                    </div>
                </div>
                <div class="input-col">
                    <label for="">Email Address</label>
                    <div class="input-flex-col">
                    <div class="input-tag">
                    <input type="email" placeholder="J*********@gmail.com" value="<?php echo $row["email"]?>" disabled>
                    <label for="">Email</label>
                    </div>
                    <div class="input-tag">
                    <button class="update-btn">Update email address</button>
                    </div>
                    </div>
                </div>
                <div class="input-col">
                    <label for="">Current Password</label>
                    <div>
                    <input type="text" placeholder="*************">
                    </div>
                </div>
                <div class="input-col">
                    <label for="">Change Password</label>
                    <div class="input-flex-col">
                    <div class="input-tag">
                    <input type="text" placeholder="New Password">
                    </div>
                    <div class="input-tag">
                    <button class="update-btn">Update Password</button>
                    </div>
                    </div>
                </div>
                <div class="input-col d-flex-center">
                <label for="switchInput" class="switch">
                <input id="switchInput" type="checkbox" <?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? 'checked' : ''; ?>>
                <span class="slider"></span>
                </label>
                <label for="">Dark Mode</label>
                <div class="help-icon" id="question-icon">&nbsp;&nbsp;<i class="bi bi-question-circle"></i>
                <div class="more-info">
                    <p>Dark mode will improve your vision by 10%</p>
                </div>
            </div>
                </div>
                <div class="input-col">
                <button class="primary-btn" onclick="location.href='signout.php'">LOG OUT</button>
                </div>
                <div class="input-col">
                <button class="primary-btn">DELETE ACCOUNT</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}
}
    ?>
    <script src="../assets/js/darkmode.js"></script>
</body>
</html>