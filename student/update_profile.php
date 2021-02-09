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
$fname = $_POST['Firstname'];
$mname = $_POST['Middlename'];
$lname = $_POST['Lastname'];
$gender = $_POST['Gender'];
$address = $_POST['Address'];
$city = $_POST['City'];
$province = $_POST['Province'];
$phone = $_POST['Phone'];

$sql = "UPDATE users SET user_firstname = :firstName,
user_middlename = :middleName,
user_lastname = :lastName,
gender = :Gender,
phone = :phone,
address = :user_address,
city = :city,
province = :province
WHERE id = '".$_GET['user_id']."'";

$stmt = $pdo -> prepare($sql);

$stmt->bindParam(':firstName', $fname, PDO::PARAM_STR);  
$stmt->bindParam(':middleName', $mname, PDO::PARAM_STR);  
$stmt->bindParam(':lastName', $lname, PDO::PARAM_STR);  
$stmt->bindParam(':Gender', $gender, PDO::PARAM_STR);  
$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);  
$stmt->bindParam(':user_address', $address, PDO::PARAM_STR);  
$stmt->bindParam(':city', $city, PDO::PARAM_STR);  
$stmt->bindParam(':province', $province, PDO::PARAM_STR);  

if($stmt->execute()){
  echo "<script type='text/javascript'>alert('Successfully changed your profile info.');</script>";
  header("refresh:0.01;url= profile.php");
} else{
  echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later.');</script>";
}

?>