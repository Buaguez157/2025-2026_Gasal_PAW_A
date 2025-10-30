<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];
  $update = mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
  if($update) {
    header("Location: index.php");
  } else {
    echo "Gagal mengupdate data!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Supplier</title>
</head>
<body>
  <h2>Edit Data Master Supplier</h2>
  <form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
    <label>Telp:</label><br>
    <input type="text" name="telp" value="<?= $data['telp']; ?>" required><br>
    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required><br><br>
    <button type="submit" name="update">Update</button>
    <a href="index.php">Batal</a>
  </form>
</body>
</html>