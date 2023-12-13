<?php
include "../../../conn.php";
?>
<link rel="stylesheet" href="../../../assets/css/sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="sidenav">
    <div class="sidenav-content">
    <div class="sidenav-header">
    <h1><?php echo $page_title;?></h1>
    </div>
    <div class="sidenav-link">
        <a href="company_homepage.php" <?php echo isActivePage("company_homepage.php"); ?>>Applicant Request</a>
        </div>
    </div>
    </div>
</div>

