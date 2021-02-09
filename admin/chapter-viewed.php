<?php
// Initialize the session
session_start();
 
require_once "../config.php";

    $userId = $_POST['userId'];
    $chapterId = $_POST['chapterId'];
    $lessonId = $_POST['lessonId'];
    $viewed = $_POST['viewed'];

    $sql = "SELECT * FROM lessonsviewed WHERE userId = '".$_POST['userId']."' AND chapterId = '".$_POST['chapterId']."' AND lessonId = '".$_POST['lessonId']."' AND viewed = 'viewed'";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute();                  
    $row = $stmt->fetch();
    if($row){}

    else {

        $sql = "INSERT INTO lessonsviewed (userId, chapterId, lessonId, viewed) 
        VALUES (:userId,:chapterId,:lessonId,:viewed)";

        $stmt = $pdo -> prepare($sql);

        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);  
        $stmt->bindParam(':chapterId', $chapterId, PDO::PARAM_INT);  
        $stmt->bindParam(':lessonId', $lessonId, PDO::PARAM_INT);  
        $stmt->bindParam(':viewed', $viewed, PDO::PARAM_STR); 

        if($stmt->execute()){
          echo "<script type='text/javascript'>alert('Success.');</script>";

        } else{
          echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
        }
    }

?>