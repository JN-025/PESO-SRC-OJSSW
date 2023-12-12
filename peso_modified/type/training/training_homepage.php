<?php
$page_title = "Edit Question";
session_start();
include "../../../conn.php";
$alert = "";

if (!isset($_SESSION['peso_id'])) {
    $alert = "<div class='alert alert-danger' style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    $difficulty = $_POST["difficulty"];
    $category = $_POST["category"];
    $question = $_POST["question"];
    $correct_answer = $_POST["correct_answer"];
    $incorrect_answers = explode(",", $_POST["incorrect_answers"]);

    $jsonFile = "../../../training_questions.json";
    $jsonData = json_decode(file_get_contents($jsonFile), true);

    $newQuestion = [
        "type" => $type,
        "difficulty" => $difficulty,
        "category" => $category,
        "question" => $question,
        "correct_answer" => $correct_answer,
        "incorrect_answers" => $incorrect_answers
    ];

    $jsonData["results"][] = $newQuestion;

    file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

    // Optionally, you can redirect the user to a confirmation page or perform other actions.
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESO COMPANY Homepage</title>
    <link rel="shortcut icon" href="../../../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../peso.css">
</head>

<body>
    <?php
    include "../../../function.php";
    include "../topnav.php";
    ?>
    <div class="main-container">
        <div class="main-row">
            <div class="col-1">
                <div class="header">
                    <?php echo $alert; ?>
                    <h2>Create a New Question</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="type">Type:</label>
                        <input type="text" name="type">
                        <br>
                        <label for="difficulty">Difficulty:</label>
                        <input type="text" name="difficulty">
                        <br>
                        <label for="category">Category:</label>
                        <input type="text" name="category">
                        <br>
                        <label for="question">Question:</label>
                        <input type="text" name="question" required>
                        <br>
                        <label for="correct_answer">Correct Answer:</label>
                        <input type="text" name="correct_answer" required>
                        <br>
                        <label for="incorrect_answers">Incorrect Answers (comma-separated):</label>
                        <input type="text" name="incorrect_answers" required>
                        <br>
                        <button type="submit">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../applicant/quiz/js/game.js"></script>
</body>

</html>
