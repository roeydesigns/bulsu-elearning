<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Add New Chapter
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputLessonTitle">Chapter Title</label>
                          <input type="email" class="form-control" id="inputLessonTitle" placeholder="Chapter Title"> 
                    </div>
                 </div>

                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" disabled>
                            <option selected="selected">Chapter</option>
                        </select>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Excerpt</label>
                        <textarea class="form-control" rows="3" placeholder="Excerpt"></textarea>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" rows="3" style="z-index: 999;">
                        <br><br>Place <em>some</em> <u>text</u> <strong>here</strong> to make contents.<br><br> <br>
                        </textarea>
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