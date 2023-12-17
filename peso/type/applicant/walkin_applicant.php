<?php
$page_title = "Tasks";
session_start();
// Include config file
include "../../../conn.php";
$alert = ""; 
if (!isset($_SESSION['access_id'])) {
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
    <link rel="stylesheet" href="../../../assets/css/profiling_task.css">
    <title>Walk-in Applicant</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <?php
    include "../../../function.php";
    include "../topnav.php";
    ?>
    <div class="main-container">

<!-- Add Applicant -->
<div class="modal fade" id="applicantAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveApplicant">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>
                
                <div class="row-2">
                    <div class="col-1">
                    <label for="">NSRS Form Number</label>
                    <input type="text" name="nsrsNum" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Suffix</label>
                    <input type="text" name="suffix" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Address</label>
                    <input type="text" name="address" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Email Address</label>
                    <input type="text" name="email" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <input type="text" name="contactNum" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Jobseeker Type</label>
                    <input type="text" name="jobseekerType" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Employment Status</label>
                    <input type="text" name="employmentStatus" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <input type="text" name="educLevel" class="" />
                    
                    </div>
                    <div class="col-3">
                    <label for="">Course/Program</label>
                    <input type="text" name="course" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Prefer Work</label>
                    <input type="text" name="preferWork" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Industry</label>
                    <input type="text" name="preferIndustry" class="" /> 
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Location</label>
                    <input type="text" name="preferLocation" class="" /> 
                    </div>
                    
                </div>

                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn save">Save Applicant</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Applicant Modal -->
<div class="modal fade" id="applicantEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Applicant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateApplicant">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="applicant_id" id="applicant_id" >

                <div class="row-2">
                    <div class="col-1">
                    <label for="">NSRS Form Number</label>
                    <input type="text" name="nsrsNum" id="nsrsNum" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Suffix</label>
                    <input type="text" name="suffix" id="suffix" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Email Address</label>
                    <input type="text" name="email" id="email" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <input type="text" name="contactNum" id="contactNum" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Jobseeker Type</label>
                    <input type="text" name="jobseekerType" id="jobseekerType" class="" />

                    </div>
                </div>
                
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Employment Status</label>
                    <input type="text" name="employmentStatus" id="employmentStatus" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <input type="text" name="educLevel" id="educLevel" class="" />
                    
                    </div>
                    <div class="col-3">
                    <label for="">Course</label>
                    <input type="text" name="course" id="course" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Prefer Work</label>
                    <input type="text" name="preferWork" id="preferWork" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Industry</label>
                    <input type="text" name="preferIndustry" id="preferIndustry" class="" /> 
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Location</label>
                    <input type="text" name="preferLocation" id="preferLocation" class="" /> 
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

<!-- View Applicant Modal -->
<div class="modal fade" id="applicantViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Applicant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="row-2">
                    <div class="col-1">
                    <label for="">NSRS Form Number</label>
                    <p id="view_nsrsNum" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">First Name</label>
                    <p id="view_firstname" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Middle Name</label>
                    <p id="view_middlename" class=""></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Last Name</label>
                    <p id="view_lastname" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Suffix</label>
                    <p id="view_suffix" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Address</label>
                    <p id="view_address" class=""></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Email Address</label>
                    <p id="view_email" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <p id="view_contactNum" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Jobseeker Type</label>
                    <p id="view_regNum" class=""></p>
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Employment Status</label>
                    <p id="view_employmentStatus" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Highest Educational Attainment</label>
                    <p id="view_educLevel" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Course</label>
                    <p id="view_course" class=""></p>
                    </div>
                    
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Prefer Work</label>
                    <p id="view_preferWork" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Industry</label>
                    <p id="view_preferIndustry" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Prefer Location</label>
                    <p id="view_preferLocation" class=""></p>
                    </div>
                </div>

                


                
            </div>
            <div class="modal-footer">
                <button type="button" style="margin-right: 5%;" class="btn close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Walk-in Applicant
                        
                        <button type="button" class="btn add float-end" data-bs-toggle="modal" data-bs-target="#applicantAddModal">
                            Add Applicant
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15%;">ID</th>
                                <th>Name</th>
                                <th>NSRS Form No.</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Jobseeker Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../../../conn.php';
                            
                            $peso_id = mysqli_real_escape_string($conn, $_SESSION['peso_id']);

                            $query = "SELECT * FROM wapplicant";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $applicant)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $applicant['wapplicant_id'] ?></td>
                                        <td><?= $applicant['firstname'] ?>&nbsp;&nbsp;<?= $applicant['middlename'] ?>&nbsp;&nbsp;<?= $applicant['lastname'] ?>&nbsp;&nbsp;<?= $applicant['suffix'] ?></td>
                                        <td><?= $applicant['nsrsNum'] ?></td>
                                        <td><?= $applicant['email'] ?></td>
                                        <td><?= $applicant['contactNum'] ?></td>
                                        <td><?= $applicant['jobseekerType'] ?></td>
                                        
                                        <td style="width: 23%;">
                                            <button type="button" value="<?=$applicant['wapplicant_id'];?>" class="viewApplicantBtn btn view btn-sm">View</button>
                                            <button type="button" value="<?=$applicant['wapplicant_id'];?>" class="editApplicantBtn btn edit btn-sm">Edit</button>
                                            <button type="button" value="<?=$applicant['wapplicant_id'];?>" class="deleteApplicantBtn btn delete btn-sm">Delete</button>
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
        $(document).on('submit', '#saveApplicant', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_applicant", true);

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
                        $('#applicantAddModal').modal('hide');
                        $('#saveApplicant')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editApplicantBtn', function () {

            var applicant_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?applicant_id=" + applicant_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#applicant_id').val(res.data.wapplicant_id);
                        $('#nsrsNum').val(res.data.nsrsNum);
                        $('#firstname').val(res.data.firstname);
                        $('#middlename').val(res.data.middlename);
                        $('#lastname').val(res.data.lastname);
                        $('#suffix').val(res.data.suffix);
                        $('#address').val(res.data.address);
                        $('#email').val(res.data.email);
                        $('#contactNum').val(res.data.contactNum);
                        $('#jobseekerType').val(res.data.jobseekerType);
                        $('#employmentStatus').val(res.data.employmentStatus);
                        $('#educLevel').val(res.data.educLevel);
                        $('#course').val(res.data.course);
                        $('#preferWork').val(res.data.preferWork);
                        $('#preferIndustry').val(res.data.preferIndustry);
                        $('#preferLocation').val(res.data.preferLocation);
                        
                        $('#applicantEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateApplicant', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_applicant", true);

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
                        
                        $('#applicantEditModal').modal('hide');
                        $('#updateApplicant')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        
        $(document).on('click', '.viewApplicantBtn', function () {

            var applicant_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?applicant_id=" + applicant_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_nsrsNum').text(res.data.nsrsNum);
                        $('#view_firstname').text(res.data.firstname);
                        $('#view_middlename').text(res.data.middlename);
                        $('#view_lastname').text(res.data.lastname);
                        $('#view_suffix').text(res.data.suffix);
                        $('#view_address').text(res.data.address);
                        $('#view_email').text(res.data.email);
                        $('#view_contactNum').text(res.data.contactNum);
                        $('#view_jobseekerType').text(res.data.jobseekerType);
                        $('#view_employmentStatus').text(res.data.employmentStatus);
                        $('#view_educLevel').text(res.data.educLevel);
                        $('#view_course').text(res.data.course);
                        $('#view_preferWork').text(res.data.preferWork);
                        $('#view_preferIndustry').text(res.data.preferIndustry);
                        $('#view_preferLocation').text(res.data.preferLocation);

                        $('#applicantViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteApplicantBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var applicant_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_applicant': true,
                        'applicant_id': applicant_id
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