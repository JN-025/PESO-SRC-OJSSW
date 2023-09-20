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
        <form action="" method="post">
            <div class="wrapper">
                <section id="step-1" class="form-step" >
                    <label for="">Post a Job!</label>
                    <h2>Job Description</h2>
                    <div class="form-col-1">
                        <input type="text" placeholder="Job Title">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Company Name">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Industry">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Position">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Educational Background">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Year of Experience">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Work Location">
                    </div>
                    <div class="form-col-1 double-col">
                        <input type="text" placeholder="Salary">
                        <input type="text" placeholder="Number of Slots">
                    </div>
                    <div class="form-col-1">
                        <input type="text" placeholder="Skills">
                    </div>
                    <div style="width: 50%;margin-left: 5%; " class="form-col-1">
                        <input type="text" placeholder="Type of Hiring">
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <!--<button>Previous</button>-->
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button class="btn-nav" step_number="2">Next</button>
                        </div>
                    </div>
                </section>
                <!--Step 2-->
                <section id="step-2" class="form-step d-none">
                    <label for="">Post a Job!</label>
                    <h2>Job Description</h2>
                    <h4>Describe the job position. Maximum of 250 words</h4>
                    <div class="form-col-1">
                        <textarea class="description-box" name="description" placeholder="Job Posting Description" id="description" cols="30" rows="10" maxlength="250"></textarea>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <button step_number="1">Previous</button>
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button step_number="3">Next</button>
                        </div>
                    </div>
                </section>
                <!--Step 3-->
                <section id="step-3" class="form-step d-none">
                    <label for="">Post a Job!</label>
                    <h2>Company Profile Picture</h2>
                    <h4>Note: Photo must be in PNG, JPEG, BMP, or, SVG.</h4>
                    <div class="form-col-1">
                    <div id="drop-area">
                    <form class="my-form">
                        <p>Upload multiple files with the file dialog or by dragging and dropping images onto the dashed region</p>
                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
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
                            <button class="btn-nav" step_number="2">Previous</button>
                        </div>
                        <div class="field-space"></div>
                        <div class="flex-button">
                            <button class="btn-nav" step_number="4">Next</button>
                        </div>
                    </div>
                </section>
                <!--Step 4-->
                <section id="step-4" class="form-step d-none">
                    <label for="">Post a Jobs!</label>
                    <div class="form-col-1 question-container">
                        <input type="text" placeholder="Question #1">
                        <select name="" id="" required>
                            <option value="Yes" selected hidden>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input type="text" placeholder="Question #2">
                        <select name="" id="" required>
                            <option value="Yes" selected hidden>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input type="text" placeholder="Question #3">
                        <select name="" id="" required>
                            <option value="Yes" selected hidden>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input type="text" placeholder="Question #4">
                        <select name="" id="" required>
                            <option value="Yes" selected hidden>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-1 question-container">
                        <input type="text" placeholder="Question #5">
                        <select name="" id="" required>
                            <option value="Yes" selected hidden>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-col-2">
                        <div class="flex-button">
                            <button class="btn-nav" step_number="3">Previous</button>
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