<?php
$mahasiswa = array(
    array("Nama"=>"Andi", "Nilai"=>array(80, 85, 90)),
    array("Nama"=>"Budi", "Nilai"=>array(70, 75, 80)),
    array("Nama"=>"Citra", "Nilai"=>array(90, 95, 100))
);

foreach ($mahasiswa as $mhs) {
    $rata = array_sum($mhs["Nilai"]) / count($mhs["Nilai"]);
    echo $mhs["Nama"] . " memiliki rata-rata: " . $rata . "<br>";
}
?>