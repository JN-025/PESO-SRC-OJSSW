<?php
$page_title = "JOB POSTING";
include "../conn.php";
include "../sanitize_function.php";

session_start();

if(isset($_POST["submit"])) {
    $company_id = $_SESSION["company_id"];
    $jobTitle = sanitizeInput($_POST["jobTitle"]);
    $companyName = sanitizeInput($_POST["companyName"]);
    $industry = sanitizeInput($_POST["industry"]);
    $position = sanitizeInput($_POST["position"]);
    $educBg = sanitizeInput($_POST["educBg"]);
    $yrsExperience = sanitizeInput($_POST["yrsExperience"]);
    $workLocation = sanitizeInput($_POST["workLocation"]);
    $salary = sanitizeInput($_POST["salary"]);
    $slot = sanitizeInput($_POST["slot"]);
    $skills = sanitizeInput($_POST["skills"]);
    $typeofHiring = sanitizeInput($_POST["typeofHiring"]);

    $description = sanitizeInput($_POST["description"]);

    if (!empty($_FILES["img"]["name"])) {
        $targetDir = "../jobpost_img/";
        $target_file = $targetDir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
        } elseif ($_FILES["img"]["size"] > 5000000) { // 5MB
            echo "File is too large. Please upload an image less than 5MB.";
        } elseif (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    $questionNo1 = sanitizeInput($_POST["questionNo1"]);
    $questionNo2 = sanitizeInput($_POST["questionNo2"]);
    $questionNo3 = sanitizeInput($_POST["questionNo3"]);
    $questionNo4 = sanitizeInput($_POST["questionNo4"]);
    $questionNo5 = sanitizeInput($_POST["questionNo5"]);
    $answerNo1 = sanitizeInput($_POST["answerNo1"]);
    $answerNo2 = sanitizeInput($_POST["answerNo2"]);
    $answerNo3 = sanitizeInput($_POST["answerNo3"]);
    $answerNo4 = sanitizeInput($_POST["answerNo4"]);
    $answerNo5 = sanitizeInput($_POST["answerNo5"]);

    $sql_jobpost = "INSERT INTO c_jobpost (company_id, jobTitle, companyName, industry, position, educBg, yrsExperience, workLocation, salary, slot, skills, typeofHiring, description, img, questionNo1, questionNo2, questionNo3, questionNo4, questionNo5, answerNo1, answerNo2, answerNo3, answerNo4, answerNo5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_jobpost);
    $stmt -> bind_param("isssssssssssssssssssssss",$company_id, $jobTitle, $companyName, $industry, $position, $educBg, $yrsExperience, $workLocation, $salary, $slot, $skills, $typeofHiring, $description, $target_file, $questionNo1, $questionNo2, $questionNo3, $questionNo4, $questionNo5, $answerNo1, $answerNo2, $answerNo3, $answerNo4, $answerNo5);
    if ($stmt->execute()){
        header("location: poststatus.php");
        $_SESSION["success_popup"] = "Successfully Posted Job!";
        exit();
    } else {
        echo "error database insertion";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting</title>
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/job_posting.css">
</head>
<body>
    <?php
    include "../function.php";
    
    include "topnav.php";
    ?>
    <div class="main-container" >
        <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <section id="step-0" class="form-step" >
                    <label for=""><h1>Post a Job!</h1></label>
                    <h2>Job Description</h2>
                    <div class="form-col-1">
                        <input class="description" id="jobTitle" name="jobTitle" type="text" placeholder="Job Title" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                        <input class="description" id="companyName" name="companyName" type="text" placeholder="Company Name" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="industry" placeholder="Industry" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="position" placeholder="Position" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="educBg" placeholder="Educational Background" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="yrsExperience" placeholder="Year of Experience" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="workLocation" placeholder="Work Location" required>
                    </div>
                    <div class="form-col-1 double-col">
                        <input type="number" name="salary" placeholder="Salary" required>
                        <input type="number" name="slot" placeholder="Number of Slots" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" name="skills" placeholder="Skills" required>
                    </div>
                    <div class="form-col-1 select-option">
                        <label for="typeofhiring"><h4>Type of Hiring</h4></label>
                        <select name="typeofHiring" id="typeofhiring" required>
                            <option value="" selected hidden>Type of Hiring</option>
                            <option value="Normal">Normal</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <!--<button>Previous</button>-->
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button class="btn-nav" step_number="1">Next</button>
                        </div>
                    </div>
                    <progress max="3" value="0"></progress>
                </section>
                <!--Step 2-->
                <section id="step-1" class="form-step d-none">
                    <label for=""><h1>Post a Job!</h1></label>
                    <h2>Job Description</h2>
                    <h4>Describe the job position. Maximum of 250 words</h4>
                    <div class="form-col-1">
                        <textarea class="description-box" name="description" placeholder="Job Posting Description" id="description" cols="30" rows="10" maxlength="2000" required></textarea>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <button class="btn-nav" step_number="0">Previous</button>
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button class="btn-nav" step_number="2">Next</button>
                        </div>
                    </div>
                    <progress max="3" value="1"></progress>
                </section>
                <!--Step 3-->
                <section id="step-2" class="form-step d-none">
                    <label for=""><h1>Post a Job!</h1></label>
                    <h2>Company Profile Picture</h2>
                    <h4>Note: Photo must be in PNG, JPEG, BMP, or, SVG.</h4>
                    <div class="form-col-1">
                    <div id="drop-area">
                    <form class="my-form">
                        <p>Upload Images by pressing the icon or by dragging and dropping images onto the dashed field</p>
                        <input type="file" id="fileElem" name="img" onchange="handleFiles(this.files)" required>
                        <label class="select" for="fileElem"><i class="bi bi-cloud-upload"></i></label>
                        <br>
                        <progress id="progress-bar" max=100 value=0></progress>
                    </form>
                    </div>
                    <style>
                        #drop-area {
                        border: 2px dashed #ccc;
                        border-radius: 20px;
                        width: 480px;
                        font-family: sans-serif;
                        margin: 100px auto;
                        padding: 20px;
                        }
                        #drop-area.highlight {
                        border-color: purple;
                        }
                        p {
                        margin-top: 0;
                        }
                        .my-form {
                        margin-bottom: 10px;
                        }
                        #gallery {
                        margin-top: 10px;
                        }
                        #gallery img {
                        width: 150px;
                        margin-bottom: 10px;
                        margin-right: 10px;
                        vertical-align: middle;
                        }
                        .select {
                        display: inline-block;
                        padding: 10px;
                        background: #ccc;
                        cursor: pointer;
                        border-radius: 5px;
                        border: 1px solid #ccc;
                        }
                        .select:hover {
                        background: #ddd;
                        }
                        #fileElem {
                        display: none;
                        }
                    </style>
                    <script>
    function handleFiles(files) {
        const file = files[0];
        const formData = new FormData();
        formData.append('img', file);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);

        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) {
                const percentComplete = (e.loaded / e.total) * 100;
                document.getElementById('progress-bar').value = percentComplete;
            }
        };

        xhr.onload = function () {
            if (xhr.status === 200) {
                // File upload successful, handle the response if needed
                console.log('File upload successful');
            } else {
                // File upload failed, handle the error if needed
                console.error('File upload failed');
            }
        };

        xhr.send(formData);
    }
</script>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <button class="btn-nav" step_number="1">Previous</button>
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button class="btn-nav" step_number="3">Next</button>
                        </div>
                    </div>
                    <progress max="3" value="2"></progress>
                </section>
                <!--Step 4-->
                <section id="step-3" class="form-step d-none">
                    <label for=""><h1>Post a Jobs!</h1></label>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo1" name="questionNo1" type="text" placeholder="Question #1" required>
                        <select name="answerNo1" id="answerNo1" required>
                            
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo2" name="questionNo2" type="text" placeholder="Question #2" required>
                        <select name="answerNo2" id="answerNo2" required>
                            
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo3" name="questionNo3" type="text" placeholder="Question #3" required>
                        <select name="answerNo3" id="answerNo3" required>
                            
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo4" name="questionNo4" type="text" placeholder="Question #4" required>
                        <select name="answerNo4" id="answerNo4" required>
                            
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo5" name="questionNo5" type="text" placeholder="Question #5" required>
                        <select name="answerNo5" id="answerNo5" required>
                            
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <button class="btn-nav" step_number="2">Previous</button>
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button name="submit">Submit</button>
                        </div>
                    </div>
                    <progress max="3" value="3"></progress>
                </section>
            </div>
        </form>
    </div>
    <script src="../assets/js/company/job_posting.js"></script>
</body>
</html>