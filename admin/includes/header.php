<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | BulSU iLearn</title>
  <link rel="icon" href="../images/logo-login.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- style.css -->
  <link rel="stylesheet" href="../style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php 
    require_once '../classes/entry.php';
    $entry = new Users();
    $entry->SqlSelectEntryById('1');
?>
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../about.php" class="nav-link">About</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../developers.php" class="nav-link">Developers</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../missionandvision.php" class="nav-link">Mission & Vision</a>
    </li>
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../logout.php" role="button">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../images/logo-login.png" alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light"> BulSU iLearn</span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php if ($entry->getUsrImg()==''){ echo '../dist/img/avatar4.png'; } else {echo $entry->getUsrImg(); }?> " class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile.php" class="d-block"><b><?php echo $entry->getFName(); ?></b> - Admin</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "index.php" ) echo "active"; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="profile.php" class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "profile.php" ) echo "active"; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="lessons.php" class="nav-link <?php if(strpos(basename($_SERVER["PHP_SELF"]), 'lessons') !== false  || strpos(basename($_SERVER["PHP_SELF"]), 'quiz') !== false || strpos(basename($_SERVER["PHP_SELF"]), 'question') !== false ) echo "active"; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Lessons</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="students.php" class="nav-link <?php if(strpos(basename($_SERVER["PHP_SELF"]), 'students') !== false) echo "active"; ?>">
            <i class="nav-icon fas fa-address-book"></i>
            <p>Students</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="calendar.php" class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "calendar.php" ) echo "active"; ?>">
            <i class="nav-icon fas fa-calendar"></i>
            <p>Calendar</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="settings.php" class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "settings.php" ) echo "active"; ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>Settings</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php
            if(basename($_SERVER["PHP_SELF"]) == "index.php" ) echo "Dashboard";
            else if(basename($_SERVER["PHP_SELF"]) == "profile.php" ) echo "Profile";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'lessons') !== false) echo "Lessons";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'students') !== false) echo "Students";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'quiz') !== false) echo "Quiz";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'question') !== false) echo "Question";
            else if(basename($_SERVER["PHP_SELF"]) == "settings.php" ) echo "Settings";
            else if(basename($_SERVER["PHP_SELF"]) == "calendar.php" ) echo "Calendar";
            ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">
              <?php
            
            if(basename($_SERVER["PHP_SELF"]) == "index.php" ) echo "Dashboard";
            else if(basename($_SERVER["PHP_SELF"]) == "profile.php" ) echo "Profile";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'lessons') !== false) echo "Lessons";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'students') !== false) echo "Students";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'quiz') !== false) echo "Quiz";
            else if(strpos(basename($_SERVER["PHP_SELF"]), 'question') !== false) echo "Question";
            else if(basename($_SERVER["PHP_SELF"]) == "settings.php" ) echo "Settings";
            else if(basename($_SERVER["PHP_SELF"]) == "calendar.php" ) echo "Calendar";
            ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
