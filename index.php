<?php require_once 'includes/header.php'; ?>


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
                <h1 class="text-center">Login</h1>

                <form action="admin" method="post">
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
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                    <div class="col-12 pt-2">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    

                  </div>
                </form>
                <p class="text-center my-2">- OR -</p>
                <a href="register.php" class="btn btn-block btn-danger">Register</a>
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



</div>
<!-- ./wrapper -->
</div>
<?php require_once 'includes/footer.php'; ?>