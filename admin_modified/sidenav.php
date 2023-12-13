<?php
include "../conn.php";
?>
<link rel="stylesheet" href="../assets/css/sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="sidenav">
    <div class="sidenav-content">
    <div class="sidenav-header">
    <h1><?php echo $page_title;?></h1>
    </div>
    <div class="sidenav-link">
    <a href="homepage.php" <?php echo isActivePage("homepage.php"); ?>>&nbsp;APPROVALS</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class=""></i>&nbsp;ACCESS</a>
        <a href="A_access_approval.php" <?php echo isActivePage("A_access_approval.php"); ?>><i class=""></i>&nbsp;Applicant</a>
        <a href="C_access_approval.php" <?php echo isActivePage("C_access_approval.php"); ?>><i class="" style="font-size:20px"></i>&nbsp;Company</a>
        <a href="#" <?php echo isActivePage("multiform_profile.php"); ?>><i class=""></i>&nbsp;Job Posting</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class=""></i>&nbsp;Reports</a>
        </div>
    </div>
    </div>
</div>

