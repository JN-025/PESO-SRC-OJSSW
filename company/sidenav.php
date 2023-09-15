<link rel="stylesheet" href="../assets/css/company_sidenav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="topside-container">
    <div class="sidenav">
        <div class="col-side">
        <a href="homepage.php" <?php echo isActivePage("homepage.php"); ?>><i class="bi bi-house-door-fill"></i>&nbsp;Home</a>
        <a href="jobposting.php" <?php echo isActivePage("jobposting.php"); ?>><i class="bi bi-arrow-up-square-fill"></i>&nbsp;Job Posting</a>
        <a href="jobpost.php" <?php echo isActivePage("jobpost.php"); ?>><i class="bi bi-file-earmark-spreadsheet"></i>&nbsp;Posted Jobs</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-person-vcard" style="font-size:20px"></i>&nbsp;Applications</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-gear-fill"></i>&nbsp;Settings</a>
        <a href="#" <?php echo isActivePage("#"); ?>><i class="bi bi-info-circle"></i>&nbsp;More Details</a>
        </div>
</div>
