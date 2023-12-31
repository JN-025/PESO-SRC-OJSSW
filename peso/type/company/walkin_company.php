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
    <title>Walk-in Company</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <?php
    include "../../../function.php";
    include "../topnav.php";
    ?>
    <div class="main-container">

<!-- Add Company -->
<div class="modal fade" id="companyAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveCompany">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>
                
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Name</label>
                    <input type="text" name="companyName" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Email</label>
                    <input type="text" name="email" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Profile Name</label>
                    <input type="text" name="profileName" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Website</label>
                    <input type="text" name="companyWeb" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Industry</label>
                    <input type="text" name="industry" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Company Type</label>
                    <select type="text" name="companyType" class="">
                        <option value="" selected hidden>Type of Company</option>
                        <option value="Direct Company">Direct Company</option>
                        <option value="Local Manpower Agency">Local Manpower Agency</option>
                        <option value="Overseas Manpower Agency">Overseas Manpower Agency</option>
                    </select> 

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Address</label>
                    <input type="text" name="address" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Company Size</label>
                    <input type="text" name="companySize" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">regNum</label>
                    <input type="text" name="regNum" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Working Hours</label>
                    <input type="text" name="workingHrs" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <input type="text" name="contactNum" class="" />
                    
                    </div>
                    <div class="col-3">
                    <label for="">Company Dresscode</label>
                    <input type="text" name="dressCode" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Contact Person</label>
                    <input type="text" name="contactPerson" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Spoken Language</label>
                    <input type="text" name="spokenLanguage" class="" /> 
                    </div>
                    
                </div>

                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn save">Save Company</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Company Modal -->
<div class="modal fade" id="companyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateCompany">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="company_id" id="company_id" >

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Name</label>
                    <input type="text" name="companyName" id="companyName" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Profile Name</label>
                    <input type="text" name="profileName" id="profileName" class="" />
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Website</label>
                    <input type="text" name="companyWeb" id="companyWeb" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Industry</label>
                    <input type="text" name="industry" id="industry" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Company Type</label>
                    <select type="text" name="companyType" id="companyType" class="">
                        <option value="" selected hidden>Type of Company</option>
                        <option value="Direct Company">Direct Company</option>
                        <option value="Local Manpower Agency">Local Manpower Agency</option>
                        <option value="Overseas Manpower Agency">Overseas Manpower Agency</option>
                    </select> 

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Company Size</label>
                    <input type="text" name="companySize" id="companySize" class="" />
                    </div>
                    <div class="col-3">
                    <label for="">Registration Number</label>
                    <input type="text" name="regNum" id="regNum" class="" />

                    </div>
                </div>
                
                <div class="row-2">
                    <div class="col-1">
                    <label for="">Working Hours</label>
                    <input type="text" name="workingHrs" id="workingHrs" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <input type="text" name="contactNum" id="contactNum" class="" />
                    
                    </div>
                    <div class="col-3">
                    <label for="">Company Dresscode</label>
                    <input type="text" name="dressCode" id="dressCode" class="" />

                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Contact Person</label>
                    <input type="text" name="contactPerson" id="contactPerson" class="" />
                    </div>
                    <div class="col-2">
                    <label for="">Spoken Language</label>
                    <input type="text" name="spokenLanguage" id="spokenLanguage" class="" /> 
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

<!-- View Company Modal -->
<div class="modal fade" id="companyViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Name</label>
                    <p id="view_companyName" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Email Address</label>
                    <p id="view_email" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Profile Name</label>
                    <p id="view_profileName" class=""></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Company Website</label>
                    <p id="view_companyWeb" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Industry</label>
                    <p id="view_industry" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Company Type</label>
                    <p id="view_companyType" class=""></p>
                    </div>
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">Address</label>
                    <p id="view_address" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Company Size</label>
                    <p id="view_companySize" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Registration Number</label>
                    <p id="view_regNum" class=""></p>
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-1">
                    <label for="">workingHrs</label>
                    <p id="view_workingHrs" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Contact Number</label>
                    <p id="view_contactNum" class=""></p>
                    </div>
                    <div class="col-3">
                    <label for="">Company Dresscode</label>
                    <p id="view_dressCode" class=""></p>
                    </div>
                    
                </div>

                <div class="row-2">
                    <div class="col-1">
                    <label for="">contactPerson</label>
                    <p id="view_contactPerson" class=""></p>
                    </div>
                    <div class="col-2">
                    <label for="">Spoken Language</label>
                    <p id="view_spokenLanguage" class=""></p>
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
                    <h4>Walk-in Company
                        
                        <button type="button" class="btn add float-end" data-bs-toggle="modal" data-bs-target="#companyAddModal">
                            Add Company
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15%;">ID</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Industry</th>
                                <th>Company Type</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../../../conn.php';
                            
                            $peso_id = mysqli_real_escape_string($conn, $_SESSION['peso_id']);

                            $query = "SELECT * FROM wcompany";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $company)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $company['wcompany_id'] ?></td>
                                        <td><?= $company['companyName'] ?></td>
                                        <td><?= $company['email'] ?></td>
                                        <td><?= $company['industry'] ?></td>
                                        <td><?= $company['companyType'] ?></td>
                                        <td><?= $company['contactNum'] ?></td>
                                        <td style="width: 23%;">
                                            <button type="button" value="<?=$company['wcompany_id'];?>" class="viewCompanyBtn btn view btn-sm">View</button>
                                            <button type="button" value="<?=$company['wcompany_id'];?>" class="editCompanyBtn btn edit btn-sm">Edit</button>
                                            <button type="button" value="<?=$company['wcompany_id'];?>" class="deleteCompanyBtn btn delete btn-sm">Delete</button>
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
        $(document).on('submit', '#saveCompany', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_company", true);

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
                        $('#companyAddModal').modal('hide');
                        $('#saveCompany')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editCompanyBtn', function () {

            var company_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?company_id=" + company_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#company_id').val(res.data.wcompany_id);
                        $('#companyName').val(res.data.companyName);
                        $('#email').val(res.data.email);
                        $('#profileName').val(res.data.profileName);
                        $('#companyWeb').val(res.data.companyWeb);
                        $('#industry').val(res.data.industry);
                        $('#companyType').val(res.data.companyType);
                        $('#address').val(res.data.address);
                        $('#companySize').val(res.data.companySize);
                        $('#regNum').val(res.data.regNum);
                        $('#workingHrs').val(res.data.workingHrs);
                        $('#contactNum').val(res.data.contactNum);
                        $('#dressCode').val(res.data.dressCode);
                        $('#contactPerson').val(res.data.contactPerson);
                        $('#spokenLanguage').val(res.data.spokenLanguage);
                        
                        $('#companyEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateCompany', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_company", true);

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
                        
                        $('#companyEditModal').modal('hide');
                        $('#updateCompany')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        
        $(document).on('click', '.viewCompanyBtn', function () {

            var company_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?company_id=" + company_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_companyName').text(res.data.companyName);
                        $('#view_email').text(res.data.email);
                        $('#view_profileName').text(res.data.profileName);
                        $('#view_companyWeb').text(res.data.companyWeb);
                        $('#view_industry').text(res.data.industry);
                        $('#view_companyType').text(res.data.companyType);
                        $('#view_address').text(res.data.address);
                        $('#view_companySize').text(res.data.companySize);
                        $('#view_regNum').text(res.data.regNum);
                        $('#view_workingHrs').text(res.data.workingHrs);
                        $('#view_contactNum').text(res.data.contactNum);
                        $('#view_dressCode').text(res.data.dressCode);
                        $('#view_contactPerson').text(res.data.contactPerson);
                        $('#view_spokenLanguage').text(res.data.spokenLanguage);

                        $('#companyViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteCompanyBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var company_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_company': true,
                        'company_id': company_id
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