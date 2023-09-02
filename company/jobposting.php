<?php
$page_title = "Job Posting";
?>
<?php
    // Include config file
    require_once "../conn_jobpost.php";
    
    // Define variables and initialize with empty values
    $jobTitle = $companyName = $industry = $position = $educBg = $yrsExperience = $workLocation = $salary = $slot = $skills = $question1 = $question2 = $question3 = $question4 = $question5 = $answer1 = $answer2 = $answer3 = $answer4 = $answer5 = "";
    
    $jobTitle_err = $companyName_err = $industry_err = $position_err = $educBg_err = $yrsExperience_err = $workLocation_err = $salary_err = $slot_err = $skills_err = $question1_err = $question2_err = $question3_err = $question4_err = $question5_err = $answer1_err = $answer2_err = $answer3_err = $answer4_err = $answer5_err = "";

// Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate Job Title
        $input_jobTitle = trim($_POST["jobTitle"]);
        if(empty($input_jobTitle))
        {
            $jobTitle_err = "Please enter the Job Title.";     
        } else
        {
            $jobTitle = $input_jobTitle;
        }

        // Validate Company Name
        $input_companyName = trim($_POST["companyName"]);
        if(empty($input_companyName))
        {
            $companyName_err = "Please enter the Company Name.";     
        } else
        {
            $companyName = $input_companyName;
        }

        // Validate Industry
        $input_industry = trim($_POST["industry"]);
        if(empty($input_industry))
        {
            $industry_err = "Please enter the industry.";     
        } else
        {
            $industry = $input_industry;
        }

        // Validate Position
        $input_position = trim($_POST["position"]);
        if(empty($input_position))
        {
            $position_err = "Please enter the position.";     
        } else
        {
            $position = $input_position;
        }

        // Validate Educational Background
        $input_educBg = trim($_POST["educBg"]);
        if(empty($input_educBg))
        {
            $educBg_err = "Please enter the Educational Background.";     
        } else
        {
            $educBg = $input_educBg;
        }

        // Validate Years of Experience
        $input_yrsExperience = trim($_POST["yrsExperience"]);
        if(empty($input_yrsExperience))
        {
            $yrsExperience_err = "Please enter the years of experience.";     
        } else
        {
            $yrsExperience = $input_yrsExperience;
        }

        // Validate Work Location
        $input_workLocation = trim($_POST["workLocation"]);
        if(empty($input_workLocation))
        {
            $workLocation_err = "Please enter the work location.";     
        } else
        {
            $workLocation = $input_workLocation;
        }

        // Validate Salary
        $input_salary = trim($_POST["salary"]);
        if(empty($input_salary))
        {
            $salary_err = "Please enter the salary.";     
        } else
        {
            $salary = $input_salary;
        }

        // Validate Slots
        $input_slot = trim($_POST["slot"]);
        if(empty($input_slot))
        {
            $slot_err = "Please enter the number of slots.";     
        } else
        {
            $slot = $input_slot;
        }

        // Validate Skills
        $input_skills = trim($_POST["skills"]);
        if(empty($input_skills))
        {
            $skills_err = "Please enter the skills.";     
        } else
        {
            $skills = $input_skills;
        }

        // Validate Question #1
        $input_question1 = trim($_POST["question1"]);
        if(empty($input_question1))
        {
            $question1_err = "Please enter the skills.";     
        } else
        {
            $question1 = $input_question1;
        }

        // Validate Question #
        $input_question2 = trim($_POST["question2"]);
        if(empty($input_question2))
        {
            $question2_err = "Please enter the skills.";     
        } else
        {
            $question2 = $input_question2;
        }

        // Validate Question #3
        $input_question3 = trim($_POST["question3"]);
        if(empty($input_question3))
        {
            $question3_err = "Please enter the skills.";     
        } else
        {
            $question3 = $input_question3;
        }

        // Validate Question #4
        $input_question4 = trim($_POST["question4"]);
        if(empty($input_question4))
        {
            $question4_err = "Please enter the skills.";     
        } else
        {
            $question4 = $input_question4;
        }

        // Validate Question #5
        $input_question5 = trim($_POST["question5"]);
        if(empty($input_question5))
        {
            $question5_err = "Please enter the skills.";     
        } else
        {
            $question5 = $input_question5;
        }

        // Validate Answer #1
        $input_answer1 = trim($_POST["answer1"]);
        if(empty($input_answer1))
        {
            $answer1_err = "Please enter the skills.";     
        } else
        {
            $answer1 = $input_answer1;
        }

        // Validate Answer #2
        $input_answer2 = trim($_POST["answer2"]);
        if(empty($input_answer2))
        {
            $answer2_err = "Please enter the skills.";     
        } else
        {
            $answer2 = $input_answer2;
        }

        // Validate Answer #3
        $input_answer3 = trim($_POST["answer3"]);
        if(empty($input_answer3))
        {
            $answer3_err = "Please enter the skills.";     
        } else
        {
            $answer3 = $input_answer3;
        }

        // Validate Answer #4
        $input_answer4 = trim($_POST["answer4"]);
        if(empty($input_answer4))
        {
            $answer4_err = "Please enter the skills.";     
        } else
        {
            $answer4 = $input_answer4;
        }

        // Validate Answer #5
        $input_answer5 = trim($_POST["answer5"]);
        if(empty($input_answer5))
        {
            $answer5_err = "Please enter the skills.";     
        } else
        {
            $answer5 = $input_answer5;
        }
        

        // Check input errors before inserting in database
        if(empty($jobTitle_err) && empty($companyName_err) && empty($industry_err) && empty($position_err) && empty($educBg_err) && empty($yrsExperience_err) && empty($workLocation_err) && empty($salary_err) && empty($slot_err) && empty($skills_err) && empty($question1_err) && empty($question2_err) && empty($question3_err) && empty($question4_err) && empty($question5_err) && empty($answer1_err)&& empty($answer2_err)&& empty($answer3_err)&& empty($answer4_err)&& empty($answer5_err)) 
        
        {
            $sql = "INSERT INTO c_jobpost (jobTitle, companyName, industry, position, educBg, yrsExperience, workLocation, salary, slot, skills, question1, question2, question3, question4, question5, answer1, answer2, answer3, answer4, answer5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $param_jobTitle, $param_companyName, $param_industry, $param_position, $param_educBg, $param_yrsExperience, $param_workLocation, $param_salary, $param_slot, $param_skills, $param_question1, $param_question2, $param_question3, $param_question4, $param_question5, $param_answer1, $param_answer2, $param_answer3, $param_answer4, $param_answer5);
                
                // Set parameters
                $param_jobTitle = $jobTitle;
                $param_companyName = $companyName;
                $param_industry = $industry;
                $param_position = $position;
                $param_educBg = $educBg;
                $param_yrsExperience = $yrsExperience;
                $param_workLocation = $workLocation;
                $param_salary = $salary;
                $param_slot = $slot;
                $param_skills = $skills;
                $param_question1 = $question1;
                $param_question2 = $question2;
                $param_question3 = $question3;
                $param_question4 = $question4;
                $param_question5 = $question5;
                $param_answer1 = $answer1;
                $param_answer2 = $answer2;
                $param_answer3 = $answer3;
                $param_answer4 = $answer4;
                $param_answer5 = $answer5;
               
        
                 // Attempt to execute the prepared statement
                 if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    header("location: jobpost.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            
                }
    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/company_sidenav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/company_jobposting.css">

   

</head>
<body>
    <?php 
    include "../function.php";
    include "sidenav.php";
    ?>
    
        <div class="card1">
            <?php 
                include "topnav.php";
            ?>
            <center>
            <div class="card2">
                <div class="card3">
                <form id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h1>POST A JOB!</h1>
                    <br>
                    <!-- One "tab" for each step in the form: -->
                    
                    <div class="tab">
                        <div class="card4">
                            <h2>Job Description:</h2>
                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="jobTitle" placeholder="Job Title" class="form-control <?php echo (!empty($jobTitle_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $jobTitle; ?>">
                                    <span class="invalid-feedback"><?php echo $jobTitle_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="companyName" placeholder="Company Name" class="form-control <?php echo (!empty($companyName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $companyName; ?>">
                                    <span class="invalid-feedback"><?php echo $companyName_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="industry" placeholder="Industry" class="form-control <?php echo (!empty($industry_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $industry; ?>">
                                    <span class="invalid-feedback"><?php echo $industry_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="position" placeholder="Position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>">
                                    <span class="invalid-feedback"><?php echo $position_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="educBg" placeholder="Educational Background" class="form-control <?php echo (!empty($educBg_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $educBg; ?>">
                                    <span class="invalid-feedback"><?php echo $educBg_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="yrsExperience" placeholder="Years of Experience" class="form-control <?php echo (!empty($yrsExperience_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $yrsExperience; ?>">
                                    <span class="invalid-feedback"><?php echo $yrsExperience_err;?></span>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="workLocation" placeholder="Work Location" class="form-control <?php echo (!empty($workLocation_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $workLocation; ?>">
                                    <span class="invalid-feedback"><?php echo $workLocation_err;?></span>
                                </div>
                            </div>


                            <div class="form-card">
                                    <div class="form-col-1">
                                        <div class="column">
                                            <input type="text" name="salary" placeholder="Salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                                    <span class="invalid-feedback"><?php echo $salary_err;?></span>
                                        </div>
                                        <div class="field-space-2"></div>
                                        <div class="column">
                                            <input type="text" name="slot" placeholder="Number of Slots" class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $slot; ?>">
                                    <span class="invalid-feedback"><?php echo $slot_err;?></span>
                                        </div>
                                    </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                    <input type="text" name="skills" placeholder="Skills" class="form-control <?php echo (!empty($skills_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $skills; ?>">
                                    <span class="invalid-feedback"><?php echo $skills_err;?></span>
                                </div>
                            </div>

                            

                            
                        </div>
                    </div>
                    
            

                    <div class="tab">
                        <div class="card4">
                            <h2>Job Qualification:</h2>
                            <br>
                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="columnA">
                                        <input type="text" name="question1" placeholder="Question #1" class="form-control <?php echo (!empty($question1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question1; ?>">
                                        <span class="invalid-feedback"><?php echo $question1_err;?></span>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="columnB">
                                    <select class="form-control <?php echo (!empty($answer1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer1; ?>" name="answer1" required>
                                            <option value="" selected disabled>Answer</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>                                        
                                        <span class="invalid-feedback"><?php echo $answer1_err;?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="columnA">
                                        <input type="text" name="question2" placeholder="Question #2" class="form-control <?php echo (!empty($question2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question2; ?>">
                                        <span class="invalid-feedback"><?php echo $question2_err;?></span>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="columnB">
                                    <select class="form-control <?php echo (!empty($answer2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer2; ?>" name="answer2" required>
                                            <option value="" selected disabled>Answer</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>                                        
                                        <span class="invalid-feedback"><?php echo $answer2_err;?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="columnA">
                                        <input type="text" name="question3" placeholder="Question #3" class="form-control <?php echo (!empty($question3_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question3; ?>">
                                        <span class="invalid-feedback"><?php echo $question3_err;?></span>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="columnB">
                                    <select class="form-control <?php echo (!empty($answer3_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer3; ?>" name="answer3" required>
                                            <option value="" selected disabled>Answer</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>                                        
                                        <span class="invalid-feedback"><?php echo $answer3_err;?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="columnA">
                                        <input type="text" name="question4" placeholder="Question #4" class="form-control <?php echo (!empty($question4_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question4; ?>">
                                        <span class="invalid-feedback"><?php echo $question4_err;?></span>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="columnB">
                                    <select class="form-control <?php echo (!empty($answer4_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer4; ?>" name="answer4" required>
                                            <option value="" selected disabled>Answer</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>                                        
                                        <span class="invalid-feedback"><?php echo $answer4_err;?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-card">
                                <div class="form-col-1">
                                    <div class="columnA">
                                        <input type="text" name="question5" placeholder="Question #5" class="form-control <?php echo (!empty($question5_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question5; ?>">
                                        <span class="invalid-feedback"><?php echo $question5_err;?></span>
                                    </div>
                                    <div class="field-space-1"></div>
                                    <div class="columnB">
                                    <select class="form-control <?php echo (!empty($answer5_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer5; ?>" name="answer5" required>
                                            <option value="" selected disabled>Answer</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>                                        
                                        <span class="invalid-feedback"><?php echo $answer5_err;?></span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        
                    </div>

                    <div class="tab">
                        <div class="card4">
                        <h2>Confirmation:</h2>
                        <h3>Note: Please make sure that all the details you entered are correct. Are you sure you want to post this job? If yes please click the "Submit" button. Thank you very much.</h3>
</div>
                        
                    </div>
                    
                    <div style="overflow:auto;">
                        <div style="">
                        
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        
                    </div>
                    </form>

                </div>
            

                



            </div>
            </center>
        </div>

        <script src="../assets/js/company/jobposting.js"></script>
</body>
</html>