<?php
$page_title = "Find Jobs";
    session_start();
    if (!isset($_SESSION['applicant_id'])) {
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
    <link rel="stylesheet" href="../assets/css/applicant_find_jobs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/font.css">
    <script src="../assets/js/applicant/loader.js"></script>
</head>
<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'enabled' ? 'dark-theme' : ''; ?>">
<?php
    if(isset($_SESSION["form_submitted"])){
    echo "<div class='form-modal' id='formModal'>
            <div class='form-modal-content'>
                <div class='modal-row'>
                    <div class='modal-img'></div>
                    <div class='modal-col'>
                        <h2>{$_SESSION['form_submitted']}</h2>
                    </div>
                </div>
                <div class='modal-end'><h2>Happy applying!</h2>
                <a href='find_jobs.php'>Find Jobs</a>
                </div>
            </div>
        </div>";
    unset($_SESSION["form_submitted"]);
    }

?>
<style>
            .form-modal{
                font-family: 'Poppins', sans-serif;
                z-index: 9999;
                position: fixed;
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                height: 100%;
                left: 0;
                top: 0;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items:center; 
                opacity: 1;
                animation: fadeIn 0.5s ease-in-out forwards;
            }
            .form-modal-content{
                width: 400px;
                position: relative;
                border-radius: 32px;
                background-color: #D9570E;
                padding: 30px;
                color: #fff;
                opacity: 0;
                animation: dropDown 0.5s ease-in-out 0.5s forwards;
            }
            .modal-row{
                display: flex;
            }
            .modal-img{
                margin-right: 20px;
                width: 30%;
                background-image: url(../assets/img/findjobmodal_success.png);
                background-repeat: no-repeat;
            }
            .modal-end h2{
                margin: 0;
                margin-bottom: 44px;
                text-align: center;
                color: #FAC819;
                font-family: Poppins;
                font-size: 36px;
                font-style: normal;
                font-weight: 900;
                line-height: normal;
            }
            .modal-end a{
                padding: 10px 40px;
                border-radius: 10px;
                background-color: #D9D9D9;
                color: #A81E1E;
                text-decoration: none;
                font-weight: 900;
                box-shadow: 0px 4px 4px 0px #00000040;
                cursor: pointer;
                display: flex;
                justify-content: center;
                margin: 0 30%;
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
<div class="loader"><div></div><div></div><div></div><div></div></div>
    <?php 
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <div class="main-row">
            <div class="col-2">
                <div class="col-2-row">
                <div class="header-container">
                <div class="header">
                        <form method="POST"action="">
                            <h1></h1>
                            <div class="sort-by-type">
                            <button>Recommended Jobs</button>
                            <button>Urgent Hiring</button>
                            </div>
                            <div class="search-box upper-search">
                            <input type="text" name="search_engine_1" class="search-engine-1" placeholder="&#xf0b1;&nbsp;Job Title" style="font-family:Arial, FontAwesome">
                            <input type="text" name="search_engine_2" class="search-engine-2" placeholder="&#xF842; Location">
                            <input type="text" name="search_engine_3" class="search-engine-3" placeholder="&#xF2DC; Experience">
                            <button name="search"><i class="bi bi-search"></i> Search</button>
                            </div>
                          <div class="search-box lower-search">
                            <label for=""></label>
                            <div class="flex-input">
                            <input type="text" name="filter_engine_1" class="filter-engine-1" placeholder="Manager">
                            <input type="text" name="filter_engine_3" class="filter-engine-3" placeholder="30000 Pesos">
                            </div>
                            <input type="text" name="filter_engine_2" class="filter-engine-2" placeholder="Santa Rosa, Laguna">
                            <input type="text" name="filter_engine_4" class="filter-engine-4" placeholder="2-3 Years Experience">
                            <input type="text" name="filter_engine_5" class="filter-engine-5" placeholder="Construction">
                            <button name="filter"><i class="bi bi-filter "></i> Filter</button>
                            </div>
                        </form>
                    </div>
                    </div>
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
                         $sql = "SELECT * FROM jobpost WHERE jobTitle LIKE '%$searchQuery1%' AND workLocation LIKE '%$searchQuery2%' AND yrsExperience LIKE '%$searchQuery3%'";
                        } 
                        elseif (isset($_POST['filter'])) {
                        $sql = "SELECT * FROM jobpost WHERE companyName LIKE '%$filterQuery1%' AND workLocation LIKE '%$filterQuery2%' AND workLocation LIKE '%$filterQuery2%' AND salary LIKE '%$filterQuery3%' AND yrsExperience LIKE '%$filterQuery4%' AND skills LIKE '%$filterQuery5%'";
                     }
                if (isset($_POST['search']) || isset($_POST['filter'])) {
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="description preview" onclick="openTab(<?php echo $row['jobpost_id']; ?>, this)">
                                <div class="desc-col-1">
                                    <h2><?php echo $row['jobTitle']; ?></h2>
                                    <div class="info-row">
                                        <h3>Company Name:</h3><p><?php echo $row['companyName']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Company Industry:</h3><p class="inline"><?php echo $row['industry']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Work Location:</h3><p class="inline"><?php echo $row['workLocation']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Slots:</h3><p class="inline"><?php echo $row['slot']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Salary:</h3><p class="inline">₱<?php echo $row['salary']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Skills:</h3><p class="inline"><?php echo $row['skills']; ?></p>
                                    </div>
                                    </div>
                                    <div class="desc-col-2 d-none">
                                        <div>
                                        <button onclick="openTab(<?php echo $row['jobpost_id']; ?>, this)">Apply</button>
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
                }} else {
                ?><?php
                        $sql = "SELECT * FROM jobpost ORDER BY date_added DESC";
                        if($result = mysqli_query($conn, $sql)){
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <div class="description preview"  onclick="openTab(<?php echo $row['jobpost_id']; ?>, this)">
                                    <div class="desc-col-1">
                                    <h2><?php echo $row['jobTitle']; ?></h2>
                                    <div class="info-row">
                                        <h3>Company Name:</h3><p><?php echo $row['companyName']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Company Industry:</h3><p class="inline"><?php echo $row['industry']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Work Location:</h3><p class="inline"><?php echo $row['workLocation']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Slots:</h3><p class="inline"><?php echo $row['slot']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Salary:</h3><p class="inline">₱<?php echo $row['salary']; ?></p>
                                    </div>
                                    <div class="info-row">
                                        <h3 class="inline">Skills:</h3><p class="inline"><?php echo $row['skills']; ?></p>
                                    </div>
                                    </div>
                                    <div class="desc-col-2 d-none">
                                        <div>

                                        </div>
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
            }
            ?>
                    </div>
                    <div class="col-2-content-full" id="col-2-content-full">
                    <!--<div class="reminder">
                    <i class="bi bi-exclamation-diamond"></i><p><span style="font-weight:bolder;">Job Application Reminder:</span>
                            Before you apply for any job on PESO-SRC-OJSSW, we want to ensure that you're making informed career choices. Take a moment to reflect on your skills, interests, and strengths. When you find a job you're interested in, carefully read the job description and match your skills with the requirements.</p>
                            </div>-->
                    </div>
                </div>
            </div>
        </div>
    <link rel="stylesheet" href="../assets/css/footer.css">
    <?php include "../footer.php" ?>
    </div>
    <script src="../assets/js/darkmode.js"></script>
</body>
</html>
<script>
function openTab(jobPostId, button) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var col2ContentFull = document.getElementById("col-2-content-full");
            col2ContentFull.innerHTML = this.responseText;

            col2ContentFull.style.display = "block";

            var buttons = document.querySelectorAll('.preview');
            buttons.forEach(btn => btn.classList.remove('pressed'));

            button.classList.add('pressed');
        }
    };
    xhttp.open("GET", "get_job_details.php?jobPostId=" + jobPostId, true);
    xhttp.send();
}
</script>
<style>
.pressed {
        position: relative;
        border: 2px solid #B22623;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        max-width: 400px;
        margin: 0 auto;
    }

    .pressed::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 44px 0 20px 30px;
        border-top-right-radius: 7px;
        border-color: #B22623 transparent transparent transparent;
    }
</style>