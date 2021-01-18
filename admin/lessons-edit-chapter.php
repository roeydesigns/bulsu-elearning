<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Chapter
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputLessonTitle">Chapter Title</label>
                          <input type="email" class="form-control" id="inputLessonTitle" placeholder="Lesson Title" value="Chapter 1: Introduction"> 
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
                        <textarea class="form-control" rows="3" placeholder="Description">MySQL is a Relational Database Management System (“RDBMS”). It is used by most modern websites and web-based services as a convenient and fast-access storage and retrieval solution for large volumes of data. 
                        </textarea>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" rows="3" style="z-index: 999;">
                        <h3>What is a Database?</h3><p>A database is a structured collection of data that is used by the application systems
of some given enterprise, and that is managed by a database management system.
For the purpose of this course, think of a database as a collection of tables which
are connected to each other. IT Learning Programme (ITLP) in the University of
Oxford offers a course on how to design a database. This course is a pre-requisite
to this course. However, if you did not attend the database designing course, please
read the following paragraphs.
As we mentioned, a database is a collection of tables. Each table is similar to a
spreadsheet table in which each row is called a record and each column is called a
field. For example, if we need to create a table that contains students’ information,
we might have the following fields</p><table class="table table-bordered"><tbody><tr><td><h3>St_ID</h3></td><td><h3>St_Name</h3></td><td><h3>St_DateOfBirth</h3></td><td><h3>St_Email</h3></td></tr></tbody></table><p><span style="font-size: 1rem;"><br></span></p><p><span style="font-size: 1rem;">Data can be entered to this table so you can get the following table</span></p><table class="table table-bordered"><tbody><tr><td>St_ID<br></td><td>St_Name<br></td><td>St_DateOfBirth<br></td><td>St_Email<br></td></tr><tr><td>45215<br></td><td>John Smith<br></td><td>21/5/1995<br></td><td>jsmith@ox.ac.uk<br></td></tr><tr><td>45287<br></td><td>Alison Green&nbsp;<br></td><td>5/11/1994<br></td><td>agreen@ox.ac.uk<br></td></tr><tr><td>48652<br></td><td>Thomas Li<br></td><td>18/7/1998&nbsp;<br></td><td>tli@ox.ac.uk<br></td></tr><tr><td>51420<br></td><td>Susan Bailey<br></td><td>14/1/1991<br></td><td>sbailey@ox.ac.uk<br></td></tr><tr><td>52201<br></td><td>Will King<br></td><td>3/3/1997<br></td><td>wking@ox.ac.uk<br></td></tr></tbody></table><p><span style="font-size: 1rem;"><br></span>Although this table contains students’ information, it does not contain each
student’s grades. This is fine because the grades have to appear in a different table
to reduce data redundancy. This is called database normalisation. The grades
table might look like&nbsp;</p><table class="table table-bordered"><tbody><tr><td>Grade_ID<br></td><td>St_ID<br></td><td>Course_ID<br></td><td>Grade_Value<br></td><td>Comments&nbsp;<br></td></tr></tbody></table><h3><br></h3><h6>Databases: MySQL introduction</h6><p>Notice how the Grades table is linked to the Students table via St_ID which
appears in both tables. The field St_ID in the Students table is acting as the
primary key which is a unique id to identify each record in the table. The field
St_ID in the Grades table is called the foreign key and it links to a primary key in
a different table. You might have noticed that there is a field called Course_ID in
the Grades table which is another foreign key to identify a grade’s course. This
means that there must be another table that contains data for different courses.
Form the previous simple example you should now have an idea of what we mean
by a database. It is important to understand the following concepts: database,
table, record, field, primary key, foreign key and data normalisation. Next sections
will build on this and focus on SQL and how to use it to build a complete database
using MySQL.<br></p>
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