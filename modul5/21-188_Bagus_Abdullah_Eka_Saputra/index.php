<?php
include 'koneksi.php'; // file koneksi ke database

$query = mysqli_query($conn, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Master Supplier</title>
</head>
<body>
  <h2>Data Master Supplier</h2>
  <a href="tambah.php">Tambah Data</a>
  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Telp</th>
      <th>Alamat</th>
      <th>Tindakan</th>
    </tr>
    <?php 
    $no = 1;
    while($row = mysqli_fetch_assoc($query)) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['telp']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
          <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>