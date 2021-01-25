<?php require_once 'includes/header.php'; ?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline py-3">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/avatar5.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">June Vincent Cruz</h3>
                <p class="text-muted text-center mb-1">Student</p>
                <p class="text-center m-0"><strong>2017-114895</strong></p>
                <a href="mailto:junesantos@gmail.com"><p  class="text-center">junesantos@gmail.com</p></a>
                <a href="#" class="btn btn-primary btn-block"><b>Change Picture</b></a>
                <p class="text-center mt-4"><strong>Address</strong> <br>101 Purok 1 San Marcos, Calumpit, Bulacan</p>
                    <p class="text-center mb-0"><strong>Mobile No.</strong> <br>09291234251</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#cred" data-toggle="tab">Credentials</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" value="June Vincent">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputMiddlename" class="col-sm-2 col-form-label">Middle Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputMiddlename" placeholder="Middle Name" value="Garcia">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputLastname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputLastname" placeholder="Last Name" value="Cruz">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="inputGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFirstname" placeholder="Address" value="100 Purok 1 San Marcos">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFirstname" placeholder="City" value="Calumpit">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFirstname" placeholder="Province" value="Bulacan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">Mobile No.</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" value="09291234251">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Change Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="password">
                    <p class="text-center">You can update your password information here.</p>
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="cred">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Student No." value="2017-114895" disabled>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" value="student" disabled>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" value="junevcruz@gmail.com" disabled>
                      </div>

                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



<?php require_once 'includes/footer.php'; ?>