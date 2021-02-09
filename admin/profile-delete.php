<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == !true){
    header("location: ../index.php");
    exit;
  }	

  if(!isset($_GET['id'])){
    header("location: profile.php");
    exit;
  }

  if($_SERVER["REQUEST_METHOD"] != "GET"){
    header("location: students.php");
    exit;
  }


require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){


  $selectsql = "SELECT * FROM users WHERE id='".$_GET['id']."'";
  $selectstmt = $pdo -> prepare($selectsql);
  $selectstmt->execute();
  $selectrow = $selectstmt->fetch();

  if ($selectrow){
    $id = $selectrow['id'];
    $studentno = $selectrow['student_no'];
    $username = $selectrow['username'];
    $password = $selectrow['password'];
    $created_at = $selectrow['created_at'];
    $firstname = $selectrow['user_firstname'];
    $middlename = $selectrow['user_middlename'];
    $lastname = $selectrow['user_lastname'];
    $email = $selectrow['email'];
    $phone = $selectrow['phone'];
    $address = $selectrow['address'];
    $city = $selectrow['city'];
    $province = $selectrow['province'];
    $gender = $selectrow['gender'];
    $userimage = $selectrow['user_image'];

    $insertsql = "INSERT INTO deletedusers (id,student_no,username,password,created_at,user_firstname,user_middlename,user_lastname,email,phone,address,city,province,gender,user_image) VALUES (:id,:student_no,:username,:password,:created_at,:user_firstname,:user_middlename,:user_lastname,:email,:phone,:address,:city,:province,:gender,:user_image)";
    $insertstmt = $pdo -> prepare($insertsql);
    $insertstmt->bindParam(':id', $id, PDO::PARAM_INT);  
    $insertstmt->bindParam(':student_no', $studentno, PDO::PARAM_STR); 
    $insertstmt->bindParam(':username', $username, PDO::PARAM_STR);
    $insertstmt->bindParam(':password', $password, PDO::PARAM_STR);
    $insertstmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);  
    $insertstmt->bindParam(':user_firstname', $firstname, PDO::PARAM_STR);
    $insertstmt->bindParam(':user_middlename', $middlename, PDO::PARAM_STR);
    $insertstmt->bindParam(':user_lastname', $lastname, PDO::PARAM_STR);
    $insertstmt->bindParam(':email', $email, PDO::PARAM_STR);
    $insertstmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $insertstmt->bindParam(':address', $address, PDO::PARAM_STR);
    $insertstmt->bindParam(':city', $city, PDO::PARAM_STR);
    $insertstmt->bindParam(':province', $province, PDO::PARAM_STR);
    $insertstmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $insertstmt->bindParam(':user_image', $userimage, PDO::PARAM_STR);
    $insertstmt->execute();
  }

  $sql = "DELETE FROM users WHERE id='".$_GET['id']."'";
  $stmt = $pdo -> prepare($sql);
  if($stmt->execute()){


      echo "<script type='text/javascript'>alert('Successfully deleted.');</script>";
      header("refresh:0.01;url= students.php");

  } else{
    echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
  }

 
  }
?> 