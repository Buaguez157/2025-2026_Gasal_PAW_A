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

// Ambil filter dari form
$from_date = isset($_POST['from_date']) ? $_POST['from_date'] : date('Y-m-01');
$to_date = isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d');

// Query rekap dan total
$sql = "SELECT DATE(tanggal) as tgl, COUNT(id_pelanggan) as total_pelanggan, SUM(pendapatan) as total_pendapatan
        FROM transaksi
        WHERE tanggal BETWEEN '$from_date' AND '$to_date'
        GROUP BY DATE(tanggal)";
$result = $conn->query($sql);

// Data untuk chart
$chart_labels = [];
$chart_data = [];
$rekap_data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $chart_labels[] = $row['tgl'];
        $chart_data[] = $row['total_pendapatan'];
        $rekap_data[] = $row;
    }
}

// Hitung total kumulatif
$total_pelanggan = array_sum(array_column($rekap_data, 'total_pelanggan'));
$total_pendapatan = array_sum(array_column($rekap_data, 'total_pendapatan'));
?>
<form method="POST" action="">
    <input type="date" name="from_date" value="<?= $from_date ?>">
    <input type="date" name="to_date" value="<?= $to_date ?>">
    <button type="submit">Tampilkan</button>
</form>

<h3>Grafik Pendapatan</h3>
<canvas id="pendapatanChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('pendapatanChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($chart_labels) ?>,
        datasets: [{
            label: 'Pendapatan',
            data: <?= json_encode($chart_data) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: { y: { beginAtZero: true } }
    }
});
</script>

<h3>Rekap Transaksi</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php $no = 1; foreach($rekap_data as $row): 
        // Format total
        $total_formatted = "Rp " . number_format($row['total_pendapatan'], 0, ",", ".");
        // Format tanggal: 16 November 2025
        $tgl_formatted = date("d F Y", strtotime($row['tgl']));
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $total_formatted ?></td>
        <td><?= $tgl_formatted ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Total Kumulatif</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Total Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $total_pelanggan." Orang" ?></td>
        <td><?= $total_formatted = "Rp " . number_format($row['total_pendapatan'], 0, ",", ".") ?></td>
    </tr>
</table>

<button onclick="window.print()">Print</button>
<a href="export_excel.php?from=<?= $from_date ?>&to=<?= $to_date ?>">Export Excel</a>
