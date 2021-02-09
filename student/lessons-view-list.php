<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

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

?>

    <!-- Main content -->
    <section class="content px-3 pb-5">

      <div id="accordion">
        <div class="row">

        <?php
            require_once "../config.php";
            $sql = 'SELECT * FROM lessons WHERE lesson_status <> "Unpublish" ORDER BY lesson_id ASC ';
            
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();


            foreach ($stmt as $row) {
          ?>

         <div class="col-lg-4">
           <a href="lessons-view-index.php?id=<?php echo $row['lesson_id'];?>" style="color: #191919;">
          <div class="card">
          <div class="card-header lessons-imgcard" style="background: url('<?php if($row['lesson_image']==''){ echo '../dist/img/default.jpg';}{} echo $row['lesson_image'];?>')">
          </div>
            <div class="card-body">
            <h3 class="pt-3"><?php echo $row['lesson_title'];?></h3>
              <p class="my-3"><?php echo $row['lesson_description'];?>.</p>
            </div>
            <div class="card-footer">
                  <div class="row" style="padding-left: 7.5px">
                  <?php 
                        $progresssql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND lessonId = '".$row['lesson_id']."'" ;
                        $progress = $pdo->prepare($progresssql);
                        $progress->execute();
                        $progress_count = $progress->rowCount();
                        $progres_chaptersql = "SELECT * FROM chapters WHERE lesson_id = '".$row['lesson_id']."'" ;
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
                      <p>Progress:</p>
                      <div class="col-9 pt-1">
                        <div class="progress">
                          <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="<?php if(isset($percentage_value)){echo $percentage_value;}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(isset($percentage_value)){echo $percentage_value;}?>%">
                            
                            <span><?php if(isset($percentage_value)){echo $percentage_value;}?>% Completed</span>
                          </div>
                        </div>  
                      </div>
                  </div>
            </div>
          </div>
          </a>
        </div>
    <?php } ?>

        



        </div>
      </div>
      

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>