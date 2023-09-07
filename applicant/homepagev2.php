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
    <link rel="stylesheet" href="../assets/css/applicant_homepagev2.css">
</head>
<body>
<?php 
        include "../function.php";
        include "sidenav.php";
        ?>
        <div class="main-container">
            <div class="main-row">
                <div class="col-1">
                    <div class="header">
                        <h1>RECOMMENDED JOBS</h1>
                        <button>FILTER</button>
                    </div>
                    <div class="content-box">
                    <?php
                        $sql = "SELECT * FROM c_jobpost";
                        if($result = mysqli_query($conn, $sql)){
                            if (mysqli_num_rows($result) > 1) {
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                             <div class="description">
                            <h2><?php echo $row['jobTitle']; ?></h2>
                            <h3>Company Name:  <?php echo $row['companyName']; ?></h3>
                            <h3>Company Industry:  <?php echo $row['industry']; ?></h3>
                            <h3>Work Location:  <?php echo $row['workLocation']; ?></h3>
                            <h3>Slots:  <?php echo $row['slot']; ?></h3>
                            <h3>Salary:  <?php echo $row['salary']; ?></h3>
                            <h3>Skills:  <?php echo $row['skills']; ?></h3>
                            <button class="apply"><a href="job.php?c_jobpost_id=<?php echo $row['c_jobpost_id']; ?>" style="text-decoration: none;">Apply</a></button>
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
                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
</body>
</html>