<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

if(!isset($_GET['id']) && !isset($_GET['lid'])){
  header("location: lessons.php");
  exit;
}
require_once 'includes/header.php';
require_once "../config.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_GET['id']) && isset($_GET['lid'])){

    $chapterTitle = $_POST["quizTitle"];
    $chapterType = $_POST["quizType"];


    $sql = "UPDATE chapters SET chapter_title = :chapterTitle,
    chapter_type = :chapterType
    WHERE chapter_id = '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':chapterTitle', $chapterTitle, PDO::PARAM_STR); 
    $stmt->bindParam(':chapterType', $chapterType, PDO::PARAM_STR); 

    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Changed Successfully.');</script>";
    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }

  }
}


$sql = "SELECT * FROM chapters WHERE chapter_id = '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."' ";
$stmt = $pdo -> prepare($sql);
$stmt->execute();
foreach ($stmt as $row) {
?>

    <!-- Main content -->
    <section class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $_GET['id'] . '&lid=' .$_GET['lid']; ?>" method="post">
        <!-- /.row -->
        <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Quiz/Exam
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Quiz/Exam Title</label>
                          <input type="text" class="form-control" name="quizTitle" id="inputLessonTitle" placeholder="Lesson Title" value="<?php echo $row['chapter_title'];?>" required> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" name="quizType" required>
                            <option <?php if($row['chapter_type'] == 'Quiz') {echo 'selected';}?>>Quiz</option>
                            <option <?php if($row['chapter_type'] == 'Exam') {echo 'selected';}?>>Exam</option>
                        </select>
                     </div>
                   </div>


            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
          <button type="submit" class="btn btn-success">Change</button>
          </div>
        </div>
    </div>
    </form>
    <div class="card">
              <div class="card-header">
                <p class="card-title">Questions List
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                title="List of Questions. Here you can arrange items that will be part of the Quiz."></i></a></p>

                <div class="card-tools">
          <a class="btn btn-primary btn-sm" href="question-add.php?id=<?php echo $_GET['id']; ?>&lid=<?php echo $_GET['lid'];?>"><i class="fas fa-plus"></i> Add New Question</a>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Question</th>
                      <th style="width: 15%">Type</th>
                      <th style="width: 10%">Points</th>
                      <th style="width: 25%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                      $sql = "SELECT * FROM questions WHERE quiz_id = '".$_GET['id']."' ORDER BY question_id ASC";
                      $stmt = $pdo -> prepare($sql);
                      $stmt->execute();
                      $idcount = 0;
                      foreach ($stmt as $row) {

                   ?>
                    <tr>
                      <td><?php $idcount++; echo $idcount; ?>.</td>
                      <td><?php echo $row['question_title'];?></td>
                      <td><?php echo $row['question_type'];?></td>
                      <td><?php echo $row['question_point'];?></td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php?id=<?php echo $row['question_id'];?>&lid=<?php echo $_GET['lid'];?>&qid=<?php echo $row['quiz_id'];?>"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="question-edit.php?id=<?php echo $row['question_id'];?>&lid=<?php echo $_GET['lid'];?>&qid=<?php echo $row['quiz_id'];?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')" href="question-delete.php?id=<?php echo $row['question_id'];?>&lid=<?php echo $_GET['lid'];?>&qid=<?php echo $row['quiz_id'];?>"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <?php } if ($idcount == 0){ ?>
                    <tr>
                      <td colspan="5" class="text-center py-5">
                             No Questions found.
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