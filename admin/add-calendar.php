<?php
// Initialize the session
session_start();
 
    require_once "../config.php";

    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $color = $_POST['color'];


    $sql = "INSERT INTO calendar (title, start, end, backgroundColor, borderColor) 
    VALUES (:title,:start,:end,:bgcolor,:bdcolor)";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':title', $title, PDO::PARAM_STR); 
    $stmt->bindParam(':start', $start, PDO::PARAM_STR); 
    $stmt->bindParam(':end', $end, PDO::PARAM_STR); 
    $stmt->bindParam(':bgcolor', $color, PDO::PARAM_STR); 
    $stmt->bindParam(':bdcolor', $color, PDO::PARAM_STR); 

    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Added.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>