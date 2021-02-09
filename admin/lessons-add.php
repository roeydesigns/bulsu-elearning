<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

require_once "../config.php";
$lesson_title =  $lesson_status = $lesson_description =  $lesson_image = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_FILES["lessonImage"]["size"] != 0) {
      $errors     = array();
      $maxsize    = 1000000;
      $acceptable = array(
          'application/pdf',
          'image/jpeg',
          'image/jpg',
          'image/gif',
          'image/png'
      );
      $check = getimagesize($_FILES['lessonImage']['tmp_name']);
      if($check == false) {
        echo "<script type='text/javascript'>alert('Error! File is not an image.');</script>";
      } 

      else if($check !== false) {

        if(($_FILES['lessonImage']['size'] >= $maxsize) || ($_FILES["lessonImage"]["size"] == 0)) {
            $errors[] = 'Error! File too large. File must be less than 1MB.';
        }
    
        if((!in_array($_FILES['lessonImage']['type'], $acceptable)) && (!empty($_FILES["lessonImage"]["type"]))) {
            $errors[] = 'Error! Invalid file type. Only JPG, JPEG, GIF and PNG types are accepted.';
        }
    
        if(count($errors) === 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["lessonImage"]["name"]);
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
              // Convert to base64 
              $image_base64 = base64_encode(file_get_contents($_FILES['lessonImage']['tmp_name']) );
              $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
              $lesson_image = $image;
            } 
        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }
            header("refresh:0.01;url= lessons-add.php");
            exit;
        }
   
      }
  }
 

  $lesson_title = $_POST["lessonTitle"];
  $lesson_status = $_POST["lessonStatus"];
  $lesson_description = $_POST["lessonDescription"];
  $createAt = date("Y-m-d");
  
  $sql = "INSERT INTO lessons (lesson_title,created_at,lesson_status,lesson_description,lesson_image) VALUES (:lesson_title,:created_at,:lesson_status,:lesson_description,:lesson_image)";

  $stmt = $pdo -> prepare($sql);

  $stmt->bindParam(':lesson_title', $lesson_title, PDO::PARAM_STR);  
  $stmt->bindParam(':created_at', $createAt, PDO::PARAM_STR);  
  $stmt->bindParam(':lesson_status', $lesson_status, PDO::PARAM_STR); 
  $stmt->bindParam(':lesson_description', $lesson_description, PDO::PARAM_STR); 
  $stmt->bindParam(':lesson_image', $lesson_image, PDO::PARAM_STR); 

  if($stmt->execute()){
    echo "<script type='text/javascript'>alert('Created Successfully.');</script>";
    header("refresh:0.01;url= lessons.php");
  } else{
    echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
  }

    unset($stmt);
    unset($pdo);
}


require_once 'includes/header.php';

?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype='multipart/form-data'>
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Add New Lesson
            </h3>
          </div>
          <div class="card-body">

            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Lesson Title</label>
                          <input type="text" name="lessonTitle" class="form-control" id="inputLessonTitle" placeholder="Lesson Title" required> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" name="lessonStatus" required>
                            <option selected="selected">Publish</option>
                            <option>Unpublish</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-4 col-12 pb-3">
                    <label>Lesson Image</label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="lessonImgInput" name="lessonImage" accept="image/x-png,image/gif,image/jpeg" onchange ="ImguploadFunc()">
                        <label class="custom-file-label" for="lessonImg" id="lessonImg">Choose file</label>
                      </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description" name="lessonDescription" required></textarea>
                     </div>
                   </div>
            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </div>
        <!-- /.card -->
    </form>
</div>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>