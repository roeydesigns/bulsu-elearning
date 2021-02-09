


<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
  header("location: ../index.php");
  exit;
}

if(!isset($_GET['id'])){
  header("location: lessons.php");
  exit;
}
require_once 'includes/header.php';
require_once "../config.php";

$chkboxCount = 0;
$ChoicesFieldOk = 1;
$question_point = 0;
$quiz_id = 0;
$question_title = $question_choicesanswer = $question_choices = $question_type = $question_shortanswer = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if (isset($_GET['id'])){

    $quiz_id = $_GET['qid'];

    if ($_POST['questionTitle']==""){
      echo "<script type='text/javascript'>alert('Error! Question field is empty.');</script>";
      echo '<script> location.replace("question-edit.php?id=' .$_GET['id'] .'&lid=' .$_GET['lid']. '&qid=' .$_GET['qid'].'"); </script>';
      exit;
    }

    else {
      $question_title = $_POST['questionTitle'];
    }


    if ($_POST['questionPoints']!=""){
      $question_point = $_POST['questionPoints'];
    }

    $question_type = $_POST['questionType'];

    if ($question_type=="Multiple Choice"){
      $questionChoicesDescription=$_POST['questionChoicesDescription'];
      for($i=0;$i<count($questionChoicesDescription);$i++){

        if($questionChoicesDescription[$i]!=""){
          $question_choices = $question_choices.$questionChoicesDescription[$i];
          if ($i != count($questionChoicesDescription)-1 ){
            $question_choices = $question_choices.',;;g*/';
          }

          if ($_POST['questionChoicesCheckbox'.$i+1] == 1){
            $chkboxCount++;
            $question_choicesanswer = $questionChoicesDescription[$i];
          }

        }

        else {
          $ChoicesFieldOk=0;
        }

      }

      if ($chkboxCount>1){
        echo "<script type='text/javascript'>alert('Error! Please only select 1 answer for multiple choice type.');</script>";
        echo '<script> location.replace("question-edit.php?id=' .$_GET['id'] .'&lid=' .$_GET['lid']. '&qid=' .$_GET['qid'].'"); </script>';
        exit;
      }

      if ($ChoicesFieldOk==0){
        echo "<script type='text/javascript'>alert('Error! Please don\'t leave empty multiple choice field. ');</script>";
        echo '<script> location.replace("question-edit.php?id=' .$_GET['id'] .'&lid=' .$_GET['lid']. '&qid=' .$_GET['qid'].'"); </script>';
        exit;
      }

    }

    else if ($question_type=="Short Answer"){
      $question_shortanswer = $_POST['questionShortAnswer'];
    }
    
    $sql = "UPDATE questions  SET quiz_id = :quiz_id,
    question_title = :question_title,
    question_point = :question_point,
    question_type = :question_type,
    question_shortanswer = :question_shortanswer,
    question_choices = :question_choices,
    question_choicesanswer = :question_choicesanswer
    WHERE question_id = '".$_GET['id']."' AND quiz_id = '".$_GET['qid']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':quiz_id', $quiz_id, PDO::PARAM_INT);  
    $stmt->bindParam(':question_title', $question_title, PDO::PARAM_STR); 
    $stmt->bindParam(':question_point', $question_point, PDO::PARAM_INT);  
    $stmt->bindParam(':question_type', $question_type, PDO::PARAM_STR);  
    $stmt->bindParam(':question_shortanswer', $question_shortanswer, PDO::PARAM_STR);  
    $stmt->bindParam(':question_choices', $question_choices, PDO::PARAM_STR);  
    $stmt->bindParam(':question_choicesanswer', $question_choicesanswer, PDO::PARAM_STR);  


    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Edited Successfully.');</script>";
      echo '<script> location.replace("quiz-edit.php?id=' .$_GET['qid'] .'&lid=' .$_GET['lid'].'"); </script>';
    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }
    

      

  }

}

$sql = "SELECT * FROM questions WHERE question_id = '".$_GET['id']."' AND quiz_id = '".$_GET['qid']."' ";
$stmt = $pdo -> prepare($sql);
$stmt->execute();
foreach ($stmt as $row) {
?>

    <!-- Main content -->
    <section class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET['id'];?>&lid=<?php echo $_GET['lid'];?>&qid=<?php echo $row['quiz_id'];?>" method="post">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
            <i class="fas fa-edit"></i>
              Edit Question
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Question</label>
                          <input type="text" name="questionTitle" class="form-control" id="inputLessonTitle" placeholder="Question" value="<?php echo $row['question_title'];?>"> 
                    </div>
                 </div>

                 <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Points</label>
                          <input type="number" name="questionPoints" class="form-control" id="inputLessonTitle" placeholder="Points" value ="<?php echo $row['question_point'];?>"> 
                    </div>
                   </div>

                   <div class="col-md-3 col-12">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" id="QselectType" disabled>
                            <option <?php if ($row['question_type']=="Multiple Choice") { echo 'selected';}?>>Multiple Choice</option>
                            <option <?php if ($row['question_type']=="Short Answer") { echo 'selected';}?>>Short Answer</option>
                        </select>
                     </div>
                   </div>
                   <?php if ($row['question_type']=="Multiple Choice") { ?>
                    <input name="questionType" type="hidden" value ="Multiple Choice">
                    <div class="col-md-6 col-12">
                        <label>Choices</label>
                        <small>(Check the box for the correct answer)</small>

                        <?php
                          $ccCounter = 0;
                          $myArray = explode(',;;g*/', $row['question_choices']);
                          foreach($myArray as $my_Array){
                            $ccCounter++;
                        ?>
                          <div class="input-group pt-2" id="QchoicesDiv<?php echo $ccCounter;?>">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><input id="QchoicesCheck<?php echo $ccCounter;?>" name="questionChoicesCheckbox<?php echo $ccCounter;?>" type="hidden" value ="0"><input id="QchoicesCheck<?php echo $ccCounter;?>" name="questionChoicesCheckbox<?php echo $ccCounter;?>" type="checkbox" value ="1" <?php if($my_Array == $row['question_choicesanswer']){echo 'checked'; }?>></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $my_Array;?>" id="QchoicesDesc<?php echo $ccCounter;?>" name="questionChoicesDescription[]" placeholder="Choice Description">
                          </div>

                        <?php } ?>
                      </div>

                <?php } if ($row['question_type']=="Short Answer") { ?>
                  <input name="questionType" type="hidden" value ="Short Answer">
                 <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Answer</label>
                          <input type="text" name="questionShortAnswer" class="form-control" id="inputLessonTitle" placeholder="Answer"  value ="<?php echo $row['question_shortanswer'];?>"> 
                    </div>
                 </div>
                 <?php } ?>

            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <button type="submit" class="btn btn-success" id="questionFormSubmitBtn">Submit</button>
          </div>
        </div>
        <!-- /.card -->
</div>
</form>
    </section>
    <!-- /.content -->
    <?php } ?>

<?php require_once 'includes/footer.php'; ?>