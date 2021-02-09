<?php require_once '../classes/entry.php';
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
 require_once "../config.php";

?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
        <div class="col-lg-9 col-12">
        <div class="row">
        <?php 
          $sql = 'SELECT * FROM lessons WHERE lesson_status <> "Unpublish" ORDER BY lesson_id ASC ';
  
          $stmt = $pdo -> prepare($sql);
          $stmt->execute();


          foreach ($stmt as $row) {
        ?>
         <div class="col-lg-4">
         <a href="lessons-view-index.php?id=<?php echo $row['lesson_id'];?>" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('<?php if($row['lesson_image']==''){ echo '../dist/img/default.jpg';}{} echo $row['lesson_image'];?>')">
            </div>
            <div class="card-body">
            <h6><strong><?php echo $row['lesson_title'];?></strong></h6>
              <small><?php echo $row['lesson_description'];?>.</small>
            </div>
            <div class="card-footer">
                <div class="progress">
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
                          <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="<?php if(isset($percentage_value)){echo $percentage_value;}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(isset($percentage_value)){echo $percentage_value;}?>%">
                            
                            <span><?php if(isset($percentage_value)){echo $percentage_value;}?>% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>
      <?php } ?>


      </div>

    </div>
    <!-- /.row -->
    <div class="col-lg-3 col-12">
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
            <!-- PRODUCT LIST -->
              <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">Recently Finish</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
              <?php 
                require_once "../config.php";
                $sql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 5";
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                  $chapCount = 0;
                foreach ($stmt as $row) {
                  $chapCount++;
                  $chapsql = "SELECT * FROM chapters WHERE chapter_id = '".$row['chapterId']."'";
                  $chapstmt = $pdo -> prepare($chapsql);
                  $chapstmt->execute();                  
                  $chaprow = $chapstmt->fetch();

                  $lesssql = "SELECT * FROM lessons WHERE lesson_id = '".$row['lessonId']."'";
                  $lessstmt = $pdo -> prepare($lesssql);
                  $lessstmt->execute();                  
                  $lessrow = $lessstmt->fetch();

              ?>
                <li class="item">
                    <div class="product-info ml-4">
                      <a href="<?php if ($chaprow['chapter_type'] == 'Chapter'){?>lessons-view.php?id=<?php echo $row['chapterId'] . '&lid=' .$row['lessonId'];?><?php } else {echo 'records-view.php';}?>" class="product-title">
                        <span class="badge badge-info float-right">View</span></a>
                      <?php echo $chaprow['chapter_title'];?>
                     <span class="product-description">
                        <small><?php echo $lessrow['lesson_title'];?></small>
                      </span>
                    </div>
                  </li>
                  <?php  } 
                  if ($chapCount == 0){ ?>
                <li class="item">
                    <div class="product-info ml-4">

                      <p class="py-5">No Recently Finish Lessons/Test.</p>
  
                    </div>
                  </li>
              <?php } ?>

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                        <!-- PRODUCT LIST -->
                        <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">Upcoming</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php 
                require_once "../config.php";
                $sql = "SELECT * FROM chapters ORDER BY chapter_id ASC";
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                foreach ($stmt as $row) {

                  $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_SESSION['id']."' AND chapterId = '".$row['chapter_id']."' AND lessonId = '".$row['lesson_id']."'";
                  $viewedstmt = $pdo -> prepare($viewedsql);
                  $viewedstmt->execute();                  
                  $viewedrow = $viewedstmt->fetch();

                  $lesssql = "SELECT * FROM lessons WHERE lesson_id = '".$row['lesson_id']."'";
                  $lessstmt = $pdo -> prepare($lesssql);
                  $lessstmt->execute();                  
                  $lessrow = $lessstmt->fetch();
                  if ($viewedrow == false){
              ?>
                <li class="item">
                    <div class="product-info ml-4">
                    <a href="lessons-view.php" class="product-title">
                        <span class="badge badge-danger float-right">View</span></a>
                        <?php echo $row['chapter_title'];?>
                     <span class="product-description">
                         <small><?php echo $lessrow['lesson_title'];?></small>
                      </span>
                    </div>
                  </li>
                  <?php } } ?>



                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      
    </section>

<?php require_once 'includes/footer.php'; ?>