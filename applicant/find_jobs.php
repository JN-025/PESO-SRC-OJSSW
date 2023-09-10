<?php
$page_title = "Find Jobs";
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/applicant_homepage.css">
</head>
<body>
    <?php 
    include "../function.php";
    include "sidenav.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <div class="main-row">
            <div class="col-1">
            <div class="header">
                        <form method="POST"action="">
                            <h1><?php echo $page_title;?></h1>
                            <div class="search-box upper-search">
                            <input type="text" name="search_engine_1" class="search-engine-1" placeholder="Skills, Company, or Job Title">
                            <input type="text" name="search_engine_2" class="search-engine-2" placeholder="Location">
                            <input type="text" name="search_engine_3" class="search-engine-3" placeholder="Experience">
                            <button name="search"><i class="bi bi-search" style="margin: 0 5px;"></i>Search</button>
                            </div>
                         <div class="search-box lower-search">
                            <label for="">JOB SEARCH</label>
                            <input type="text" name="filter_engine_1" class="filter-engine-1" placeholder="Manager">
                            <input type="text" name="filter_engine_2" class="filter-engine-2" placeholder="Santa Rosa, Laguna">
                            <input type="text" name="filter_engine_3" class="filter-engine-3" placeholder="30000 Pesos">
                            <input type="text" name="filter_engine_4" class="filter-engine-4" placeholder="2-3 Years Experience">
                            <input type="text" name="filter_engine_5" class="filter-engine-5" placeholder="Construction">
                            <button name="filter">Filter</button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col-2">
                <div class="col-2-row">
                    <div class="col-2-content">
                    <?php
                 $searchQuery1 = isset($_POST['search_engine_1']) ? $_POST['search_engine_1'] : '';
                 $searchQuery2 = isset($_POST['search_engine_2']) ? $_POST['search_engine_2'] : '';
                 $searchQuery3 = isset($_POST['search_engine_3']) ? $_POST['search_engine_3'] : '';
                
                 $filterQuery1 = isset($_POST['filter_engine_1']) ? $_POST['filter_engine_1'] : '';
                 $filterQuery2 = isset($_POST['filter_engine_2']) ? $_POST['filter_engine_2'] : '';
                 $filterQuery3 = isset($_POST['filter_engine_3']) ? $_POST['filter_engine_3'] : '';
                 $filterQuery4 = isset($_POST['filter_engine_4']) ? $_POST['filter_engine_4'] : '';
                 $filterQuery5 = isset($_POST['filter_engine_5']) ? $_POST['filter_engine_5'] : '';
                 
                 if ((isset($_POST['search']) && (!empty($searchQuery1) || !empty($searchQuery2) || !empty($searchQuery3))) ||
                     (isset($_POST['filter']) && (!empty($filterQuery1) || !empty($filterQuery2) || !empty($filterQuery3) || !empty($filterQuery4) || !empty($filterQuery5)))) {
                     if (isset($_POST['search'])) {
                         $sql = "SELECT * FROM c_jobpost WHERE jobTitle LIKE '%$searchQuery1%' AND workLocation LIKE '%$searchQuery2%' AND yrsExperience LIKE '%$searchQuery3%' UNION ALL SELECT * FROM p_jobpost WHERE jobTitle LIKE '%$searchQuery1%' AND workLocation LIKE '%$searchQuery2%' AND yrsExperience LIKE '%$searchQuery3%'";
                        } 
                        elseif (isset($_POST['filter'])) {
                        $sql = "SELECT * FROM c_jobpost WHERE companyName LIKE '%$filterQuery1%' AND workLocation LIKE '%$filterQuery2%' AND workLocation LIKE '%$filterQuery2%' AND salary LIKE '%$filterQuery3%' AND yrsExperience LIKE '%$filterQuery4%' AND skills LIKE '%$filterQuery5%' UNION ALL SELECT * FROM p_jobpost WHERE companyName LIKE '%$filterQuery1%' AND workLocation LIKE '%$filterQuery2%' AND workLocation LIKE '%$filterQuery2%' AND salary LIKE '%$filterQuery3%' AND yrsExperience LIKE '%$filterQuery4%' AND skills LIKE '%$filterQuery5%'";
                     }
                // SEARCH AND FILTER SECTION
                if (isset($_POST['search']) || isset($_POST['filter'])) {
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="description">
                                    <div class="desc-col-1">
                                        <h2><?php echo $row['jobTitle']; ?></h2>
                                        <h3>Company Name:</h3><p><?php echo $row['companyName']; ?></p>
                                        <h3>Company Industry:</h3><p><?php echo $row['industry']; ?></p>
                                        <h3>Work Location:</h3><p><?php echo $row['workLocation']; ?></p>
                                        <h3>Slots:</h3><p><?php echo $row['slot']; ?></p>
                                        <h3>Salary:</h3><p><?php echo $row['salary']; ?></p>
                                        <h3>Skills:</h3><p><?php echo $row['skills']; ?></p>
                                    </div>
                                    <div class="desc-col-2">
                                        <div>
                                            <button onclick="openTab('<?php echo $job_post_id; ?>')">Apply</button>
                                        </div>
                                        <img src="<?php echo $row['img']; ?>" alt="No image">

                                    </div>
                                </div>
                                <?php
                            }
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }}
                // SEARCH AND FILTER END
    
                mysqli_close($conn);
            ?>
                    </div>
                    <div class="col-2-content-full" id="col-2-content-full">
                    <div class="reminder">
                    <i class="bi bi-exclamation-diamond"></i><p><span style="font-weight:bolder;">Job Application Reminder:</span>
                            Before you apply for any job on PESO-SRC-OJSSW, we want to ensure that you're making informed career choices. Take a moment to reflect on your skills, interests, and strengths. When you find a job you're interested in, carefully read the job description and match your skills with the requirements.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function openTab(jobPostId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Display the job details in col-2-content-full
            var col2ContentFull = document.getElementById("col-2-content-full");
            col2ContentFull.innerHTML = this.responseText;

            // Show col-2-content-full in fullscreen
            col2ContentFull.style.display = "block";
        }
    };
    xhttp.open("GET", "get_job_details.php?jobPostId=" + jobPostId, true);
    xhttp.send();
}
</script>