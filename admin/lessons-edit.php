<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

if(!isset($_GET['id'])){
  header("location: lessons.php");
  exit;
}
require_once 'includes/header.php';
require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if (isset($_GET['id'])){
    $lessonTitle = $_POST['lessonTitle'];
    $lessonStatus = $_POST['lessonStatus'];
    $lessonDescription = $_POST['lessonDescription'];

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

            $sql = "UPDATE lessons SET lesson_title = :lessonTitle,
            lesson_status = :lessonStatus,
            lesson_description = :lessonDescription,
            lesson_image = :lessonImage
            WHERE lesson_id = '".$_GET['id']."'";

            $stmt = $pdo -> prepare($sql);

            $stmt->bindParam(':lessonTitle', $lessonTitle, PDO::PARAM_STR);  
            $stmt->bindParam(':lessonStatus', $lessonStatus, PDO::PARAM_STR);  
            $stmt->bindParam(':lessonDescription', $lessonDescription, PDO::PARAM_STR);  
            $stmt->bindParam(':lessonImage', $lesson_image, PDO::PARAM_STR); 

            if($stmt->execute()){
              echo "<script type='text/javascript'>alert('Successfully changed.');</script>";
            
            } else{
              echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
            }

        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }

        }
   
      }
  }

  else {
        $sql = "UPDATE lessons SET lesson_title = :lessonTitle,
        lesson_status = :lessonStatus,
        lesson_description = :lessonDescription
        WHERE lesson_id = '".$_GET['id']."'";

        $stmt = $pdo -> prepare($sql);

        $stmt->bindParam(':lessonTitle', $lessonTitle, PDO::PARAM_STR);  
        $stmt->bindParam(':lessonStatus', $lessonStatus, PDO::PARAM_STR);  
        $stmt->bindParam(':lessonDescription', $lessonDescription, PDO::PARAM_STR);  

        if($stmt->execute()){
          echo "<script type='text/javascript'>alert('Successfully changed.');</script>";
         
        } else{
          echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
  }

  }
}
?>
    <?php
      $sql = "SELECT * FROM lessons WHERE lesson_id = '".$_GET['id']."'";
      $stmt = $pdo -> prepare($sql);
      $stmt->execute();
      foreach ($stmt as $row) {
    ?>
    <!-- Main content -->
    <section class="content">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $row['lesson_id'];?>" method="post" enctype='multipart/form-data'>
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Lesson
            </h3>
          </div>
          <div class="card-body">
             <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Lesson Title</label>
                          <input type="text" name="lessonTitle" class="form-control" id="inputLessonTitle" placeholder="Lesson Title" value="<?php echo $row['lesson_title'];?>" required> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" name="lessonStatus" required>
                            <option <?php if ($row['lesson_status'] == 'Publish'){echo 'selected';} ?>>Publish</option>
                            <option <?php if ($row['lesson_status'] == 'Unpublish'){echo 'selected';} ?>>Unpublish</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-4 col-12 pb-3">
                    <label>Lesson Image</label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="lessonImgInput" name="lessonImage" accept="image/x-png,image/gif,image/jpeg"" onchange ="ImguploadFunc()">
                        <label class="custom-file-label" for="lessonImg" id="lessonImg">Choose file</label>
                      </div>
                  </div>
                  <div class="col-md-4 col-12">
                  <img src="<?php if($row['lesson_image']==''){ echo '../dist/img/default.jpg';}{} echo $row['lesson_image'];?>" style="height: 150px;">
                  </div>
                   <div class="col-md-12 col-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="lessonDescription" placeholder="Description" required><?php echo $row['lesson_description'];?></textarea>
                     </div>
                   </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
        <div class="card-footer clearfix">
          <div class="float-right">
          <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </div>
    </div>
    </form>



    <div class="card">
              <div class="card-header">
                <p class="card-title">Lessons Order List
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                title="List of Lessons Chapters, Quizes and Exams. Here you can arrange items that will be part of the Lesson."></i></a></p>

                <div class="card-tools">
          <a class="btn btn-primary btn-sm" href="lessons-add-chapter.php?id=<?php echo $row['lesson_id'];?>"><i class="fas fa-plus"></i> Add New Chapter</a>
          <a class="btn btn-warning btn-sm" href="quiz-add.php?id=<?php echo $row['lesson_id'];?>"><i class="fas fa-plus"></i> Add New Quiz/Exam</a>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Title</th>
                      <th style="width: 20%">Type</th>
                      <th style="width: 25%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                      $sql = "SELECT * FROM chapters WHERE lesson_id = '".$_GET['id']."' ORDER BY chapter_id ASC";
                      $stmt = $pdo -> prepare($sql);
                      $stmt->execute();
                      $idcount = 0;
                      foreach ($stmt as $row) {

                  ?>
                    <tr>
                      <td><?php $idcount++; echo $idcount; ?>.</td>
                      <td><?php echo $row['chapter_title'];?></td>
                      <td><?php echo $row['chapter_type'];?></td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="<?php if($row['chapter_type']=='Chapter'){echo 'lessons-view.php?id=' .$row['chapter_id'] .'&lid=' .$_GET['id']; } else{ echo 'quiz-view.php?qid='.$row['chapter_id'] .'&lid='.$_GET['id'] .'&id='; $ssql = "SELECT * FROM questions WHERE quiz_id = '".$row['chapter_id']."' ORDER BY question_id ASC"; $sstmt = $pdo -> prepare($ssql);  $sstmt->execute(); $getQId = $sstmt->fetch(); echo $getQId['question_id'];}?>"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="<?php if($row['chapter_type']=='Chapter'){echo 'lessons-edit-chapter.php'; } else{ echo 'quiz-edit.php';} ?>?id=<?php echo $row['chapter_id'] .'&lid=' .$_GET['id'] ;?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')"  href="lessons-delete-chapter.php?id=<?php echo $row['chapter_id'] .'&lid=' .$_GET['id'] ;?>"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <?php } if ($idcount == 0){ ?>
                    <tr>
                      <td colspan="4" class="text-center py-5">
                             No Chapters and Quiz/Exam found.
                      </td>
                  </tr>
                   <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">

              </div>
            </div>
    </section>
    <!-- /.content -->

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>