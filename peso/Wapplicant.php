<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WALK-IN APPLICANT</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/PESO_LOGO.png">
    <link rel="stylesheet" href="../assets/css/peso_Wapplicant.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php 
    include "../function.php";
    include "sidenav.php";
    ?>

    <div class="cardA">
            <?php 
                include "topnav.php";
            ?>
            <center>
            <div class="cardB">
                <div class="cardC">

    <div class="card1">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="mt-5 mb-3 clearfix">
                            <div class="card2">
                                <h2 class="pull-left">WALK IN APPLICANTS</h2>
                            </div>
                            <div class="card2">
                                <a href="Wapplicant_create.php" style="background: #7A0042" class="btn btn-success pull-left"><i class="fa fa-plus"></i> ADD NEW APPLICANT</a>
                            </div>
                        </div>
                        <div class="card3">
                        <?php
                        // Include config file
                        require_once "Wapplicant_config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM walkin_applicant";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle</th>";
                                            echo "<th>Email</th>";
                                            echo "<th>Action</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['W_applicant_id'] . "</td>";
                                            echo "<td>" . $row['W_lastName'] . "</td>";
                                            echo "<td>" . $row['W_firstName'] . "</td>";
                                            echo "<td>" . $row['W_midName'] . "</td>";
                                            echo "<td>" . $row['W_email'] . "</td>";
                                            echo "<td>";
                                                echo '<a href="Wapplicant_read.php?W_applicant_id='. $row['W_applicant_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span style="color:#7A0042;" class="fa fa-eye"></span></a>';
                                                echo '<a href="Wapplicant_update.php?W_applicant_id='. $row['W_applicant_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span style="color:#7A0042;" class="fa fa-pencil"></span></a>';
                                                echo '<a href="Wapplicant_delete.php?W_applicant_id='. $row['W_applicant_id'] .'" title="Delete Record" data-toggle="tooltip"><span style="color:#7A0042;" class="fa fa-trash"></span></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
    
                        // Close connection
                        mysqli_close($link);
                        ?>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
    
    </div>
    </div>
    </center>
    </div>

    

</body>
</html>