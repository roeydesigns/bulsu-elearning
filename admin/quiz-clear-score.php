<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
    header("location: ../index.php");
    exit();
  }
  if (!isset($_GET['id']) || !isset($_GET['lid']) || !isset($_GET['qid']) ) {
    header('location: index.php');
    exit();
  }

require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $viewedsql = "SELECT * FROM lessonsviewed WHERE userId = '".$_GET['id']."' AND chapterId = '".$_GET['qid']."' AND lessonId = '".$_GET['lid']."'";
    $viewedstmt = $pdo -> prepare($viewedsql);
    $viewedstmt->execute();                  
    $viewedrow = $viewedstmt->fetch();

    if($viewedrow){
    
        $sql = "DELETE FROM lessonsviewed WHERE userId = '".$_GET['id']."' AND chapterId = '".$_GET['qid']."' AND lessonId = '".$_GET['lid']."'";
        $stmt = $pdo -> prepare($sql);



        if($stmt->execute()){
            $sqlquiz = "DELETE FROM quizchecking WHERE userId = '".$_GET['id']."' AND quizId = '".$_GET['qid']."' AND lessonId = '".$_GET['lid']."'";
            $quizstmt = $pdo -> prepare($sqlquiz);
            $quizstmt->execute();
            echo "<script type='text/javascript'>alert('Successfully deleted.');</script>";
            header("refresh:0.01;url= students-view.php?id=".$_GET['id']);

        } else{
            echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
        }

    }

    else {
        echo "<script type='text/javascript'>alert('Score already cleared.');</script>";
        header("refresh:0.01;url= students-view.php?id=".$_GET['id']);
        exit();
    }


}
else {
    header('location: index.php');
    exit();
}
?>