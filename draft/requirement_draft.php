<?php
$page_title = "Company Requirement";
session_start();
// Include config file
include "../peso_function.php";
$alert = ""; 

if (!isset($_SESSION['company_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: company_register_draft.php");
    exit();
}


?>


<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="file" name="file2" />
<button type="submit" name="upload">upload</button>
</form>
</body>
</html>