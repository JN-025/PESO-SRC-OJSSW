<?php
include_once '../peso_function.php';
if(isset($_POST['signup']))
{   
    $file = $_POST['file'];
    $file2 = $_POST['file2'];

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file2 = rand(1000,100000)."-".$_FILES['file2']['name'];
    $file2_loc = $_FILES['file2']['tmp_name'];

 $folder="upload/";
 
 /* new file size in KB */
  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 $new_file2_name = strtolower($file2);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 $final_file2=str_replace(' ','-',$new_file2_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO c_request (file,file2) VALUES('$final_file', '$final_file2')";
  mysqli_query($conn,$sql);
  
 
  echo "File sucessfully upload";
        
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}
?>