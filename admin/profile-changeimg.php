<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] != "POST"){
  header("location: profile.php");
  exit;
}


require_once "../config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if($_FILES["UserImgInput"]["size"] != 0){
      $errors     = array();
      $maxsize    = 1000000;
      $acceptable = array(
          'application/pdf',
          'image/jpeg',
          'image/jpg',
          'image/gif',
          'image/png'
      );
      $check = getimagesize($_FILES['UserImgInput']['tmp_name']);
      if($check == false) {
        echo "<script type='text/javascript'>alert('Error! File is not an image.');</script>";
      } 

      else if($check !== false) {

        if(($_FILES['UserImgInput']['size'] >= $maxsize) || ($_FILES["UserImgInput"]["size"] == 0)) {
            $errors[] = 'Error! File too large. File must be less than 1MB.';
        }
    
        if((!in_array($_FILES['UserImgInput']['type'], $acceptable)) && (!empty($_FILES["UserImgInput"]["type"]))) {
            $errors[] = 'Error! Invalid file type. Only JPG, JPEG, GIF and PNG types are accepted.';
        }
    
        if(count($errors) === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["UserImgInput"]["name"]);
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
              // Convert to base64 
              $image_base64 = base64_encode(file_get_contents($_FILES['UserImgInput']['tmp_name']) );
              $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
              $user_image = $image;
            } 
        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }
            header("refresh:0.01;url= profile.php");
            exit;
        }
   
      }
  }

  $sql = "UPDATE users SET user_image = :userImg
    WHERE id = '".$_GET['user_id']."'";

  $stmt = $pdo -> prepare($sql);

  $stmt->bindParam(':userImg', $user_image, PDO::PARAM_STR); 

  if($stmt->execute()){
    echo "<script type='text/javascript'>alert('Successfully Change the Profile Image.');</script>";
    header("refresh:0.01;url= profile.php");
  } else{
    echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
  }

    unset($stmt);
    unset($pdo);
}


?>