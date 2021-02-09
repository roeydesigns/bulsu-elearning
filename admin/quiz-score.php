<?php
session_start();
 
require_once "../config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}
if(!isset($_GET["qid"]) && !isset($_GET["lid"])  ){
  header("location: index.php");
  exit;
}

require_once 'includes/header.php';
if(!isset($_GET["id"])){
  $userId = $_SESSION['id'];
}
else{
  $userId = $_GET["id"];
}

$sqlgetScore = "SELECT * FROM quizchecking WHERE userId = '".$userId."' AND quizId = '".$_GET['qid']."' AND lessonId = '".$_GET['lid']."'";
$stmtGetScore = $pdo -> prepare($sqlgetScore);
$stmtGetScore->execute();                  
$UserscoreTotalCount = 0;
foreach ($stmtGetScore as $rowGetScore) {
  $UserscoreTotalCount = $UserscoreTotalCount + $rowGetScore['Score'];
}

$sqlgetQuest = "SELECT * FROM questions WHERE quiz_id = '".$_GET['qid']."'";
$stmtGetQuest = $pdo -> prepare($sqlgetQuest);
$stmtGetQuest->execute();                  
$QuestcoreTotalCount = 0;
foreach ($stmtGetQuest as $rowGetQuest) {
  $QuestcoreTotalCount = $QuestcoreTotalCount + $rowGetQuest['question_point'];
}

$quiZname='';
$sqlgetQname = "SELECT * FROM chapters WHERE chapter_id = '".$_GET['qid']."' AND lesson_id = '".$_GET['lid']."'";
$stmtgetQname = $pdo -> prepare($sqlgetQname);
$stmtgetQname->execute();      
$rowgetQname = $stmtgetQname->fetch();            

if($rowgetQname){
  $quiZname = $rowgetQname['chapter_title'];
}


?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary">
          <div class="card-header">
            <h5 class="text-center">
            Quiz Result
            </h5>
          </div>
          <div class="card-body text-center">
          <p>Quiz Result for: <?php echo $quiZname; ?></p>
          <h2><?php if(!isset($_GET["id"])){echo 'Your';}
          else {
             $Qentry = new Users();
             $Qentry->SqlSelectEntryById($_GET["id"]); if($Qentry){echo $Qentry->getFName();}} ?> Score:</h2>
            <h5 class="py-2"><?php echo $UserscoreTotalCount;?>/<?php echo $QuestcoreTotalCount;?></h5>
            <a class="btn btn-success" href="lessons-view-list.php">Done</a>
            <?php if(!isset($_GET["id"])){echo '<br><small>Note: as an administrator your score is not be recorded in this test.</small>';} ?>
          </div>

</div>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>