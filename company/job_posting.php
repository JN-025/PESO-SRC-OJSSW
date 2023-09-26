<?php
include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting</title>
    <link rel="stylesheet" href="job_posting.css">
</head>
<body>
    <?php
    include "../function.php";
    include "sidenav.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <form id="form" action="" method="post">
            <div class="wrapper">
                <section id="step-0" class="form-step" >
                    <label for="">Post a Job!</label>
                    <h2>Job Description</h2>
                    <div class="form-col-1">
                        <input class="description" id="jobTitle" name="jobTitle" type="text" placeholder="Job Title" required maxlength="50">
                    </div>
                    <div class="form-col-1">
                        <input class="description" id="companyName" name="companyName" type="text" placeholder="Company Name" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Industry" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Position" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Educational Background" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Year of Experience" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Work Location" required>
                    </div>
                    <div class="form-col-1 double-col">
                        <input type="number" placeholder="Salary" required>
                        <input type="number" placeholder="Number of Slots" required>
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Skills" required>
                    </div>
                    <div style="width: 50%;margin-left: 5%; " class="form-col-1">
                        <input type="text" placeholder="Type of Hiring" required>
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
                </section>
                <!--Step 2-->
                <section id="step-1" class="form-step d-none">
                    <label for="">Post a Job!</label>
                    <h2>Job Description</h2>
                    <h4>Describe the job position. Maximum of 250 words</h4>
                    <div class="form-col-1">
                        <textarea class="description-box" name="description" placeholder="Job Posting Description" id="description" cols="30" rows="10" maxlength="250" required></textarea>
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
                </section>
                <!--Step 3-->
                <section id="step-2" class="form-step d-none">
                    <label for="">Post a Job!</label>
                    <h2>Company Profile Picture</h2>
                    <h4>Note: Photo must be in PNG, JPEG, BMP, or, SVG.</h4>
                    <div class="form-col-1">
                    <div id="drop-area">
                    <form class="my-form">
                        <p>Upload multiple files with the file dialog or by dragging and dropping images onto the dashed region</p>
                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)" required>
                        <label class="select" for="fileElem">Select some files</label>
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
                </section>
                <!--Step 4-->
                <section id="step-3" class="form-step d-none">
                    <label for="">Post a Jobs!</label>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo1" name="questionNo1" type="text" placeholder="Question #1" required>
                        <select name="" id="answerNo1" required>
                            <option value="" selected hidden>Choose</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo2" name="questionNo2" type="text" placeholder="Question #2" required>
                        <select name="" id="answerNo2" required>
                            <option value="" selected hidden>Choose</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo3" name="questionNo3" type="text" placeholder="Question #3" required>
                        <select name="" id="answerNo3" required>
                            <option value="" selected hidden>Choose</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo4" name="questionNo4" type="text" placeholder="Question #4" required>
                        <select name="" id="answerNo4" required>
                            <option value="" selected hidden>Choose</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input class="question" id="questionNo5" name="questionNo5" type="text" placeholder="Question #5" required>
                        <select name="" id="answerNo5" required>
                            <option value="Choose" selected hidden>Choose</option>
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
                </section>
            </div>
        </form>
    </div>
    <script src="job_posting.js"></script>
</body>
</html>