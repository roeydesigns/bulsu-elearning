<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

require_once 'includes/header.php';
require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if ($_GET['id'] == 1){
       //Form data
          $aboutTitle = $_POST['aboutTitle'];
          $aboutContent = $_POST['aboutContent'];

          $sql = "UPDATE settings SET title = :aboutTitle,
          content = :aboutContent
          WHERE id = '".$_GET['id']."'";

          $stmt = $pdo -> prepare($sql);

          $stmt->bindParam(':aboutTitle', $aboutTitle, PDO::PARAM_STR);  
          $stmt->bindParam(':aboutContent', $aboutContent, PDO::PARAM_STR);  

          if($stmt->execute()){
            echo "<script type='text/javascript'>alert('Successfully changed About Page');</script>";
           
          } else{
            echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
          }
    }

    else if ($_GET['id'] == 2){
      //Form data
         $mvTitle = $_POST['mvTitle'];
         $mvContent = $_POST['mvContent'];

         $sql = "UPDATE settings SET title = :mvTitle,
         content = :mvContent
         WHERE id = '".$_GET['id']."'";

         $stmt = $pdo -> prepare($sql);

         $stmt->bindParam(':mvTitle', $mvTitle, PDO::PARAM_STR);  
         $stmt->bindParam(':mvContent', $mvContent, PDO::PARAM_STR);  

         if($stmt->execute()){
           echo "<script type='text/javascript'>alert('Successfully changed Mission and Vision Page');</script>";
          
         } else{
          echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
         }
   }

}

?>
<?php
      $aboutsql = 'SELECT * FROM settings WHERE id = 1 ';
      $stmt = $pdo -> prepare($aboutsql);
      $stmt->execute();
      foreach ($stmt as $row) {
?>
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $row['id'];?>" method="post">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit About Page
            </h3>
          </div>
          <div class="card-body">
             <div class="row">
                 <div class="col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">About Page Title</label>
                          <input type="text" name="aboutTitle" class="form-control" id="inputLessonTitle" placeholder="About Page Title" value=" <?php echo $row['title'];?>"> 
                    </div>
                 </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" name="aboutContent" rows="3" style="z-index: 999;">
                        <?php echo $row['content'];?>
                        </textarea>
                     </div>
                   </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
        <div class="card-footer clearfix">
          <div class="float-right">
            <button type="submit" class="btn btn-success">Change</button>
          </div>
        </div>
    </div>
  </form>
    </section>
    <!-- /.content -->

    <?php } ?>

    <?php
      $mvsql = 'SELECT * FROM settings WHERE id = 2 ';
      
      $stmt = $pdo -> prepare($mvsql);
      $stmt->execute();
      foreach ($stmt as $row) {

?>
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $row['id'];?>" method="post">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Mission & Vision Page 
            </h3>
          </div>
          <div class="card-body">
             <div class="row">
                 <div class="col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Mission & Vision Page Title</label>
                          <input type="text" name="mvTitle" class="form-control" id="inputLessonTitle" placeholder="Mission & Vision Page Title" value="<?php echo $row['title'];?>"> 
                    </div>
                 </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="mvgsummernote" name="mvContent" rows="3" style="z-index: 999;">
                        <?php echo $row['content'];?>
                        </textarea>
                     </div>
                   </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
        <div class="card-footer clearfix">
          <div class="float-right">
            <button type="submit" class="btn btn-success" >Change</button>
          </div>
        </div>
    </div>
    </form>
    </section>
    <!-- /.content -->

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>