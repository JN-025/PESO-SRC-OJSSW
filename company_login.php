<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landing Page</title>
        <link rel="shortcut icon" href="assets/img/peso.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/services.css">
    </head>

    <body>
        <div class="main">
            <center>
            <div class="row-1">
                
                <div class="logo-box">
                    <img src="assets/img/ojssw.png" class="logo">
                </div>
                <h2>What kind of company are you?</h2>
                <button id="myBtn" class="company-kind">Direct Company</button>
                <br>
                <button id="myBtn2" class="company-kind">Local Manpower Agency</button>
                <br>
                <button id="myBtn3" class="company-kind">Oversees Monpower Agency</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2><span style="color: #A81E1E;">Please prepare the following requirements
for registration:</span></h2>
                    <h2>  > Company Profile</h2>
                    <h2>  > Business Permit</h2>
                    <h2>  > Job Openings (<span style="font-weight: lighter;">with qualifications 
and number of vacancies</span>)</h2>
                    <h2><span style="color: #A81E1E;">NOTE: All of these must be in PDF or JPEG form</span></h2>
                    <br> <br>
                    <button class="button-continue" onclick="document.location='#'">Continue</button>
                    
                </div>

                </div>

                <div id="myModal2" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close2">&times;</span>
                    <h2><span style="color: #A81E1E;">Please prepare the following requirements
for registration:</span></h2>
                    <h2>  > Company Profile</h2>
                    <h2>  > DOLE Permit</h2>
                    <h2>  > List of Clients</h2>
                    <h2>  > Job Openings (<span style="font-weight: lighter;">with qualifications 
and number of vacancies</span>)</h2>
                    <h2>  > DOLE Permit of No Pending Case</h2>
                    <h2><span style="color: #A81E1E;">NOTE: All of these must be in PDF or JPEG form</span></h2>
                    <br> <br>
                    <button class="button-continue" onclick="document.location='#'">Continue</button>
                </div>

                </div>

                <div id="myModal3" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close3">&times;</span>
                    <h2><span style="color: #A81E1E;">Please prepare the following requirements
for registration:</span></h2>
                    <h2>  > Company Profile</h2>
                    <h2>  > POEA Permit</h2>
                    <h2>  > JOB Order (<span style="font-weight: lighter;">duly stamped or balanced 
by POEA</span>)</h2>
                    <h2>  > Job Openings (<span style="font-weight: lighter;">with qualifications 
and number of vacancies</span>)</h2>
                    <h2><span style="color: #A81E1E;">NOTE: All of these must be in PDF or JPEG form</span></h2>
                    <br> <br>
                    <button class="button-continue" onclick="document.location='#'">Continue</button>
                </div>

                </div>

            </div>
        
            </center>
        </div>





                    <script>
            var modal3 = document.getElementById("myModal3");

            // Get the button that opens the modal
            var btn3 = document.getElementById("myBtn3");

            var modal2 = document.getElementById("myModal2");

            // Get the button that opens the modal
            var btn2 = document.getElementById("myBtn2");

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");



            // Get the <span> element that closes the modal
            var span3 = document.getElementsByClassName("close3")[0];
            var span2 = document.getElementsByClassName("close2")[0];
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks the button, open the modal 
            btn3.onclick = function() {
            modal3.style.display = "block";
            }


            btn2.onclick = function() {
            modal2.style.display = "block";
            }

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span3.onclick = function() {
            modal3.style.display = "none";
            }

            span2.onclick = function() {
            modal2.style.display = "none";
            }


            span.onclick = function() {
            modal.style.display = "none";
            }
            // When the user clicks anywhere outside of the modal, close it


            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            }
            </script>

    </body>

</html>

