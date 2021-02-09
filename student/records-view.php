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
?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline py-3">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="<?php if ($entry->getUsrImg()==''){ echo '../dist/img/avatar5.png'; } else {echo $entry->getUsrImg(); }?>"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $entry->getFName(); ?> <?php echo $entry->getMName(); ?> <?php echo $entry->getLName(); ?></h3>
                    <p class="text-muted text-center mb-1">Student</p>
                    <p class="text-center m-0"><strong><?php echo $entry->getStNo(); ?></strong></p>
                    <a href="mailto:<?php echo $entry->getEmail(); ?>"><p  class="text-center"><?php echo $entry->getEmail(); ?></p></a>
                    <p class="text-center mt-4"><strong>Address</strong> <br><?php echo $entry->getAddress(); ?>, <?php echo $entry->getCity(); ?>, <?php echo $entry->getProvince(); ?> </p>
                    <p class="text-center mb-0"><strong>Mobile No.</strong> <br><?php echo $entry->getPhone(); ?> </p>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        <div class="col-lg-9">

        <div class="card">
            <div class="card-header">
            <p class="card-title">Scores on Quizes/Exams of <?php echo $entry->getFName(); ?> <?php echo $entry->getMName(); ?> <?php echo $entry->getLName(); ?></p>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 3%">
                            #
                        </th>
                        <th style="width: 30%">
                            Lesson Title
                        </th>
                        <th style="width: 25%">
                            Quiz/Exam Title
                        </th>
                        <th style="width: 10%">
                            Type
                        </th>
                        <th style="width: 15%">
                            Score
                        </th>
                        <th class="text-center"> 
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                require_once "../config.php";
                $sql = "SELECT * FROM chapters WHERE chapter_type <> 'Chapter'";
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                $qqcount = 0;
                foreach ($stmt as $row) {
                  $qqcount++;

                  $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$row['chapter_id']."' AND lessonId = '".$row['lesson_id']."'";
                  $viewedstmt = $pdo -> prepare($viewedsql);
                  $viewedstmt->execute();                  
                  $viewedrow = $viewedstmt->fetch();
                  
                  $lesssql = "SELECT * FROM lessons WHERE lesson_id = '".$row['lesson_id']."'";
                  $lessstmt = $pdo -> prepare($lesssql);
                  $lessstmt->execute();                  
                  $lessrow = $lessstmt->fetch();
                 
              ?>
                    <tr>
                        <td>
                        <strong><?php echo $qqcount; ?></strong>
                        </td>
                        <td>
                        <?php echo $lessrow['lesson_title'];?>
                        </td>
                        <td>
                        <p class="m-0"><?php echo $row['chapter_title'];?></p>
                        </td>
                        <td>
                            <?php echo $row['chapter_type'];?>
                        </td>
                        <td>
                        <?php 
                        $sqlgetScore = "SELECT * FROM quizchecking WHERE userId = '".$_SESSION['id']."' AND quizId = '".$row['chapter_id']."' AND lessonId = '".$row['lesson_id']."'";
                        $stmtGetScore = $pdo -> prepare($sqlgetScore);
                        $stmtGetScore->execute();                  
                        $UserscoreTotalCount = 0;
                        foreach ($stmtGetScore as $rowGetScore) {
                          $UserscoreTotalCount = $UserscoreTotalCount + $rowGetScore['Score'];
                        }
                        
                        $sqlgetQuest = "SELECT * FROM questions WHERE quiz_id = '".$row['chapter_id']."'";
                        $stmtGetQuest = $pdo -> prepare($sqlgetQuest);
                        $stmtGetQuest->execute();                  
                        $QuestcoreTotalCount = 0;
                        foreach ($stmtGetQuest as $rowGetQuest) {
                          $QuestcoreTotalCount = $QuestcoreTotalCount + $rowGetQuest['question_point'];
                        }
                        ?>
                        <?php 
                            if ($viewedrow){
                                echo $UserscoreTotalCount .'/' .$QuestcoreTotalCount;
                               
                               
                            } else{
                                
                                echo 'Not Yet Taken';
                            }
                        ?>

                        </td>
                        <td class="project-actions text-center">
                            <?php if ($viewedrow){ ?>
                            <a class="btn btn-info btn-sm" href="quiz-score.php?qid=<?php echo $row['chapter_id'];?>&lid=<?php echo $row['lesson_id'];?>&id=<?php echo $_SESSION['id'];?>">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                            <?php } ?>

                        </td>
                    </tr>
                    <?php } ?>

                    
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    
        </div>
    </div>


    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>