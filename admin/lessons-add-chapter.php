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


$chapterTitle =  $chapterExcerpt = $chapterContent = $chapterType = $chapterLessonID = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_GET['id'])){
      $chapterType = "Chapter";
      $chapterTitle = $_POST["chapterTitle"];
      $chapterExcerpt = $_POST["chapterExcerpt"];
      $chapterContent = $_POST["chapterContent"];
      $chapterLessonID = $_GET['id'];

      
      $sql = "INSERT INTO chapters (lesson_id,chapter_title,chapter_type,chapter_excerpt,chapter_content) 
      VALUES (:lessonId,:chapterTitle,:chapterType,:chapterExcerpt,:chapterContent)";

      $stmt = $pdo -> prepare($sql);

      $stmt->bindParam(':lessonId', $chapterLessonID, PDO::PARAM_INT);  
      $stmt->bindParam(':chapterTitle', $chapterTitle, PDO::PARAM_STR); 
      $stmt->bindParam(':chapterType', $chapterType, PDO::PARAM_STR); 
      $stmt->bindParam(':chapterExcerpt', $chapterExcerpt, PDO::PARAM_STR); 
      $stmt->bindParam(':chapterContent', $chapterContent, PDO::PARAM_STR); 

      if($stmt->execute()){
        echo "<script type='text/javascript'>alert('Created Successfully.');</script>";
        echo '<script> location.replace("lessons-edit.php?id=' .$_GET['id'] .'"); </script>';
      } else{
        echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
      }

        unset($stmt);
        unset($pdo);

  }

}

?>

    <!-- Main content -->
    <section class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $_GET['id']; ?>" method="post">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Add New Chapter
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputLessonTitle">Chapter Title</label>
                          <input type="text" class="form-control" name="chapterTitle" id="inputLessonTitle" placeholder="Chapter Title"> 
                    </div>
                 </div>

                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" disabled>
                            <option selected="selected">Chapter</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Excerpt</label>
                        <textarea class="form-control" name="chapterExcerpt"  rows="3" placeholder="Excerpt"></textarea>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" name="chapterContent" rows="3" style="z-index: 999;">
                        <br><br>Place <em>some</em> <u>text</u> <strong>here</strong> to make contents.<br><br> <br>
                        </textarea>
                     </div>
                   </div>
            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
        <!-- /.card -->
</div>
</form>
    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>