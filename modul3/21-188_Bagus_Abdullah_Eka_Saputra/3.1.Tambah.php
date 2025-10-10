<?php
$Lheight = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$Lheight["David"] = "180";
$Lheight["Edward"] = "175";
$Lheight["Frank"] = "182";
$Lheight["George"] = "169";
$Lheight["Henry"] = "172";

print_r($Lheight);
echo "<br>Jumlah elemen: " . count($Lheight);
?>
<br><br>
<?php
//3.2. Hapus satu data
unset($Lheight["Barry"]);
print_r($Lheight);
echo "<br>Jumlah elemen sekarang: " . count($Lheight);
?>
