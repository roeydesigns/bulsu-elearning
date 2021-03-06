<?php require_once 'includes/header.php';
  $emailSET = false;
  session_start();
  if(!isset($_SESSION["loggedin"])){}

 else if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
   header("location: index.php");
   exit;
 }

 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$email = "";
$email_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if email is empty
    if(empty(trim($_POST["Email"]))){
        $email_err= "Please enter a valid email.";
    } else{
        $email = trim($_POST["Email"]);
    }

    // Validate credentials
    if(empty($email_err)){
        // Prepare a select statement
        $sql = "SELECT id, email FROM users WHERE email = :email";
               if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            // Set parameters
            $param_email = trim($_POST["Email"]);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if email exists
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $emailR = $row["email"];
                        
                        header("location: change_pw.php?e=".$emailR);
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
              echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
            }
        }
        // Close statement
       unset($stmt);
    }
     // Close connection
    unset($pdo);
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container py-5">
        <div class="row">

          <div class="col-lg-4 mx-auto align-middle">
            <div class="card">
              <div class="card-body login-card-body">
                <p class="text-center">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="#" method="post">
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="Email" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <span style="color:red" class="help-block pl-3"><?php echo $email_err; ?></span>
                    <div class="col-12 pt-2">
                      <button type="submit" class="btn btn-primary btn-block">Request a new password</button>
                    </div>

                  </div>
                </form>
                <p class="mb-1 text-center pt-3">
                    <a href="index.php">Go to Login</a>
                </p>
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