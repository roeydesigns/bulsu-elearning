<?php require_once 'includes/header.php'; ?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
        <div class="col-lg-9 col-12">
        <div class="row">
         <div class="col-lg-4">
         <a href="lessons-view-index.php" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?cs=srgb&dl=pexels-kevin-ku-577585.jpg&fm=jpg')">
            </div>
            <div class="card-body">
            <h6><strong>Lesson 1: Mysql Database</strong></h6>
              <small>MySQL is a freely available open source Relational Database Management ...</small>
            </div>
            <div class="card-footer">
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span>60% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
         <a href="lessons-view-index.php" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('https://images.pexels.com/photos/276452/pexels-photo-276452.jpeg?cs=srgb&dl=pexels-pixabay-276452.jpg&fm=jpg')">
            </div>
            <div class="card-body">
            <h6><strong>Lesson 2: PHP Programming</strong></h6>
              <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat...</small>
            </div>
            <div class="card-footer">
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span>0% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
         <a href="lessons-view-index.php" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
            </div>
            <div class="card-body">
            <h6><strong>Lesson 3: Programming Loops</strong></h6>
              <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat...</small>
            </div>
            <div class="card-footer">
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span>0% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
         <a href="lessons-view-index.php" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg')">
            </div>
            <div class="card-body">
            <h6><strong>Lesson 4: Array in Programming</strong></h6>
              <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat...</small>
            </div>
            <div class="card-footer">
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span>0% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
         <a href="lessons-view-index.php" style="color: #191919;">
         <div class="card">
            <div class="card-header lessons-imgcard-dash" style="background: url('https://images.pexels.com/photos/614117/pexels-photo-614117.jpeg')">
            </div>
            <div class="card-body">
            <h6><strong>Lesson 5: Math in Programming</strong></h6>
              <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat...</small>
            </div>
            <div class="card-footer">
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span>0% Completed</span>
                  </div>
                </div>  
            </div>
          </div>
          </a>
        </div>

      </div>

    </div>
        <!-- /.row -->
        <div class="col-lg-3 col-12">
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
              <div class="card-body p-0">
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
                    <span class="text" style="font-size:14px">Read Lesson 1, Chapter 1</span>
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
                    <span class="text"  style="font-size:14px">Read Lesson 1, Chapter 2</span>
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
                    <span class="text"  style="font-size:14px">Read Lesson 1, Chapter 3</span>
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
                    <span class="text"  style="font-size:14px">Answer the Mysql Quiz</span>
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
                    <span class="text"  style="font-size:14px">Read Lesson 2, Chapter 1</span>
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
                    <span class="text"  style="font-size:14px">Read Lesson 2, Chapter 2</span>
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