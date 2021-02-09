<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

require_once 'includes/header.php';

require_once "../config.php";

if(!isset($_GET['id']) || !isset($_GET['qid']) || !isset($_GET['lid'])){
  echo '<script> location.replace("index.php"); </script>';
  exit;
}


$sql = "SELECT * FROM questions WHERE question_id = '".$_GET['id']."' AND quiz_id = '".$_GET['qid']."' ORDER BY question_id ASC";
$stmt = $pdo -> prepare($sql);
$stmt->execute();
                
$row = $stmt->fetch();
if($row){

  $sqlcheckq = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$_GET['qid']."' AND lessonId = '".$_GET['lid']."' AND viewed = 'viewed'";
  $cchksstmt = $pdo -> prepare($sqlcheckq);
  $cchksstmt->execute();                  
  $rowqqw = $cchksstmt->fetch();
  if($rowqqw == false){
    $userId = $_SESSION['id'];
    $chapterId = $_GET['qid'];
    $lessonId = $_GET['lid'];
    $viewed = 'viewed';

    $lssnsql = "INSERT INTO lessonsviewed (userId, chapterId, lessonId, viewed) 
    VALUES (:userId,:chapterId,:lessonId,:viewed)";

    $lssnstmt = $pdo -> prepare($lssnsql);

    $lssnstmt->bindParam(':userId', $userId, PDO::PARAM_INT);  
    $lssnstmt->bindParam(':chapterId', $chapterId, PDO::PARAM_INT);  
    $lssnstmt->bindParam(':lessonId', $lessonId, PDO::PARAM_INT);  
    $lssnstmt->bindParam(':viewed', $viewed, PDO::PARAM_STR); 
    $lssnstmt->execute();

  }
  echo "<script type='text/javascript'>alert('Note: as an administrator your score will not be recorded in this test.');</script>";
?>


    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET['id'];?>&lid=<?php echo $_GET['lid'];?>&qid=<?php echo $row['quiz_id'];?>" method="post">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
            <?php
            $sql = "SELECT * FROM chapters WHERE chapter_id = '".$_GET['qid']."' AND lesson_id = '".$_GET['lid']."'";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();                  
            $getQuizTitle = $stmt->fetch();
            if($getQuizTitle){
              echo $getQuizTitle['chapter_title'];
            } ?>

            </h3>
          </div>

          <div class="card-body">

          <?php if ($row['question_type']=='Multiple Choice'){ ?>
            <p class="py-2 mb-0"><?php echo $row['question_title'];?></p>
            <div class="form-group">
              <?php
                $ccCounter = 0;
                $myArray = explode(',;;g*/', $row['question_choices']);
                foreach($myArray as $my_Array){
                  $ccCounter++;
              ?>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" onclick="quizRadioClick(<?php echo '\'#quizRadioID'.$ccCounter .'\'';?>)" id="quizRadioID<?php echo $ccCounter;?>" name="quizRadio[]" value="<?php echo $my_Array;?>">
                <label for="quizRadioID<?php echo $ccCounter;?>" class="custom-control-label"><?php echo $my_Array;?></label>
              </div>
              <?php } ?>
                  <input type="hidden" id="multiAns">
            </div>

              <?php } else { ?>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="quizShortAnswerId"><?php echo $row['question_title'];?></label>
                  <input type="text" class="form-control" name="quizShortAnswer" id="quizShortAnswerId" placeholder="Your Answer" required> 
                </div>
              </div>

            <?php } ?>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">

            <?php
            $sql = "SELECT * FROM questions WHERE question_id > '".$_GET['id']."' AND quiz_id = '".$_GET['qid']."'";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();                  
            $qrow = $stmt->fetch();
            if($qrow){ ?>
                <a class="btn btn-success" href="quiz-view.php?qid=<?php echo $qrow['quiz_id'];?>&lid=<?php echo $_GET['lid'];?>&id=<?php echo $qrow['question_id'];?>">Next</a>
              <?php } else { ?>
                <a class="btn btn-success" href="quiz-score.php?qid=<?php echo $_GET['qid'];?>&lid=<?php echo $_GET['lid'];?>">Finish</a>
             <?php } ?>

          </div>
        </div>
        <!-- /.card -->
  </div>
</form>
    </section>
    <!-- /.content -->

    <?php  } ?>
<?php require_once 'includes/footer.php'; ?>