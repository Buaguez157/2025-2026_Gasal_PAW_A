<?php
include 'koneksi.php';

if(isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
  
  if($query) {
    header("Location: index.php");
  } else {
    echo "Gagal menambah data!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Supplier</title>
</head>
<body>
  <h2>Tambah Data Master Supplier Baru</h2>
  <form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>Telp:</label><br>
    <input type="text" name="telp" required><br>
    <label>Alamat:</label><br>
    <input type="text" name="alamat" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php">Batal</a>
  </form>
</body>
</html>