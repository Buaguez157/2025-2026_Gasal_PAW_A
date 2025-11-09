<?php
include 'koneksi.php';
$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: center; }
        input, select { width: 100%; box-sizing: border-box; }
    </style>
</head>
<body>

<h2>Form Input Transaksi</h2>

<form action="simpan_transaksi.php" method="POST">
    <label>No Nota:</label><br>
    <input type="text" name="no_nota" required><br><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Nama Pelanggan:</label><br>
    <input type="text" name="nama_pelanggan" required><br><br>

    <h3>Detail Barang</h3>
    <table id="tabel-detail">
        <tr>
            <th>Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <select name="id_barang[]" onchange="updateHarga(this)" required>
                    <option value="">-- Pilih Barang --</option>
                    <?php while ($b = mysqli_fetch_assoc($barang)) { ?>
                        <option value="<?= $b['id_barang'] ?>" data-harga="<?= $b['harga'] ?>">
                            <?= htmlspecialchars($b['nama_barang']) ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
            <td><input type="number" name="qty[]" oninput="hitungSubtotal(this)" required></td>
            <td><input type="number" name="harga[]" readonly></td>
            <td><input type="number" name="subtotal[]" readonly></td>
        </tr>
    </table>

    <button type="button" onclick="tambahBaris()">Tambah Barang</button>
    <br><br>

    <input type="submit" value="Simpan Transaksi">
</form>

<script>
function updateHarga(select) {
    const harga = select.options[select.selectedIndex].getAttribute('data-harga') || 0;
    const row = select.closest('tr');
    row.querySelector('input[name="harga[]"]').value = harga;
    hitungSubtotal(select);
}

function hitungSubtotal(el) {
    const row = el.closest('tr');
    const qty = parseFloat(row.querySelector('input[name="qty[]"]').value) || 0;
    const harga = parseFloat(row.querySelector('input[name="harga[]"]').value) || 0;
    row.querySelector('input[name="subtotal[]"]').value = qty * harga;
}

function tambahBaris() {
    const table = document.getElementById('tabel-detail');
    const row = table.insertRow();

    // ambil opsi barang dari baris pertama
    const firstSelect = document.querySelector('select[name="id_barang[]"]');
    const options = firstSelect.innerHTML;

    row.innerHTML = `
        <td>
            <select name="id_barang[]" onchange="updateHarga(this)" required>${options}</select>
        </td>
        <td><input type="number" name="qty[]" oninput="hitungSubtotal(this)" required></td>
        <td><input type="number" name="harga[]" readonly></td>
        <td><input type="number" name="subtotal[]" readonly></td>
    `;
}
</script>

</body>
</html>