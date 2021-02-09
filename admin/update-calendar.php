<?php
// Initialize the session
session_start();
 
    require_once "../config.php";

    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $color = $_POST['color'];

    $sql = "UPDATE calendar SET start = :Calstart,
    end = :Calend
    WHERE id = '".$_POST['id']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':Calstart', $start, PDO::PARAM_STR); 
    $stmt->bindParam(':Calend', $end, PDO::PARAM_STR); 


    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Updated.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>