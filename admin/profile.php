<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}	

require_once "../config.php";
require_once '../classes/entry.php';
$entry = new Users();
$entry->SqlSelectEntryById('1');
// Define variables and initialize with empty values
$new_password = $confirm_password = $current_password = "";
$new_password_err = $confirm_password_err = $current_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["current_password"]))){
    $current_password_err = "Error! Please enter your current password.";    
    echo "<script type='text/javascript'>alert('$current_password_err');</script>"; 
  } elseif(password_verify(trim($_POST["current_password"]), $entry->getPass())==false){
    $current_password_err = "Error! you input wrong password.";    
    echo "<script type='text/javascript'>alert('$current_password_err');</script>"; 
  }
  
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Error! Please enter the new password.";    
        echo "<script type='text/javascript'>alert('$new_password_err');</script>"; 
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Error! Password must have atleast 6 characters.";
        echo "<script type='text/javascript'>alert('$new_password_err');</script>"; 
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Error! Please confirm the password.";
        echo "<script type='text/javascript'>alert('$confirm_password_err');</script>"; 
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Error! Password did not match.";
            echo "<script type='text/javascript'>alert('$confirm_password_err');</script>"; 
        }
    }

 // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err) && empty($current_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"]; 
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                echo "<script type='text/javascript'>alert('Successfully Changed Password.');</script>";
                header("refresh:0.01;url= ../index.php");
                exit();
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline py-3">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php if ($entry->getUsrImg()==''){ echo '../dist/img/avatar4.png'; } else {echo $entry->getUsrImg(); }?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $entry->getFName(); ?> <?php echo $entry->getLName(); ?> </h3>
                <p class="text-muted text-center mb-3">Administrator</p>
                <form action="profile-changeimg.php?user_id=<?php echo $entry->getId(); ?>" method="POST" enctype="multipart/form-data" name="fileImgUploadForm">
                  <div style='display:none'>
                  <input id="fileProfileImgUpload" type="file" name="UserImgInput" accept="image/x-png,image/gif,image/jpeg" onchange="fileImgUpload()" />
                  </div>
              <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
              <!-- <input type="submit" value='submit' > -->
               </form>
                <button type="file" class="btn btn-primary btn-block" onclick ="ProfImgUpload()"><b>Change Picture</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#cred" data-toggle="tab">Credentials</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                    <form class="form-horizontal" action="update_profile.php?user_id=<?php echo $entry->getId(); ?>" method="POST">
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Firstname" id="inputFirstname" placeholder="First Name" value="<?php echo $entry->getFName(); ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputMiddlename" class="col-sm-2 col-form-label">Middle Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Middlename" id="inputMiddlename" placeholder="Middle Name" value="<?php echo $entry->getMName(); ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputLastname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Lastname" id="inputLastname" placeholder="Last Name" value="<?php echo $entry->getLName(); ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" name="Gender" id="inputGender">
                          <option <?php if($entry->getGender() == 'Male'){echo 'selected';} ?>>Male</option>
                          <option <?php if($entry->getGender() == 'Female'){echo 'selected';} ?>>Female</option>
                        </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Change Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="password">
                    <p class="text-center">You can update your password information here.</p>
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group row">
                        <label for="inputCurrentPassword" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="current_password" class="form-control" id="inputCurrentPassword" placeholder="Current Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="new_password" class="form-control" id="inputPassword" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="confirm_password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div>

                <div class="tab-pane" id="cred">
                <form class="form-horizontal"  action="update_credentials.php?user_id=<?php echo $entry->getId(); ?>" method="POST">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Student No." name="StdNo" value="<?php echo $entry->getStNo(); ?>" disabled>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="inputUsername" name="Username" placeholder="Username" value="<?php echo $entry->getUsername(); ?>" disabled required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="Email" value="<?php echo $entry->getEmail(); ?>" disabled required>
                      </div>
                      <div class="form-group row"> 
                        <div class="col-sm-10">
                          <a class="btn btn-danger" id="EditCred">Edit Credentials</a>
                          <button type="submit" class="btn btn-success" id="cred-change-btn">Change Credentials</button>
                        </div>
                      </div>
                  </div>
                </form>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



<?php require_once 'includes/footer.php'; ?>