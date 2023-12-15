<?php
$page_title = "Home";
session_start();
// Include config file
include "../conn.php";
$alert = ""; 
if (!isset($_SESSION['spes_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/Wcompany.css">
    <title>Profiling Task</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profiling List
                              
                            </h4>
                        </div>
                        <div class="card-body">

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Household Number</th>
                                        <th>Name</th>
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../conn.php';
                                    

                                    $query = "SELECT * FROM profiling_task";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $profile)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $profile['householdNum'] ?></td>
                                                <td><?= $profile['firstname'] ?></td>
                                                <td><?= $profile['birthday'] ?></td>
                                                <td><?= $profile['age'] ?></td>
                                                <td><?= $profile['sex'] ?></td>
                                            
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</body>
</html>
