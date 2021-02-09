<?php
// Initialize the session
session_start();
require_once "config.php";
require_once 'includes/header.php';

$mvsql = 'SELECT * FROM settings WHERE id = 2 ';
      
$stmt = $pdo -> prepare($mvsql);
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
                    <?php echo $row['content'];?>
                </div>
        </div>
      </section>

      </div>
    </div>

</div>

<?php } ?>
<?php require_once 'includes/footer.php'; ?>