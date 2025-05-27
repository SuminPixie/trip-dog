<?php
include('../inc/dbconn.php'); // DB 연결

$mb_id = $_POST['mb_id'];

$sql = "SELECT * FROM tripdog_member WHERE mb_id = '$mb_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "duplicate"; // 중복
} else {
  echo "available"; // 사용 가능
}
?>
