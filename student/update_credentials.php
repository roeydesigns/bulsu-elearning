<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../index.php");
  exit;
}
if(!isset($_SESSION["isadmin"])){ }
else if($_SESSION["isadmin"] == true){
  header("location: ../index.php");
  exit;
}


if(!isset($_GET['user_id'])){
  header("location: profile.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] != "POST"){
  header("location: profile.php");
  exit;
}


require_once "../config.php";
 //Form data
$uname = $_POST['Username'];
$email = $_POST['Email'];
$stdtno = $_POST['StdNo'];

$vwsql = "SELECT * FROM users WHERE student_no = '".$_POST['StdNo']."' OR username = '".$_POST['Username']."' OR email = '".$_POST['Email']."'";
$vwstmt = $pdo -> prepare($vwsql);
$vwstmt->execute();                  
$vwrow = $vwstmt->fetch();
if($vwrow){
  if($vwrow['student_no'] == $_SESSION["studentno"] && $vwrow['username'] == $_SESSION["username"] && $vwrow['email'] == $_SESSION["email"] ){
    $sql = "UPDATE users SET username = :username,
    email = :email,
    student_no = :studentNo
    WHERE id = '".$_GET['user_id']."'";

    $stmt = $pdo -> prepare($sql);

    $stmt->bindParam(':username', $uname, PDO::PARAM_STR);  
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);  
    $stmt->bindParam(':studentNo', $stdtno, PDO::PARAM_STR);  
    if($stmt->execute()){
      session_destroy();
      echo "<script type='text/javascript'>alert('Successfully changed your credentials.');</script>";
      header("refresh:0.01;url= ../index.php");
      exit();
    } else{
      echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
    }
  }
  else {
    echo "<script type='text/javascript'>alert('Error! Username or Email Already exist in our database, or you are submitting your current credentials. Please try again.');</script>";
    header("refresh:0.01;url= profile.php");
    exit();
  }

}

else {
  $sql = "UPDATE users SET username = :username,
  email = :email,
  student_no = :studentNo
  WHERE id = '".$_GET['user_id']."'";

  $stmt = $pdo -> prepare($sql);

  $stmt->bindParam(':username', $uname, PDO::PARAM_STR);  
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);  
  $stmt->bindParam(':studentNo', $stdtno, PDO::PARAM_STR);  
  if($stmt->execute()){
    session_destroy();
    echo "<script type='text/javascript'>alert('Successfully changed your credentials.');</script>";
    header("refresh:0.01;url= ../index.php");
    exit();
  } else{
    echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
  }
}


?>