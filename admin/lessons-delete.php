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

  if($_SERVER["REQUEST_METHOD"] != "GET"){
    header("location: lessons.php");
    exit;
  }

    require_once "../config.php";


    // sql to delete a record
    $sql = "DELETE FROM lessons WHERE lesson_id='".$_GET['id']."'";


    $stmt = $pdo -> prepare($sql);


    if($stmt->execute()){
        echo "<script type='text/javascript'>alert('Successfully deleted.');</script>";
        header("refresh:0.01;url= lessons.php");

    } else{
        echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
    }



?> 