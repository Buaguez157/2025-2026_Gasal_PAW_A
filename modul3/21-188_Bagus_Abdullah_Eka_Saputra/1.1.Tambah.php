<?php
//1.1.Menambahkan lima data baru & tampilkan indeks tertinggi
$Lfruits = array("Apple", "Banana", "Cherry");
array_push($Lfruits, "Durian", "Mango", "Orange", "Kiwi", "Grapes");

echo "Isi array Lfruits:<br>";
print_r($Lfruits);

echo "<br><br>Nilai indeks tertinggi: " . (count($Lfruits) - 1);
?>
<br><br>
<?php
//1.2.Hapus satu data & tampilkan indeks tertinggi
unset($Lfruits[2]); // hapus Cherry
echo "Setelah menghapus data:<br>";
print_r($Lfruits);
echo "<br><br>Indeks tertinggi: " . max(array_keys($Lfruits));
?>
