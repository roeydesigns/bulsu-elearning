<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BulSU iLearn
  <?php

  if(basename($_SERVER["PHP_SELF"]) == "forgot.php" ){
    echo " | Forgot Password";
  }
  else if(basename($_SERVER["PHP_SELF"]) == "register.php" ){
    echo " | Register New Account";
  }
  else if(basename($_SERVER["PHP_SELF"]) == "about.php" ){
    echo " | About";
  }
  else if(basename($_SERVER["PHP_SELF"]) == "developers.php" ){
    echo " | Developers";
  }
  else if(basename($_SERVER["PHP_SELF"]) == "missionandvision.php" ){
    echo " | Mission & Vision";
  }
  else if(basename($_SERVER["PHP_SELF"]) == "terms.php" ){
    echo " | Terms and Conditions";
  }
    ?>
    
  
  </title>
  <link rel="icon" href="images/logo-login.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- style.css -->
  <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="images/logo-login.png" alt="Logo" width="60" height="60">
        <span class="brand-text font-weight-light"> BulSU iLearn</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "index.php" ) echo "active"; ?>">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "about.php" ) echo "active"; ?>">
            <a href="about.php" class="nav-link">About</a>
          </li>
          <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "developers.php" ) echo "active"; ?>">
            <a href="developers.php" class="nav-link">Developers</a>
          </li>
          <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "missionandvision.php" ) echo "active"; ?>">
            <a href="missionandvision.php" class="nav-link">Mission & Vision</a>
          </li>
          <li class="nav-item register-link <?php if(basename($_SERVER["PHP_SELF"]) == "register.php" ) echo "active"; ?>">
            <a href="register.php" class="nav-link">Create an Account</a>
          </li>

            </ul>
          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto home-nav-login">
        <li class="nav-create-account">
          <a class="btn btn-outline-danger" href="register.php">Create an Account</a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- /.navbar -->