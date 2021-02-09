<?php
// Initialize the session
session_start();
 
require_once "../config.php";
    $userId = $_SESSION['id'];
    $questionID = $_POST['questionid'];
    $lessonid = $_POST['lessonid'];
    $quizid = $_POST['quizid'];
    $shortAnswerValue = $_POST['shortAnswerValue'];
    $questionPoint = $_POST['questionPoint'];

    $sqlgetQuestion = "SELECT * FROM questions WHERE question_id = '".$_POST['questionid']."' AND quiz_id = '".$_POST['quizid']."'";
    $stmtGetQ = $pdo -> prepare($sqlgetQuestion);
    $stmtGetQ->execute();                  
    $rowGetQ = $stmtGetQ->fetch();

    if ($rowGetQ){
        if($rowGetQ['question_type'] =='Multiple Choice'){
          if($rowGetQ['question_choicesanswer'] == $shortAnswerValue){
              $score = $questionPoint;
          }
          else {
              $score = 0;
          }
        }
        else if($rowGetQ['question_type'] =='Short Answer') {
          if($rowGetQ['question_shortanswer'] == $shortAnswerValue){
              $score = $questionPoint;
          }
          else {
              $score = 0;
          }
        }

    }

    $sql = "INSERT INTO quizchecking (userId,questionId,lessonId,quizId,Score) 
    VALUES (:userId,:questionId,:lessonId,:quizId,:Score)";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);  
    $stmt->bindParam(':questionId', $questionID, PDO::PARAM_INT); 
    $stmt->bindParam(':lessonId', $lessonid, PDO::PARAM_INT); 
    $stmt->bindParam(':quizId', $quizid, PDO::PARAM_INT); 
    $stmt->bindParam(':Score', $score, PDO::PARAM_INT); 



    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Success');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>