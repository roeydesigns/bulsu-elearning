<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Create New Quiz/Exam
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Quiz/Exam Title</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Quiz/Exam Title"> 
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
            <a class="btn btn-success" href="lessons-edit.php">Submit</a>
          </div>
        </div>
        <!-- /.card -->
</div>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>