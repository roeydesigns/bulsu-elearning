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
      <div class="container-fluid">


                  <div id="external-events">
                  </div>


            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>