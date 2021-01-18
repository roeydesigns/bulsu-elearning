<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Add New Question
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Question</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Question"> 
                    </div>
                 </div>

                 <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Points</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Points"> 
                    </div>
                   </div>

                   <div class="col-md-3 col-12">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" id="QselectType">
                            <option selected="selected">Multiple Choice</option>
                            <option>Short Answer</option>
                        </select>
                     </div>
                   </div>

                   <div class="col-md-6 col-12" id="Qchoices">
                      <label>Choices</label>
                      <small>(Check the box for the correct answer)</small> <a class="btn btn-primary btn-sm" id="Qchoices-Addbtn"><i class="fas fa-plus"></i> Add</a> <a class="btn btn-danger btn-sm" id="QremoveBtn"><i class="fas fa-times"></i> Remove</a>
                        <div class="input-group pt-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Choice Description">
                        </div>
                 </div>

                 <div class="col-md-6 col-12" id="QSanswer">
                    <div class="form-group">
                        <label for="inputLessonTitle">Answer</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Answer"> 
                    </div>
                 </div>

            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <a class="btn btn-success" href="quiz-edit.php">Submit</a>
          </div>
        </div>
        <!-- /.card -->
</div>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>