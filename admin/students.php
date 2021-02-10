<?php

require_once '../classes/entry.php';
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
          <p class="card-title">List of Students</p>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 25%">
                          Student Name
                      </th>
                      <th style="width: 20%">
                          Student No.
                      </th>
                      <th style="width: 25%">
                          Email
                      </th>
                      <th class="text-center"> 
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
                    $sql = 'SELECT * FROM users WHERE id <> 1 ORDER BY user_firstname ASC';
                    require_once('../classes/dbh.php');
                    $dbh = new Dbh();
                    $rows = $dbh->executeSelect($sql);

                    $idcount = 0;
                    foreach ($rows as $row) {
                        
                        $users = new Users();
                        $users->setByRow($row);
                        $idcount++;

              ?>
                  <tr>
                      <td>
                      <strong><?php echo $idcount; ?></strong>
                      </td>
                      <td>
                      <?php echo $users->getFName(); ?> <?php echo $users->getMName(); ?> <?php echo $users->getLName(); ?>
                      </td>
                      <td>
                      <p class="m-0"><?php echo $users->getStNo(); ?></p>
                      </td>
                      <td>
                          <a href="mailto:<?php echo $users->getEmail(); ?>"><?php echo $users->getEmail(); ?></a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php?id=<?php echo $users->getId(); ?>">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>

                          <a href="profile-delete.php?id=<?php echo $users->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this account?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                        </a>
                      </td>
                  </tr>
                  <?php } if ($rows == false){ ?>
                    <tr>
                      <td colspan="5" class="text-center py-5">
                             No users found.
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


    
    <!-- Main content -->
    <section class="content py-5">

      <!-- Default box -->
      <div class="card card-outline card-danger">
        <div class="card-header">
          <p class="card-title">List of Deleted Students</p>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 20%">
                          Student Name
                      </th>
                      <th style="width: 20%">
                          Student No.
                      </th>
                      <th style="width: 25%">
                          Email
                      </th>
                      <th> 
                          Username
                      </th>
                      <th> 
                          Mobile No.
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
                    require_once "../config.php";
                    $sql = 'SELECT * FROM deletedusers WHERE id <> 1 ORDER BY user_firstname ASC';
                    
                    $stmt = $pdo -> prepare($sql);
                    $stmt->execute();
        
                    $deletedidcount = 0;
                    foreach ($stmt as $row) {

                        $deletedidcount++;

              ?>
                  <tr>
                      <td>
                      <strong><?php echo $deletedidcount; ?></strong>
                      </td>
                      <td>
                      <?php echo $row['user_firstname'];?> <?php echo $row['user_middlename'];?> <?php echo $row['user_lastname'];?>
                      </td>
                      <td>
                      <p class="m-0"><?php echo $row['student_no'];?></p>
                      </td>
                      <td>
                          <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a>
                      </td>
                      <td >
                             <?php echo $row['username'];?>
                      </td>
                      <td >
                             <?php echo $row['phone'];?>
                      </td>
                  </tr>
                  <?php } if ($deletedidcount == 0){ ?>
                    <tr>
                      <td colspan="6" class="text-center py-5">
                             No deleted users found.
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