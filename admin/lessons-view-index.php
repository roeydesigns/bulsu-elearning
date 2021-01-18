<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div id="accordion">
          <div class="card text-white">
            <div class="card-header" style="background: #343a40">
            <div class="row p-4">
            <div class="col-lg-4 col-12">
            <img class="d-block w-100" src="https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?cs=srgb&dl=pexels-kevin-ku-577585.jpg&fm=jpg">
            </div>
            <div class="col-lg-8 col-12 pt-3">
              <h3 class="pt-3">Lesson 1: Mysql Database</h3>
              <p class="my-3">MySQL is a freely available open source Relational Database Management System (RDBMS) that
                  uses Structured Query Language (SQL). SQL is the most popular language for adding, accessing
                  and managing content in a database.</p>

                 
                  <div class="row pt-5" style="padding-left: 7.5px">
                        <p>Progress:</p>

                      <div class="col-lg-10 col-8 pt-1">
                        <div class="progress">
                        <div class="progress-bar bg-success progress-bar" role="progressbar"
                              aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                          <span>60% Completed</span>
                        </div>
                        </div>  
                      </div>
                  </div>
                  

            </div>
            </div>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="card-body row pt-4">

                <div class="col-lg-3">
                  <a class="d-block w-100" href="lessons-view.php">
                  <div class="card bg-gradient-success card-outline">
                      <div class="card-header">
                          <h4 class="card-title w-100">
                              Chapter 1: Introduction
                          </h4>
                      </div>
                      <div class="card-body text-justify">
                      MySQL is a Relational Database Management System (“RDBMS”). It is used by
most modern websites and web-based services as a ...
                    </div>
                  </div>
                  </a>
                </div>

                <div class="col-lg-3">
                  <a class="d-block w-100" href="lessons-view.php">
                  <div class="card bg-gradient-success card-outline">
                      <div class="card-header">
                          <h4 class="card-title w-100">
                              Chapter 2: What is Databases
                          </h4>
                      </div>
                      <div class="card-body text-justify">
                      A database is a structured collection of data that is used by the application systems
of some given enterprise, and that is managed by ...
                    </div>
                  </div>
                  </a>
                </div>

                <div class="col-lg-3">
                  <a class="d-block w-100" href="lessons-view.php">
                  <div class="card bg-gradient-secondary card-outline">
                      <div class="card-header">
                          <h4 class="card-title w-100">
                              Chapter 3: Mysql Basics
                          </h4>
                      </div>
                      <div class="card-body text-justify">
                      MySQL can also be accessed using many tools. It can be easily communicated with
via PHP (PHP Hypertext Preprocessor) ...
                    </div>
                  </div>
                  </a>
                </div>

                <div class="col-lg-3">
                  <a class="d-block w-100" href="quiz-view.php">
                  <div class="card bg-gradient-secondary card-outline">

                      <div class="card-body text-center">
                        <small>( Quiz )</small>
                          <h4 class="pt-4">
                            Mysql Quiz 1
                          </h4> 
                          <p  class="pb-3">Click to Start</p>
                    </div>
                  </div>
                  </a>
                </div>



                </div>
              </div>
            </div>
      

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>