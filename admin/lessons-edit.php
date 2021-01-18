<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Lesson
            </h3>
          </div>
          <div class="card-body">
             <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Lesson Title</label>
                          <input type="email" class="form-control" id="inputLessonTitle" placeholder="Lesson Title" value="Lesson 1: Mysql Database"> 
                    </div>
                 </div>

                   <div class="col-md-4 col-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2">
                            <option selected="selected">Publish</option>
                            <option>Unpublish</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-4 col-12 pb-3">
                    <label>Lesson Image</label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                  </div>
                  <div class="col-md-4 col-12">
                  <img src="https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?cs=srgb&dl=pexels-kevin-ku-577585.jpg&fm=jpg" style="height: 150px;">
                  </div>
                   <div class="col-md-12 col-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description">MySQL is a freely available open source Relational Database Management System (RDBMS) that uses Structured Query Language (SQL). SQL is the most popular language for adding, accessing and managing content in a database.</textarea>
                     </div>
                   </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
        <div class="card-footer clearfix">
          <div class="float-right">
            <a class="btn btn-success" href="lessons.php">Change</a>
          </div>
        </div>
    </div>
    <div class="card">
              <div class="card-header">
                <p class="card-title">Lessons Order List
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                title="List of Lessons Chapters, Quizes and Exams. Here you can arrange items that will be part of the Lesson."></i></a></p>

                <div class="card-tools">
          <a class="btn btn-primary btn-sm" href="lessons-add-chapter.php"><i class="fas fa-plus"></i> Add New Chapter</a>
          <a class="btn btn-warning btn-sm" href="quiz-add.php"><i class="fas fa-plus"></i> Add New Quiz/Exam</a>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Title</th>
                      <th style="width: 20%">Type</th>
                      <th style="width: 25%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Chapter 1: Introduction</td>
                      <td>Chapter</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="lessons-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="lessons-edit-chapter.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Chapter 2: What is Databases</td>
                      <td>Chapter</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="lessons-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="lessons-edit-chapter.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Chapter 3: Mysql Basics</td>
                      <td>Chapter</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="lessons-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="lessons-edit-chapter.php"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Mysql Quiz 1</td>
                      <td>Quiz</td>
                      <td>
                      <a class="btn btn-primary btn-sm" href="quiz-view.php"><i class="fas fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="quiz-edit.php"><i class="fas fa-pencil-alt"></i> Edit</a>
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