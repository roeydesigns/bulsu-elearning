<?php
// Initialize the session
session_start();
 
require_once "../config.php";
    $userId = $_SESSION['id'];
    $todolist_check = $_POST['todolist_check'];
    $todolist_id = $_POST['todolist_id'];

    $sql = "UPDATE todolist SET todolist_check = :todolist_check
    WHERE todolist_id = '".$_POST['todolist_id']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':todolist_check', $todolist_check, PDO::PARAM_STR); 


    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('List Added.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>