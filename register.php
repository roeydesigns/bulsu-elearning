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
        <div class="col-lg-8">


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-custom-icon" aria-hidden="true">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-custom-icon" aria-hidden="true">
              <i class="fas fa-chevron-right"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body login-card-body">
                
                <div class="alert alert-warning register-alert mt-2">
                  <i class="icon fas fa-exclamation-triangle"></i> We are implementing one account per user.
                </div>
                <h3 class="text-center p-2">Create an Account</h3>

                <form action="#" method="post">
                <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="Student No.">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-hashtag"></span>
                      </div>
                    </div>
                 </div>

                 <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                 </div>

                 <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
 
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-12">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agree">
                      <label for="agree">
                        I agree with the <a href="#">Terms and Conditions</a>
                      </label>
                    </div>
                  </div>
                    <div class="col-12 pt-3">
                      <button type="submit" class="btn btn-danger btn-block">Register</button>
                    </div>
                  </div>
                </form>
                <p class="text-center my-2">- OR -</p>
                <a href="index.php" class="btn btn-block btn-primary">Login</a>
                <p class="mb-1 text-center pt-3">
                    <a href="forgot.php">I forgot my password</a>
                </p>

          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021. All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</div>
<?php require_once 'includes/footer.php'; ?>