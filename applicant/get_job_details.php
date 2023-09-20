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
        $jobDetails = '<div class="col-2-content">'.'<div class="description"style="position:relative; min-height: 100vh; ">' .
            '<div class="desc-col-1" style="padding: 10px; margin: 0; border: 2px solid none; border-radius: 10px; flex: 1;">' .
            '<h2 style="margin-bottom: 10px;font-size: 30px; font-weight: bold;">' . $row['jobTitle'] . '</h2>' .
            '<h3 style="font-size: 14px;">Company Name: <span style="font-weight:400">' . $row['companyName'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Company Industry: <span style="font-weight:400">' . $row['industry'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Work Location: <span style="font-weight:400">' . $row['workLocation'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Slots: <span style="font-weight:400">' . $row['slot'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Salary: <span style="font-weight:400">' .'₱'. $row['salary'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Skills: <span style="font-weight:400">' . $row['skills'] . '</span></h3>' .
            '<h3 style="font-size: 14px;">Description: <span style="font-weight:400">' . '<p style="text-align: justify;">&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mi purus, aliquam in ipsum sit amet, tristique molestie orci. Proin fermentum turpis vitae varius viverra. Mauris placerat sodales sollicitudin. Sed scelerisque velit accumsan dui imperdiet mollis id fermentum orci. Donec vehicula neque ut orci posuere, ac tempus lacus viverra. Suspendisse in magna at risus mattis egestas ut et mi. In accumsan pellentesque cursus. Nam sollicitudin pulvinar arcu. Pellentesque volutpat ipsum nulla, quis venenatis erat dapibus laoreet.
            <br><br>
            &nbsp;&nbsp;Duis egestas, diam a tincidunt lobortis, libero sapien tempus eros, ac pulvinar libero augue eget arcu. Etiam risus odio, auctor ac convallis sit amet, rutrum et risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin at accumsan leo, eget placerat ipsum. Duis tellus diam, congue eget risus sed, pharetra sollicitudin augue. In posuere felis quis semper scelerisque. Fusce nec sem non arcu tincidunt varius.</p>' . '</span></h3>' .
            '</div>' .
            '<div class="desc-col-2" style="position:relative;flex: 0 0 30%;">' .
            '<div>' .
            '<div class="full-img">'.
            '<img style="width:150px;height: 150px;border-radius:10px;"src="' . $row['img'] . '" alt="">' .
            '</div>'.
            '</div>' .

            '<a href="#question_form" id="modal-link" class="a-modal">Apply</a>' .
            '</div>' .
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
        .full-img{
            margin: 10px;
            transition: 5s;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
        .full-img:hover{
            background-color: #fff;
        }
        .a-modal{
            right: 0;
            position: absolute;
            text-decoration:none; 
            padding: 10px; 
            background-color: #A81E1E; 
            color: #fff; 
            box-shadow: 0px 4px 4px 0px #D72121 inset; 
            box-shadow: 0px 4px 4px 0px #770B0B40; 
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
            }
        .a-modal:hover{
            transform: scale(1.2);
            }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            display: none;
            font-family: 'Roboto Serif', serif;
            background-color: #fefefe;
            border-radius: 10px;
            padding: 20px;
            max-width: 80%;
            margin: auto;
            text-align: center;
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
            font-family: 'Roboto Serif', serif;
            background-color: #fefefe;
            border-radius: 10px;
            padding: 20px;
            max-width: 80%;
            margin: auto;
            text-align: center;
        }
        .bi{
            font-size: 15px;
        }
        .bi-check{
            color: green;
        }
        .bi-x{
            color: red;
        }
    </style>
</head>
<body>
      <div id="question_form" class="modal">
        <div class="require-stage">
        <a href="#" class="close">&times;</a>
        <h2>Requirements</h2>
        <h4>Please complete first the following to proceed</h4>
        <div class="profile-progress">
            <h5>Applicant Profile
                <?php 
                if(isset($_SESSION["applicant_id"])){
                $profileQuery = "SELECT * FROM applicant_profile WHERE applicant_id = $applicant_id";
                $profileResult = mysqli_query($conn, $profileQuery);
                if(mysqli_num_rows($profileResult) >= 1){
                    echo '<style>.require-stage { display: none; }</style>';
                    echo '<style>.modal-content { display: block; }</style>';
                }
                else{
                    echo "<i class='bi bi-x'>required</i>";
                }}
                ?>
            </h5>
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
            <?php echo $row["question1"];?>
            </div>
            <div class="question-option">
            <select name="answer_1" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
                <h5>Question #2</h5>
            <?php echo $row["question2"];?>
            </div>
            <div class="question-option">
            <select name="answer_2" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #3</h5>
            <?php echo $row["question3"];?>
            </div>
            <div class="question-option">
            <select name="answer_3" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #4</h5>
            <?php echo $row["question4"];?>
            </div>
            <div class="question-option">
            <select name="answer_4" id="answer" required>
                <option value="" selected hidden>Choose</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            </div>
            </div>
            <div class="company-question">
            <div class="question-content">
            <h5>Question #5</h5>
            <?php echo $row["question5"];?>
            </div>
            <div class="question-option">
            <select name="answer_5" id="answer" required>
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
    document.getElementById("questionForm").addEventListener("submit", function (e) {
        var selectElement = document.getElementById("answer");
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;

        if (selectedOption !== "Yes" && selectedOption !== "No") {
            alert("Please select either 'Yes' or 'No'.");
            e.preventDefault();
        }
    });
</script>