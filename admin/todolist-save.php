<?php
// Initialize the session
session_start();
 
require_once "../config.php";
    $userId = $_SESSION['id'];
    $todolistContent = $_POST['todolist_content'];


    $sql = "INSERT INTO todolist (user_id, todolist_content) 
    VALUES (:userId,:todolist_content)";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);  
    $stmt->bindParam(':todolist_content', $todolistContent, PDO::PARAM_STR); 


    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('List Added.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>