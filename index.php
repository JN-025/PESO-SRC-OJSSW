<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="shortcut icon" href="assets/img/peso.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/landingpage.css">
</head>
<body>
    <div class="main">
        <div class="topnav">
            <div class="peso-logo"></div>
            <div class="right-corner">
                <button class="login" onclick="document.location='services_login.php'">Log In</button>
                <button class="signup" onclick="document.location='services_signup.php'">Sign Up</button>
            </div>
        </div>
        <div class="row-1">
            <center>
            <div class="col-1">
                <div class="search-img" style="float: right;"></div>
                <div class="search-box">
                    <h1>SEARCH FOR A JOB</h1>
                    <input type="text" name="" class="search-engine-1" placeholder="Skills, Company, or Job Title">
                    <input type="text" name="" class="search-engine-2" placeholder="Location">
                    <input type="text" name="" class="search-engine-3" placeholder="Experience">
                    <br>
                    <button name="search" class="button-search"><i class="bi bi-search" style="margin: 0 5px;"></i>Search</button>

                </div>
            </div>
            </center>


        </div>
        <center>
        <div class="row-2">
            <h2>What is PESO?</h2>
            <div class="col-2">
                <div class="wordbox">
                    <h3>The Public Employment Service Office (PESO) is a non-fee charging multi-dimenstional employment service facility or entity established in all Local Government Units (LGUs) in coordination with the Department of Labor and Employment (DOLE) pursuant to R.A. No. 8759 or the PESO Act of 1999 as amended by R.A. No. 10691.</h3>

                </div>
                <div class="logo-img">
                    <img src="assets/img/peso.png" class="peso-logo">
                </div>

            </div>
            
            <div class="col-3">
                <h4>Learn more about PESO Santa Rosa</h4>
                <center>
                <div class="button-box">
                    
                    <button class="learn-more" onclick="document.location='#'">Laws</button>
                    
                    <button class="learn-more" style="font-size: 1.8vw;" onclick="document.location='#'">About PESO Santa Rosa</button>
                   
                    <button class="learn-more" style="font-size: 1.5vw;" onclick="document.location='#'">Benefits of Applying through PESO</button>
                    


                    
                    <button class="learn-more" onclick="document.location='#'">Events</button>
                
                </div>
                </center>
            </div>
       
            

        </div>
        </center>
        
        <div class="row-3">
            <center>
            <h5>STAY UPDATED WITH OUR EVENTS!</h5>
            
            <div class="modal-box">

                <button id="myBtn" class="modal-button">Sept 9</button>
                <button id="myBtn2" class="modal-button">Oct 12</button>
                <button id="myBtn2" class="modal-button">Oct 24</button>
                <button id="myBtn2" class="modal-button">Nov 15</button>
                <button id="myBtn2" class="modal-button">Nov 15</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content-box">
                    <div class="modal-content">

                        <span class="close">&times;</span>
                        
                        <h1><span style="color: #520000; font-weight: bolder;">WHAT:</span> Job Fair Caravan</h1>
                        <br>
                        <h1><span style="color: #520000; font-weight: bolder;">WHERE:</span> Brgy. Kanluran, Covered Court</h1>
                        <img src="assets/img/sample.png" class="event-location">
                        <br>
                        <h1><span style="color: #520000; font-weight: bolder;">TIME:</span> 9:00am</h1>
                        <br>
                        <h1><span style="color: #520000; font-weight: bolder;">Companies included:</span></h1>
                        <h2>  > Miniso</h2>
                        <h2>  > Chowking Santa Rosa</h2>
                        <h2>  > McDonalds Santa Rosa</h2>
                        <h2>  > San Miguel Corporation</h2>
                        <br>
                        <h1><span style="color: #520000; font-weight: bolder;">!! Reminders !!</span></h1>
                        <h2>  > Wear a facemask and observe social distancing.</h2>
                        <h2>  > Bring your own ballpen.</h2>
                        <br>
                        <h1><span style="color: #520000; font-weight: bolder;">What should I prepare?</span></h1>
                        <button id="myBtn3" class="requirements">Requirements to Bring</button>


                    </div>

                    </div>
                </div>


            </div>
            



            </center>
        </div>

        <div class="row-4">
            <center>
            <h1>TRAIN YOURSELF IN A FUN WAY</h1>
            <div class="wordbox">
            <button class="button-training" onclick="document.location='#'">Learn more</button>
            </div>
            </center>
        </div>

        <div class="row-5">
            <center>
            <div class="image-gallery">
                <img src="assets/img/gallery.jpg" class="gallery">
                <img src="assets/img/gallery.jpg" class="gallery">
                <img src="assets/img/gallery.jpg" class="gallery">
                <img src="assets/img/gallery.jpg" class="gallery">
            </div>
            <button class="button-gallery" onclick="document.location='#'">See Full Gallery</button>
        
            </center>
        </div>
        

    </div>
    <?php 
    include "footer.php";
    ?>
</body>

</html>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
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
