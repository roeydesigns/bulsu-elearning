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
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputLessonTitle">Lesson Title</label>
                          <input type="email" class="form-control" id="inputLessonTitle" placeholder="Lesson Title"> 
                    </div>
                 </div>

                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2">
                            <option selected="selected">Publish</option>
                            <option>Unpublish</option>
                        </select>
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
            <a class="btn  btn-success mr-3" href="#">Submit</a>
            <a class="btn  btn-outline-danger" href="#">Cancel</a>
          </div>
        </div>
        <!-- /.card -->
</div>


      <div class="card">
              <div class="card-header">
                <p class="card-title">Lessons Order List
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                title="List of Lessons Chapters, Quizes and Exams. Here you can arrange items that will be part of the Lesson."></i></a></p>

                <div class="card-tools">
          <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-plus"></i> Add New Chapter</a>
          <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-plus"></i> Add New Quiz/Exam</a>
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
                      <td colspan="4">
                        <div class="pt-3 text-center ">
                        <p>0 Entries Found. Use the buttons above to add entries.</p>
                        </div>
                      </td>

                  </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">

              </div>
            </div>
    </section>
    <!-- /.content -->


<?php require_once 'includes/footer.php'; ?>