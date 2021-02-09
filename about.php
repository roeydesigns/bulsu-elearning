<?php
// Initialize the session
session_start();

require_once "config.php";
require_once 'includes/header.php';

      $aboutsql = 'SELECT * FROM settings WHERE id = 1 ';
      $stmt = $pdo -> prepare($aboutsql);
      $stmt->execute();
      foreach ($stmt as $row) {
?>
<div class="content-wrapper">
  <div class="content">
    <div class="container py-5">
      <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <h1 class="text-center"><?php echo $row['title'];?></h1>
            </div>
            <div class="card-body">
                <div class="text-justify px-5">
                <?php echo $row['content'];?>
                </div>

          </div>
        </div>
      </section>

      </div>
    </div>

</div>

<?php } ?>
<?php require_once 'includes/footer.php'; ?>