<?php
// Initialize the session
session_start();
 
require_once "../config.php";
    $todolist_content = $_POST['todolist_content'];

    $sql = "UPDATE todolist SET todolist_content = :todolist_content
    WHERE todolist_id = '".$_POST['todolist_id']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':todolist_content', $todolist_content, PDO::PARAM_STR); 


    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('List Added.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>