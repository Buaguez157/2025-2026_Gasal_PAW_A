<?php
$produk = array(
    "Mouse" => 75000,
    "Keyboard" => 150000,
    "Monitor" => 1200000
);

foreach ($produk as $nama => $harga) {
    echo "$nama = Rp " . number_format($harga, 0, ',', '.') . "<br>";
}
?>
