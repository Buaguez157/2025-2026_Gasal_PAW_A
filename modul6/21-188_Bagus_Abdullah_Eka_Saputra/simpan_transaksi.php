<?php
include 'koneksi.php';

// Ambil data master
$no_nota = $_POST['no_nota'];
$tanggal = $_POST['tanggal'];
$nama_pelanggan = $_POST['nama_pelanggan'];

// Simpan ke tabel transaksi (master)
$sql_master = "INSERT INTO transaksi (no_nota, tanggal, nama_pelanggan, total) VALUES (?, ?, ?, 0)";
$stmt = $conn->prepare($sql_master);
$stmt->bind_param("sss", $no_nota, $tanggal, $nama_pelanggan);
$stmt->execute();

$id_transaksi = $conn->insert_id;

// Ambil data detail
$id_barang = $_POST['id_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];

$total = 0;

$sql_detail = "INSERT INTO transaksi_detail (id_transaksi, id_barang, qty, harga, subtotal) VALUES (?, ?, ?, ?, ?)";
$stmt_detail = $conn->prepare($sql_detail);

for ($i = 0; $i < count($id_barang); $i++) {
    $idb = (int)$id_barang[$i];
    $jml = (int)$qty[$i];
    $hrg = (float)$harga[$i];
    $sub = $jml * $hrg;
    $total += $sub;

    $stmt_detail->bind_param("iiidd", $id_transaksi, $idb, $jml, $hrg, $sub);
    $stmt_detail->execute();

    // Kurangi stok barang
    $conn->query("UPDATE barang SET stok = stok - $jml WHERE id_barang = $idb");
}

// Update total di tabel transaksi
$sql_update = "UPDATE transaksi SET total=? WHERE id_transaksi=?";
$stmt_update = $conn->prepare($sql_update);
$stmt_update->bind_param("di", $total, $id_transaksi);
$stmt_update->execute();

echo "Transaksi berhasil disimpan!";
?>