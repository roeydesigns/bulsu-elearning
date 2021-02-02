<?php require_once 'includes/header.php'; ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline py-3">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="../dist/img/avatar5.png"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">June Vincent Cruz</h3>
                    <p class="text-muted text-center mb-1">Student</p>
                    <p class="text-center m-0"><strong>2017-114895</strong></p>
                    <a href="mailto:junesantos@gmail.com"><p  class="text-center">junesantos@gmail.com</p></a>
                    <p class="text-center mt-4"><strong>Address</strong> <br>101 Purok 1 San Marcos, Calumpit, Bulacan</p>
                    <p class="text-center mb-0"><strong>Mobile No.</strong> <br>09291234251</p>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        <div class="col-lg-9">

        <div class="card">
            <div class="card-header">
            <p class="card-title">Scores on Quizes/Exams of June Vincent Cruz</p>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 3%">
                            #
                        </th>
                        <th style="width: 30%">
                            Lesson Title
                        </th>
                        <th style="width: 25%">
                            Quiz/Exam Title
                        </th>
                        <th style="width: 10%">
                            Type
                        </th>
                        <th style="width: 15%">
                            Score
                        </th>
                        <th class="text-center"> 
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <strong>1</strong>
                        </td>
                        <td>
                        Lesson 1: Mysql Database
                        </td>
                        <td>
                        <p class="m-0">Mysql Quiz 1</p>
                        </td>
                        <td>
                            Quiz
                        </td>
                        <td>
                            10/10
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                        <strong>2</strong>
                        </td>
                        <td>
                        Lesson 2: PHP Programming
                        </td>
                        <td>
                        <p class="m-0">Php Quiz 1</p>
                        </td>
                        <td>
                            Quiz
                        </td>
                        <td>
                            Not Yet Taken
                        </td>
                        <td class="project-actions text-right">
                        <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <strong>3</strong>
                        </td>
                        <td>
                        Lesson 3: Programming Loops
                        </td>
                        <td>
                        <p class="m-0">Loops Quiz 1</p>
                        </td>
                        <td>
                            Quiz
                        </td>
                        <td>
                            Not Yet Taken
                        </td>
                        <td class="project-actions text-right">
                        <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <strong>4</strong>
                        </td>
                        <td>
                        Lesson 4: Arrays in Programming
                        </td>
                        <td>
                        <p class="m-0">Arrays Quiz 1</p>
                        </td>
                        <td>
                            Quiz
                        </td>
                        <td>
                        Not Yet Taken
                        </td>
                        <td class="project-actions text-right">
                        <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>5</strong>
                        </td>
                        <td>
                        Lesson 5: Math in Programming
                        </td>
                        <td>
                        <p class="m-0">Programming Math Quiz 1</p>
                        </td>
                        <td>
                            Quiz
                        </td>
                        <td>
                            Not Yet Taken
                        </td>
                        <td class="project-actions text-right">
                        <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>6</strong>
                        </td>
                        <td>
                        Lesson 1: Mysql Database
                        </td>
                        <td>
                        <p class="m-0">Mysql Database Exam</p>
                        </td>
                        <td>
                            Exam
                        </td>
                        <td>
                            Not Yet Taken
                        </td>
                        <td class="project-actions text-right">
                        <a class="btn btn-block btn-info btn-sm" href="quiz-score.php">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
            <ul class="pagination float-right">
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