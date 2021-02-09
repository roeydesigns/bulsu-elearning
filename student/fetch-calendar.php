<?php 
session_start();
 
require_once "../config.php";

// $sql = "SELECT * FROM calendar ORDER BY id";
// $stmt = $pdo -> prepare($sql);
// $stmt->execute();
// $idcounter = 0;
// foreach ($stmt as $row) {
//   $idcounter++;
// }

$conn = mysqli_connect("localhost","root","","ilearn") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$json = array();
$sqlQuery = "SELECT * FROM calendar ORDER BY id";

$result = mysqli_query($conn, $sqlQuery);
$eventArray = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($eventArray, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($eventArray);

?>