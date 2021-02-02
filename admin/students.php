<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <p class="card-title">List of Students</p>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th style="width: 3%">
                          #
                      </th>
                      <th style="width: 25%">
                          Student Name
                      </th>
                      <th style="width: 15%">
                          Student No.
                      </th>
                      <th style="width: 15%">
                          Email
                      </th>
                      <th class="text-center"> 
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                      <strong>1</strong>
                      </td>
                      <td>
                            June Vincent Cruz
                      </td>
                      <td>
                      <p class="m-0">2017-114895</p>
                      </td>
                      <td>
                          <a href="mailto:junevcruz@gmail.com">junevcruz@gmail.com</a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-key">
                              </i>
                              Reset Password
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Deactivate
                          </a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <strong>2</strong>
                      </td>
                      <td>
                        Natalie Mendoza
                      </td>
                      <td>
                      <p class="m-0">2017-124845</p>
                      </td>
                      <td>
                      <a href="mailto:nataliemendoza@gmail.com">nataliemendoza@gmail.com</a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>
                      <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-key">
                              </i>
                              Reset Password
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Deactivate
                          </a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <strong>3</strong>
                      </td>
                      <td>
                            Jennie Dungo
                      </td>
                      <td>
                      <p class="m-0">2017-234665</p>
                      </td>
                      <td>
                      <a href="mailto:jenniedungo@gmail.com">jenniedungo@gmail.com</a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>
                      <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-key">
                              </i>
                              Reset Password
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Deactivate
                          </a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <strong>4</strong>
                      </td>
                      <td>
                            Jose Dela Cerna
                      </td>
                      <td>
                      <p class="m-0">2017-112355</p>
                      </td>

                      <td>
                      <a href="mailto:josedelacerna@gmail.com">josedelacerna@gmail.com</a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>
                      <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-key">
                              </i>
                              Reset Password
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Deactivate
                          </a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <strong>5</strong>
                      </td>
                      <td>
                            Juan Santos
                      </td>
                      <td>
                      <p class="m-0">2017-154595 </p>
                      </td>
                      <td>
                      <a href="mailto:junesantos@gmail.com">junesantos@gmail.com</a>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="students-view.php">
                              <i class="fas fa-address-book">
                              </i>
                              Records
                          </a>
                      <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-key">
                              </i>
                              Reset Password
                          </a>

                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Deactivate
                          </a>
                      </td>
                  </tr>
                  
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        <ul class="pagination float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>