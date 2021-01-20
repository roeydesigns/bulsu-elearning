<?php require_once 'includes/header.php'; ?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>6</h3>

                <p>Unread Lessons</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>
              <a href="lessons-view-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>5</h3>

                <p>Quizes Taken</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars "></i>
              </div>
              <a href="records-view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>2</h3>

                <p>Exams Taken</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="records-view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>2</h3>

                <p>Recently Finish Lessons</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="lessons-view-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
                  <!-- Main row -->
        <div class="col-lg-8 col-12 ">
                 <!-- TO DO List -->
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-calendar mr-1"></i>
                  Calendar of Events
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="external-events"></div>
                  <div class="card card-primary">
                    <div class="card-body p-0">
                      <div id="calendar"></div>
                    </div>
                  </div>
              </div>
          </div>

        </div>
        <!-- /.row -->
        <div class="col-lg-4 col-12">
                 <!-- TO DO List -->
                 <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  My To Do List
                </h3>

                <div class="card-tools">
                   <button type="button" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1" checked>
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Read Lesson 1, Chapter 1</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Read Lesson 1, Chapter 2</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Read Lesson 1, Chapter 3</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Answer the Mysql Quiz</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Read Lesson 2, Chapter 1</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Read Lesson 2, Chapter 2</span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>

              </div>
            </div>
            <!-- /.card -->
          
            <!-- PRODUCT LIST -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">Recently Finish Lessons</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-info ml-4">
                    <a href="lessons-view.php" class="product-title">
                        <span class="badge badge-info float-right">View</span></a>
                      Chapter 1: Introduction 
                     <span class="product-description">
                        <small>Lesson 1: Mysql Database</small>
                      </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-info ml-4">
                    <a href="lessons-view.php" class="product-title">
                        <span class="badge badge-info float-right">View</span></a>
                      Chapter 2: What is Databases 
                     <span class="product-description">
                        <small>Lesson 1: Mysql Database</small>
                      </span>
                    </div>
                  </li>

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                        <!-- PRODUCT LIST -->
              <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">Upcoming Lessons</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-info ml-4">
                    <a href="lessons-view.php" class="product-title">
                        <span class="badge badge-danger float-right">View</span></a>
                      Chapter 3: Mysql Basics 
                     <span class="product-description">
                        <small>Lesson 1: Mysql Database</small>
                      </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-info ml-4">
                    <a href="lessons-view.php" class="product-title">
                        <span class="badge badge-danger float-right">View</span></a>
                        Mysql Quiz 1
                     <span class="product-description">
                        <small>Lesson 1: Mysql Database</small>
                      </span>
                    </div>
                  </li>


                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      
    </section>


<?php require_once 'includes/footer.php'; ?>