<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_experience.css">
    </head>
    <body>
        <?php 
        include "../function.php";
        include "sidenav.php";
        ?>
        
        <div class="card1">
            <?php 
            include "topnav.php";
            ?>
            <center>
            <div class="card2">
                <?php
                include "profilenav.php";
                ?>

                <div class="card3">
                    <div class="card4">
                                    
                        <form action="" method="post">
                            <div class="form-card">
                                <div class="form-col-1">
                                    <h2>Work Experience</h2>
                                    <a href="personal_info_update.php" class="edit">Edit</a>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                <table style="width:100%;">
                                            <tr>
                                              <th style="width: 25%">NAME OF OFFICE/COMPANY</th>
                                              <th style="width: 23%">ADDRESS</th>
                                            
                                            </tr>
                                            <tr>
                                              <td><input style=width:100%;float:left; type="text" name="company1" placeholder="COMPANY #1" required maxlength="50"></td>
                                              <td><input style=width:100%;float:left; type="text" name="cpAddress1" placeholder="ADDRESS #1" required maxlength="50"></td>
                                              
                                            </tr>
                                            <tr>
                                                <td><input style=width:100%;float:left; type="text" name="company2" placeholder="COMPANY #2" required maxlength="50"></td>
                                                <td><input style=width:100%;float:left; type="text" name="cpAddress2" placeholder="ADDRESS #2" required maxlength="50"></td>
                                               
                                              </tr>
                                              <tr>
                                                <td><input style=width:100%;float:left; type="text" name="company3" placeholder="COMPANY #3" required maxlength="50"></td>
                                                <td><input style=width:100%;float:left; type="text" name="cpAddress3" placeholder="ADDRESS #3" required maxlength="50"></td>
                                                
                                              </tr>
                                              <tr>
                                                <td><input style=width:100%;float:left; type="text" name="company4" placeholder="COMPANY #4" required maxlength="50"></td>
                                                <td><input style=width:100%;float:left; type="text" name="cpAddress4" placeholder="ADDRESS #4" required maxlength="50"></td>
                                               
                                              </tr>
                                        </table>
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-1">
                                <table>
                                            <tr>
                                              
                                              <th>POSITION HELD</th>
                                              <th>INCLUSIVE DATES</th>
                                              <th>STATUS OF APPOINTMENT</th>
        
        
                                            </tr>
                                            <tr>
                                              
                                              <td><input type="text" name="position1" placeholder="POSITION #1" required maxlength="50"></td>
                                              <td><input type="text" name="incluDate1" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                              <td>
                                                <select class="" name="appointStat1" required>
                                                    <option value="" selected hidden></option>
                                                    <option value="permanent">PERMANENT</option>
                                                    <option value="contractual">CONTRACTUAL</option>
                                                    <option value="part_time">PART-TIME</option>
                                                    <option value="probitionary">PROBITIONARY</option>
                                                </select> 
                                              </td>
                                            </tr>
                                            <tr>
                                                
                                                <td><input type="text" name="position2" placeholder="POSITION #2" required maxlength="50"></td>
                                                <td><input type="text" name="incluDate2" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="appointStat2" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                              <tr>
            

                                                <td><input type="text" name="position3" placeholder="POSITION #3" required maxlength="50"></td>
                                                <td><input type="text" name="incluDate3" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="appointStat3" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                              <tr>
                                               
                                                <td><input type="text" name="position4" placeholder="POSITION #4" required maxlength="50"></td>
                                                <td><input type="text" name="incluDate4" placeholder="MM/YYYY TO MM/YYYY" required></td>
                                                <td>
                                                  <select class="" name="appointStat4" required>
                                                      <option value="" selected hidden></option>
                                                      <option value="permanent">PERMANENT</option>
                                                      <option value="contractual">CONTRACTUAL</option>
                                                      <option value="part_time">PART-TIME</option>
                                                      <option value="probitionary">PROBITIONARY</option>
                                                  </select> 
                                                </td>
                                              </tr>
                                        </table>
                                </div>
                            </div>

                        </form>
                    </div>
                                
                </div>

            </div>
            </center>
        </div>

                
    </body>
</html>