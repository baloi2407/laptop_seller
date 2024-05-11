<?php
// $con = mysqli_connect("localhost", "root", "", "mysqli");

// // Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// // Change character set to utf8
// mysqli_set_charset($con, "utf8");


function connectToDatabase() {
  // Thay đổi thông tin kết nối tới cơ sở dữ liệu của bạn
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "mysqli";

  // Tạo kết nối
  $conn = new mysqli($servername, $username, $password, $database);

  // Kiểm tra kết nối
  if ($conn->connect_error) {
      die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
  }

  return $conn;
}
?>