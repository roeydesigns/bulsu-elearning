<?php require_once '../classes/entry.php';
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}
require_once "../config.php";
$users_sql = 'SELECT * FROM users WHERE id <> 1 ORDER BY id';
$users = $pdo->prepare($users_sql);
$users->execute();
$users_count = $users->rowCount();

$lessons_sql = 'SELECT * FROM lessons';
$lessons = $pdo->prepare($lessons_sql);
$lessons->execute();
$lessons_count = $lessons->rowCount();

$exam_sql = 'SELECT * FROM chapters WHERE chapter_type = "Exam"' ;
$exam = $pdo->prepare($exam_sql);
$exam->execute();
$exams_count = $exam->rowCount();

$quiz_sql = 'SELECT * FROM chapters WHERE chapter_type = "Quiz"' ;
$quiz = $pdo->prepare($quiz_sql);
$quiz->execute();
$quiz_count = $quiz->rowCount();

 require_once 'includes/header.php'; 

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $users_count; ?></h3>

                <p>Students Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $quiz_count; ?></h3></h3>

                <p>Quizes Created</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars "></i>
              </div>
              <a href="lessons.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $exams_count; ?></h3></h3>

                <p>Exams Created</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="lessons.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $lessons_count; ?></h3>

                <p>Lessons Created</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="lessons.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <div class="col-lg-8 col-12 ">
                 <!-- TO DO List -->
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-calendar mr-1"></i>
                  Calendar of Events
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="external-events"></div>
                  <div class="card card-primary">
                    <div class="card-body p-0">
                      <div id="calendar"></div>
                    </div>
                  </div>
              </div>
          </div>

        </div>
        <!-- /.row -->
        <div class="col-lg-4 col-12">
                 <!-- TO DO List -->
                 <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  My To Do List
                </h3>

                <div class="card-tools">
                   <button type="button" id="ToDoListBtn" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="todo-list" data-widget="todo-list">
                <?php
                    $sql = "SELECT * FROM todolist WHERE user_id = '".$_SESSION['id']."'";
                    $stmt = $pdo -> prepare($sql);
                    $stmt->execute();
                    $idcounter = 0;
                    foreach ($stmt as $row) {
                      $idcounter++;
                ?>
                  <li>
                  

                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="<?php echo $row['todolist_id'];?>" onclick="return chckbxTdlist(<?php echo $row['todolist_id'];?>,<?php if($row['todolist_check']=='check'){echo '\'check\'';} else {echo '\'uncheck\'';} ?>)" name="todo[]" id="todoCheck<?php echo $idcounter;?>" <?php if($row['todolist_check']=="check"){echo 'checked';} ?>>
                      <label for="todoCheck<?php echo $idcounter;?>"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text" onclick="tdlistChangeCntnt(<?php echo $row['todolist_id'];?>)"><?php echo $row['todolist_content'];?></span>
                    <div class="tools">
                      <i class="fas fa-trash" onclick="tdlistDelete(<?php echo $row['todolist_id'];?>)"></i>
                    </div>
                  </li>
                  <?php } if ($idcounter == 0){ ?>
                  <div  class="icheck-primary d-inline ml-2">
                      <p class="text-center py-5">No To Do List Yet.</p>
                    </div>
                <?php }?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>

        </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      
    </section>


<?php require_once 'includes/footer.php'; ?>