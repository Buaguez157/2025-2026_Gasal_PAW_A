<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "modul6";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql = "CREATE TABLE transaksi (
//     id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
//     no_nota VARCHAR(20),
//     tanggal DATE,
//     nama_pelanggan VARCHAR(100),
//     total DECIMAL(12,2)
// );CREATE TABLE transaksi_detail (
//     id_detail INT AUTO_INCREMENT PRIMARY KEY,
//     id_transaksi INT,
//     id_barang INT,
//     qty INT,
//     harga DECIMAL(12,2),
//     subtotal DECIMAL(12,2),
//     FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi)
// );CREATE TABLE barang (
//     id_barang INT AUTO_INCREMENT PRIMARY KEY,
//     nama_barang VARCHAR(100),
//     harga DECIMAL(12,2),
//     stok INT
// );";
// if (mysqli_multi_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// mysqli_close($conn);
?>