<?php
include '../conn.php';
session_start();
if (isset($_SESSION["company_id"])){
$company_id = $_SESSION["company_id"];
}
$page_title = "Posted Jobs";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/company_sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/company_jobpost.css">

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
            
            </div>
            <div class="col-2">
                <div class="col-2-row">
                    <div class="col-2-content">
                    <?php
                    if (isset($_SESSION["company_id"])){
                        $sql = "SELECT * FROM c_jobpost WHERE company_id = '$company_id'";
                        if($result = mysqli_query($conn, $sql)){
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)){
                                    
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
            } else {
                "Please try to login again";
            }
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