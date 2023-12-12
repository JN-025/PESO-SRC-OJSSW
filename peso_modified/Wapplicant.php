<?php
$page_title = "Walk-in";
    
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESO COMPANY Homepage</title>
    <link rel="shortcut icon" href="../assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/peso_Wapplicant.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Londrina Solid">
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
        input[type=text]
        {
            border-radius: 6px;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
            width: 300px;
            float: left;
            color: #919191;
            text-align: center;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);
            font-family: Poppins;
            font-size: 15px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            border: none;
            padding: 8px 8px;
            margin-right: 20px;
        }
        .add
            {
                background-color: #A81E1E;
                box-shadow: 0px 4px 4px 0px #D72121 inset;
                filter: drop-shadow(0px 4px 4px #770B0B);
                color: #FFF;
                text-align: center;
                font-family: Poppins;
                font-size: 13px;
                font-style: normal;
                font-weight: 700;
                padding: 0px 8px;
                border: none;
                border-radius: 20px;
                float: left;
            }
    </style>
</head>
<body>
    <?php 
    include "../function.php";
   
    include "topnav_applicant.php";
    ?>
    <div class="card1" style="background: white; height: 200vh; width: 80%; margin-top: 15vh; margin-left: 5%;">
    
    <div class="wrapper" style="background: white;">
    <div class="container-fluid">
        <div class="row">
                                
                            <br>     
                            <div class="card2" style="width: 100%;">
                                
                                <input type="text" placeholder="Search.." name="search">
                                
                                
                                <button class="add" onclick="document.location='Wapplicant_create.php'"><i class="bi bi-plus"></i>&nbsp;&nbsp;ADD A NEW WALK-IN APPLICANT</button>
                                
                            </div>
                            <br>
                            </div>
                        <div class="card3" style="margin-top: 20px;">
                        <?php
                        // Include config file
                        require_once "../peso/Wapplicant_config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM wap_info";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table style="border-radius: 30px; text-align: center;" class="table table-bordered">';
                                    echo '<thead >';
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Email Address</th>";
                                            echo "<th>Action</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['Wa_profile1_id'] . "</td>";
                                            echo "<td>" . $row['lastName'] . "</td>";
                                            echo "<td>" . $row['firstName'] . "</td>";
                                            echo "<td>" . $row['midName'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>";
                                                echo '<a href="Wapplicant_read.php?Wa_profile1_id='. $row['Wa_profile1_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span style="color:#B22623;" class="fa fa-eye"></span></a>';
                                                echo '<a href="Wapplicant_update.php?Wa_profile1_id='. $row['Wa_profile1_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span style="color:#B22623;" class="fa fa-pencil"></span></a>';
                                                echo '<a href="Wapplicant_delete.php?Wa_profile1_id='. $row['Wa_profile1_id'] .'" title="Delete Record" data-toggle="tooltip"><span style="color:#B22623;" class="fa fa-trash"></span></a>';
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
</body>
</html>
