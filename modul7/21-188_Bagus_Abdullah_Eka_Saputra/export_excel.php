<?php
// Koneksi database
$host = "127.0.0.1:3307";
$user = "root";
$pass = "";
$db = "database_saya";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter tanggal dari report.php
$from_date = isset($_GET['from']) ? $_GET['from'] : date("Y-m-01");
$to_date   = isset($_GET['to'])   ? $_GET['to']   : date("Y-m-d");

// Query rekap
$sql = "SELECT DATE(tanggal) as tgl, COUNT(id_pelanggan) as total_pelanggan, 
               SUM(pendapatan) as total_pendapatan
        FROM transaksi
        WHERE tanggal BETWEEN '$from_date' AND '$to_date'
        GROUP BY DATE(tanggal)";
$result = $conn->query($sql);

$rekap_data = [];

while ($row = $result->fetch_assoc()) {
    $rekap_data[] = $row;
}

// Total kumulatif
$total_pelanggan  = array_sum(array_column($rekap_data, 'total_pelanggan'));
$total_pendapatan = array_sum(array_column($rekap_data, 'total_pendapatan'));

// Header untuk download file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>Rekap Transaksi</h3>
<p>
    <?= date("d-m-Y", strtotime($from_date)) ?> 
    sampai 
    <?= date("d-m-Y", strtotime($to_date)) ?>
</p>
<table border="1" cellpadding="5">
    <tr style="background:#ddd; font-weight:bold;">
        <th>No</th>
        <th>Total Pendapatan</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1;
    foreach($rekap_data as $row): 
        $total_formatted = "Rp " . number_format($row['total_pendapatan'], 0, ",", ".");
        $tgl_formatted = date("d F Y", strtotime($row['tgl']));
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $total_formatted ?></td>
        <td><?= $tgl_formatted ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<h3>Total Kumulatif</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr style="background:#ddd; font-weight:bold;">
        <th>Total Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $total_pelanggan . " Orang" ?></td>
        <td><?= "Rp " . number_format($total_pendapatan, 0, ",", ".") ?></td>
    </tr>
</table>
