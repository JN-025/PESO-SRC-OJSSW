
<link rel="stylesheet" href="../assets/css/company_sidenav.css">
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
        <a href="jobposting.php" <?php echo isActivePage("jobposting.php"); ?>><i class="bi bi-file-post"></i>&nbsp;Job Posting</a>
        <a href="jobpost.php" <?php echo isActivePage("jobpost.php"); ?>><i class="bi bi-search"></i>&nbsp;Job Posts</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-bell" style="font-size:20px"></i>&nbsp;Applicantions</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-person-lines-fill"></i>&nbsp;Settings</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-sliders2"></i>&nbsp;More Details</a>
        <a class="signout"href="signout.php" <?php echo isActivePage("signout.php"); ?>><i class="bi bi-box-arrow-left"></i>&nbsp;Log Out</a>
        </div>
</div>
    

