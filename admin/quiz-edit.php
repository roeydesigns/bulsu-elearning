<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Quiz/Exam
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Quiz/Exam Title</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Lesson Title" value="Mysql Quiz 1"> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2">
                            <option selected="selected">Quiz</option>
                            <option>Exam</option>
                        </select>
                     </div>
                   </div>


            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <a class="btn btn-success" href="lessons-edit.php">Change</a>
          </div>
        </div>
    </div>
    <div class="card">
              <div class="card-header">
                <p class="card-title">Questions List
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                title="List of Questions. Here you can arrange items that will be part of the Quiz."></i></a></p>

                <div class="card-tools">
          <a class="btn btn-primary btn-sm" href="question-add.php"><i class="fas fa-plus"></i> Add New Question</a>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Question</th>
                      <th style="width: 15%">Type</th>
                      <th style="width: 10%">Points</th>
                      <th style="width: 25%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>What does SQL stand for?</td>
                      <td>Multiple Choice</td>
                      <td>1</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="question-edit.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>The NOT NULL constraint enforces a column to not accept NULL values.</td>
                      <td>Multiple Choice</td>
                      <td>1</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="question-edit.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Which SQL statement is used to extract data from a database?</td>
                      <td>Multiple Choice</td>
                      <td>1</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="question-edit.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Which SQL statement is used to update data in a database?</td>
                      <td>Multiple Choice</td>
                      <td>1</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="question-edit.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>