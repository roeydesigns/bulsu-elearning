<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

require_once 'includes/header.php';

?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <p class="card-title">Lessons</p>

          <div class="card-tools">
          <a class="btn btn-info btn-sm" href="lessons-view-list.php">
            <i class="fas fa-eye"></i> View Lessons List</a>
          <a class="btn btn-primary btn-sm" href="lessons-add.php">
            <i class="fas fa-plus"></i> Add New</a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 3%">
                          #
                      </th>
                      <th style="width: 25%">
                          Lesson Name
                      </th>
                      <th>
                          Description
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status
                      </th>
                      <th style="width: 25%"  class="text-center"> 
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
                     require_once "../config.php";
                    $sql = 'SELECT * FROM lessons ORDER BY lesson_id ASC ';
                    
                    $stmt = $pdo -> prepare($sql);
                    $stmt->execute();
                    $idcount = 0;

                    foreach ($stmt as $row) {
              ?>
                  <tr>
                      <td>
                      <strong><?php $idcount++; echo $idcount; ?></strong>
                      </td>
                      <td>
                          <a>
                             <?php echo $row['lesson_title'];?>
                          </a>
                          <br/>
                          <small>
                          Created <?php echo $row['created_at'];?>
                          </small>
                      </td>
                      <td>
                      <p class="m-0"><?php echo $row['lesson_description'];?> </p>
                      </td>
                      <td class="project-state">
                         <?php if($row['lesson_status']=="Publish"){ ?>
                            <span class="badge badge-success">Published</span>

                        <?php } else if($row['lesson_status']=="Unpublish"){ ?>
                            <span class="badge badge-danger">Unpublished</span>
                        <?php } ?>
                          
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="lessons-view-index.php?id=<?php echo $row['lesson_id'];?>">
                              <i class="fas fa-eye">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="lessons-edit.php?id=<?php echo $row['lesson_id'];?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="lessons-delete.php?id=<?php echo $row['lesson_id'];?>" onclick="return confirm('Are you sure you want to delete this lesson?')" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>

                  <?php } if ($idcount == 0){ ?>
                    <tr>
                      <td colspan="5" class="text-center py-5">
                             No lessons found.
                      </td>
                  </tr>
                   <?php } ?>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>