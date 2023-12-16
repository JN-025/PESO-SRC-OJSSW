<?php
$page_title = "Tasks";
session_start();
// Include config file
include "../conn.php";
$alert = ""; 
if (!isset($_SESSION['spes_id'])) {
    $alert = "<div class='alert alert-danger'style='position:absolute; font-size: 50px;'>Please Login First!<div>";
    header("location: homepage.php");
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
    <link rel="stylesheet" href="../assets/css/profiling_task.css">
    <title>Profiling Task</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <?php
    include "../function.php";
    include "topnav.php";
    ?>
    <div class="main-container">

<!-- Add Profile -->
<div class="modal fade" id="profileAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveProfile">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Household Number</label>
                    <input type="text" name="householdNum" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Age</label>
                    <input type="text" name="age" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Status</label>
                    
                    <select type="text" name="status" class="form-control">
                        <option value="" selected hidden>Status</option>
                        <option value="PWD">PWD</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                        <option value="Student">Student</option>
                        <option value="Solo Parent">Solo Parent</option>
                        <option value="N/A">N/A</option>
                    </select>

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Sex</label>
                   
                    <select type="text" name="sex" class="form-control">
                        <option value="" selected hidden>Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select> 
                    </div>
                    <div class="col-2">
                    <label for="">Employment Status</label>
                    
                    <select type="text" name="employmentStatus" class="form-control">
                        <option value="" selected hidden>Employment Status</option>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                        <option value="Kasambahay">Kasambahay</option>
                        <option value="OFW">OFW</option>
                        <option value="Livelihood">Livelihood</option>
                    </select> 
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" class="form-control" />
                    </div>
                    <div class="col-2">

                    <label for="">Civil Status</label>
                   
                    <select type="text" name="civilStatus" class="form-control">
                        <option value="" selected hidden>Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow">Widow</option>
                        <option value="Separated">Separated</option>
                    </select> 
                    </div>
                    <div class="col-3">
                    <label for="">If Employed:</label>
                    
                    <select type="text" name="employmentType" class="form-control">
                        <option value="" selected hidden>Type of Employment</option>
                        <option value="Regular">Regular</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Below 18">Below 18 yrs old</option>
                        <option value="N/A">N/A</option>
                    </select> 
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Date of Arrival: (For OFW)</label>
                    <input type="date" name="arrivalDate" class="form-control" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Suffix</label>
                    <input type="text" name="suffix" class="form-control" />
                    </div>
                    
                    <div class="col-2">
                    <label for="">Barangay</label>
                    
                    <select type="text" name="brgy" class="form-control">
                        <option value="" selected hidden>Barangay</option>
                        <option value="Aplaya">Aplaya</option>
                        <option value="Balibago">Balibago</option>
                        <option value="Caingin">Caingin</option>
                        <option value="Dila">Dila</option>
                        <option value="Dita">Dita</option>
                        <option value="Don Jose">Don Jose</option>
                        <option value="Ibaba">Ibaba</option>
                        <option value="Kanluran">Kanluran</option>
                        <option value="Labas">Labas</option>
                        <option value="Macabling">Macabling</option>
                        <option value="Malitlit">Malitlit</option>
                        <option value="Malusak">Malusak</option>
                        <option value="Market Area">Market Area</option>
                        <option value="Pook">Pook</option>
                        <option value="Pulong Santa Cruz">Pulong Santa Cruz</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Sinalhan">Sinalhan</option>
                        <option value="Tagapo">Tagapo</option>
                    </select> 
                    </div>
                    <div class="col-3">
                    <label for="">Type of Disability: (For PWD)</label>
                    <input type="text" name="disabilityType" class="form-control" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Birthday</label>
                    <input type="date" name="birthday" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <input type="text" name="educAttainment" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Encoded By:</label>
                    <input type="text" name="encodedBy" class="form-control" />
                    </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn save">Save Profile</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="profileEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateProfile">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="profile_id" id="profile_id" >

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Household Number</label>
                    <input type="text" name="householdNum" id="householdNum" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Age</label>
                    <input type="text" name="age" id="age" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Status</label>
                    <select type="text" name="status" id="status" class="form-control">
                        <option value="" selected hidden>Status</option>
                        <option value="PWD">PWD</option>
                        <option value="Senior Citizen">Senior Citizen</option>
                        <option value="Student">Student</option>
                        <option value="Solo Parent">Solo Parent</option>
                        <option value="N/A">N/A</option>
                    </select>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Sex</label>
                    <select type="text" name="sex" id="sex" class="form-control">
                        <option value="" selected hidden>Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="col-2">
                    <label for="">Employment Status</label>
                    <select type="text" name="employmentStatus" id="employmentStatus" class="form-control">
                        <option value="" selected hidden>Employment Status</option>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                        <option value="Kasambahay">Kasambahay</option>
                        <option value="OFW">OFW</option>
                        <option value="Livelihood">Livelihood</option>
                    </select>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Civil Status</label>
                    <select type="text" name="civilStatus" id="civilStatus" class="form-control">
                        <option value="" selected hidden>Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow">Widow</option>
                        <option value="Separated">Separated</option>
                    </select>
                    </div>
                    <div class="col-3">
                    <label for="">If Employed:</label>
                    <select type="text" name="employmentType" id="employmentType" class="form-control">
                        <option value="" selected hidden>Type of Employment</option>
                        <option value="Regular">Regular</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Below 18">Below 18 yrs old</option>
                        <option value="N/A">N/A</option>
                    </select>
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Date of Arrival: (For OFW)</label>
                    <input type="text" name="arrivalDate" id="arrivalDate" class="form-control" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Suffix</label>
                    <input type="text" name="suffix" id="suffix" class="form-control" />
                    </div>
                    
                    <div class="col-2">
                    <label for="">Barangay</label>
                    <select type="text" name="brgy" id="brgy" class="form-control">
                        <option value="" selected hidden>Barangay</option>
                        <option value="Aplaya">Aplaya</option>
                        <option value="Balibago">Balibago</option>
                        <option value="Caingin">Caingin</option>
                        <option value="Dila">Dila</option>
                        <option value="Dita">Dita</option>
                        <option value="Don Jose">Don Jose</option>
                        <option value="Ibaba">Ibaba</option>
                        <option value="Kanluran">Kanluran</option>
                        <option value="Labas">Labas</option>
                        <option value="Macabling">Macabling</option>
                        <option value="Malitlit">Malitlit</option>
                        <option value="Malusak">Malusak</option>
                        <option value="Market Area">Market Area</option>
                        <option value="Pook">Pook</option>
                        <option value="Pulong Santa Cruz">Pulong Santa Cruz</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Sinalhan">Sinalhan</option>
                        <option value="Tagapo">Tagapo</option>
                    </select>
                    </div>
                    <div class="col-3">
                    <label for="">Type of Disability: (For PWD)</label>
                    <input type="text" name="disabilityType" id="disabilityType" class="form-control" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Birthday</label>
                    <input type="text" name="birthday" id="birthday" class="form-control" />
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <input type="text" name="educAttainment" id="educAttainment" class="form-control" />
                    </div>
                    <div class="col-3">
                    <label for="">Encoded By:</label>
                    <input type="text" name="encodedBy" id="encodedBy" class="form-control" />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn save">Update Details</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Profile Modal -->
<div class="modal fade" id="profileViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Household Number</label>
                    <p id="view_householdNum" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Age</label>
                    <p id="view_age" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">Status</label>
                    <p id="view_status" class="form-control"></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <p id="view_lastname" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Sex</label>
                    <p id="view_sex" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">Employment Status</label>
                    <p id="view_employmentStatus" class="form-control"></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">First Name</label>
                    <p id="view_firstname" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Civil Status</label>
                    <p id="view_civilStatus" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">If Employed:</label>
                    <p id="view_employmmentType" class="form-control"></p>
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Middle Name</label>
                    <p id="view_middlename" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Address</label>
                    <p id="view_address" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">Date of Arrival: (for OFW)</label>
                    <p id="view_arrivalDate" class="form-control"></p>
                    </div>
                    
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Suffix</label>
                    <p id="view_suffix" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Barangay</label>
                    <p id="view_brgy" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">Type of Disability</label>
                    <p id="view_disabilityType" class="form-control"></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Birthday</label>
                    <p id="view_birthday" class="form-control"></p>
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <p id="view_educAttainment" class="form-control"></p>
                    </div>
                    <div class="col-3">
                    <label for="">Encoded By:</label>
                    <p id="view_encodedBy" class="form-control"></p>
                    </div>
                </div>


                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profiling Task
                        
                        <button type="button" class="btn add float-end" data-bs-toggle="modal" data-bs-target="#profileAddModal">
                            Add Profile
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Household Number</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Barangay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../conn.php';
                            
                            $spes_id = mysqli_real_escape_string($conn, $_SESSION['spes_id']);

                            $query = "SELECT * FROM profiling_task WHERE spes_id = $spes_id";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $profile)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $profile['householdNum'] ?></td>
                                        <td><?= $profile['firstname'] ?>&nbsp;&nbsp;<?= $profile['middlename'] ?>&nbsp;&nbsp;<?= $profile['lastname'] ?>&nbsp;&nbsp;<?= $profile['suffix'] ?></td>
                                        <td><?= $profile['birthday'] ?></td>
                                        <td><?= $profile['age'] ?></td>
                                        <td><?= $profile['sex'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$profile['profiling_id'];?>" class="viewProfileBtn btn view btn-sm">View</button>
                                            <button type="button" value="<?=$profile['profiling_id'];?>" class="editProfileBtn btn edit btn-sm">Edit</button>
                                            <button type="button" value="<?=$profile['profiling_id'];?>" class="deleteProfileBtn btn delete btn-sm">Delete</button>
                                        </td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#saveProfile', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_profile", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#profileAddModal').modal('hide');
                        $('#saveProfile')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editProfileBtn', function () {

            var profile_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?profile_id=" + profile_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#profile_id').val(res.data.profiling_id);
                        $('#householdNum').val(res.data.householdNum);
                        $('#age').val(res.data.age);
                        $('#status').val(res.data.status);
                        $('#lastname').val(res.data.lastname);
                        $('#sex').val(res.data.sex);
                        $('#employmentStatus').val(res.data.employmentStatus);
                        $('#firstname').val(res.data.firstname);
                        $('#civilStatus').val(res.data.civilStatus);
                        $('#employmentType').val(res.data.employmentType);
                        $('#middlename').val(res.data.middlename);
                        $('#address').val(res.data.address);
                        $('#arrivalDate').val(res.data.arrivalDate);
                        $('#suffix').val(res.data.suffix);
                        $('#brgy').val(res.data.brgy);
                        $('#disabilityType').val(res.data.disabilityType);
                        $('#birthday').val(res.data.birthday);
                        $('#educAttainment').val(res.data.educAttainment);
                        $('#encodedBy').val(res.data.encodedBy);
                        $('#profileEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateProfile', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_profile", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#profileEditModal').modal('hide');
                        $('#updateProfile')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewProfileBtn', function () {

            var profile_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?profile_id=" + profile_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_householdNum').text(res.data.householdNum);
                        $('#view_age').text(res.data.age);
                        $('#view_status').text(res.data.status);
                        $('#view_lastname').text(res.data.lastname);
                        $('#view_sex').text(res.data.sex);
                        $('#view_employmentStatus').text(res.data.employmentStatus);
                        $('#view_firstname').text(res.data.firstname);
                        $('#view_civilStatus').text(res.data.civilStatus);
                        $('#view_employmentType').text(res.data.employmentType);
                        $('#view_middlename').text(res.data.middlename);
                        $('#view_address').text(res.data.address);
                        $('#view_arrivalDate').text(res.data.arrivalDate);
                        $('#view_suffix').text(res.data.suffix);
                        $('#view_brgy').text(res.data.brgy);
                        $('#view_disabilityType').text(res.data.disabilityType);
                        $('#view_birthday').text(res.data.birthday);
                        $('#view_educAttainment').text(res.data.educAttainment);
                        $('#view_encodedBy').text(res.data.encodedBy);

                        $('#profileViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteProfileBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var profile_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_profile': true,
                        'profile_id': profile_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>

</body>
</html>