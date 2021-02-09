<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{

        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id,student_no, username, email, password FROM users WHERE username = :username";
          if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();                     
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
	                  		    $_SESSION["loggin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["studentno"] = $row["student_no"];
                            $_SESSION["username"] = $username;    
                            $_SESSION["email"] = $email;                         
                      // Redirect user to welcome page
                            if ($_SESSION["id"]=='1'){
                               $_SESSION["isadmin"] = true;
                              header("location: admin/index.php");
                            }
                            else {
                              $_SESSION["isadmin"] = false;
                              header("location: student/index.php");
                            }

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
        // Prepare a select statement
        $sql = "SELECT id,student_no, username, email, password FROM users WHERE email = :username";
          if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();                     
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
	                  		    $_SESSION["loggin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["studentno"] = $row["student_no"];
                            $_SESSION["username"] = $username;    
                            $_SESSION["email"] = $email;                         
                      // Redirect user to welcome page
                            if ($_SESSION["id"]=='1'){
                               $_SESSION["isadmin"] = true;
                              header("location: admin/index.php");
                            }
                            else {
                              $_SESSION["isadmin"] = false;
                              header("location: student/index.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
              echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
            }
        }
        // Close statement
       unset($stmt);
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
require_once 'includes/header.php'; 
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container py-5">
        <div class="row">
        <div class="col-lg-8 mx-auto">


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://myportal.bulsu.edu.ph/assets/custom/enrollment_schedule_2020/01.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://myportal.bulsu.edu.ph/assets/custom/enrollment_schedule_2020/02.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://myportal.bulsu.edu.ph/assets/custom/enrollment_schedule_2020/03.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-custom-icon" aria-hidden="true">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-custom-icon" aria-hidden="true">
              <i class="fas fa-chevron-right"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <?php if(!isset($_SESSION["loggedin"]) && empty($_SESSION["loggedin"])){ ?>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body login-card-body">
                <h1 class="text-center pb-2">Login</h1>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="input-group mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="username" class="form-control" placeholder="Email / Username" id="emailuserInput">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" class="form-control" name="password" placeholder="Password" id="passwordInput">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <small style="color:red" class="help-block"><?php echo $username_err; ?></small>
                  <small style="color:red" class="help-block"><?php echo $password_err; ?></small>
                  <div class="row">
                    <div class="col-12 pt-2">
                      <button type="submit" class="btn btn-primary btn-block" id="loginBTN">Login</button>
                    </div>
                    

                  </div>

                <p class="mb-1 text-center pt-3">
                    <a href="forgot.php">I forgot my password</a>
                </p>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
</div>
<?php require_once 'includes/footer.php'; ?>