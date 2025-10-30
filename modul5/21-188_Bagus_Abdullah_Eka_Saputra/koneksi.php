<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "supplier";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql = "CREATE TABLE supplier (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   nama VARCHAR(100),
//   telp VARCHAR(20),
//   alamat VARCHAR(100)
// )";
// if (mysqli_multi_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// mysqli_close($conn);
?>