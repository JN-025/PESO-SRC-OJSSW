<?php
$page_title = "Applicant Profile / Eligibility";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eligibility</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/applicant_eligibility.css">
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
                                    <h2>Eligibility</h2>
                                    <a href="training_update.php" class="edit">Edit</a>
                                </div>
                            </div>
                            <br>

                            <table>
                                            <tr>
                                              <th>CAREER SERVICE/BOARD/BAR</th>
                                              <th>LICENCE NUMBER</th>
                                              <th>EXPIRY DATE</th>
                                            </tr>
                                            <tr>
                                              <td><input type="text" name="careerServ1" placeholder="" required maxlength="50"></td>
                                              <td><input type="text" name="licenceNum1" placeholder="" required maxlength="50"></td>
                                              <td><input type="date" name="expiryDate1" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="careerServ2" placeholder="" required maxlength="50"></td>
                                                <td><input type="text" name="licenceNum2" placeholder="" required maxlength="50"></td>
                                                <td><input type="date" name="expiryDate2" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="careerServ3" placeholder="" required maxlength="50"></td>
                                                <td><input type="text" name="licenceNum3" placeholder="" required maxlength="50"></td>
                                                <td><input type="date" name="expiryDate3" placeholder="MM/DD/YYYY" required></td>
                                            </tr>
                                        </table>


                            <div class="form-card">
                                <div class="form-col-2">
                                        <h4><label for="">LANGUAGE PROFECIENCY CERTIFICATION</label></h4>
                                        <input type="checkbox" id="cert_1" name="languageCertifications[]" value="IELTS">
                                        <label for="cert_1">International English Language Testing System (IELTS)</label><br>
                                        <input type="checkbox" id="cert_2" name="languageCertifications[]" value="TOEFL">
                                        <label for="cert_2">Test of English as a Foreign Language (TOEFL)</label><br>
                                        <input type="checkbox" id="cert_3" name="languageCertifications[]" value="TOCFL">
                                        <label for="cert_3">Test of Chinese as a Foreign Language (TOCFL)</label><br>
                                        <input type="checkbox" id="cert_4" name="languageCertifications[]" value="JLPT">
                                        <label for="cert_4">Japanese Language Proficiency Test (JLPT)</label><br>
                                        <input type="checkbox" id="cert_5" name="languageCertifications[]" value="TOPIC">
                                        <label for="cert_5">Test of Proficiency in Korea (TOPIC)</label><br>
                                        <input type="checkbox" id="cert_other" name="cert_other" value="">
                                        <label for="otherCertification">Other:</label>
                                        <input type="text" id="otherCertification" name="otherCertification" value="" maxlength="50">
                                </div>
                            </div>

                            <div class="form-card">
                                <div class="form-col-2">
                                <h4><label for="dialectsSpoken">DIALECTS SPOKEN</label></h4>
                                        <input type="checkbox" id="Tagalog" name="dialectsSpoken[]" value="Tagalog">
                                        <label for="dialect_1">Tagalog</label><br>
                                        <input type="checkbox" id="Ilocano" name="dialectsSpoken[]" value="Ilocano">
                                        <label for="dialect_2">Ilocano</label><br>
                                        <input type="checkbox" id="Ilonggo" name="dialectsSpoken[]" value="Ilonggo">
                                        <label for="dialect_3">Ilonggo</label><br>
                                        <input type="checkbox" id="Bikol" name="dialectsSpoken[]" value="Bikol">
                                        <label for="dialect_4">Bikol</label><br>
                                        <input type="checkbox" id="dialect_other" name="dialectsSpoken[]r" value="">
                                        <label for="dialect_other">Other:</label>
                                        <input style="width: 20%; height: 15px;" type="text" id="dialect_other" name="otherDialect" value="" maxlength="50">
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