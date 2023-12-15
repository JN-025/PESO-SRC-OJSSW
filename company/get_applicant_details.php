
<!--NOT FUNCTIONAL - TEST PURPOSE-->
<?php
include "../conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['applicantId'])) {
    $applicantId = $_POST['applicantId'];

    $query = "SELECT * FROM applicant_profile WHERE applicant_id = $applicantId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $profileData = $result->fetch_assoc();
        echo "<p>Name: {$profileData['fullname']}</p>";
        echo "<p>Email: {$profileData['email']}</p>";
    } else {
        echo "<p>No profile details found for this applicant.</p>";
    }

    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>
