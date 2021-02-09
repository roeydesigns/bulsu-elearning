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

if(!isset($_GET['id'])){
  echo '<script> location.replace("lessons.php"); </script>';
  exit;
}

$sql = "SELECT * FROM lessons WHERE lesson_id = '".$_GET['id']."' AND lesson_status = 'Publish'";

$stmt = $pdo -> prepare($sql);
$stmt->execute();

foreach ($stmt as $row) {
?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div id="accordion">
          <div class="card text-white">
            <div class="card-header" style="background: #343a40">
            <div class="row p-4">
            <div class="col-lg-4 col-12">
            <img class="d-block w-100" src="<?php if($row['lesson_image']==''){ echo '../dist/img/default.jpg';}{} echo $row['lesson_image'];?>">
            </div>
            <div class="col-lg-8 col-12 pt-3">
              <h3 class="pt-3"><?php echo $row['lesson_title'];?></h3>
              <p class="my-3"><?php echo $row['lesson_description'];?></p>

                 
                  <div class="row pt-5" style="padding-left: 7.5px">
                        <p>Progress:</p>

                      <div class="col-lg-10 col-8 pt-1">
                        <div class="progress">
                        <?php 
                        $progresssql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND lessonId = '".$_GET['id']."'" ;
                        $progress = $pdo->prepare($progresssql);
                        $progress->execute();
                        $progress_count = $progress->rowCount();
                        $progres_chaptersql = "SELECT * FROM chapters WHERE lesson_id = '".$_GET['id']."'" ;
                        $progres_chapter = $pdo->prepare($progres_chaptersql);
                        $progres_chapter->execute();
                        $progres_chapter_count = $progres_chapter->rowCount();
                        
                        if($progress_count!=0 && $progres_chapter_count !=0 ){
                          $percentage_value = ($progress_count/$progres_chapter_count)*100;
                        }
                        else {
                          $percentage_value = 0;
                        }

                        ?>
                        
                        <div class="progress-bar bg-success progress-bar" role="progressbar"
                              aria-valuenow="<?php if(isset($percentage_value)){echo $percentage_value;}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(isset($percentage_value)){echo $percentage_value;}?>%">
                          <span><?php if(isset($percentage_value)){echo $percentage_value;}?>% Completed</span>
                        </div>
                        </div>  
                      </div>
                  </div>

            </div>
            </div>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="card-body row pt-4">

          <?php

          $sql = "SELECT * FROM chapters WHERE lesson_id = '".$_GET['id']."' ORDER BY chapter_id ASC";
          $stmt = $pdo -> prepare($sql);
          $stmt->execute();
          $cntnt_count = $stmt->rowCount();
          foreach ($stmt as $row) {

            if($row['chapter_type']=='Chapter'){

           
          ?>

                <div class="col-lg-3">
                  <a class="d-block w-100" onclick="return chapterViewed(<?php echo $_SESSION['id'];?>,<?php echo $row['chapter_id'];?>,<?php echo $_GET['id'];?>)" href="lessons-view.php?id=<?php echo $row['chapter_id'];?>&lid=<?php echo $_GET['id'];?>">
                  <div class="card <?php $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$row['chapter_id']."' AND lessonId = '".$_GET['id']."' AND viewed = 'viewed'"; $viewedstmt = $pdo -> prepare($viewedsql); $viewedstmt->execute(); $viewedrow = $viewedstmt->fetch(); if($viewedrow){ echo 'bg-gradient-success';} else { echo 'bg-gradient-secondary';} ?> card-outline">
                      <div class="card-header">
                          <h4 class="card-title w-100">
                               <?php echo $row['chapter_title'];?>
                          </h4>
                      </div>
                      <div class="card-body text-justify">
                        <?php echo $row['chapter_excerpt'];?>
                    </div>
                  </div>
                  </a>
                </div>

            
            <?php } else { ?>
                <div class="col-lg-3">
                  <a class="d-block w-100" onclick="return confirm('Are you sure you want to start? Once started all your inputs will be recorded.')"


                  href="quiz-view.php?qid=<?php echo $row['chapter_id'];?>&lid=<?php echo $_GET['id'];?>&id=<?php $sql = "SELECT * FROM questions WHERE quiz_id = '".$row['chapter_id']."' ORDER BY question_id ASC"; $stmt = $pdo -> prepare($sql);  $stmt->execute(); $getQId = $stmt->fetch(); echo $getQId['question_id']; ?>">
                  <div class="card <?php $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$row['chapter_id']."' AND lessonId = '".$_GET['id']."' AND viewed = 'viewed'"; $viewedstmt = $pdo -> prepare($viewedsql); $viewedstmt->execute(); $viewedrow = $viewedstmt->fetch(); if($viewedrow){ echo 'bg-gradient-success';} else { echo 'bg-gradient-secondary';} ?> card-outline">

                      <div class="card-body text-center">
                        <small>( <?php echo $row['chapter_type'];?> )</small>
                          <h4 class="pt-4">
                             <?php echo $row['chapter_title'];?>
                          </h4> 
                          <p  class="pb-3"><?php $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$row['chapter_id']."' AND lessonId = '".$_GET['id']."' AND viewed = 'viewed'"; $viewedstmt = $pdo -> prepare($viewedsql); $viewedstmt->execute(); $viewedrow = $viewedstmt->fetch(); if($viewedrow){ echo 'Test Completed';} else { echo 'Click to Start';} ?></p>
                    </div>
                  </div>
                  </a>
                </div>
              <?php  } } if ( $cntnt_count == 0){ ?>
                <div class="col-lg-12">
                  <p class="py-5 text-center" style="color:#343a40 ">No Chapters and Quiz/Exam found. </p>
                </div>   
              <?php } ?>

                </div>
              </div>
            </div>
      

    </section>
    <!-- /.content -->

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>