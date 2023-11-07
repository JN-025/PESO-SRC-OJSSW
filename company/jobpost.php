<?php
include '../conn.php';
session_start();
if (isset($_SESSION["company_id"])){
$company_id = $_SESSION["company_id"];
}
if (isset($_POST['delete'])) {
    $c_jobpost_id = $_POST['c_jobpost_id'];

    $sql = "DELETE FROM c_jobpost WHERE c_jobpost_id = '$c_jobpost_id' AND company_id = '$company_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["success_jobdeletion"] = $_SESSION["success_jobposting"] = "Job posting deleted successfully!";
        header("location: jobpost.php");
        exit();
    } else {
        $_SESSION["error_jobdeletion"] = $_SESSION["success_jobposting"] = "Error deleting job posting. Please try again.";
        header("location: jobpost.php");
        exit();
    }
}

$page_title = "POSTED JOBS";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/company_jobpost.css">
    <script src="../assets/js/company/jobpost.js"></script>

</head>
<body>
<?php
    if(isset($_SESSION["success_jobposting"])){
    echo "<div class='form-modal' id='formModal'><div class='form-modal-content'><a href='#' class='close' id='closeModal'>&times;</a>{$_SESSION['success_jobposting']}</div></div>";
    unset($_SESSION["success_jobposting"]);
    }

?>
<style>
            .form-modal{
                font-family: 'Poppins', sans-serif;
                text-align: center;
                z-index: 1;
                position: fixed;
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items:center; 
                opacity: 1;
                animation: fadeIn 0.5s ease-in-out forwards;
            }
            .form-modal-content{
                position: relative;
                border-radius: 11px;
                background-color: green;
                padding: 100px;
                color: #fff;
                opacity: 0;
                animation: dropDown 0.5s ease-in-out 0.5s forwards;
            }
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @keyframes dropDown {
                0% {
                    transform: translateY(-50%);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            .close {
                position:absolute;
                color: #fff;
                top: 0;
                right: 0;
                margin: 20px;
                font-size: 28px;
                font-weight: bold;
                text-decoration: none;
            }

            .close:hover,
            .close:focus {
                color: black;
                cursor: pointer;
            }

        </style>
        <script>
    var formModal = document.getElementById('formModal');
    var closeModal = document.getElementById('closeModal');
    
    function closeModalHandler() {
        formModal.style.display = 'none';
    }
    closeModal.addEventListener('click', closeModalHandler);
</script>
<?php 
    
    include "../function.php";
    
    include "topnav.php";
    ?>
    <div class="main-container">
        <div class="main-row">
            <div class="col-1">
            </div>
            <div class="col-2">
            <div class="header"><h2>"Submitted Job"</h2></div>
                <div class="col-2-row">
                    <div class="col-2-content">
                    <?php
                    if (isset($_SESSION["company_id"])){
                        $sql = "SELECT * FROM c_jobpost WHERE company_id = '$company_id' ORDER BY date_added DESC";
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
                                <button id="deleteBtn" class="delete-btn">Delete</button>

                                <div id="modalBlock" class="modal">
                                    <div class="modal-content">
                                        <h2>Are you sure you want to delete the job?</h2>
                                        <form action="" method="POST">
                                        <input type="hidden" name="c_jobpost_id" value="<?php echo $row['c_jobpost_id']; ?>">
                                            <div class="modal-choices">
                                                <div class="choices-btn">
                                                    <button id="noBtn">No</button>
                                                </div>
                                                <div class="choices-btn">
                                                    <button type="submit" name="delete">Yes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    
                mysqli_close($conn);
            } else {
                "Please try to login again";
            }
            ?>
                    </div>
                    <div class="col-2-content-full" id="col-2-content-full">
                    <div class="reminder">
                    <i class="bi bi-exclamation-diamond"></i><p><span style="font-weight:bolder;">Company Reminder:</span>
                    Please be patient as we carefully search for the best and most suitable applicant for the job. Your understanding and patience in this process are greatly appreciated.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>