<?php
$page_title = "Home";
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
                        <form action="">
                            <h1>Home</h1>
                            <div class="search-box upper-search">
                            <input type="text" class="search-engine-1" placeholder="Skills, Company, or Job Title">
                            <input type="text" class="search-engine-2" placeholder="Location">
                            <input type="text" class="search-engine-3" placeholder="Experience">
                            <button>Search</button>
                            </div>
                            <div class="search-box lower-search">
                            <label for="">JOB SEARCH</label>
                            <input type="text" class="filter-engine-1" placeholder="Manager">
                            <input type="text" class="filter-engine-2" placeholder="Santa Rosa, Laguna">
                            <input type="text" class="filter-engine-3" placeholder="30000 Pesos">
                            <input type="text" class="filter-engine-4" placeholder="2-3 Years Experience">
                            <input type="text" class="filter-engine-5" placeholder="Construction">
                            <button>Filter</button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col-2">
                <div class="col-2-row">
                    <div class="col-2-content">
                    <?php
                        $sql = "SELECT * FROM c_jobpost";
                        if($result = mysqli_query($conn, $sql)){
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)){
                                    $job_post_id = $row['c_jobpost_id'];
                                    ?>
                             <div class="description">
                             <div class="desc-col-1">
                             <h2><?php echo $row['jobTitle']; ?></h2>
                            <h3>Company Name:</h3><p><?php echo $row['companyName']; ?></p>
                            <h3>Company Industry:</h3><p> <?php echo $row['industry']; ?></p>
                            <h3>Work Location: </h3><p> <?php echo $row['workLocation']; ?></p>
                            <h3>Slots: </h3><p> <?php echo $row['slot']; ?></p>
                            <h3>Salary: </h3><p> <?php echo $row['salary']; ?></p>
                            <h3>Skills: </h3><p> <?php echo $row['skills']; ?></p>
                             </div>
                             <div class="desc-col-2">
                                <div>
                                <button onclick="openTab('<?php echo $job_post_id; ?>')">Apply</button>
                                </div>
                                <img src="<?php echo $row['img']; ?>" alt="No image" srcset="../assets/img/default-img.jpg">
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
    // Make an AJAX request to fetch job details
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