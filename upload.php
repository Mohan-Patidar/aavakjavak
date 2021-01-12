<?php
include('header.php');
$id = $_SESSION['id'];
if(isset($_FILES['file']['name'])){
 
   /* Getting file name */
   $filename = $_FILES['file']['name'];

   /* Location */
   $location = "upload/".$filename;
//    query to upload image into database
   $sql = "UPDATE `users` SET `image`='$filename' WHERE `id` = $id";
        $results = mysqli_query($conn, $sql);
    
   
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
        
      }
   }

   echo $results;
   exit;
}

echo 0;