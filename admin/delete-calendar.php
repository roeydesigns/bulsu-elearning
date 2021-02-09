<?php
// Initialize the session
session_start();
 
require_once "../config.php";

    $sql = "DELETE FROM calendar WHERE id = '".$_POST['id']."'";

    $stmt = $pdo -> prepare($sql);

    if($stmt->execute()){
      echo "<script type='text/javascript'>alert('Deleted.');</script>";

    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later');</script>";
    }


?>