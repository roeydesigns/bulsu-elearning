<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

if(!isset($_GET['id']) && !isset($_GET['lid'])){
  header("location: lessons.php");
  exit;
}

require_once 'includes/header.php';
require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_GET['id']) && isset($_GET['lid'])){

    $chapterTitle = $_POST["chapterTitle"];
    $chapterExcerpt = $_POST["chapterExcerpt"];
    $chapterContent = $_POST["chapterContent"];

    $sql = "UPDATE chapters SET chapter_title = :chapterTitle,
    chapter_excerpt = :chapterExcerpt,
    chapter_content = :chapterContent
    WHERE chapter_id = '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':chapterTitle', $chapterTitle, PDO::PARAM_STR); 
    $stmt->bindParam(':chapterExcerpt', $chapterExcerpt, PDO::PARAM_STR); 
    $stmt->bindParam(':chapterContent', $chapterContent, PDO::PARAM_STR); 

    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Changed Successfully.');</script>";
      echo '<script> location.replace("lessons-edit.php?id=' .$_GET['lid'] .'"); </script>';
    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }

  }
}

$sql = "SELECT * FROM chapters WHERE chapter_id = '".$_GET['id']."' AND lesson_id = '".$_GET['lid']."' ";
$stmt = $pdo -> prepare($sql);
$stmt->execute();
foreach ($stmt as $row) {

?>
    <!-- Main content -->
    <section class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $_GET['id'] . '&lid=' .$_GET['lid']; ?>" method="post">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Chapter
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputLessonTitle">Chapter Title</label>
                          <input type="text" class="form-control" name="chapterTitle" id="inputLessonTitle" placeholder="Lesson Title" value="<?php echo $row['chapter_title'];?>"> 
                    </div>
                 </div>

                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" disabled>
                            <option selected="selected">Chapter</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Excerpt</label>
                        <textarea class="form-control"name="chapterExcerpt"  rows="3" placeholder="Description"><?php echo $row['chapter_excerpt'];?></textarea>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" name="chapterContent" rows="3" style="z-index: 999;">
                         <?php echo $row['chapter_content'];?>
                        </textarea>
                     </div>
                   </div>
            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
          <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
        <!-- /.card -->
</div>
</form>
    </section>
    <!-- /.content -->

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>