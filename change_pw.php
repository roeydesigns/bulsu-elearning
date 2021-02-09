<?php require_once 'includes/header.php';
  $emailSET = false;
  session_start();
  if(!isset($_SESSION["loggedin"])){}

 else if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
   header("location: index.php");
   exit;
 }
 if(!isset($_GET['e'])){
    header("location: index.php");
    exit;
 }
 
 else if(!isset($_GET['st'])){
    header("location: index.php");
    exit;
 }

if($_SERVER["REQUEST_METHOD"] != "GET"){
  header("location: index.php");
  exit;
}

// Include config file
require_once "config.php";

 //Form data
$email = $_GET['e'];
$studentno = $_GET['st'];
$new_password = uniqid();
$sql = "UPDATE users SET password = :password
WHERE student_no = '".$_GET['st']."' ";

$stmt = $pdo -> prepare($sql);

$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
$param_password = password_hash($new_password, PASSWORD_DEFAULT);

$stmt->execute();




?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container py-5">
        <div class="row">

          <div class="col-lg-5 mx-auto">
            <div class="card py-3">
              <div class="card-body login-card-body">
                <p class="text-center">Here's your new Password. You can change it in Profile Page. Hope you don't lost it again.</p>
                <h3 class="text-center text-info"><strong><?php echo $new_password;?></strong></h3>
                  <div class="row">
                    <div class="col-4 mx-auto pt-3">
                      <a href="index.php" class="btn btn-primary btn-block">Go to Login</a>
                    </div>

                  </div>


          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
</div>

<?php require_once 'includes/footer.php'; ?>