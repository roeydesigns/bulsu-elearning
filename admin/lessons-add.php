<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Add New Lesson
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="inputLessonTitle">Lesson Title</label>
                          <input type="text" class="form-control" id="inputLessonTitle" placeholder="Lesson Title"> 
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
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description"></textarea>
                     </div>
                   </div>

            </div>
          </div>
        <div class="card-footer clearfix">
          <div class="float-right">
            <a class="btn btn-success" href="lessons.php">Submit</a>
          </div>
        </div>
        <!-- /.card -->
</div>

    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>