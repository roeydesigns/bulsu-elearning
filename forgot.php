<?php require_once 'includes/header.php'; ?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="images/logo-login.png" alt="AdminLTE Logo" width="60" height="60">
        <span class="brand-text font-weight-light"> E-Learning Management System</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Developers</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Mission & Vision</a>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container py-5">
        <div class="row">

          <div class="col-lg-4 mx-auto align-middle">
            <div class="card">
              <div class="card-body login-card-body">
                <p class="text-center">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="#" method="post">
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-12 pt-2">
                      <button type="submit" class="btn btn-primary btn-block">Request a new password</button>
                    </div>

                  </div>
                </form>
                <p class="mb-1 text-center pt-3">
                    <a href="index.php">Go to Login</a>
                </p>
          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
</div>

<!-- Main Footer -->
<footer class="main-footer text-center">
  <strong>Copyright &copy; 2021. All rights reserved.
</footer>
<?php require_once 'includes/footer.php'; ?>