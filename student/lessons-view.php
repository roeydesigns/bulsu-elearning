<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../index.php");
  exit;
}
if(!isset($_SESSION["isadmin"])){ }
else if($_SESSION["isadmin"] == true){
  header("location: ../index.php");
  exit;
}

require_once 'includes/header.php';

require_once "../config.php";

if(!isset($_GET['id']) || !isset($_GET['lid'])){
  echo '<script> location.replace("lessons.php"); </script>';
  exit;
}

$sql = "SELECT * FROM chapters WHERE chapter_id = '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."'";
$stmt = $pdo -> prepare($sql);
$stmt->execute();

foreach ($stmt as $row) {
  $userId = $_SESSION['id'];
  $chapterId = $_GET['id'];
  $lessonId = $_GET['lid'];
  $viewed = 'viewed';

  $vwsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$_GET['id']."' AND lessonId = '".$_GET['lid']."' AND viewed = 'viewed'";
  $vwstmt = $pdo -> prepare($vwsql);
  $vwstmt->execute();                  
  $vwrow = $vwstmt->fetch();
  if($vwrow){}

  else {

      $inssql = "INSERT INTO lessonsviewed (userId, chapterId, lessonId, viewed) 
      VALUES (:userId,:chapterId,:lessonId,:viewed)";

      $insstmt = $pdo -> prepare($inssql);

      $insstmt->bindParam(':userId', $userId, PDO::PARAM_INT);  
      $insstmt->bindParam(':chapterId', $chapterId, PDO::PARAM_INT);  
      $insstmt->bindParam(':lessonId', $lessonId, PDO::PARAM_INT);  
      $insstmt->bindParam(':viewed', $viewed, PDO::PARAM_STR); 

      $insstmt->execute();
  }

?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <?php echo $row['chapter_title'];?>
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
           <?php echo $row['chapter_content'];?>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">

          <?php
            $sql = "SELECT * FROM chapters WHERE chapter_id < '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."' AND chapter_type = 'Chapter' ORDER BY chapter_id DESC";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();                  
            $row = $stmt->fetch();
            if($row){ ?>
              <a class="btn btn-secondary" onclick="return chapterViewed(<?php echo $_SESSION['id'];?>,<?php echo $_GET['id'];?>,<?php echo $_GET['lid'];?>)" href="lessons-view.php?id=<?php echo $row['chapter_id'];?>&lid=<?php echo $_GET['lid'];?>">Back</a>
      <?php } ?>

    <?php
    $sql = "SELECT * FROM chapters WHERE chapter_id > '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."' AND chapter_type = 'Chapter' ORDER BY chapter_id ASC";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute();                  
    $row = $stmt->fetch();
    if($row){ ?>
        <a class="btn btn-success" onclick="return chapterViewed(<?php echo $_SESSION['id'];?>,<?php echo $_GET['id'];?>,<?php echo $_GET['lid'];?>)" href="lessons-view.php?id=<?php echo $row['chapter_id'];?>&lid=<?php echo $_GET['lid'];?>">Next</a>
      <?php } ?>

          </div>
        </div>
        <!-- /.card -->
</div>

    </section>
    <!-- /.content -->

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>