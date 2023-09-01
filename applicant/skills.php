<?php
$page_title = "Applicant Profile / Skills";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eligibility</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_skills.css">
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
                <?php
                include "profilenav.php";
                ?>

                <div class="card3">
                    <div class="card4">
                                    
                        <form action="" method="post">
                            <div class="form-card">
                                <div class="form-col-1">
                                    <h2>Skills</h2>
                                    <a href="training_update.php" class="edit">Edit</a>
                                </div>
                            </div>
                            <br>

                            <h4><label for="">21ST CENTURY SKILLS</label></h4>
                                    <h5><label for="">(Check five skills you possess[self assessment])</label></h5>
                                    <div style="text-align: left;" class="col2">
        
                                        <input type="checkbox" id="Innovation" name="skill[]" value="Innovation">
                                        <label for="skill_1">Innovation</label><br>
        
                                        <input type="checkbox" id="Team-Work" name="skill[]" value="Team Work">
                                        <label for="skill_2">Team Work</label><br>
        
                                        <input type="checkbox" id="Multitasking" name="skill[]" value="Multitasking">
                                        <label for="skill_3">Multitasking</label><br>
        
                                        <input type="checkbox" id="Work-Ethics" name="skill[]" value="Work Ethics">
                                        <label for="skill_4">Work Ethics</label><br>
        
                                        <input type="checkbox" id="Self-Motivation" name="skill[]" value="Self Motivation">
                                        <label for="skill_5">Self Motivation</label><br>
        
                                        <input type="checkbox" id="Creative-Problem-Solving" name="skill[]" value="Creative Problem Solving">
                                        <label for="skill_6">Creative Problem Solving</label><br>
        
                                        <input type="checkbox" id="Problem-Solving" name="skill[]" value="Problem Solving">
                                        <label for="skill_7">Problem Solving</label><br>
        
                                        <input type="checkbox" id="Critical-Thinking" name="skill[]" value="Critical Thinking">
                                        <label for="skill_8">Critical Thinking</label><br>
                                    </div>

                                    <div style="text-align: left;" class="col3">

                                        <input type="checkbox" id="Decision-Making" name="skill[]" value="Decision Making">
                                        <label for="skill_9">Decision Making</label><br>
        
                                        <input type="checkbox" id="Stress-Tolerance" name="skill[]" value="Stress Tolerance">
                                        <label for="skill_10">Stress Tolerance</label><br>
        
                                        <input type="checkbox" id="Planning-and-Organizing" name="skill[]" value="Planning and Organizing">
                                        <label for="skill_11">Planning and Organizing</label><br>
        
                                        <input type="checkbox" id="Social-Perceptiveness" name="skill[]" value="Social Perceptiveness">
                                        <label for="skill_12">Social Perceptiveness</label><br>
        
                                        <input type="checkbox" id="English-Functional-Skills" name="skill[]" value="English Functional Skills">
                                        <label for="skill_13">English Functional Skills</label><br>
        
                                        <input type="checkbox" id="English-Comprehension" name="skill[]" value="English Comprehension">
                                        <label for="skill_14">English Comprehension</label><br>
        
                                        <input type="checkbox" id="Math-Functional-Skill" name="skill[]" value="Math Functional Skill">
                                        <label for="skill_15">Math Functional Skill</label><br>
                                       </div>
                                       <br>

                                <h4><label for="">TECHNICAL SKILLS ACQUIRED WITHOUT FORMAL TRAINING</label></h4>
                                    <div style="text-align: left;" class="col2">
        
                                        <input type="checkbox" id="Carpentry" name="techSkill[]" value="Carpentry">
                                        <label for="Techskill_1">Carpentry</label><br>
        
                                        <input type="checkbox" id="Masonry" name="techSkill[]" value="Masonry">
                                        <label for="Techskill_2">Masonry</label><br>
        
                                        <input type="checkbox" id="Welding" name="techSkill[]" value="Welding">
                                        <label for="Techskill_3">Welding</label><br>
        
                                        <input type="checkbox" id="Auto-Mechanic" name="techSkill[]" value="Auto Mechanic">
                                        <label for="Techskill_4">Auto Mechanic</label><br>
        
                                        <input type="checkbox" id="Plumbing" name="techSkill[]" value="Plumbing">
                                        <label for="Techskill_5">Plumbing</label><br>
        
                                        <input type="checkbox" id="Driving" name="techSkill[]" value="Driving">
                                        <label for="Techskill_6">Driving</label><br>
        
                                        <input type="checkbox" id="Gardening" name="techSkill[]" value="Gardening">
                                        <label for="Techskill_7">Gardening</label><br>
                                    </div>

                                    <div style="text-align: left;" class="col3">

                                        <input type="checkbox" id="Tailoring" name="techSkill[]" value="Tailoring">
                                        <label for="Techskill_8">Tailoring</label><br>
        
                                        <input type="checkbox" id="Photograph" name="techSkill[]" value="Photograph">
                                        <label for="Techskill_9">Photograph</label><br>
        
                                        <input type="checkbox" id="Hairdressing" name="techSkill[]" value="Hairdressing">
                                        <label for="Techskill_10">Hairdressing</label><br>
        
                                        <input type="checkbox" id="Cooking" name="techSkill[]" value="Cooking">
                                        <label for="Techskill_11">Cooking</label><br>
        
                                        <input type="checkbox" id="Baking" name="techSkill[]" value="Baking">
                                        <label for="Techskill_12">Baking</label><br>
        
                                        <input type="checkbox" id="Other" name="techSkill[]" value="">
                                        <label for="Techskill_13">Other:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input style="width: 40%; height: 15px;" type="text" id="Techskill_13" name="otherTechskill" value="">
                                     </div>
                        </form>
                    </div>
                                
                </div>

            </div>
            </center>
        </div>

                
    </body>
</html>