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


$quizTitle  = $quizType = $quizLessonID = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_GET['id'])){
      $quizType = $_POST["quizType"];
      $quizTitle = $_POST["quizTitle"];
      $quizLessonID = $_GET['id'];

      
      $sql = "INSERT INTO chapters (lesson_id,chapter_title,chapter_type) 
      VALUES (:lessonId,:quizTitle,:quizType)";

      $stmt = $pdo -> prepare($sql);

      $stmt->bindParam(':lessonId', $quizLessonID, PDO::PARAM_INT);  
      $stmt->bindParam(':quizTitle', $quizTitle, PDO::PARAM_STR); 
      $stmt->bindParam(':quizType', $quizType, PDO::PARAM_STR); 


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
              Create New Quiz/Exam
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Quiz/Exam Title</label>
                          <input type="text" class="form-control" name="quizTitle" id="inputLessonTitle" placeholder="Quiz/Exam Title" required> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" name="quizType" required>
                            <option selected="selected">Quiz</option>
                            <option>Exam</option>
                        </select>
                     </div>
                   </div>


            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <button type="submit" class="btn btn-success" >Submit</button>
          </div>
        </div>
        <!-- /.card -->
</div>

</form>
    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>