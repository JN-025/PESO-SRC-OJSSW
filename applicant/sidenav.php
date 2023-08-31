
<link rel="stylesheet" href="../assets/css/applicant_sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
        <a href="personal_info.php" <?php echo isActivePage("personal_info.php"); ?>><i class="bi bi-person-lines-fill"></i>&nbsp;Settings</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-sliders2"></i>&nbsp;More Details</a>
        <a class="signout"href="signout.php" <?php echo isActivePage("signout.php"); ?>><i class="bi bi-box-arrow-left"></i>&nbsp;Log Out</a>
        </div>
</div>
    

