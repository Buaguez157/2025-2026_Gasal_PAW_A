<?php
$Lfruits = array("Apple", "Banana", "Cherry");
for ($i = 0; $i < 5; $i++) {
    $Lfruits[] = "Fruit" . ($i + 1);
}

$arrlength = count($Lfruits);
for ($x = 0; $x < $arrlength; $x++) {
    echo $Lfruits[$x] . "<br>";
}

echo "Jumlah data saat ini: $arrlength";
?>
