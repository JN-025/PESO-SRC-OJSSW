<?php
session_start();
include '../conn.php';
$applicant_id = $_SESSION["applicant_id"];
if (isset($_GET['jobPostId'])) {
    $jobPostId = $_GET['jobPostId'];

    $sql = "SELECT * FROM c_jobpost WHERE c_jobpost_id = $jobPostId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $description = nl2br(htmlspecialchars($row['description']));
        $jobDetails = 
        '<div class="col-2-content col-sticky">'.
        '<div class="description fulldescription">' .
            '<div class="desc-col-1 fulldesc-1">' .
            '<h2>' . $row['jobTitle'] . '</h2>' .
            '<h3>Company Name: <span>' . $row['companyName'] . '</span></h3>' .
            '<h3>Company Industry: <span>' . $row['industry'] . '</span></h3>' .
            '<h3>Salary: <span>' .'₱'. $row['salary'] . '</span></h3>' .
            '<h3>Work Location: <span>' . $row['workLocation'] . '</span></h3>' .
            '<h3>Slots: <span>' . $row['slot'] . '</span></h3>' .
            '<h3>Job Information: <span>' . '<p>'.$description.'</p>' . '</span></h3>' .
            '<div class="footer-info">'.
            '<h3>Skills: <span>' . $row['skills'] . '</span></h3>' .
            '<h3>Experience: <span>' . $row['yrsExperience'] . '</span></h3>' .
            '<div class="applymodal-btn">'.
            '<h3>Educational Attainment: <span>' . $row['educBg'] . '</span></h3>' .
            '<a href="#question_form" id="modal-link" class="a-modal">Apply</a>' .
            '</div>'.
            '</div>' .
            '</div>'.
            '<div class="desc-col-2 fulldesc-2">' .
            '<div class="full-img">'.
            '<img src="' . $row['img'] . '" alt="">' .
            '</div>'.
            '</div>' .
        '</div>'.
        '</div>';

        echo $jobDetails;
    } else {
        echo "Job details not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gelasio&family=Lato:ital,wght@0,300;1,300&family=Lilita+One&family=Luckiest+Guy&family=Mohave&family=Poppins:wght@400;800&family=Roboto+Serif:ital,opsz,wght@0,8..144,400;1,8..144,200&family=Sunflower:wght@700&display=swap');
        .col-sticky{
            font-family: 'Mohave';
            position:sticky; 
            top: 75px;
        }
        .fulldescription{
            display: flex; 
            min-height: auto;
            max-height: 80vh;
            position:relative; 
            overflow-y: auto;
        }
        .fulldescription h2{
            font-size: 30px;
        }
        .fulldescription h3{
            margin: 10px 0;
            font-size: 17px;
        }
        .fulldescription span{
            font-weight: 400;
        }
        .fulldesc-1{
            display: block;
            flex: 1;
            margin-left: 20px;
        }
        .fulldesc-2{
            position: relative;
            flex: 0.5;
        }
        .footer-info{
            margin-top: 50px;
        }
        .full-img img{
            margin-left: 50px;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            width: 150px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
        .a-modal{
            position: absolute;
            right: 20px;
            text-decoration:none; 
            font-family: 'Poppins';
            padding: 8px 30px; 
            background-color: #A81E1E; 
            color: #fff; 
            box-shadow: 0px 4px 4px 0px #D72121 inset; 
            box-shadow: 0px 4px 4px 0px #770B0B40; 
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s;
            }
        .a-modal:hover{
            opacity: 0.6;
            }
        .a-modal:active{
            transform: translateY(4px);
        }
        .applymodal-btn{
            display: flex;
            padding-bottom: 20px;
        }
        .modal {
            z-index: 9999;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        .modal-content {
            position: relative;
            display: none;
            font-family: 'Roboto Serif', serif;
            background-color: #fefefe;
            border-radius: 10px;
            padding: 20px;
            width: 60%;
            margin: auto;
            text-align: center;
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
        .modal:target {
            display: flex;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            text-decoration: none;
        }

        .close:hover,
        .close:focus {
            color: black;
            cursor: pointer;
        }
        .modal-content{
            width: 500px;
            margin-top: 70px;
            overflow-y: auto;
        }
        .company-question{
            position: relative;
            display:flex;
        }
        .question-content{
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
            text-align:left;
            width: 70%;
        }
        .question-content h5{
            color: #D0342C;
        }
        h2{
            color: #D0342C;
        }
        .company-question .question-option{
            right: 0;
            position: absolute;
        }
        .company-question .question-option select{
            cursor: pointer;
            font-size: 15px;
            text-align:center;
            height: 30px;
            margin: 20px;
            background-color: #A81E1E;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 4px 0px #D72121 inset;
            box-shadow: 0px 4px 4px 0px #770B0B40;
        }
        .d-none{
            display: none;
        }
        .require-stage{
            position: relative;
            font-family: 'Roboto Serif', serif;
            background-color: #A81E1E;
            border-radius: 10px;
            padding: 40px;
            max-width: 80%;
            margin: auto;
            text-align: center;
        }
        .require-stage h4{
            color: #FFFFFF;
            margin-bottom: 30px;
        }
        .require-stage .bi{
            font-size: 15px;
        }
        .require-stage .bi-check{
            color: green;
        }
        .require-stage .bi-x{
            color: red;
        }
    </style>
</head>
<body>
      <div id="question_form" class="modal">
        <div id="requirestage" class="require-stage">
        <h4>Please fill up the NSRS Form before applying</h4>
        <div class="profile-progress">
                <?php 
                if(isset($_SESSION["applicant_id"])){
                $profileQuery = "SELECT * FROM applicant_profile WHERE applicant_id = $applicant_id";
                $profileResult = mysqli_query($conn, $profileQuery);
                if(mysqli_num_rows($profileResult) >= 1){
                    echo '<style>.require-stage { display: none; }</style>';
                    echo '<style>.modal-content { display: block; }</style>';
                }
                else{
                    echo "<a href='multiform_profile.php' style='padding: 10px 40px; border-radius: 10px;background-color: #D9D9D9; color: #A81E1E; text-decoration: none; font-weight: 900; box-shadow: 0px 4px 4px 0px #00000040; cursor: pointer; '>Go to NSRS Form</a>";
                    
                }}
                ?>
        </div>
        </div>
        <div class="modal-content">
            <a href="#" class="close">&times;</a>
            <h2>Apply for the Job</h2>
            <h4>First answer the question provided by the company</h4>

            <form id="questionForm" action="apply_process.php" method="post">
            <input type="hidden" name="jobPostId" value="<?php echo $row['c_jobpost_id'] ?>">
            <div class="company-question">
            <div class="question-content">
            <h5>Question #1</h5>
            <?php echo $row["questionNo1"];?>
            </div>
            <div class="question-option">
            <select name="answerNo1" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
                <h5>Question #2</h5>
            <?php echo $row["questionNo2"];?>
            </div>
            <div class="question-option">
            <select name="answerNo2" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #3</h5>
            <?php echo $row["questionNo3"];?>
            </div>
            <div class="question-option">
            <select name="answerNo3" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #4</h5>
            <?php echo $row["questionNo4"];?>
            </div>
            <div class="question-option">
            <select name="answerNo4" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #5</h5>
            <?php echo $row["questionNo5"];?>
            </div>
            <div class="question-option">
            <select name="answerNo5" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <button type="submit" name="applyButton">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
<script>

        var requirestage = document.getElementById("requirestage");
        var modal = document.getElementById("modal");
        window.onclick = function(event){
            if(event.target == modal){
                requirestage.style.display = "none";
            }
        }
    document.getElementById("questionForm").addEventListener("submit", function (e) {
        var selectElement = document.getElementById("answer");
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;

        if (selectedOption !== "Yes" && selectedOption !== "No") {
            alert("Please select either 'Yes' or 'No'.");
            e.preventDefault();
        }
    });
</script>