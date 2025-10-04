<?php
session_start();

// Daftar menu
$menu = [
    1 => ["nama" => "Nasi Goreng", "harga" => 15000],
    2 => ["nama" => "Mie Ayam", "harga" => 12000],
    3 => ["nama" => "Sate Ayam", "harga" => 20000],
    4 => ["nama" => "Es Teh", "harga" => 5000],
    5 => ["nama" => "Es Jeruk", "harga" => 7000],
];

// Inisialisasi session pesanan jika belum ada
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

// Menambahkan pesanan ke session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['menu']) && isset($_POST['jumlah'])) {
        $id = $_POST['menu'];
        $jumlah = (int)$_POST['jumlah'];

        if (isset($menu[$id])) {
            // Tambah ke pesanan
            $_SESSION['pesanan'][] = [
                "nama" => $menu[$id]['nama'],
                "harga" => $menu[$id]['harga'],
                "jumlah" => $jumlah,
                "subtotal" => $menu[$id]['harga'] * $jumlah
            ];
        }
    }

    // Reset pesanan jika klik selesai
    if (isset($_POST['selesai'])) {
        $selesai = true;
    }
}

// Hitung total
$total = 0;
foreach ($_SESSION['pesanan'] as $item) {
    $total += $item['subtotal'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Kasir Sederhana</h2>

    <?php if (!isset($selesai)): ?>
    <form method="POST">
        <label>Pilih Menu:</label>
        <select name="menu">
            <?php foreach ($menu as $key => $item): ?>
                <option value="<?= $key ?>"><?= $item['nama'] ?> - Rp<?= $item['harga'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" min="1" required><br><br>

        <button type="submit">Tambah</button>
        <button type="submit" name="selesai" value="1">Selesai</button>
    </form>
    <?php endif; ?>

    <h3>Daftar Pesanan:</h3>
    <?php if (empty($_SESSION['pesanan'])): ?>
        <p>Belum ada pesanan.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($_SESSION['pesanan'] as $item): ?>
                <tr>
                    <td><?= $item['nama'] ?></td>
                    <td>Rp<?= $item['harga'] ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td>Rp<?= $item['subtotal'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>Rp<?= $total ?></strong></td>
            </tr>
        </table>
    <?php endif; ?>

    <?php if (isset($selesai)): ?>
        <p><strong>Terima kasih telah berbelanja!</strong></p>
        <?php session_destroy(); ?>
    <?php endif; ?>
</body>
</html>
